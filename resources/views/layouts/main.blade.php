<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wijaya Kencana - @yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('../asset/plugin/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../asset/css/bootstrap.min.css') }}">

    @section('css')
    @show
    <link rel="stylesheet" type="text/css" href="{{ asset('../asset/css/style.css') }}">

    <script type="text/javascript" src="{{ asset('../asset/plugin/fontawesome/js/all.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('../asset/js/jquery-3.6.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('../asset/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('../asset/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('../asset/js/main.js') }}"></script>

    
</head>
<body>
    @section('sidebar')
        
    @show

    @yield('content')

</body>
</html>