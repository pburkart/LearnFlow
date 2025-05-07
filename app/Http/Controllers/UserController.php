<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    static public function all()
    {
        $users = User::get();
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        \Log::info('Show method called for user ID: ' . $user->id);
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        \Log::info('Edit method called for user ID: ' . $user->id);
        $users = User::all();
        return view('admin.users.edit', compact('user', 'users'));
    }

    public function update(Request $request, User $user)
    {
        \Log::info('Update method called for user ID: ' . $user->id);
        \Log::info('Request method: ' . $request->method());
        \Log::info('Request data: ', $request->all());

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'real_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'age' => 'nullable|integer|min:0|max:150',
            'dob' => 'nullable|date|before:today',
            'bio' => 'nullable|string|max:1000',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_admin' => 'nullable',
        ]);

        \Log::info('Validation passed', $validated);

        try {
            // Handle profile picture upload
            if ($request->hasFile('profile_picture')) {
                // Delete old profile picture if it exists and isn’t the placeholder
                if ($user->profile_picture && $user->profile_picture !== '/storage/placeholder.jpg') {
                    \Log::info('Deleting old profile picture: ' . $user->profile_picture);
                    Storage::delete(str_replace('/storage/', 'public/', $user->profile_picture));
                }
                // Store new profile picture
                $path = $request->file('profile_picture')->store('profile_pics', 'public');
                $validated['profile_picture'] = '/storage/' . $path;
                \Log::info('New profile picture stored at: ' . $validated['profile_picture']);
            }

            // Update user with validated data
            $user->update([
                'name' => $validated['name'],
                'real_name' => $validated['real_name'],
                'email' => $validated['email'],
                'age' => $validated['age'],
                //'dob' => $validated['dob'],
                'bio' => $validated['bio'],
                'profile_picture' => $validated['profile_picture'] ?? $user->profile_picture,
                'is_admin' => $request->has('is_admin'),
            ]);

            \Log::info('User updated successfully', $user->toArray());
            \Log::info('Redirecting to show page');

            return redirect()->route('admin.users.edit', $user)->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            \Log::error('Error updating user: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to update user.']);
        }
    }

    // Methods for authenticated user's profile editing
    public function editProfile()
    {
        \Log::info('EditProfile method called for user ID: ' . auth()->id());
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        \Log::info('UpdateProfile method called for user ID: ' . auth()->id());
        \Log::info('Request method: ' . $request->method());
        \Log::info('Request data: ', $request->all());

        $user = auth()->user();

        $validated = $request->validate([
            'real_name' => 'nullable|string|max:255',
            'dob' => 'nullable|date|before:today',
            'bio' => 'nullable|string|max:1000',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        \Log::info('Validation passed', $validated);

        try {
            // Handle profile picture upload
            if ($request->hasFile('profile_picture')) {
                // Delete old profile picture if it exists and isn’t the placeholder
                if ($user->profile_picture && $user->profile_picture !== '/storage/placeholder.jpg') {
                    \Log::info('Deleting old profile picture: ' . $user->profile_picture);
                    Storage::delete(str_replace('/storage/', 'public/', $user->profile_picture));
                }
                // Store new profile picture
                $path = $request->file('profile_picture')->store('profile_pics', 'public');
                $validated['profile_picture'] = '/storage/' . $path;
                \Log::info('New profile picture stored at: ' . $validated['profile_picture']);
            }

            // Update user with validated data
            $user->update([
                'real_name' => $validated['real_name'],
                'dob' => $validated['dob'],
                'bio' => $validated['bio'],
                'profile_picture' => $validated['profile_picture'] ?? $user->profile_picture,
            ]);

            \Log::info('User profile updated successfully', $user->toArray());
            return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Error updating user profile: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to update profile.']);
        }
    }
}