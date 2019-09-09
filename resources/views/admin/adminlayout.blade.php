<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smarty Boutique - Admin</title>
    <link rel="stylesheet" href="{{asset('resources/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/css/admin.css')}}">
    <script src="{{asset('resources/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('resources/js/bootstrap-all.js')}}"></script>
</head>
<body class="d-flex flex-column h-100">
    <header></header>

    <main class="flex-shrink-0">
        @yield('content')
    </main>

    <footer></footer>
</body>
</html>
