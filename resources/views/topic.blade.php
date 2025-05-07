@extends('layouts.app')

@section('content')
    <h1>{{ $topic->title }}</h1>
    <p>{{ $topic->description }}</p>
    <h3>Resources</h3>
    @foreach(json_decode($topic->resources, true) as $resource)
        <iframe src="{{ $resource }}" width="560" height="315" frameborder="0" allowfullscreen></iframe>
    @endforeach
    @if(auth()->check())
        <form method="POST" action="{{ route('topic.complete', $topic->id) }}">
            @csrf
            <button type="submit" class="btn btn-success">Mark Complete</button>
        </form>
    @endif
    <a href="{{ route('topic.show', $topic->id + 1) }}" class="btn btn-primary">Next</a>
@endsection