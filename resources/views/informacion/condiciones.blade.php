@extends("../layouts.template")

@section("css")
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}"/>
    <link  rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"  />
@endsection
@section("js")
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript"  src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/map.js') }}"></script>
@endsection

@section("cabecera")
    @include('../partials.principal.header')
@endsection

@section("menu")
    @include('../partials.principal.menu')
@endsection

@section("central")
    @include('../partials.informacion.condiciones')
@endsection

@section("pie")
    @include('../partials.principal.pie')
@endsection
