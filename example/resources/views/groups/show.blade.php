<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Show group</title>

</head>
<body>
<h2>{{ $group->customer_group_code }}</h2>
<p>Group id: {{ $group->customer_group_id }}</p>
<p>Tax class id: {{ $group->tax_class_id }}</p>
</body>
</html>