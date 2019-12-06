@php$Secciones=\App\Seccion::all();@endphp
<nav id="navegacion">
    @auth
        <div id="menuUsuario">
            <div id="cabeceraUsuario">
                <h4>MENU DE USUARIO</h4>
            </div>
            <div id="menuSecciones">
                <ul>
                    <li><i class="fas fa-info infoPA"></i>Información</li>
                    <li><i class="fas fa-gifts giftsPA"></i>Pedidos</li>
                    <li><i class="far fa-comments comentariosPA"></i><a href="/panel-de-control/{{Auth::user()->id_usuario}}/comentarios/">Comentarios</a></li>
                    <li><i class="fas fa-heart heartPA"></i><a href="/panel-de-control/{{Auth::user()->id_usuario}}/wishlist/">Wishlist</a></li>
                </ul>
            </div>
        </div>
    @endauth
    @guest
            <div id="registrate">
                <h3><a href="/registro"><i class="fas fa-sign-in-alt"></i> Registrate!</a></h3>
            </div>

    @endguest
<div id="menuProductos">
    <div id="cabeceraMenu">
        <h4>BUSCAR POR CATEGORIAS</h4>
    </div>
    <div id="menuSecciones">
        <ul>
            @foreach($Secciones as $seccion)
                <li><i class="fa fa-arrow-right"></i><a href="/categoria/{{$seccion->slug}}/">{{$seccion->descripcion}}</a>
                    @php
                        $Subseccion=App\Subseccion::where('seccion_id', $seccion->id_seccion)->get();
                    @endphp
                    @if(sizeof($Subseccion)>0)
                        <ul>
                            @foreach($Subseccion as $subseccion)
                                <li><i class="fa fa-angle-right"></i><a href="/categoria/{{$seccion->slug}}/{{$subseccion->slug}}/">{{$subseccion->descripcion}}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
</nav>
