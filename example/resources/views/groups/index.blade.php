<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Groups</title>

</head>
<body>
<!--$products = \App\Product::all();-->
<table>
    <tr>
        <th>Group id</th>
        <th>Group code</th>
        <th>Tax class id</th>
        <th>Actions</th>
    </tr>
    @foreach($groups as $group)
        <tr>
            <td>{{$group->customer_group_id}}</td>
            <td>{{$group->customer_group_code}}</td>
            <td>{{$group->tax_class_id}}</td>
            <td><a href="{{action('GroupsController@edit', $group)}}">Edit</a></td>
            <td>
                <form action="{{action('GroupsController@destroy', $group)}}" method="post">
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