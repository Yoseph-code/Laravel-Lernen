<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('save.admin') }}" method="post">
        @if(Session::get('sucess')) 
            {{ Session::get('sucess') }}
        @endif
        @if(Session::get('fail')) 
            {{ Session::get('fail') }}
        @endif
        <br>
        @csrf 
        <input type="email" name="email" placeholder="Ex:email@exemplo.com" value="{{old('email')}}"><br>
        <span>@error('email'){{$message}} @enderror</span><br>
        <input type="password" name="password" placeholder="password"><br>
        <span>@error('password'){{$message}} @enderror</span><br>
        <input type="submit" value="Register"><br>
        <a href="{{route('admin.login')}}">Back</a>
    </form>
</body>
</html>