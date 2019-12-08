<section>
    <h1 id="cabeceraInfo">Información del pedido [ <?php echo e($idPedido); ?> ]</h1>

    <div id="pedidoProducto">
        <br>
        <?php if(sizeof($Articulos)!=0): ?>
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
                <?php $count=0; ?>
                <?php $__currentLoopData = $Articulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Articulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $imagenArticulo=$Articulo->imagen_articulo_id;
                        $slugCategoria=\App\Seccion::select('secciones.slug_seccion')->join('articulos','articulos.seccion_id','=','secciones.id_seccion')->where('articulos.id_articulo','=',$Articulo->articulo_id)->get();
                        $slugSubcategoria=\App\Subseccion::select('subsecciones.slug_subseccion')->join('articulos','articulos.subseccion_id','=','subsecciones.id_subseccion')->where('articulos.id_articulo','=',$Articulo->articulo_id)->get();
                        $slugArticulo=\App\Articulo::select('articulos.slug')->where('articulos.id_articulo','=',$Articulo->articulo_id)->get();
                        $count++;
                         $total=0;
                    ?>

                    <tr>
                        <td><?php echo e($count); ?></td>
                        <td>
                            <a href="/categoria/<?php echo e($slugCategoria[0]['slug_seccion']); ?>/<?php echo e($slugSubcategoria[0]['slug_subseccion']); ?>/<?php echo e($slugArticulo[0]['slug']); ?>"><img
                                    class="imagenComentarioI img-fluid"
                                    src="<?php echo e(asset('images/imagen_articulo/'.$imagenArticulo.'.jpg')); ?>"></a>
                        </td>
                        <td><a href="/categoria/<?php echo e($slugCategoria[0]['slug_seccion']); ?>/<?php echo e($slugSubcategoria[0]['slug_subseccion']); ?>/<?php echo e($slugArticulo[0]['slug']); ?>"> <b><?php echo e($Articulo->titulo); ?> </b></a>
                        <td>
                            <?php echo e($Articulo->created_at); ?>

                        </td>
                        <td>
                            <?php echo e($Articulo->unidades_pedido); ?>

                        </td>
                        <td>
                            <?php echo e($Articulo->precio); ?>

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

<?php /**PATH /var/www/html/PFC/resources/views/partials/paneldecontrol/pedido.blade.php ENDPATH**/ ?>