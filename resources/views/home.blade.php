@extends('layouts.app')

@section('content')
    <div style="background-color: #1f2937; padding: 24px; min-height: 100vh;">
        <div class="container">
            <h1 style="color: #e5e7eb; text-align: center; margin-bottom: 24px;">LearnFlow</h1>

            <!-- Add Learning Path Button -->
            @if (Auth::check())
                <div style="text-align: center; margin-bottom: 24px;">
                    <a href="{{ route('learning-paths.show') }}" class="btn btn-success" style="background-color: #16a34a; border-color: #16a34a;">Add Learning Path</a>
                </div>
            @endif

            <!-- Enrolled Learning Paths -->
            @if ($paths->isEmpty())
                <p style="color: #e5e7eb; text-align: center;">You are not enrolled in any learning paths yet.</p>
            @else
                <div class="row" style="display: flex; flex-wrap: wrap;">
                    @foreach($paths as $path)
                        <div class="col-md-4" style="margin-bottom: 1em; display: flex;">
                            <div class="card" style="background-color: #374151; border: none; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); flex: 1; display: flex; flex-direction: column;">
                                <div class="card-body" style="padding: 16px; display: flex; flex-direction: column; flex: 1;">
                                    <div style="display: flex; margin-bottom: 16px;">
                                        <div style="flex: 0 0 100px; margin-right: 16px;">
                                            @if ($path->image)
                                                <img src="{{ $path->image }}" alt="{{ $path->title }}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                                            @else
                                                <img src="/storage/placeholder.jpg" alt="Placeholder" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                                            @endif
                                        </div>
                                        <div style="flex: 1;">
                                            <h5 style="color: #e5e7eb; margin-bottom: 8px;">{{ $path->title }}</h5>
                                            <p style="color: #e5e7eb; margin-bottom: 0; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ $path->description }}</p>
                                        </div>
                                    </div>
                                    <div style="text-align: center; margin-top: auto;">
                                        <a href="{{ route('paths.show', $path->id) }}" class="btn btn-primary" style="background-color: #2563eb; border-color: #2563eb;">Start</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection