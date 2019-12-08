<section>
    <h1 id="cabeceraInfo">Tienes (<?php echo e(sizeof($wishlistsUsuario)); ?>) artículos que deseas de nuestra web</h1>
    <div id="wishlistProducto">
        <br>
        <?php if(sizeof($wishlistsUsuario)!=0): ?>
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
                <?php $count=0; ?>
                <?php $__currentLoopData = $wishlistsUsuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlistUsuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $imagenArticulo=\App\Articulo::where('id_articulo',$wishlistUsuario->articulo_id)->get('imagen_articulo_id');
                        $slugCategoria=\App\Seccion::select('secciones.slug_seccion')->join('articulos','articulos.seccion_id','=','secciones.id_seccion')->where('articulos.id_articulo','=',$wishlistUsuario->articulo_id)->get();
                        $slugSubcategoria=\App\Subseccion::select('subsecciones.slug_subseccion')->join('articulos','articulos.subseccion_id','=','subsecciones.id_subseccion')->where('articulos.id_articulo','=',$wishlistUsuario->articulo_id)->get();
                        $slugArticulo=\App\Articulo::select('articulos.slug')->where('articulos.id_articulo','=',$wishlistUsuario->articulo_id)->get();
                        $Articulo=\App\Articulo::where('articulos.id_articulo','=',$wishlistUsuario->articulo_id)->get();
                        $count++;
                    ?>
                    <tr>
                        <td><?php echo e($count); ?></td>
                        <td>
                            <a href="/categoria/<?php echo e($slugCategoria[0]['slug_seccion']); ?>/<?php echo e($slugSubcategoria[0]['slug_subseccion']); ?>/<?php echo e($slugArticulo[0]['slug']); ?>"><img
                                    class="imagenComentarioI img-fluid"
                                    src="<?php echo e(asset('images/imagen_articulo/'.$imagenArticulo[0]->imagen_articulo_id.'.jpg')); ?>"></a>
                        </td>
                        <td><a href="/categoria/<?php echo e($slugCategoria[0]['slug_seccion']); ?>/<?php echo e($slugSubcategoria[0]['slug_subseccion']); ?>/<?php echo e($slugArticulo[0]['slug']); ?>"> <b><?php echo e($Articulo[0]->titulo); ?> </b></a></td>
                        <td>
                            <p><?php echo e($wishlistUsuario->created_at); ?></p>
                        </td>
                        <td>
                            <a href="javascript://ajax"  onclick="updateWishlist('<?php echo e($Articulo[0]->id_articulo); ?>');"><i class="fas fa-heart"></i></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <h5 id="sinComentarios"
                        class="alert alert-info"><i class="fa fa-history"></i> No tienes artículos aún. Navega por la
                        web y descubre nuestras ofertas!</h5>
                <?php endif; ?>
                </thead>
            </table>
            </div>
    </div>
</section>
<?php /**PATH /var/www/html/PFC/resources/views/partials/paneldecontrol/wishlist.blade.php ENDPATH**/ ?>