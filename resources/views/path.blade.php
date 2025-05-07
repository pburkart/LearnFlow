@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #1f2937; padding: 24px;">
        <div style="background-color: #374151; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4); border-radius: 12px; padding: 40px; width: 100%; max-width: 800px; position: relative; z-index: 10;">
            <!-- Success/Info Messages -->
            @if (session('success'))
                <p style="color: #16a34a; text-align: center; margin-bottom: 16px;">{{ session('success') }}</p>
            @endif
            @if (session('info'))
                <p style="color: #60a5fa; text-align: center; margin-bottom: 16px;">{{ session('info') }}</p>
            @endif
            @if ($errors->any())
                <p style="color: #ef4444; text-align: center; margin-bottom: 16px;">{{ $errors->first() }}</p>
            @endif

            <!-- Learning Path Header -->
            <div style="text-align: center; margin-bottom: 32px;">
                @if ($path->image)
                    <img src="{{ $path->image }}" alt="{{ $path->title }}" style="width: 200px; height: 200px; object-fit: cover; border-radius: 8px; margin-bottom: 16px;">
                @else
                    <img src="/storage/placeholder.jpg" alt="Placeholder" style="width: 200px; height: 200px; object-fit: cover; border-radius: 8px; margin-bottom: 16px;">
                @endif
                <h1 style="font-size: 32px; font-weight: bold; color: #e5e7eb; margin-bottom: 8px;">{{ $path->title }}</h1>
                <p style="color: #d1d5db; font-size: 16px; line-height: 1.5;">{{ $path->description }}</p>
            </div>
			
			<div style="text-align:center;margin-bottom:2em;">
				@if (Auth::check() && !Auth::user()->learningPaths->contains($path->id))
					<form action="{{ route('enroll', $path->id) }}" method="POST" style="margin-top: 25px; display: inline;">
						@csrf
						<button type="submit" style="margin-top:1em; display: inline-block; background-color: #16a34a; color: #ffffff; padding: 8px 16px; border-radius: 4px; border: none; cursor: pointer; margin-right: 8px;">Enroll in Learning Path</button>
					</form>
				@endif<br/>
				<div style="display:inline-block">
					<a href="{{ route('learning-paths.show') }}"><button style="margin-top:1em; display: inline-block; background-color: #6b7280; color: #ffffff; padding: 8px 16px; border-radius: 4px; border: none; cursor: pointer; margin-right: 8px;">Back to Paths</button></a>
				</div>
			</div>

            <!-- Topics Section -->
            <div style="margin-bottom: 32px;">
                <h2 style="font-size: 24px; color: #e5e7eb; margin-bottom: 16px; text-align: center;">Topics</h2>
                @if (empty($path->topics) || $path->topics->isEmpty())
                    <p style="color: #e5e7eb; text-align: center;">No topics available.</p>
                @else
                    @foreach ($path->topics as $topic)
                        <div style="position: relative; background-color: #4b5563; border-radius: 8px; padding: 16px; margin-bottom: 16px; overflow: hidden;">
                            <!-- Background Image -->
                            @if ($topic->image)
                                <img src="{{ $topic->image }}" alt="{{ $topic->title }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.2; z-index: 1;">
                            @endif
                            <div style="position: relative; z-index: 2;">
                                <h3 style="font-size: 20px; color: #e5e7eb; margin-bottom: 8px;">
                                    <a href="{{ route('topics.show', $topic->id) }}" style="color: #60a5fa; text-decoration: none;">{{ $topic->title }}</a>
                                </h3>
                                <p style="color: #d1d5db; font-size: 14px; margin-bottom: 8px;">{{ \Illuminate\Support\Str::limit($topic->description, 100) }}</p>
                                <!-- Activity Status -->
                                <p style="color: #e5e7eb; font-size: 14px; margin-bottom: 8px;">
									<strong>Progress:</strong>
									@if ($topic->userProgress && $topic->userProgress->completed)
										Completed
									@else
										Not Started
									@endif
								</p>
															<!-- Quizzes and Final Test -->
                                <p style="color: #e5e7eb; font-size: 14px; margin-bottom: 8px;">
                                    <strong>Quizzes:</strong>
                                    @if (empty($topic->quizzes) || $topic->quizzes->isEmpty())
                                        No quizzes
                                    @else
                                        {{ $topic->userQuizResults->whereIn('quiz_id', $topic->quizzes->pluck('id'))->count() }}/{{ $topic->quizzes->count() }} completed
                                    @endif
                                </p>
                                <p style="color: #e5e7eb; font-size: 14px;">
                                    <strong>Final Test:</strong>
                                    @if ($topic->finalTestResult)
                                        {{ $topic->finalTestResult->score }}%
                                    @else
                                        0%
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Discussion Section -->
            <div>
                <h2 style="font-size: 24px; color: #e5e7eb; margin-bottom: 16px; text-align: center;">Discussion</h2>
                @if (empty($path->comments) || $path->comments->isEmpty())
                    <p style="color: #e5e7eb; text-align: center;">No comments yet. Be the first to share your thoughts!</p>
                @else
                    @foreach ($path->comments as $comment)
                        <div style="background-color: #4b5563; border-radius: 8px; padding: 16px; margin-bottom: 16px;">
                            <p style="color: #e5e7eb; font-size: 14px; margin-bottom: 8px;">
                                <strong>{{ $comment->user->name }}</strong> ({{ $comment->created_at->diffForHumans() }})
                            </p>
                            <p style="color: #d1d5db; font-size: 14px;">{{ $comment->content }}</p>
                        </div>
                    @endforeach
                @endif
                @auth
                    <form action="{{ route('paths.comment', $path->id) }}" method="POST" style="margin-top: 16px;">
                        @csrf
                        <textarea name="content" rows="4" style="width: 100%; padding: 8px; border-radius: 4px; background-color: #1f2937; color: #e5e7eb; border: 1px solid #4b5563; margin-bottom: 8px;" placeholder="Add your comment..."></textarea>
                        <button type="submit" style="background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 4px; border: none;">Post Comment</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
@endsection