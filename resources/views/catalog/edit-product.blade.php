<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
    <title>Creating</title>
</head>
<body>
    <form action="{{route('product.update', $products->id)}}" method="post">
        @csrf 
        @method('put')
        Name : <br><input type="text" name="name" value="{{$products->name}}"><br>
        Price : <br><input type="number" name="price" value="{{$products->price}}"><br>
        <input type="submit" value="Submit"><br>
        <a href="{{route('list.product')}}">Back</a>
    </form>
</body>
</html>