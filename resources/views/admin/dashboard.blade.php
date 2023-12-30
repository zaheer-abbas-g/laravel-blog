<!-- resources/views/dashboard.blade.php -->

@extends('admin.layouts.app')

@section('content')
    <div class="admin-dashboard">
        <div class="sidebar">
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="{{ route('users.index') }}">Users</a></li>
                <li><a href="{{ route('roles.index') }}">Roles</a></li>
            </ul>
        </div>

        <div class="main-content">
            <h1>Welcome to the Admin Dashboard</h1>
            <!-- Add more content for the dashboard as needed -->
        </div>
    </div>
@endsection
