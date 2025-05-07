@extends('layouts.app')

@section('content')
    <div style="background-color: #1f2937; padding: 24px; min-height: 100vh;">
        <h1 style="color: #e5e7eb; text-align: center; margin-bottom: 24px;">LearnFlow</h1>
        <div class="row" style="margin-left: 25em; margin-right: 25em;">
            @foreach($paths as $path)
                <div class="col-md-4" style="margin-bottom: 1em;">
                    <div class="card" style="border: none; height: 175px;">
                        <div class="card-body" style="background-color: #374151; border: none; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                            <div style="display: flex; margin-bottom: 12px;">
                                <div style="flex: 0 0 100px; margin-right: 16px;">
                                    @if ($path->image)
                                        <img src="{{ $path->image }}" alt="{{ $path->title }}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                                    @else
                                        <img src="/storage/placeholder.jpg" alt="Placeholder" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                                    @endif
                                </div>
                                <div style="flex: 1;">
                                    <h5 style="color: #e5e7eb; margin-bottom: 8px;">{{ $path->title }}</h5>
                                    <p style="color: #e5e7eb; margin-bottom: 0; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $path->description }}</p>
                                </div>
                            </div>
                            <a href="{{ route('paths.show', $path->id) }}" class="btn btn-primary" style="background-color: #2563eb; border-color: #2563eb; align-self: flex-start;">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection