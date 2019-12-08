<section>
    <div id="productoTitulo">
        <h1 id="cabeceraInfo"><?php echo e($Articulo[0]->titulo); ?></h1>
    </div>
    <div id="infoProducto" class="col-12">
        <div id="productoImagen" class="col-12 col-lg-8 productoI">
            <img id="imagenProducto"
                 src="<?php echo e(asset('images/imagen_articulo/'.$Articulo[0]->imagen_articulo_id.'.jpg')); ?>">
        </div>
        <div id="datosProducto" class="col-12 col-lg-4 productoIn">
            <h4>Datos del producto</h4>
            <h5><i class="fas fa-box" id="cajaEnvio"></i> Unidades en stock: <b><?php echo e($Articulo[0]->unidades); ?></b></h5>
            <h5><i class="far fa-calendar-alt" id="calendario"></i> Fecha de venta:
                <b><?php echo e(date('d-m-Y',strtotime($Articulo[0]->created_at))); ?></b></h5>
            <h5><i class="fas fa-money-bill-wave" id="dolarProducto"></i> Precio: <b><?php echo e($Articulo[0]->precio); ?> €</b></h5>
            <h4>Datos de la categoria</h4>
            <?php
                $Seccion=\App\Seccion::where('id_seccion',$Articulo[0]->seccion_id)->get();
                $Subseccion=\App\Subseccion::where('id_subseccion',$Articulo[0]->subseccion_id)->get();
            ?>
            <h5><i class="fas fa-tag" id="tag"></i> Seccion: <b><?php echo e($Seccion[0]->descripcion_seccion); ?></b></h5>
            <h5><i class="fas fa-tags" id="tags"></i> Subseccion: <b><?php echo e($Subseccion[0]->descripcion_subseccion); ?></b></h5>
            <div id="controladorCompra">
                <div id="loQuiero">
                    <a href="javascript://ajax" onclick="updateWishlist('<?php echo e($Articulo[0]->id_articulo); ?>');"><h4><i
                                class="fas fa-heart"></i>Lo quiero!</h4></a>
                </div>
                <div id="loCompro">
                    <a href="javascript://ajax"  onclick="updateOrder('<?php echo e($Articulo[0]->id_articulo); ?>');"><h4><i class="fas fa-shopping-basket"></i>Añadir al carrito</h4></a>
                </div>
            </div>
        </div>
    </div>

    <div id="descripcionProducto">
        <h3>Descripcion:</h3>
        <p><?php echo e($Articulo[0]->contenido); ?></p>
    </div>
    <div id="otrosProductos">
        <hr>
        <h3>Otros productos:</h3>
        <?php
            $Articulos=\App\Articulo::inRandomOrder()->where('subseccion_id',$Articulo[0]->subseccion_id)->get();
           $maxArticulos=\App\Articulo::inRandomOrder()->where('subseccion_id',$Articulo[0]->subseccion_id)->count();
           if($maxArticulos<3){
               $maximo=$maxArticulos;
           }else{
               $maximo=3;
           }
        ?>
        <?php for($numeroArticulo = 0; $numeroArticulo <= $maximo; $numeroArticulo++): ?>
            <?php
                $slugCategoria=\App\Seccion::select('secciones.slug_seccion')->join('articulos','articulos.seccion_id','=','secciones.id_seccion')->where('articulos.id_articulo','=',$Articulos[$numeroArticulo]->id_articulo)->get();
                $slugSubcategoria=\App\Subseccion::select('subsecciones.slug_subseccion')->join('articulos','articulos.subseccion_id','=','subsecciones.id_subseccion')->where('articulos.id_articulo','=',$Articulos[$numeroArticulo]->id_articulo)->get();
                $slugArticulo=\App\Articulo::select('articulos.slug')->where('articulos.id_articulo','=',$Articulos[$numeroArticulo]->id_articulo)->get();
            ?>
            <div class="col-12 col-sm-6 col-lg-6 col-xl-3  rejilla">
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
    </div>
    <?php endfor; ?>
    <div id="comentariosProducto">
        <hr>
        <h3>Comentarios:</h3>
        <?php
            $comentariosProducto=\App\Comentario::join('usuarios','usuarios.id_usuario','=','comentarios.usuario_id')->where('articulo_id',$Articulo[0]->id_articulo)->get();
            $comproArticulo=null;
            if(Auth::check()){
                $idUsuario=Auth::user()->id_usuario;
                $comproArticulo=\App\Pedido_articulo::where('usuario_id',$idUsuario)->where('articulo_id',$Articulo[0]->id_articulo)->count();
                $comentarioUsuario=\App\Comentario::where('usuario_id',$idUsuario)->where('articulo_id',$Articulo[0]->id_articulo)->count();
            }
            $idArticulo=$Articulo[0]->id_articulo;
        ?>
        <?php if($comproArticulo>0  and $comentarioUsuario==0): ?>
            <form action="<?php echo e(route('guardarComentario',$idArticulo)); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <div class="offset-1 form-group align-self-center">
                    <label for="inputText" class="col-lg-4 control-label mt-2"><h5>Titulo del comentario</h5></label>
                    <div class="col-lg-10 mb-4">
                        <input type="text" class="form-control" id="tituloComentario" name="tituloComentario"
                               minlength="30" required>
                    </div>
                    <label for="inputText" class="col-lg-2 control-label"><h5>Contenido</h5></label>
                    <div class="col-lg-10" mb-3>
                        <textarea class="form-control" rows="3" name="contenidoComentario" id="contenidoComentario"
                                  minlength="60" required></textarea>
                    </div>
                    <div class="col-lg-10 mt-4 mb-4 text-right">
                        <button type="submit" class="btn btn-primary">Enviar comentario</button>
                    </div>
                </div>
            </form>
        <?php endif; ?>
        <?php if(sizeof($comentariosProducto)!=0): ?>
            <?php $__currentLoopData = $comentariosProducto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h6><i class="far fa-comments"></i> <?php echo e($comentario->titulo); ?> - <i
                        class="fa fa-user"></i> <?php echo e($comentario->nombre); ?> <?php echo e($comentario->apellido1); ?> <?php echo e($comentario->apellido2); ?>

                </h6>
                <p><?php echo e($comentario->contenido); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <h5 id="sinComentarios"
                class="alert alert-info"><i class="fa fa-history"></i> No hay comentarios aún, sé el primero!</h5>
        <?php endif; ?>
    </div>
</section>
<?php /**PATH /var/www/html/PFC/resources/views/partials/productos/producto.blade.php ENDPATH**/ ?>