<section>
<h1 id="cabeceraInfo">Comentarios hechos en la web</h1>
<div id="comentariosProducto">
    <div id="datosComentario">
    <h3>Comentarios (<?php echo e(sizeof($comentariosUsuario)); ?>):</h3>
    <?php if(sizeof($comentariosUsuario)!=0): ?>
        <?php $__currentLoopData = $comentariosUsuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentarioUsuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h6><i class="far fa-comments comentariosPA"></i> <b><?php echo e($comentarioUsuario->titulo); ?> </b> - <i
                    class="fa fa-history historyPA"></i> <?php echo e($comentarioUsuario->created_at); ?>

            </h6>
            <?php
                $imagenArticulo=\App\Articulo::where('id_articulo',$comentarioUsuario->articulo_id)->get('imagen_articulo_id');
                $slugCategoria=\App\Seccion::select('secciones.slug_seccion')->join('articulos','articulos.seccion_id','=','secciones.id_seccion')->where('articulos.id_articulo','=',$comentarioUsuario->articulo_id)->get();
                $slugSubcategoria=\App\Subseccion::select('subsecciones.slug_subseccion')->join('articulos','articulos.subseccion_id','=','subsecciones.id_subseccion')->where('articulos.id_articulo','=',$comentarioUsuario->articulo_id)->get();
                $slugArticulo=\App\Articulo::select('articulos.slug')->where('articulos.id_articulo','=',$comentarioUsuario->articulo_id)->get();
            ?>
            <div class="imagenC">
                <div class="imagenComentarioD">
                    <a href="/categoria/<?php echo e($slugCategoria[0]['slug_seccion']); ?>/<?php echo e($slugSubcategoria[0]['slug_subseccion']); ?>/<?php echo e($slugArticulo[0]['slug']); ?>"><img
                            class="imagenComentarioI img-fluid"
                            src="<?php echo e(asset('images/imagen_articulo/'.$imagenArticulo[0]->imagen_articulo_id.'.jpg')); ?>"></a>
                </div>
                <div class="textoComentarioD">
                    <p><?php echo e($comentarioUsuario->contenido); ?></p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <h5 id="sinComentarios"
            class="alert alert-info"><i class="fa fa-history"></i> No hay comentarios aún, sé el primero!</h5>
    <?php endif; ?>
    </div>
</div>
</section>
<?php /**PATH /var/www/html/PFC/resources/views/partials/paneldecontrol/comentario.blade.php ENDPATH**/ ?>