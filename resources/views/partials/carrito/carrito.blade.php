<section>
    @if($sinPedido==0)
        <h1 id="cabeceraInfo">Resumen de compra de pedido nº {{$idPedido[0]->id_pedido}}</h1>
    @else
        <h1 id="cabeceraInfo"
            class="alert alert-info"><i class="fa fa-history"></i> No tienes pedidos aún. Navega por la
            web y descubre nuestras ofertas!</h1>
    @endif
    <div id="pedidoProducto">
        <br>
        @if($sinPedido==0)
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
                        <th scope="col">Eliminar Producto</th>
                    </tr>
                    @php $count=0; $total=0; @endphp
                    @foreach($Articulos as $Articulo)
                        @php
                            $imagenArticulo=$Articulo->imagen_articulo_id;
                            $slugCategoria=\App\Seccion::select('secciones.slug_seccion')->join('articulos','articulos.seccion_id','=','secciones.id_seccion')->where('articulos.id_articulo','=',$Articulo->articulo_id)->get();
                            $slugSubcategoria=\App\Subseccion::select('subsecciones.slug_subseccion')->join('articulos','articulos.subseccion_id','=','subsecciones.id_subseccion')->where('articulos.id_articulo','=',$Articulo->articulo_id)->get();
                            $slugArticulo=\App\Articulo::select('articulos.slug')->where('articulos.id_articulo','=',$Articulo->articulo_id)->get();
                            $count++;
                             $total+=($Articulo->precio)*($Articulo->unidades_pedido);
                        @endphp

                        <tr>
                            <td>{{$count}}</td>
                            <td>
                                <a href="/categoria/{{$slugCategoria[0]['slug_seccion']}}/{{$slugSubcategoria[0]['slug_subseccion']}}/{{$slugArticulo[0]['slug']}}"><img
                                        class="imagenComentarioI img-fluid"
                                        src="{{ asset('images/imagen_articulo/'.$imagenArticulo.'.jpg') }}"></a>
                            </td>
                            <td>
                                <a href="/categoria/{{$slugCategoria[0]['slug_seccion']}}/{{$slugSubcategoria[0]['slug_subseccion']}}/{{$slugArticulo[0]['slug']}}">
                                    <b>{{$Articulo->titulo}} </b></a>
                            <td>
                                {{$Articulo->created_at}}
                            </td>
                            <td>
                                <input name="{{$Articulo->articulo_id}}" class="inputN" type="number"
                                       value="{{$Articulo->unidades_pedido}}" min="0" max="50" step="1">
                            </td>
                            <td>
                                {{$Articulo->precio}}
                            </td>
                            <td>
                                <a href="javascript://ajax" onclick="eliminarArticulo('{{$Articulo->id_articulo}}');"><i
                                        class="fas fa-times carritoDelete"></i></a>
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
            <h1 class="offset-8">@php if(isset($total)){echo'<b>Total:  </b>'.$total.'€';} @endphp </h1>
            <div id="controladorCarrito">
                <div id="vaciarCarrito"><p><a href="javascript://ajax"
                                              onclick="vaciarCarrito('{{$idPedido[0]->id_pedido}}');">Borrar Carrito</a>
                    </p></div>
                <div id="procesarCompra"><p><a href="/carrito/finalizar-compra/">Procesar compra</a></p></div>
            </div>
            @endif
    </div>
</section>

