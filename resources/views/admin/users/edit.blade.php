@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #1f2937; padding: 24px;">
        <div style="background-color: #374151; padding: 32px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); width: 100%; max-width: 448px;">
            <h1 style="font-size: 24px; font-weight: bold; color: #e5e7eb; margin-bottom: 24px; text-align: center;">Edit User</h1>
            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
				@method("PUT")
                <div style="margin-bottom: 16px;">
                    <label for="name" style="font-size:16px; display: block; color: #e5e7eb; margin-bottom: 8px;">Username</label>
                    <input type="text" name="name" id="name" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;" value="{{ old('name', $user->name) }}">
                    @error('name')
                        <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>
				<div style="margin-bottom: 16px;">
                    <label for="real_name" style="font-size:16px; display: block; color: #e5e7eb; margin-bottom: 8px;">Real Name</label>
                    <input type="text" name="real_name" id="real_name" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;" value="{{ old('real_name', $user->real_name) }}">
                    @error('real_name')
                        <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>
				<div style="margin-bottom: 16px;">
                    <label for="email" style="font-size:16px; font-size:16px; display: block; color: #e5e7eb; margin-bottom: 8px;">E-Mail</label>
                    <input type="text" name="email" id="email" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;" value="{{ old('email', $user->email) }}">
                    @error('email')
                        <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>
				<div style="margin-bottom: 16px;">
                    <label for="bio" style="font-size:16px; font-size:16px; font-size:16px; display: block; color: #e5e7eb; margin-bottom: 8px;">Bio</label>
                    <textarea type="text" name="bio" id="bio" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;">{{ old('bio', $user->bio) }}</textarea>
                    @error('bio')
                        <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>
				<div style="margin-bottom: 16px;">
                    <label for="age" style="font-size:16px; font-size:16px; font-size:16px; font-size:16px; display: block; color: #e5e7eb; margin-bottom: 8px;">Age</label>
                    <input type="number" name="age" id="age" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;" value="{{ old('age', $user->age) }}">
                    @error('age')
                        <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>
				<div style="margin-bottom: 16px;">
					<label for="is_admin" style="font-size:16px; color: #e5e7eb; margin-right: 8px; display: inline-block;" value="true">Is Admin?</label>
					<input type="checkbox" name="is_admin" id="is_admin" style="transform: scale(1.5); border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px; vertical-align: middle;" {{ $user->is_admin ? 'checked' : '' }}>
					@error('is_admin')
						<p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
					@enderror
				</div>
				<div style="margin-bottom: 16px;">
					<label for="profile_picture" style="font-size:16px; color: #e5e7eb; margin-right: 8px; display: inline-block;">Profile Picture</label>
					<input type="text" name="profile_picture" id="profile_picture" style="border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px; vertical-align: middle;" value="{{ $user->profile_picture }}">
					@error('profile_picture')
						<p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
					@enderror
				</div>
				
                <div style="display: flex; justify-content: space-between;">
                    <a href="{{ route('admin.users.index') }}" style="background-color: #6b7280; color: #ffffff; padding: 8px 16px; border-radius: 4px; text-decoration: none;">Back</a>
                    <button type="submit" style="background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 4px; border: none; cursor: pointer;">Update User</button>
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