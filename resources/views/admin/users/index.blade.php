@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; min-height: 100vh; background-color: #1f2937; padding: 24px;">
        <div style="width: 100%; max-width: 896px;">
            <h1 style="font-size: 30px; font-weight: bold; color: #e5e7eb; margin-bottom: 24px; text-align: center;">Manage Users</h1>
            <div style="margin-bottom: 16px; text-align: center;">
                <a href="{{ route('admin.panel') }}" style="display: inline-block; background-color: #6b7280; color: #ffffff; padding: 8px 16px; border-radius: 4px; text-decoration: none; margin-left: 8px;">Back to Admin Panel</a>
            </div>
            <div style="background-color: #374151; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); border-radius: 8px; overflow: hidden;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background-color: #4b5563;">
                            <th style="padding: 12px 24px; text-align: left; color: #e5e7eb;">ID</th>
                            <th style="padding: 12px 24px; text-align: left; color: #e5e7eb;">Name</th>
                            <th style="padding: 12px 24px; text-align: left; color: #e5e7eb;">E-Mail</th>
                            <th style="padding: 12px 24px; text-align: left; color: #e5e7eb;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $index => $user)
                            <tr style="border-top: 1px solid #6b7280; background-color: {{ $index % 2 == 0 ? '#4b5563' : '#6b7280' }};">
                                <td style="padding: 16px 24px; color: #e5e7eb;">{{ $user->id }}</td>
                                <td style="padding: 16px 24px; color: #e5e7eb;">{{ $user->name }}</td>
                                <td style="padding: 16px 24px; color: #e5e7eb;">{{ $user->email }}</td>
                                <td style="padding: 16px 24px;">
                                    <a href="{{ route('users.show', $user) }}" style="color: #60a5fa; text-decoration: underline;">View</a>
                                    <a href="{{ route('admin.users.edit', $user) }}" style="color: #4ade80; text-decoration: underline; margin-left: 8px;">Edit</a>
                                </td>
                            </tr>
						@empty
                            <tr>
                                <td colspan="4" style="padding: 16px 24px; text-align: center; color: #e5e7eb;">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection