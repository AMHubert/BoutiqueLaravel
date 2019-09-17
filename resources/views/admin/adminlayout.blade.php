<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smarty Boutique - Admin</title>
    <link rel="stylesheet" href="{{asset('resources/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/css/all-admin.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <script src="{{asset('resources/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('resources/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('resources/bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body class="page vh-100">
    @include('admin.admin-nav')

    {{-- <main class="flex-shrink-0">
        @yield('content')
    </main> --}}

    @section('scripts')
    @show
</body>
</html>
