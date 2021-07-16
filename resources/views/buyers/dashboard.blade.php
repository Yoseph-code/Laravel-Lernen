<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <table>
        <a href="">Log in</a>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>price</td>
            <td>Action</td>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="">Buy</a>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>