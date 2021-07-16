<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list</title>
    <style>
        table{
            background-color: collapse;
            width: 100%;
        }
        td, th{
            padding: 5px;
            border: 1px solid;
        }
    </style>
</head>
<body>
    @auth 
        <h1>Welcome</h1>
        <form action="{{ route('logout') }}"  method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
        @else 
        <h1>teste</h1>
    @endauth
    <div>
    <a href="{{ route('product.add') }}">Add products</a>
    </div>
    <table>
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
                    <a href="{{route('edit', $product->id)}}">Edit</a> |
                    <form action="{{ route('product.delete', $product->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" href="{{route('product.delete', $product->id)}}">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>