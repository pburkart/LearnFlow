@extends('layouts.app')

@section('content')
    <div style="background-color: #1f2937; padding: 24px; min-height: 100vh;">
        <div class="container">
            <h1 style="color: #e5e7eb; text-align: center; margin-bottom: 24px;">Learning Paths</h1>
            <div style="text-align: center; margin-bottom: 24px;">
                <a href="{{ route('admin.learning-paths.create') }}" style="display: inline-block; background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 4px; text-decoration: none;">Create Learning Path</a>
            </div>
            @if ($learningPaths->isEmpty())
                <p style="color: #e5e7eb; text-align: center;">No learning paths available.</p>
            @else
                <div class="row" style="display: flex; flex-wrap: wrap;">
                    @foreach ($learningPaths as $path)
                        <div class="col-md-6" style="margin-bottom: 1em; display: flex;">
                            <div class="card" style="background-color: #374151; border: 1px solid #4b5563; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); flex: 1; display: flex; flex-direction: column;">
                                <div class="card-body" style="padding: 16px; display: flex; flex-direction: column; flex: 1;">
                                    <div style="display: flex; margin-bottom: 16px;">
                                        <div style="flex: 0 0 150px; margin-right: 16px;">
                                            @if ($path->image)
                                                <img src="{{ $path->image }}" alt="{{ $path->title }}" style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                                            @else
                                                <img src="/storage/no_image_placeholder.png" alt="Placeholder" style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                                            @endif
                                        </div>
                                        <div style="flex: 1;">
                                            <h5 style="color: #e5e7eb; margin-bottom: 8px;">{{ $path->title }}</h5>
                                            <p style="color: #e5e7eb; margin-bottom: 0; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ $path->description }}</p>
                                        </div>
                                    </div>
                                    <div style="text-align: center;">
                                        <a href="{{ route('admin.learning-paths.edit', $path) }}" style="background-color: #2563eb; color: #ffffff; padding: 4px 12px; border-radius: 4px; text-decoration: none; margin-right: 8px;">Edit</a>
                                        <form action="{{ route('admin.learning-paths.destroy', $path) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this learning path?');">
											@csrf
											@method('DELETE')
											<button type="submit" style="background-color: #dc2626; color: #ffffff; padding: 4px 12px; border-radius: 4px; border: none;">Delete</button>
										</form>
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