<section>
<?php if(!isset($slugSeccion)): ?>
    <h1 id="cabeceraInfo">Página <?php echo e($pagina); ?></h1>
<?php elseif(isset($slugSubseccion)): ?>
    <h1 id="cabeceraInfo">Página <?php echo e($pagina); ?> de <?php echo e($subseccionDescripcion[0]->descripcion_subseccion); ?></h1>
<?php else: ?>
    <h1 id="cabeceraInfo">Página <?php echo e($pagina); ?> de <?php echo e($seccionDescripcion[0]->descripcion_seccion); ?></h1>
<?php endif; ?>
<?php for($numeroArticulo = $minimo; $numeroArticulo <= $maximo; $numeroArticulo++): ?>
    <?php
        $slugCategoria=\App\Seccion::select('secciones.slug_seccion')->join('articulos','articulos.seccion_id','=','secciones.id_seccion')->where('articulos.id_articulo','=',$Articulos[$numeroArticulo]->id_articulo)->get();
        $slugSubcategoria=\App\Subseccion::select('subsecciones.slug_subseccion')->join('articulos','articulos.subseccion_id','=','subsecciones.id_subseccion')->where('articulos.id_articulo','=',$Articulos[$numeroArticulo]->id_articulo)->get();
        $slugArticulo=\App\Articulo::select('articulos.slug')->where('articulos.id_articulo','=',$Articulos[$numeroArticulo]->id_articulo)->get();
    ?>
    <div class="col-12 col-sm-6 col-lg-6 col-xl-4 rejilla">
        <div class="producto">
            <a href="/categoria/<?php echo e($slugCategoria[0]['slug_seccion']); ?>/<?php echo e($slugSubcategoria[0]['slug_subseccion']); ?>/<?php echo e($slugArticulo[0]['slug']); ?>"><img
                    src="<?php echo e(asset('images/imagen_articulo/'.$Articulos[$numeroArticulo]->imagen_articulo_id.'.jpg')); ?>"
                    class="img-fluid"></a>
            <div class="tituloProducto">
                <h6>
                    <a href="/categoria/<?php echo e($slugCategoria[0]['slug_seccion']); ?>/<?php echo e($slugSubcategoria[0]['slug_subseccion']); ?>/<?php echo e($slugArticulo[0]['slug']); ?>"><?php echo e($Articulos[$numeroArticulo]->titulo); ?></a>
                </h6>
            </div>
            <div class="precioProducto">
                <p>Precio: <span><?php echo e($Articulos[$numeroArticulo]->precio); ?></span> €</p>
            </div>
            <div class="controladorCompra">
                <div class="botonWhish">
                    <a href="javascript://ajax"  onclick="updateWishlist('<?php echo e($Articulos[$numeroArticulo]->id_articulo); ?>');"><i class="fas fa-heart"></i></a>
                </div>
                <div class="botonComprar">
                    <i class="fas fa-shopping-basket"></i>
                    <a href="javascript://ajax"  onclick="updateOrder('<?php echo e($Articulos[$numeroArticulo]->id_articulo); ?>');"><p>Añadir al carrito</p></a>
                </div>
            </div>
        </div>
    </div>
<?php endfor; ?>
<?php if(($minimo!=0 || $maximo!=$maxArticulos-1) && isset($slugSeccion)): ?>
    <div id="controladorPagina">
        <div id="paginaAnterior">
            <?php if($minimo!=0): ?>
                <?php if(isset($slugSubseccion)): ?>
                    <a href="/categoria/<?php echo e($slugSeccion); ?>/<?php echo e($slugSubseccion); ?>/pagina/<?php echo e($numeroPagina-1); ?>"><i
                            class="fas fa-arrow-left"></i></a>
                <?php elseif(isset($slugSeccion)): ?>
                    <a href="/categoria/<?php echo e($slugSeccion); ?>/pagina/<?php echo e($numeroPagina-1); ?>"><i
                            class="fas fa-arrow-left"></i></a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div id="paginaActual">
            <?php if(!isset($slugSeccion)): ?>
                <h4>Página <?php echo e($pagina); ?></h4>
            <?php elseif(isset($slugSubseccion)): ?>
                <h4>Página <?php echo e($pagina); ?></h4>
            <?php else: ?>
                <h4>Página <?php echo e($pagina); ?></h4>
            <?php endif; ?>
        </div>
        <div id="paginaSiguiente">
            <?php if($maximo!=$maxArticulos-1): ?>
                <?php if(isset($slugSubseccion)): ?>
                    <?php if($numeroPagina<1): ?>
                        <a href="/categoria/<?php echo e($slugSeccion); ?>/<?php echo e($slugSubseccion); ?>/pagina/<?php echo e($numeroPagina+2); ?>"><i
                                class="fas fa-arrow-right"></i></a>
                    <?php else: ?>
                        <a href="/categoria/<?php echo e($slugSeccion); ?>/<?php echo e($slugSubseccion); ?>/pagina/<?php echo e($numeroPagina+1); ?>"><i
                                class="fas fa-arrow-right"></i></a>
                    <?php endif; ?>
                <?php elseif(isset($slugSeccion)): ?>
                    <?php if($numeroPagina<1): ?>
                        <a href="/categoria/<?php echo e($slugSeccion); ?>/pagina/<?php echo e($numeroPagina+2); ?>"><i
                                class="fas fa-arrow-right"></i></a>
                    <?php else: ?>
                        <a href="/categoria/<?php echo e($slugSeccion); ?>/pagina/<?php echo e($numeroPagina+1); ?>"><i
                                class="fas fa-arrow-right"></i></a>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
</section>
<?php /**PATH /var/www/html/PFC/resources/views/partials/principal/central.blade.php ENDPATH**/ ?>