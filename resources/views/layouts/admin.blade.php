<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN - Wijaya Kencana - @yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('../asset/admin/vendor/fontawesome-free/css/all.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('../asset/admin/css/sb-admin-2.css') }}">

    @section('css')
    @show
 
</head>
<body>

    @section('sidebar')
        
    @show

    @yield('content')

    <script type="text/javascript" src="{{ asset('../asset/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('../asset/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('../asset/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('../asset/admin/js/sb-admin-2.min.js') }}"></script>
   
    <!-- Page level plugins -->
    <script src="{{ asset('../asset/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('../asset/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('../asset/admin/js/demo/datatables-demo.js') }}"></script>

    @section('js')
    @show

</body>
</html>