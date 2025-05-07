@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; align-items: flex-start; background-color: #1f2937; padding: 24px;">
        <div style="background-color: #374151; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); border-radius: 8px; padding: 32px; width: 100%; max-width: 640px;">
            <!-- Display success or info message -->
            @if (session('success'))
                <p style="color: #16a34a; text-align: center; margin-bottom: 16px;">{{ session('success') }}</p>
            @endif
            @if (session('info'))
                <p style="color: #60a5fa; text-align: center; margin-bottom: 16px;">{{ session('info') }}</p>
            @endif

            <div style="display: flex; margin-bottom: 16px;">
                <div style="flex: 0 0 150px; margin-right: 16px;">
                    @if ($topic->image)
                        <img src="{{ $topic->image }}" alt="{{ $topic->title }}" style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                    @else
                        <img src="/storage/placeholder.jpg" alt="Placeholder" style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                    @endif
                </div>
                <div style="flex: 1;">
                    <h1 style="font-size: 30px; font-weight: bold; color: #e5e7eb; margin-bottom: 8px;">{{ $topic->title }}</h1>
                    <p style="color: #e5e7eb;"><strong>Learning Path:</strong> {{ $topic->learningPath->title }}</p>
                </div>
            </div>

            <div style="margin-bottom: 16px;">
                <p style="color: #e5e7eb;"><strong>Description:</strong> {{ $topic->description }}</p>
            </div>
            <div style="margin-bottom: 16px;">
                <p style="color: #e5e7eb; margin-bottom: 8px;"><strong>Resources:</strong></p>
                @if ($topic->resources && count($topic->resources) > 0)
                    @foreach ($topic->resources as $resource)
                        @php
                            $videoId = '';
                            if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $resource, $matches)) {
                                $videoId = $matches[1];
                            }
                        @endphp
                        @if ($videoId)
                            <div style="margin-bottom: 16px;">
                                <iframe width="100%" height="360" src="https://www.youtube.com/embed/{{ $videoId }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        @else
                            <p style="color: #e5e7eb;">Invalid YouTube URL: {{ $resource }}</p>
                        @endif
                    @endforeach
                @else
                    <p style="color: #e5e7eb;">No resources available.</p>
                @endif
            </div>
            <div style="text-align: center;">
                <a href="{{ route('paths.show', $topic->learningPath->id) }}" style="display: inline-block; background-color: #6b7280; color: #ffffff; padding: 8px 16px; border-radius: 4px; text-decoration: none;">Back to Learning Path</a>
            </div>
        </div>
    </div>
@endsection