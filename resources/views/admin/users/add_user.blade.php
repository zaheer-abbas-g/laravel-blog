<html>
    <head>Add Users</head>
    <body>
        <h1>Users</h1>
        @if($errors->any())

        @foreach ($errors->all() as $error )
            {{ $error }}
        @endforeach
            
        @endif
        <form action="{{ route('users.store') }}" method="post">
            {{-- @csrf --}}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" name="name" value="" id="name" placeholder="Name" required/> <br>
            <input type="email" name="email" id="email"  placeholder="Email" required /> <br>
            <input type="password" name="password" id="password" placeholder="Password" required /> <br>

            <input type="submit" name="Submit" value="Add User">
        </form>
    </body>
</html>