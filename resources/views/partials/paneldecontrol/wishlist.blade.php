<section>
    <h1 id="cabeceraInfo">Artígulos que quieres de la web</h1>
    <div id="wishlistProducto">
        <h3>Deseos ({{sizeof($wishlistsUsuario)}}):</h3>
        @if(sizeof($wishlistsUsuario)!=0)
            @foreach($wishlistsUsuario as $wishlistUsuario)
                @php
                    $imagenArticulo=\App\Articulo::where('id_articulo',$wishlistUsuario->articulo_id)->get('imagen_articulo_id');
                    $slugCategoria=\App\Seccion::select('secciones.slug')->join('articulos','articulos.seccion_id','=','secciones.id_seccion')->where('articulos.id_articulo','=',$wishlistUsuario->articulo_id)->get();
                    $slugSubcategoria=\App\Subseccion::select('subsecciones.slug')->join('articulos','articulos.subseccion_id','=','subsecciones.id_subseccion')->where('articulos.id_articulo','=',$wishlistUsuario->articulo_id)->get();
                    $slugArticulo=\App\Articulo::select('articulos.slug')->where('articulos.id_articulo','=',$wishlistUsuario->articulo_id)->get();
                    $Articulo=\App\Articulo::where('articulos.id_articulo','=',$wishlistUsuario->articulo_id)->get();
                @endphp
                <h6><i class="far fa-comments comentariosPA"></i> <b>{{$Articulo[0]->titulo}} </b> - <i
                        class="fa fa-history historyPA"></i> {{$Articulo [0]->created_at}}
                </h6>
                <div class="imagenC">
                    <div class="imagenComentarioD">
                        <a href="/categoria/{{$slugCategoria[0]['slug']}}/{{$slugSubcategoria[0]['slug']}}/{{$slugArticulo[0]['slug']}}"><img
                                class="imagenComentarioI img-fluid"
                                src="{{ asset('images/imagen_articulo/'.$imagenArticulo[0]->imagen_articulo_id.'.jpg') }}"></a>
                    </div>
                    <div class="textoComentarioD">
                        <p>{{$wishlistUsuario->created_at}}</p>
                    </div>
                </div>
            @endforeach
        @else
            <h5 id="sinComentarios"
                class="alert alert-info"><i class="fa fa-history"></i> No tienes artículos aún. Navega por la web y descubre nuestras ofertas!</h5>
        @endif
    </div>
</section>
