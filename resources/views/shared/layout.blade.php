<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('shared.assetBundle')
</head>
<body class="d-flex flex-column h-100">
    @include('shared.header')
    @yield('content')
    @include('shared.footer')
    @section('scripts')
    @show
</body>
</html>
