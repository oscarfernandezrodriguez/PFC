<section>
    @if(isset($pedidoRealizado))
       <h1 class="alert alert-sucess col-12" id="cabeceraInfo">Has creado el pedido {{$pedidoRealizado}} con éxito</h1>
        @endif
    <h1 id="cabeceraInfo">Has realizado ({{sizeof($Pedidos)}}) pedidos en nuestra web</h1>

    <div id="pedidoProducto">
        <br>
        @if(sizeof($Pedidos)!=0)
            <div id="datosPedido">
                <table id="tablaPedido" class="table tablaOrden">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Número de pedido</th>
                        <th scope="col">Estado del pedido</th>
                        <th scope="col">Fecha de creación</th>
                        <th scope="col">Unidades totales</th>
                        <th scope="col">Importe total</th>
                    </tr>
                @php $count=0; @endphp
                @foreach($Pedidos as $Pedido)
                    @php

                            $PedidosArticuloU=\App\Pedido_articulo::where('pedido_id',$Pedido->id_pedido)->sum('unidades_pedido');
                            $PedidosArticulo=\App\Pedido_articulo::where('usuario_id',$idUsuario)->where('pedido_id',$Pedido->id_pedido)->get('id_pedido_articulo')->toArray();
                            $estadoPedido=\App\Estado_pedido::where('id_estado_pedido',$Pedido->estado_pedido_id)->get('descripcion');
                            $preciosUnitarios=\App\Articulo::select('pedidos_articulo.unidades_pedido','articulos.precio')->join('pedidos_articulo','pedidos_articulo.articulo_id','=','articulos.id_articulo')->whereIn('pedidos_articulo.id_pedido_articulo',$PedidosArticulo)->get();
                            $count++;
                             $total=0;

                             foreach ($preciosUnitarios as $precioUnitario){
                                 $total+=($precioUnitario->precio)*($precioUnitario->unidades_pedido);
                             }

                    @endphp

                    <tr>
                        <td>{{$count}}</td>
                        <td>
                            <a href="/panel-de-control/{{Auth::user()->id_usuario}}/pedido/{{$Pedido->id_pedido}}">{{$Pedido->id_pedido}}</a>
                        </td>
                        <td>{{$estadoPedido[0]->descripcion}}</td>
                        <td>
                            <p>{{$Pedido->updated_at}}</p>
                        </td>
                        <td>
                            {{$PedidosArticuloU}}
                        </td>
                        <td>
                            {{$total}} €
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

