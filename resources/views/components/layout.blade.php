<html>
<head>
    <title> Best site @yield('title') </title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        @section('sidebar')

        @show

        @yield('content')
    </div>
    <script src="/js/app.js"></script>
</body>
</html>