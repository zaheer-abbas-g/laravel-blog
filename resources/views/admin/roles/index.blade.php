@extends('admin.layouts.app')

@section('content')
    <h1>Role List</h1> <span> <a href="{{ route('roles.create') }}" >Add Role</a> </span>
    <p class="message">{{ session('success') }}</p>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->slug }}</td>
                    <td>
                        <a href="{{ route('roles.show', $role->id) }}">View</a>
                        <a href="{{ route('roles.edit', $role->id) }}">Edit</a>
                        <form method="post" action="{{ route('roles.destroy', $role->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection