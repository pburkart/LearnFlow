@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; align-items: flex-start; background-color: #1f2937; padding: 24px;">
        <div style="background-color: #374151; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); border-radius: 8px; padding: 32px; width: 100%; max-width: 640px;">
            <h1 style="font-size: 30px; font-weight: bold; color: #e5e7eb; margin-bottom: 24px; text-align: center;">Add New Test</h1>

            @if ($errors->any())
                <div style="color: #f87171; margin-bottom: 16px; text-align: center;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.tests.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="display: flex; margin-bottom: 16px;">
                    <div style="flex: 1;">
                        <div style="margin-bottom: 16px;">
                            <label for="title" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;">
                            @error('title')
                                <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                            @enderror
                        </div>
						<div style="margin-bottom: 16px;">
							<label for="topic_id" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Topic</label>
							<select name="topic_id" id="topic_id" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;">
								@foreach ($topics as $topic)
									<option value="{{ $topic->id }}">{{ $topic->title }}</option>
								@endforeach
							</select>
							@error('topic_id')
								<p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
							@enderror
						</div>
                    </div>
                </div>

                <div style="text-align: center;">
                    <a href="{{ route('admin.topics.index') }}" style="background-color: #6b7280; color: #ffffff; padding: 8px 16px; border-radius: 4px; text-decoration: none; margin-right: 8px;">Cancel</a>
                    <button type="submit" style="background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 4px; border: none; cursor: pointer;">Create Topic</button>
                </div>
            </form>
        </div>
    </div>
@endsection