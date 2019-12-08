<nav id="navegacion">
    @auth
        <div id="menuUsuario">
            <div id="cabeceraUsuario">
                <h4>MENU DE USUARIO</h4>
            </div>
            <div id="menuSecciones">
                <ul>
                    @if(Auth::user()->tipo_usuario_id==1)
                        <li><i class="fas fa-users usersPA"></i><a href="/panel-de-control/usuarios/">Usuarios</a></li>
                        @endif
                        @if(Auth::user()->tipo_usuario_id<=3)
                            <li><i class="fas fa-truck truckPA"></i><a href="/panel-de-control/envios/">Envios</a></li>
                        @endif
                        @if(Auth::user()->tipo_usuario_id<=2 || Auth::user()->tipo_usuario_id<=4)
                            <li><i class="fas fa-money-bill-wave billPA"></i><a href="/panel-de-control/cobros/">Cobros</a></li>
                        @endif
                    <li><i class="fas fa-info infoPA"></i><a href="/panel-de-control/{{Auth::user()->id_usuario}}/informacion/">Información</a></li>
                    <li><i class="fas fa-gifts giftsPA"></i><a href="/panel-de-control/{{Auth::user()->id_usuario}}/pedidos/">Pedidos</a></li>
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
                <li><i class="fa fa-arrow-right"></i><a href="/categoria/{{$seccion->slug_seccion}}/">{{$seccion->descripcion_seccion}}</a>
                    @php
                        $Subseccion=App\Subseccion::where('seccion_id', $seccion->id_seccion)->get();
                    @endphp
                    @if(sizeof($Subseccion)>0)
                        <ul>
                            @foreach($Subseccion as $subseccion)
                                <li><i class="fa fa-angle-right"></i><a href="/categoria/{{$seccion->slug_seccion}}/{{$subseccion->slug_subseccion}}/">{{$subseccion->descripcion_subseccion}}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
</nav>
