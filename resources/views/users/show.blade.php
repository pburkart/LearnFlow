@extends('layouts.app')

@section('content')
    <!-- Information Card -->
    <div style="display: flex; justify-content: center; align-items: flex-start; background-color: #1f2937; padding: 24px;">
        <div style="background-color: #374151; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); border-radius: 8px; padding: 32px; width: 100%; max-width: 1024px;">
            <!-- Success Message -->
            @if (session('success'))
                <p style="color: #16a34a; text-align: center; margin-bottom: 16px;">{{ session('success') }}</p>
            @endif

            <!-- Profile Picture and Details -->
            <img style="float: left; margin-right: 2em;" width="250px" src="{{ $user->profile_picture ?? '/storage/placeholder.jpg' }}" alt="Profile Picture" />
            <h3 style="color: #e5e7eb;">{{ $user->name }}</h3>
            @if ($user->real_name)
                <p style="color: #e5e7eb;"><strong>Real Name:</strong> {{ $user->real_name }}</p>
            @endif
			@if ($user->age)
				<p style="color: #e5e7eb;"><strong>Age:</strong> {{ $user->age }}</p>
			@endif
            @if ($user->dob)
                <p style="color: #e5e7eb;"><strong>Birthday:</strong> {{ \Carbon\Carbon::parse($user->dob)->format('F j, Y') }}</p>
            @endif
            @if ($user->bio)
                <p style="color: #e5e7eb;"><strong>Bio:</strong> {{ $user->bio }}</p>
            @endif
            <div style="clear: both;"></div>

            <!-- Edit Profile Button -->
            <div style="text-align: center; margin-top: 16px;">
                 @if(auth()->check() && (auth()->user()->is_admin || auth()->id() === $user->id))
					<a href="{{ route('profile.edit') }}" style="display: inline-block; background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 4px; text-decoration: none;">Edit Profile</a>
				@endif
            </div>
        </div>
    </div>

    <!-- Enrolled Learning Paths -->
    <div style="display: flex; justify-content: center; align-items: flex-start; background-color: #1f2937; padding: 24px;">
        <div style="background-color: #374151; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); border-radius: 8px; padding: 32px; width: 100%; max-width: 1024px;">
            <h3 style="color: #e5e7eb; margin-bottom: 24px; text-align: center;">Enrolled Learning Paths</h3>
            @if ($user->learningPaths->isEmpty())
                <p style="color: #e5e7eb; text-align: center;">{{ auth()->check() && auth()->id() === $user->id 
                    ? 'You are not enrolled in any learning paths yet.' 
                    : ($user->name . ' is not enrolled in any learning paths.') }}</p>
            @else
                <div style="display: flex; flex-wrap: wrap; gap: 24px; justify-content: center;">
                    @foreach ($user->learningPaths as $path)
                        <a href="{{ route('paths.show', $path->id) }}"
                           style="background-color: #4b5563; color: #e5e7eb; padding: 24px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); text-decoration: none; width: 300px; height: 150px; display: flex; align-items: center; justify-content: center; transition: background-color 0.2s; font-size: 18px; text-align: center;"
                           onmouseover="this.style.backgroundColor='#6b7280'"
                           onmouseout="this.style.backgroundColor='#4b5563'">
                            {{ $path->title }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection