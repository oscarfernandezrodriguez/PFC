<div id="superiorCabecera" class="row">
    <div id="enviosGratis" class="col-12 col-sm-12 text-sm-center col-lg-6 text-lg-left col-xl-8">
        <p>Envío gratuito a pedidos superiores a 75€ (a toda la península)</p>
    </div>
    <div id="loginSuperior" class="col-12 col-lg-auto col-xl-2 ">

        @guest
            <p><a href="/autenticarse"><i class="fa fa-user"></i>Mi cuenta</a></p>
        @else
            <p><i
                        class="fa fa-user"></i> {{Auth::user()->nombre}} {{Auth::user()->apellido1}} <a
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(),modal('nosave', 'Alertas Usuario', 'Esta siendo deslogueado'),document.getElementById('logout-form').submit();"><i id="logoutI"
                                                                                                         class="fas fa-times-circle "></i></a>
            </p>
        @endguest
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <div id="carrito" class="col-12  col-lg-3 col-xl-2">
        @auth
        <a href="/carrito/"><p><i class="fas fa-shopping-cart"></i> (
                <input type="text"  id="numeroProductos" disabled value=" @php echo \App\Pedido::where('pedidos.usuario_id',Auth::user()->id_usuario)->where('estado_pedido_id','1')->join('pedidos_articulo','pedidos_articulo.pedido_id','pedidos.id_pedido')->sum('pedidos_articulo.unidades_pedido'); @endphp"> ) Productos</p></a>
        @endauth
        @guest
                <p><i class="fas fa-shopping-cart"></i> (
                <input type="text" id="numeroProductos" disabled value="0"> ) Productos</p>
            @endguest
    </div>
</div>
<div id="medioCabecera">
    <div id="logo" class="col-12 col-sm-6 col-lg-6 col-xl-4">
        <a href="/"><img src="{{ asset('images/logo.png') }}"></a>
    </div>
    <div id="buscador" class="col-12 col-sm-6 col-lg-6 col-xl-3 ">
        <div class="input-group md-form form-sm form-1 col-11">
            <div class="input-group-prepend">
    <span class="input-group-text lighten-3" ><i class="fas fa-search text-white"
                                                                     aria-hidden="true"></i></span>
            </div>
            <input id="buscadorI" class="form-control my-0 py-1 col-11" type="text" placeholder="Busca entre los artículos"
                   aria-label="Buscador">
        </div>
    </div>
    <div id="escribenos" class="col-12 col-sm-6 col-lg-6 col-xl-2">
        <div id="escribenosIcono" class="col-12   col-xl-2">
            <i class="far fa-envelope "></i>
        </div>
        <div id="escribenosTexto" class="col-12  col-xl-10">
            <h4>Escríbenos</h4>
            <p>ventas@ferrofarmacia.com</p>
        </div>
    </div>
    <div id="llamanos" class="col-12 col-sm-6 col-lg-6 col-xl-3">
        <div id="llamanosIcono" class="col-12  offset-lg-2 col-xl-2">
            <i class="fab fa-whatsapp"></i>
        </div>
        <div id="llamanosTexto" class="col-12   col-xl-10">
            <h4>Llamadas o Whatsapp</h4>
            <p>981 66 66 66 - 666 66 66 66</p>
        </div>
    </div>
</div>
<div id="inferiorCabecera">
    <ul>
        @foreach($Secciones as $seccion)
            @php
                $slugSeccion=$seccion->slug_seccion;
            @endphp
            <li><a href="/categoria/{{$slugSeccion}}/">{{$seccion->descripcion_seccion}}</a></li>
        @endforeach
    </ul>

</div>
