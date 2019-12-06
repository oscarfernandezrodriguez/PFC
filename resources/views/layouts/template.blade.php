<!doctype html>
<html>
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('css')
</head>
<body>
    <header>@yield('cabecera')</header>
    <main>
        @yield('menu')
        @yield('central')
    </main>
    <footer>
        @yield('pie')
    </footer>
    @yield('js')
</body>
</html>
