@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; align-items: flex-start; background-color: #1f2937; padding: 24px;">
        <div style="background-color: #374151; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); border-radius: 8px; padding: 32px; width: 100%; max-width: 640px;">
            <h1 style="font-size: 30px; font-weight: bold; color: #e5e7eb; margin-bottom: 24px; text-align: center;">Edit Profile</h1>

            <!-- Display validation errors -->
            @if ($errors->any())
                <div style="color: #f87171; margin-bottom: 16px; text-align: center;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Real Name -->
                <div style="margin-bottom: 16px;">
                    <label for="real_name" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Real Name</label>
                    <input type="text" name="real_name" id="real_name" value="{{ old('real_name', $user->real_name) }}" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;">
                </div>
				
				<!-- Age -->
				<div style="margin-bottom: 16px;">
					<label for="age" style="display:block; color: #e5e7eb; margin-bottom: 8px;">Age</label>
					<input type="number" name="age" id="age" value="{{ old('age', $user->age) }}" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;">
				</div>

                <!-- Date of Birth -->
                <div style="margin-bottom: 16px;">
                    <label for="dob" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Date of Birth</label>
                    <input type="date" name="dob" id="dob" value="{{ old('dob', $user->dob) }}" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;">
                </div>

                <!-- Bio -->
                <div style="margin-bottom: 16px;">
                    <label for="bio" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Bio</label>
                    <textarea name="bio" id="bio" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px; height: 128px; resize: vertical;">{{ old('bio', $user->bio) }}</textarea>
                </div>

                <!-- Profile Picture -->
                <div style="margin-bottom: 16px;">
                    <label for="profile_picture" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Profile Picture</label>
                    <input type="file" name="profile_picture" id="profile_picture" style="width: 100%; color: #e5e7eb;">
                    @if ($user->profile_picture)
                        <img src="{{ $user->profile_picture }}" alt="Current Profile Picture" style="width: 100px; height: 100px; margin-top: 8px; border-radius: 8px;">
                    @else
                        <img src="/storage/placeholder.jpg" alt="Placeholder" style="width: 100px; height: 100px; margin-top: 8px; border-radius: 8px;">
                    @endif
                </div>

                <!-- Buttons -->
                <div style="text-align: center;">
                    <button type="submit" style="background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 4px; border: none; cursor: pointer;">Save Changes</button>
                    <a href="{{ route('user.profile') }}" style="display: inline-block; background-color: #6b7280; color: #ffffff; padding: 8px 16px; border-radius: 4px; text-decoration: none; margin-left: 8px;">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection