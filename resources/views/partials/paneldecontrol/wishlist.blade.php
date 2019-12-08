<section>
    <h1 id="cabeceraInfo">Tienes ({{sizeof($wishlistsUsuario)}}) artículos que deseas de nuestra web</h1>
    <div id="wishlistProducto">
        <br>
        @if(sizeof($wishlistsUsuario)!=0)
            <div id="datosWish">
            <table id="tablaWish" class="table tablaOrden">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Descripcion de artículo</th>
                    <th scope="col">Fecha de adición</th>
                    <th scope="col">Eliminación</th>
                </tr>
                @php $count=0; @endphp
                @foreach($wishlistsUsuario as $wishlistUsuario)
                    @php
                        $imagenArticulo=\App\Articulo::where('id_articulo',$wishlistUsuario->articulo_id)->get('imagen_articulo_id');
                        $slugCategoria=\App\Seccion::select('secciones.slug_seccion')->join('articulos','articulos.seccion_id','=','secciones.id_seccion')->where('articulos.id_articulo','=',$wishlistUsuario->articulo_id)->get();
                        $slugSubcategoria=\App\Subseccion::select('subsecciones.slug_subseccion')->join('articulos','articulos.subseccion_id','=','subsecciones.id_subseccion')->where('articulos.id_articulo','=',$wishlistUsuario->articulo_id)->get();
                        $slugArticulo=\App\Articulo::select('articulos.slug')->where('articulos.id_articulo','=',$wishlistUsuario->articulo_id)->get();
                        $Articulo=\App\Articulo::where('articulos.id_articulo','=',$wishlistUsuario->articulo_id)->get();
                        $count++;
                    @endphp
                    <tr>
                        <td>{{$count}}</td>
                        <td>
                            <a href="/categoria/{{$slugCategoria[0]['slug_seccion']}}/{{$slugSubcategoria[0]['slug_subseccion']}}/{{$slugArticulo[0]['slug']}}"><img
                                    class="imagenComentarioI img-fluid"
                                    src="{{ asset('images/imagen_articulo/'.$imagenArticulo[0]->imagen_articulo_id.'.jpg') }}"></a>
                        </td>
                        <td><a href="/categoria/{{$slugCategoria[0]['slug_seccion']}}/{{$slugSubcategoria[0]['slug_subseccion']}}/{{$slugArticulo[0]['slug']}}"> <b>{{$Articulo[0]->titulo}} </b></a></td>
                        <td>
                            <p>{{$wishlistUsuario->created_at}}</p>
                        </td>
                        <td>
                            <a href="javascript://ajax"  onclick="updateWishlist('{{$Articulo[0]->id_articulo}}');"><i class="fas fa-heart"></i></a>
                        </td>
                    </tr>
                @endforeach
                @else
                    <h5 id="sinComentarios"
                        class="alert alert-info"><i class="fa fa-history"></i> No tienes artículos aún. Navega por la
                        web y descubre nuestras ofertas!</h5>
                @endif
                </thead>
            </table>
            </div>
    </div>
</section>
