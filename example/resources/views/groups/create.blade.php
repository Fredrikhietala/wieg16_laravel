<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create groups</title>

</head>
<body>

    <form action="{{ action('GroupsController@store') }}" method="POST">
        {{ csrf_field() }}
        <label for="customer_group_id">Group id:</label>
        <input type="text" name="customer_group_id" id="customer_group_id"/><br>
        <label for="customer_group_code">Group code:</label>
        <input type="text" name="customer_group_code" id="customer_group_code"/><br>
        <label for="tax_class_id">Tax class id:</label>
        <input type="text" name="tax_class_id" id="tax_class_id"/><br>
        <input type="submit" name="submit" id="submit" value="submit"/>
    </form>

</body>
</html>