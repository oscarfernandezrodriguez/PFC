<section>
    <h1 id="cabeceraInfo">Información del pedido [ {{$idPedido}} ]</h1>

    <div id="pedidoProducto">
        <br>
        @if(sizeof($Articulos)!=0)
            <div id="datosPedido">
                <table id="tablaPedido" class="table tablaOrden">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto del artículo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha de creación</th>
                        <th scope="col">Unidades totales</th>
                        <th scope="col">Importe por unidad</th>
                    </tr>
                @php $count=0; @endphp
                @foreach($Articulos as $Articulo)
                    @php
                        $imagenArticulo=$Articulo->imagen_articulo_id;
                        $slugCategoria=\App\Seccion::select('secciones.slug_seccion')->join('articulos','articulos.seccion_id','=','secciones.id_seccion')->where('articulos.id_articulo','=',$Articulo->articulo_id)->get();
                        $slugSubcategoria=\App\Subseccion::select('subsecciones.slug_subseccion')->join('articulos','articulos.subseccion_id','=','subsecciones.id_subseccion')->where('articulos.id_articulo','=',$Articulo->articulo_id)->get();
                        $slugArticulo=\App\Articulo::select('articulos.slug')->where('articulos.id_articulo','=',$Articulo->articulo_id)->get();
                        $count++;
                         $total=0;
                    @endphp

                    <tr>
                        <td>{{$count}}</td>
                        <td>
                            <a href="/categoria/{{$slugCategoria[0]['slug_seccion']}}/{{$slugSubcategoria[0]['slug_subseccion']}}/{{$slugArticulo[0]['slug']}}"><img
                                    class="imagenComentarioI img-fluid"
                                    src="{{ asset('images/imagen_articulo/'.$imagenArticulo.'.jpg') }}"></a>
                        </td>
                        <td><a href="/categoria/{{$slugCategoria[0]['slug_seccion']}}/{{$slugSubcategoria[0]['slug_subseccion']}}/{{$slugArticulo[0]['slug']}}"> <b>{{$Articulo->titulo}} </b></a>
                        <td>
                            {{$Articulo->created_at}}
                        </td>
                        <td>
                            {{$Articulo->unidades_pedido}}
                        </td>
                        <td>
                            {{$Articulo->precio}}
                        </td>
                    </tr>
                @endforeach
                    @else
                        <h5 id="Pedidos"
                            class="alert alert-info"><i class="fa fa-history"></i> No tienes pedidos aún. Navega por la
                            web y descubre nuestras ofertas!</h5>
                    @endif
                    </thead>
                </table>
            </div>
    </div>
</section>

