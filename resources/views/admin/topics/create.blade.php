@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; align-items: flex-start; background-color: #1f2937; padding: 24px;">
        <div style="background-color: #374151; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); border-radius: 8px; padding: 32px; width: 100%; max-width: 640px;">
            <h1 style="font-size: 30px; font-weight: bold; color: #e5e7eb; margin-bottom: 24px; text-align: center;">Add New Topic</h1>

            @if ($errors->any())
                <div style="color: #f87171; margin-bottom: 16px; text-align: center;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.topics.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div style="display: flex; margin-bottom: 16px;">
                    <div style="flex: 0 0 150px; margin-right: 16px;">
                        <img src="/storage/placeholder.jpg" alt="Placeholder" style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                    </div>
                    <div style="flex: 1;">
                        <div style="margin-bottom: 16px;">
                            <label for="title" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;">
                            @error('title')
                                <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div style="margin-bottom: 16px;">
                            <label for="path_id" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Learning Path</label>
                            <select name="path_id" id="path_id" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;">
                                @foreach ($learningPaths as $path)
                                    <option value="{{ $path->id }}">{{ $path->title }}</option>
                                @endforeach
                            </select>
                            @error('path_id')
                                <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div style="margin-bottom: 16px;">
                    <label for="image" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Topic Image</label>
                    <input type="file" name="image" id="image" style="width: 100%; color: #e5e7eb;">
                    @error('image')
                        <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="margin-bottom: 16px;">
                    <label for="description" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Description</label>
                    <textarea name="description" id="description" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px; height: 128px; resize: vertical;">{{ old('description') }}</textarea>
                    @error('description')
                        <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; color: #e5e7eb; margin-bottom: 8px;">Resources (YouTube URLs)</label>
                    <div id="resources-container">
                        <input type="url" name="resources[]" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px; margin-bottom: 8px;" placeholder="https://www.youtube.com/watch?v=...">
                    </div>
                    <button type="button" id="add-resource" style="background-color: #16a34a; color: #ffffff; padding: 4px 12px; border-radius: 4px; border: none; cursor: pointer;">Add Resource</button>
                </div>

                <div style="margin-bottom: 16px;">
                    <label for="order" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Order</label>
                    <input type="number" name="order" id="order" value="{{ old('order', 1) }}" min="1" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;">
                    @error('order')
                        <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="text-align: center;">
                    <a href="{{ route('admin.topics.index') }}" style="background-color: #6b7280; color: #ffffff; padding: 8px 16px; border-radius: 4px; text-decoration: none; margin-right: 8px;">Cancel</a>
                    <button type="submit" style="background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 4px; border: none; cursor: pointer;">Create Topic</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('add-resource').addEventListener('click', function () {
            const container = document.getElementById('resources-container');
            const input = document.createElement('div');
            input.style.display = 'flex';
            input.style.marginBottom = '8px';
            input.innerHTML = `
                <input type="url" name="resources[]" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;" placeholder="https://www.youtube.com/watch?v=...">
                <button type="button" class="remove-resource" style="background-color: #dc2626; color: #ffffff; padding: 4px 12px; border-radius: 4px; margin-left: 8px; border: none; cursor: pointer;">Remove</button>
            `;
            container.appendChild(input);
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-resource')) {
                e.target.parentElement.remove();
            }
        });
    </script>
@endsection