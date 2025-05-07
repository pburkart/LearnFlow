@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; min-height: 100vh; background-color: #1f2937; padding: 24px;">
        <div style="width: 100%; max-width: 640px;">
            <h1 style="font-size: 30px; font-weight: bold; color: #e5e7eb; margin-bottom: 24px; text-align: center;">Admin Panel</h1>
            <p style="color: #e5e7eb; margin-bottom: 24px; text-align: center;">Welcome to the admin panel. Manage your Learning Paths and Topics below.</p>

            <div style="display: grid; grid-template-columns: 1fr; gap: 24px;">
                <div style="background-color: #374151; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); border-radius: 8px; padding: 24px;">
                    <h2 style="font-size: 20px; font-weight: 600; color: #e5e7eb; margin-bottom: 16px; text-align: center;">Learning Paths</h2>
                    <p style="color: #e5e7eb; margin-bottom: 16px; text-align: center;">View and manage all learning paths.</p>
                    <div style="text-align: center;">
                        <a href="{{ route('admin.learning-paths.index') }}" style="display: inline-block; background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 4px; text-decoration: none;">Go to Learning Paths</a>
                    </div>
                </div>

                <div style="background-color: #374151; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); border-radius: 8px; padding: 24px;">
                    <h2 style="font-size: 20px; font-weight: 600; color: #e5e7eb; margin-bottom: 16px; text-align: center;">Topics</h2>
                    <p style="color: #e5e7eb; margin-bottom: 16px; text-align: center;">View and manage all topics.</p>
                    <div style="text-align: center;">
                        <a href="{{ route('admin.topics.index') }}" style="display: inline-block; background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 4px; text-decoration: none;">Go to Topics</a>
                    </div>
                </div>
				
				<div style="background-color: #374151; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); border-radius: 8px; padding: 24px;">
                    <h2 style="font-size: 20px; font-weight: 600; color: #e5e7eb; margin-bottom: 16px; text-align: center;">Users</h2>
                    <p style="color: #e5e7eb; margin-bottom: 16px; text-align: center;">View and manage all users.</p>
                    <div style="text-align: center;">
                        <a href="{{ route('admin.users.index') }}" style="display: inline-block; background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 4px; text-decoration: none;">Go to Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection