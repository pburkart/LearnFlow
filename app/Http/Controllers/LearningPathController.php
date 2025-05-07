<?php

namespace App\Http\Controllers;

use App\Models\LearningPath;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LearningPathController extends Controller
{
    public function show($id)
    {
        \Log::info('Show method called for learning path ID: ' . $id);
        $path = LearningPath::with([
            'topics.userProgress' => function ($query) {
                $query->where('user_id', auth()->id());
            },
            'comments.user'
        ])->findOrFail($id);
        return view('path', compact('path'));
    }

    public function comment(Request $request, LearningPath $path)
    {
        \Log::info('Comment method called for learning path ID: ' . $path->id);

        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        try {
            $path->comments()->create([
                'user_id' => auth()->id(),
                'content' => $request->content,
            ]);
            return back()->with('success', 'Comment posted successfully!');
        } catch (\Exception $e) {
            Log::error('Error posting comment: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to post comment.']);
        }
    }
	
	public function create()
	{
		\Log::info('Create method called for learning paths');
		return view('admin.learning-paths.create');
	}
	
	public function store(Request $request)
	{
		\Log::info('Store method called for learning paths', $request->all());

		$validated = $request->validate([
			'title' => 'required|string|max:255',
			'description' => 'required|string',
			'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8192',
		]);

		\Log::info('Validation passed', $validated);

		try {
			if ($request->hasFile('image')) {
				$path = $request->file('image')->store('profile_pics', 'public');
				$validated['image'] = '/storage/' . $path;
				\Log::info('Image stored at: ' . $validated['image']);
			}

			$learningPath = LearningPath::create([
				'title' => $validated['title'],
				'description' => $validated['description'],
				'image' => $validated['image'] ?? null,
			]);

			\Log::info('Learning path created successfully', $learningPath->toArray());
			return redirect()->route('admin.learning-paths.index')->with('success', 'Learning path created successfully.');
		} catch (\Exception $e) {
			\Log::error('Error creating learning path: ' . $e->getMessage());
			return back()->withErrors(['error' => 'Failed to create learning path.']);
		}
	}
		
	public function update(Request $request, LearningPath $learningPath)
	{
		\Log::info('Update method called for learning path ID: ' . $learningPath->id);
		\Log::info('Request method: ' . $request->method());
		\Log::info('Request data: ', $request->all());

		$validated = $request->validate([
			'title' => 'required|string|max:255',
			'description' => 'required|string',
			'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8192',
		]);

		\Log::info('Validation passed', $validated);

		try {
			if ($request->hasFile('image')) {
				if ($learningPath->image && $learningPath->image !== '/storage/placeholder.jpg' && str_starts_with($learningPath->image, '/storage/')) {
					\Log::info('Deleting old image: ' . $learningPath->image);
					Storage::delete(str_replace('/storage/', 'public/', $learningPath->image));
				}
				$path = $request->file('image')->store('profile_pics', 'public');
				$validated['image'] = '/storage/' . $path;
				\Log::info('New image stored at: ' . $validated['image']);
			}

			$learningPath->update([
				'title' => $validated['title'],
				'description' => $validated['description'],
				'image' => $validated['image'] ?? $learningPath->image,
			]);

			\Log::info('Learning path updated successfully', $learningPath->toArray());
			return redirect()->route('admin.learning-paths.index')->with('success', 'Learning path updated successfully.');
		} catch (\Exception $e) {
			\Log::error('Error updating learning path: ' . $e->getMessage());
			return back()->withErrors(['error' => 'Failed to update learning path.']);
		}
	}
	
	public function destroy(LearningPath $learningPath)
	{
		\Log::info('Destroy method called for learning path ID: ' . $learningPath->id);

		try {
			if ($learningPath->image && $learningPath->image !== '/storage/placeholder.jpg' && str_starts_with($learningPath->image, '/storage/')) {
				\Log::info('Deleting image: ' . $learningPath->image);
				Storage::delete(str_replace('/storage/', 'public/', $learningPath->image));
			}

			$learningPath->delete();
			\Log::info('Learning path deleted successfully');

			return redirect()->route('admin.learning-paths.index')->with('success', 'Learning path deleted successfully.');
		} catch (\Exception $e) {
			\Log::error('Error deleting learning path: ' . $e->getMessage());
			return back()->withErrors(['error' => 'Failed to delete learning path.']);
		}
	}
	
	public function edit(LearningPath $learningPath)
	{
		\Log::info('Edit method called for learning path ID: ' . $learningPath->id);
		return view('admin.learning-paths.edit', compact('learningPath'));
	}
	
	public function index(){
		$learningPaths = LearningPath::with('topics')->get();
		return view('admin.learning-paths.index', compact('learningPaths'));
	}
	
	static public function all()
    {
        // Fetch all learning paths where is_premium is false
        $freePaths = LearningPath::where('is_premium', false)->get();
        
        // Return the view with free learning paths
        return view('paths.index', compact('freePaths'));
    }

    // New method for learning-paths.show
    public function list()
    {
        $paths = LearningPath::all();
        return view('learning-paths.show', compact('paths'));
    }
	
	public function enroll(Request $request, LearningPath $learningPath)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to enroll in a learning path.');
        }

        // Check if the user is already enrolled to avoid duplicates
        if (!$user->learningPaths->contains($learningPath->id)) {
            $user->learningPaths()->attach($learningPath->id);
            return redirect()->back()->with('success', 'Successfully enrolled in the learning path!');
        }

        return redirect()->back()->with('info', 'You are already enrolled in this learning path.');
    }
}
