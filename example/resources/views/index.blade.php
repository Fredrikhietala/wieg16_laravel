<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Products</title>

</head>
<body>
    <!--$products = \App\Product::all();-->
    <table>
        <tr>
            <th>Entity id</th>
            <th>Type id</th>
            <th>Sku</th>
            <th>Name</th>
            <th>Amount package</th>
            <th>Price</th>
            <th>In stock</th>
            <th>Actions</th>
        </tr>
    @foreach($products as $product)
        <tr>
            <td>{{$product->entity_id}}</td>
            <td>{{$product->type_id}}</td>
            <td>{{$product->sku}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->amount_package}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->is_in_stock}}</td>
            <td><a href="{{action('ProductsController@edit', $product)}}">Edit</a></td>
            <td>
                <form action="{{action('ProductsController@destroy', $product)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="delete">
                </form>
            </td>
        </tr>
    @endforeach
    </table>

</body>
</html>