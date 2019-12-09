<section>
    <?php if(isset($pedidoRealizado)): ?>
       <h1 class="alert alert-sucess col-12" id="cabeceraInfo">Has creado el pedido <?php echo e($pedidoRealizado); ?> con éxito</h1>
        <?php endif; ?>
    <h1 id="cabeceraInfo">Has realizado (<?php echo e(sizeof($Pedidos)); ?>) pedidos en nuestra web</h1>

    <div id="pedidoProducto">
        <br>
        <?php if(sizeof($Pedidos)!=0): ?>
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
                <?php $count=0; ?>
                <?php $__currentLoopData = $Pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php

                            $PedidosArticuloU=\App\Pedido_articulo::where('pedido_id',$Pedido->id_pedido)->sum('unidades_pedido');
                            $PedidosArticulo=\App\Pedido_articulo::where('usuario_id',$idUsuario)->where('pedido_id',$Pedido->id_pedido)->get('id_pedido_articulo')->toArray();
                            $estadoPedido=\App\Estado_pedido::where('id_estado_pedido',$Pedido->estado_pedido_id)->get('descripcion');
                            $preciosUnitarios=\App\Articulo::select('pedidos_articulo.unidades_pedido','articulos.precio')->join('pedidos_articulo','pedidos_articulo.articulo_id','=','articulos.id_articulo')->whereIn('pedidos_articulo.id_pedido_articulo',$PedidosArticulo)->get();
                            $count++;
                             $total=0;

                             foreach ($preciosUnitarios as $precioUnitario){
                                 $total+=($precioUnitario->precio)*($precioUnitario->unidades_pedido);
                             }

                    ?>

                    <tr>
                        <td><?php echo e($count); ?></td>
                        <td>
                            <a href="/panel-de-control/<?php echo e(Auth::user()->id_usuario); ?>/pedido/<?php echo e($Pedido->id_pedido); ?>"><?php echo e($Pedido->id_pedido); ?></a>
                        </td>
                        <td><?php echo e($estadoPedido[0]->descripcion); ?></td>
                        <td>
                            <p><?php echo e($Pedido->updated_at); ?></p>
                        </td>
                        <td>
                            <?php echo e($PedidosArticuloU); ?>

                        </td>
                        <td>
                            <?php echo e($total); ?> €
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <h5 id="Pedidos"
                            class="alert alert-info"><i class="fa fa-history"></i> No tienes pedidos aún. Navega por la
                            web y descubre nuestras ofertas!</h5>
                    <?php endif; ?>
                    </thead>
                </table>
            </div>
    </div>
</section>

<?php /**PATH /var/www/html/PFC/resources/views/partials/paneldecontrol/pedidos.blade.php ENDPATH**/ ?>