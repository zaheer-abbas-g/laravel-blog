<!-- resources/views/users/edit.blade.php -->

@extends('admin.layouts.app')

@section('content')


        <div class="form-container">
            <h1>Add Role</h1>
    
            <form method="post" action="{{ route('roles.store') }}">
                @csrf
               
    
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="" required>
                </div>
    
                <div class="form-group">
                    <label for="email">Slug</label>
                    <input type="text" id="slug" name="slug" value="" required>
                </div>
    


                <a href="{{ route('roles.index') }}"> Back to Roles List </a>
    
                <button type="submit">Add Role</button>
            </form>
        </div>
   
@endsection