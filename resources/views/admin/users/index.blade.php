@extends('admin.layouts.app')

@section('content')
    <h1>User List</h1> <span> <a href="{{ route('users.create') }}" >Add User</a> </span>
    <p class="message">{{ session('success') }}</p>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->roles)
                            @foreach ($user->roles as  $role)
                              {{$role->name.','}}  
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}">View</a>
                        <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                        <form method="post" action="{{ route('users.destroy', $user->id) }}" style="display: inline;">
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