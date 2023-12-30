<!-- resources/views/users/show.blade.php -->

@extends('admin.layouts.app')

@section('content')

    <p class="message">{{ session('success') }}</p>
    <div class="user-details">
        <h1>{{ $role->name }}</h1>
        <p>Name: {{ $role->name }}</p>
        <p>Slug: {{ $role->slug }}</p>

        <div class="actions">
            <a href="{{ route('roles.index') }}">Back to Roles List</a>
            <form method="post" action="{{ route('roles.destroy', $role->id) }}" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete Role</button>
            </form>
        </div>
    </div>
@endsection
