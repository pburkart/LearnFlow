@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; align-items: flex-start; background-color: #1f2937; padding: 24px;">
        <div style="background-color: #374151; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); border-radius: 8px; padding: 32px; width: 100%; max-width: 640px;">
            <h1 style="font-size: 30px; font-weight: bold; color: #e5e7eb; margin-bottom: 24px; text-align: center;">{{ $topic->title }}</h1>
            <div style="margin-bottom: 16px;">
                <p style="color: #e5e7eb;"><strong>Learning Path:</strong> {{ $topic->learningPath->title }}</p>
            </div>
            <div style="margin-bottom: 16px;">
                <p style="color: #e5e7eb;"><strong>Description:</strong> {{ $topic->description }}</p>
            </div>
            <div style="margin-bottom: 16px;">
                <p style="color: #e5e7eb;"><strong>Order:</strong> {{ $topic->order }}</p>
            </div>
            <div style="margin-bottom: 16px;">
                <p style="color: #e5e7eb; margin-bottom: 8px;"><strong>Resources:</strong></p>
                @if ($topic->resources && count($topic->resources) > 0)
                    @foreach ($topic->resources as $resource)
                        @php
                            // Extract YouTube video ID from URL
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
                <a href="{{ url('/') }}" style="display: inline-block; background-color: #6b7280; color: #ffffff; padding: 8px 16px; border-radius: 4px; text-decoration: none;">Back to Home</a>
            </div>
        </div>
    </div>
@endsection