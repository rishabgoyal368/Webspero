<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>



</head>

<body>

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
        @php
        Session::forget('success');
        @endphp
    </div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-success">
        {{ Session::get('error') }}
        @php
        Session::forget('error');
        @endphp
    </div>
    @endif

    @yield('content')

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $('.update_cart').click(function() {
        var product_id = $(this).data('product_id');
        var id = $(this).data('id');
        var value = $(this).closest('.col-sm-2').find('.cart_value').text();
        var type = $(this).data('value');
        $.ajax({
            url: '/update-cart',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'product_id': product_id,
                'id': id,
                'value': value,
                'type': type,
            },
            success: function(result) {
                console.log(result)
                if (result.code == 200) {
                    location.reload()
                } else {
                    alert(result.status);
                }
            }
        });
    });

    $('.delete_cart').click(function() {
        var id = $(this).data('id');
        $.ajax({
            url: '/delete-cart',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'id': id
            },
            success: function(result) {
                console.log(result)
                if (result.code == 200) {
                    location.reload()
                } else {
                    alert(result.status);
                }
            }
        });
    });
</script>

</html>