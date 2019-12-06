<section>
@if(!isset($slugSeccion))
    <h1 id="cabeceraInfo">Página {{$pagina}}</h1>
@elseif(isset($slugSubseccion))
    <h1 id="cabeceraInfo">Página {{$pagina}} de {{$subseccionDescripcion[0]->descripcion}}</h1>
@else(isset($slugSeccion))
    <h1 id="cabeceraInfo">Página {{$pagina}} de {{$seccionDescripcion[0]->descripcion}}</h1>
@endif
@for ($numeroArticulo = $minimo; $numeroArticulo <= $maximo; $numeroArticulo++)
    @php
        $slugCategoria=\App\Seccion::select('secciones.slug')->join('articulos','articulos.seccion_id','=','secciones.id_seccion')->where('articulos.id_articulo','=',$Articulos[$numeroArticulo]->id_articulo)->get();
        $slugSubcategoria=\App\Subseccion::select('subsecciones.slug')->join('articulos','articulos.subseccion_id','=','subsecciones.id_subseccion')->where('articulos.id_articulo','=',$Articulos[$numeroArticulo]->id_articulo)->get();
        $slugArticulo=\App\Articulo::select('articulos.slug')->where('articulos.id_articulo','=',$Articulos[$numeroArticulo]->id_articulo)->get();
    @endphp
    <div class="col-12 col-sm-6 col-lg-6 col-xl-4 rejilla">
        <div class="producto">
            <a href="/categoria/{{$slugCategoria[0]['slug']}}/{{$slugSubcategoria[0]['slug']}}/{{$slugArticulo[0]['slug']}}"><img
                    src="{{ asset('images/imagen_articulo/'.$Articulos[$numeroArticulo]->imagen_articulo_id.'.jpg') }}"
                    class="img-fluid"></a>
            <div class="tituloProducto">
                <h6>
                    <a href="/categoria/{{$slugCategoria[0]['slug']}}/{{$slugSubcategoria[0]['slug']}}/{{$slugArticulo[0]['slug']}}">{{$Articulos[$numeroArticulo]->titulo}}</a>
                </h6>
            </div>
            <div class="precioProducto">
                <p>Precio: <span>{{$Articulos[$numeroArticulo]->precio}}</span> €</p>
            </div>
            <div class="controladorCompra">
                <div class="botonWhish">
                    <a href="javascript://ajax"  onclick="updateWishlist('{{$Articulos[$numeroArticulo]->id_articulo}}');"><i class="fas fa-heart"></i></a>
                </div>
                <div class="botonComprar">
                    <i class="fas fa-shopping-basket"></i>
                    <a href="javascript://ajax"  onclick="updateOrder('{{$Articulos[$numeroArticulo]->id_articulo}}');"><p>Añadir al carrito</p></a>
                </div>
            </div>
        </div>
    </div>
@endfor
@if(($minimo!=0 || $maximo!=$maxArticulos-1) && isset($slugSeccion))
    <div id="controladorPagina">
        <div id="paginaAnterior">
            @if($minimo!=0)
                @if(isset($slugSubseccion))
                    <a href="/categoria/{{$slugSeccion}}/{{$slugSubseccion}}/pagina/{{$numeroPagina-1}}"><i
                            class="fas fa-arrow-left"></i></a>
                @elseif(isset($slugSeccion))
                    <a href="/categoria/{{$slugSeccion}}/pagina/{{$numeroPagina-1}}"><i
                            class="fas fa-arrow-left"></i></a>
                @endif
            @endif
        </div>
        <div id="paginaActual">
            @if(!isset($slugSeccion))
                <h4>Página {{$pagina}}</h4>
            @elseif(isset($slugSubseccion))
                <h4>Página {{$pagina}}</h4>
            @else(isset($slugSeccion))
                <h4>Página {{$pagina}}</h4>
            @endif
        </div>
        <div id="paginaSiguiente">
            @if($maximo!=$maxArticulos-1)
                @if(isset($slugSubseccion))
                    @if($numeroPagina<1)
                        <a href="/categoria/{{$slugSeccion}}/{{$slugSubseccion}}/pagina/{{$numeroPagina+2}}"><i
                                class="fas fa-arrow-right"></i></a>
                    @else
                        <a href="/categoria/{{$slugSeccion}}/{{$slugSubseccion}}/pagina/{{$numeroPagina+1}}"><i
                                class="fas fa-arrow-right"></i></a>
                    @endif
                @elseif(isset($slugSeccion))
                    @if($numeroPagina<1)
                        <a href="/categoria/{{$slugSeccion}}/pagina/{{$numeroPagina+2}}"><i
                                class="fas fa-arrow-right"></i></a>
                    @else
                        <a href="/categoria/{{$slugSeccion}}/pagina/{{$numeroPagina+1}}"><i
                                class="fas fa-arrow-right"></i></a>
                    @endif
                @endif
            @endif
        </div>
    </div>
@endif
</section>
