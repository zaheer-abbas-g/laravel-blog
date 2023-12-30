<!-- resources/views/users/edit.blade.php -->

@extends('admin.layouts.app')

@section('content')


        <div class="form-container">
            <h1>Edit Role</h1>
            <form method="post" action="{{ route('roles.update', $role->id) }}">
                @csrf
                @method('PUT')
    
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ $role->name }}" required>
                </div>
    
                <div class="form-group">
                    <label for="email">Slug</label>
                    <input type="text" id="slug" name="slug" value="{{ $role->slug }}" required>
                </div>


                <a href="{{ route('roles.index') }}"> Back to Roles List </a>
    
                <button type="submit">Update Role</button>
            </form>
        </div>
   
@endsection