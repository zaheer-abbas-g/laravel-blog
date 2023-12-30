<!-- resources/views/users/edit.blade.php -->

@extends('admin.layouts.app')

@section('content')


        <div class="form-container">
            <h1>Add User</h1>
    
            <form method="post" action="{{ route('users.store') }}">
                @csrf
               
    
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="" required>
                </div>
    
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="" required>
                </div>
    
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="roles">Roles</label>
                    <select name="roles[]" id="roles" multiple>
                        <option value="">Select Roles</option>
                        @if($roles)
                            @foreach ($roles as $role )
                                <option value="{{$role->id}}">{{ $role->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <a href="{{ route('users.index') }}"> Back to User List </a>
    
                <button type="submit">Add User</button>
            </form>
        </div>
   
@endsection