<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Products</title>

</head>
<body>
    <h2>{{ $product->name }}</h2>
        <p>Sku: {{ $product->sku }}</p>
        <p>Price: {{ $product->price }}</p>
</body>
</html>