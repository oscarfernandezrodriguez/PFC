<!doctype html>
<html>
<head>
    @yield('css')
</head>
<body>
    <header>@yield('cabecera')</header>
    <main>
        <nav>@yield('menu')</nav>
        <section>@yield('central')</section>
    </main>
    <footer>
        @yield('pie')
    </footer>
    @yield('js')
</body>
</html>
