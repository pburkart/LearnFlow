@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #1f2937; padding: 24px;">
        <div style="background-color: #374151; padding: 32px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); width: 100%; max-width: 448px;">
            <h1 style="font-size: 24px; font-weight: bold; color: #e5e7eb; margin-bottom: 24px; text-align: center;">Edit Learning Path</h1>
            <form action="{{ route('admin.learning-paths.update', $learningPath) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div style="margin-bottom: 16px;">
                    <label for="title" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $learningPath->title) }}" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;">
                    @error('title')
                        <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>
                <div style="margin-bottom: 16px;">
                    <label for="description" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Description</label>
                    <textarea name="description" id="description" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px; height: 128px; resize: vertical;">{{ old('description', $learningPath->description) }}</textarea>
                    @error('description')
                        <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>
                <div style="margin-bottom: 16px;">
                    <label for="image" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Image</label>
                    <input type="file" name="image" id="image" style="width: 100%; color: #e5e7eb;">
                    @if ($learningPath->image)
                        <img src="{{ $learningPath->image }}" alt="Current Image" style="width: 100px; height: 100px; margin-top: 8px; border-radius: 8px;">
                    @else
                        <img src="/storage/placeholder.jpg" alt="Placeholder" style="width: 100px; height: 100px; margin-top: 8px; border-radius: 8px;">
                    @endif
                    @error('image')
                        <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>
				<div style="margin-bottom: 16px;">
					<label for="is_premium" style="font-size:16px; color: #e5e7eb; margin-right: 8px; display: inline-block;" value="true">Is Premium?</label>
					<input type="checkbox" name="is_premium" id="is_premium" style="transform: scale(1.5); border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px; vertical-align: middle;" {{ $learningPath->is_premium ? 'checked' : '' }}>
					@error('is_premium')
						<p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
					@enderror
				</div>
                <div style="display: flex; justify-content: space-between;">
                    <a href="{{ route('admin.learning-paths.index') }}" style="background-color: #6b7280; color: #ffffff; padding: 8px 16px; border-radius: 4px; text-decoration: none;">Cancel</a>
                    <button type="submit" style="background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 4px; border: none; cursor: pointer;">Update Learning Path</button>
                </div>
            </form>
        </div>
    </div>
@endsection