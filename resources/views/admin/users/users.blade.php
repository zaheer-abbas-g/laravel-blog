<html>
    <head>Users</head>
    <body>
        <h1>Users</h1>

        <ul>
        @if($data)
            @foreach ($data as $user )
                <li>{{ $user->name }}</li>
                <li>{{ $user->email }}</li>
                <li>
                    <form action="{{ route('users.destroy',$user->id) }}" method="post">
                        @csrf
                        @method('Delete')
                        <input type="submit" name="Submit" value="Delete User">
                    </form>
                </li>
            @endforeach
        @endif
        </ul>
        
    </body>
</html>