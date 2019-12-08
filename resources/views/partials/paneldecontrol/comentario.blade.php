<section>
<h1 id="cabeceraInfo">Comentarios hechos en la web</h1>
<div id="comentariosProducto">
    <div id="datosComentario">
    <h3>Comentarios ({{sizeof($comentariosUsuario)}}):</h3>
    @if(sizeof($comentariosUsuario)!=0)
        @foreach($comentariosUsuario as $comentarioUsuario)
            <h6><i class="far fa-comments comentariosPA"></i> <b>{{$comentarioUsuario->titulo}} </b> - <i
                    class="fa fa-history historyPA"></i> {{$comentarioUsuario->created_at}}
            </h6>
            @php
                $imagenArticulo=\App\Articulo::where('id_articulo',$comentarioUsuario->articulo_id)->get('imagen_articulo_id');
                $slugCategoria=\App\Seccion::select('secciones.slug_seccion')->join('articulos','articulos.seccion_id','=','secciones.id_seccion')->where('articulos.id_articulo','=',$comentarioUsuario->articulo_id)->get();
                $slugSubcategoria=\App\Subseccion::select('subsecciones.slug_subseccion')->join('articulos','articulos.subseccion_id','=','subsecciones.id_subseccion')->where('articulos.id_articulo','=',$comentarioUsuario->articulo_id)->get();
                $slugArticulo=\App\Articulo::select('articulos.slug')->where('articulos.id_articulo','=',$comentarioUsuario->articulo_id)->get();
            @endphp
            <div class="imagenC">
                <div class="imagenComentarioD">
                    <a href="/categoria/{{$slugCategoria[0]['slug_seccion']}}/{{$slugSubcategoria[0]['slug_subseccion']}}/{{$slugArticulo[0]['slug']}}"><img
                            class="imagenComentarioI img-fluid"
                            src="{{ asset('images/imagen_articulo/'.$imagenArticulo[0]->imagen_articulo_id.'.jpg') }}"></a>
                </div>
                <div class="textoComentarioD">
                    <p>{{$comentarioUsuario->contenido}}</p>
                </div>
            </div>
        @endforeach
    @else
        <h5 id="sinComentarios"
            class="alert alert-info"><i class="fa fa-history"></i> No hay comentarios aún, sé el primero!</h5>
    @endif
    </div>
</div>
</section>
