<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
</head>
<body>
    <form action="{{route('check.login')}}" method="post">
        @if(Session::get('fail'))
            {{ Session::get('fail')}}
        @endif
        <br>
        @csrf
        Login <br> 
        <input type="email" name="email" id="email" placeholder="Ex:email@exemplo.com" value="{{ old('check.login') }}"><br>
        <span>
            @error('email')
                <p>{{$message}}</p>
            @enderror
        </span>
        Password <br>
        <input type="password" name="password" placeholder="password" value="{{ old('check.login')}}"><br>
        <span>
            @error('password')
                <p>{{$message}}</p>
            @enderror
        </span>
        <input type="submit" value="Login"><br>
        <a href="{{ route('create.login') }}">Register</a>
    </form>
</body>
</html>