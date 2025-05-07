@extends('layouts.app')

@section('content')
    <div style="background-color: #1f2937; padding: 24px; min-height: 100vh;">
        <div class="container">
            <h1 style="color: #e5e7eb; text-align: center; margin-bottom: 24px;">Tests</h1>
            <div style="text-align: center; margin-bottom: 24px;">
                <a href="{{ route('admin.tests.create') }}" style="display: inline-block; background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 4px; text-decoration: none;">Create Test</a>
            </div>
            @if ($tests->isEmpty())
                <p style="color: #e5e7eb; text-align: center;">No tests available.</p>
            @else
                <div class="row" style="display: flex; flex-wrap: wrap;">
                    @foreach ($tests as $test)
                        <div class="col-md-6" style="margin-bottom: 1em; display: flex;">
                            <div class="card" style="background-color: #374151; border: 1px solid #4b5563; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); flex: 1; display: flex; flex-direction: column;">
                                <div class="card-body" style="padding: 16px; display: flex; flex-direction: column; flex: 1;">
                                    <div style="display: flex; margin-bottom: 16px;">
                                        <div style="flex: 1;">
                                            <h5 style="color: #e5e7eb; margin-bottom: 8px;">{{ $test->title }}</h5>
                                        </div>
                                    </div>
                                    <div style="text-align: center;">
                                        <a href="{{ route('tests.show', $test) }}" style="background-color: #60a5fa; color: #ffffff; padding: 4px 12px; border-radius: 4px; text-decoration: none; margin-right: 8px;">View</a>
                                        <a href="{{ route('admin.tests.edit', $test) }}" style="background-color: #2563eb; color: #ffffff; padding: 4px 12px; border-radius: 4px; text-decoration: none; margin-right: 8px;">Edit</a>
                                        <form action="{{ route('admin.tests.destroy', $test) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this test?');">
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