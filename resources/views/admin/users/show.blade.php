<!-- resources/views/users/show.blade.php -->

@extends('admin.layouts.app')

@section('content')

    <p class="message">{{ session('success') }}</p>
    <div class="user-details">
        <h1>{{ $user->name }}</h1>
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>

        <div class="actions">
            <a href="{{ route('users.index') }}">Back to User List</a>
            <form method="post" action="{{ route('users.destroy', $user->id) }}" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete User</button>
            </form>
        </div>
    </div>
@endsection
