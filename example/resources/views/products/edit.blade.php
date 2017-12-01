<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Update products</title>

</head>
<body>

    <h2>Edit product {{ $product->name }}</h2>

    <form action="{{ action('ProductsController@update', $product) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <label for="entity_id">Entity id:</label>
        <input type="text" name="entity_id" id="entity_id" value="{{$product->entity_id}}"/><br>
        <label for="type_id">Type id:</label>
        <input type="text" name="type_id" id="type_id" value="{{$product->type_id}}"/><br>
        <label for="sku">Sku:</label>
        <input type="text" name="sku" id="sku" value="{{$product->sku}}"/><br>
        <label for="status">Status:</label>
        <input type="text" name="status" id="status" value="{{$product->status}}"/><br>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{$product->name}}"/><br>
        <label for="amount_package">Amount Package:</label>
        <input type="text" name="amount_package" id="amount_package" value="{{$product->amount_package}}"/><br>
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" value="{{$product->price}}"/><br>
        <label for="is_in_stock">Is in stock:</label>
        <input type="text" name="is_in_stock" id="is_in_stock" value="{{$product->is_in_stock}}"/><br>
        <input type="submit" name="submit" id="submit" value="update"/>
    </form>

</body>
</html>