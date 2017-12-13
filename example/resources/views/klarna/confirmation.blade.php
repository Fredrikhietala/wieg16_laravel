<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Klarna</title>

    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

</head>
<body>
    <div class="content">
        <div>{!! $checkout['html_snippet'] !!}</div>
    </div>
    <script id="klarna" data-order-id="{{$orderId}}">
        var orderId = $('#klarna').data('orderId');
        (function($) {
            window._klarnaCheckout(function (api) {
                console.log("This is the checkout", orderId);
                $.getJSON('/klarna-acknowledge?order_id=' + orderId)
                    .then(function (response) {

                    });
            });
        })(jQuery);
    </script>
</body>
</html>
