<html>
    <head>Edit Users</head>
    <body>
        <h1>Edit Users</h1>
        @if($errors->any())

        @foreach ($errors->all() as $error )
            {{ $error }}
        @endforeach
            
        @endif
        <form action="{{ route('users.update',$data->id) }}" method="post">
            {{-- @csrf --}}
            @method('PUT')
            <input type="hidden" name="id" id="id" value="{{ $data->id }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" name="name" value="{{ $data->name }}" id="name" placeholder="Name" required/> <br>
            <input type="email" name="email" id="email" value="{{ $data->email }}"  placeholder="Email" required /> <br>
            <input type="password" name="password" id="password"  placeholder="Password" required /> <br>

            <input type="submit" name="Submit" value="Update User">
        </form>
    </body>
</html>