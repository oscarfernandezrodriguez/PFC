<div id="superiorCabecera" class="row">
    <div id="enviosGratis" class="col-12 col-sm-9">
        <p>Envío gratuito a pedidos superiores a 75€ (a toda la península)</p>
    </div>
    <div id="loginSuperior" class="col-12 col-sm-1">
        <i class="fa fa-user"></i>
        <p>Mi cuenta</p>
    </div>
    <div id="carrito" class="col-12 col-sm-2">
        <i class="fas fa-shopping-cart"></i>
        <p>(0) Productos</p>
    </div>
</div>
<div class="row" id="medioCabecera">
    <div class="col-12 col-sm-3" id="logo">
        <img src="{{ asset('images/logo.png') }}"  class="img-fluid">
    </div>
    <div id="buscador" class="col-12 col-sm-3">
        <input type="text" name="buscador" value="" placeholder="Busca en nuestro catálogo..." autocomplete="off">
    </div>
    <div id="escribenos" class="col-12 col-sm-3">
        <div id="escribenosIcono" class="col-12 col-xl-4">
            <i class="far fa-envelope "></i>
        </div>
        <div id="escribenosTexto" class="col-12 col-xl-8">
            <h4>Escríbenos</h4>
            <p>ventas@ferrofarmacia.com</p>
        </div>
    </div>
    <div id="llamanos" class="col-12 col-sm-3">
        <div id="llamanosIcono" class="col-12 col-xl-3">
            <i class="fab fa-whatsapp"></i>
        </div>
        <div id="llamanosTexto" class="col-12 col-xl-9">
            <h4>Llamadas o Whatsapp</h4>
            <p>981 66 66 66 - 666 66 66 66</p>
        </div>
    </div>
</div>
<div id="inferiorCabecera">
    @php
    $Secciones=App\Seccion::all();
    @endphp
    <ul>
       @foreach($Secciones as $seccion)
            <li>{{$seccion->descripcion}}</li>
        @endforeach
    </ul>

</div>
