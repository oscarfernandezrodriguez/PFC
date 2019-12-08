<nav id="navegacion">
    <?php if(auth()->guard()->check()): ?>
        <div id="menuUsuario">
            <div id="cabeceraUsuario">
                <h4>MENU DE USUARIO</h4>
            </div>
            <div id="menuSecciones">
                <ul>
                    <?php if(Auth::user()->tipo_usuario_id==1): ?>
                        <li><i class="fas fa-users usersPA"></i><a href="/panel-de-control/usuarios/">Usuarios</a></li>
                        <?php endif; ?>
                        <?php if(Auth::user()->tipo_usuario_id<=3): ?>
                            <li><i class="fas fa-truck truckPA"></i><a href="/panel-de-control/envios/">Envios</a></li>
                        <?php endif; ?>
                        <?php if(Auth::user()->tipo_usuario_id<=2 || Auth::user()->tipo_usuario_id<=4): ?>
                            <li><i class="fas fa-money-bill-wave billPA"></i><a href="/panel-de-control/cobros/">Cobros</a></li>
                        <?php endif; ?>
                    <li><i class="fas fa-info infoPA"></i><a href="/panel-de-control/<?php echo e(Auth::user()->id_usuario); ?>/informacion/">Información</a></li>
                    <li><i class="fas fa-gifts giftsPA"></i><a href="/panel-de-control/<?php echo e(Auth::user()->id_usuario); ?>/pedidos/">Pedidos</a></li>
                    <li><i class="far fa-comments comentariosPA"></i><a href="/panel-de-control/<?php echo e(Auth::user()->id_usuario); ?>/comentarios/">Comentarios</a></li>
                    <li><i class="fas fa-heart heartPA"></i><a href="/panel-de-control/<?php echo e(Auth::user()->id_usuario); ?>/wishlist/">Wishlist</a></li>
                </ul>
            </div>
        </div>
    <?php endif; ?>
    <?php if(auth()->guard()->guest()): ?>
            <div id="registrate">
                <h3><a href="/registro"><i class="fas fa-sign-in-alt"></i> Registrate!</a></h3>
            </div>

    <?php endif; ?>
<div id="menuProductos">
    <div id="cabeceraMenu">
        <h4>BUSCAR POR CATEGORIAS</h4>
    </div>
    <div id="menuSecciones">
        <ul>
            <?php $__currentLoopData = $Secciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><i class="fa fa-arrow-right"></i><a href="/categoria/<?php echo e($seccion->slug_seccion); ?>/"><?php echo e($seccion->descripcion_seccion); ?></a>
                    <?php
                        $Subseccion=App\Subseccion::where('seccion_id', $seccion->id_seccion)->get();
                    ?>
                    <?php if(sizeof($Subseccion)>0): ?>
                        <ul>
                            <?php $__currentLoopData = $Subseccion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subseccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><i class="fa fa-angle-right"></i><a href="/categoria/<?php echo e($seccion->slug_seccion); ?>/<?php echo e($subseccion->slug_subseccion); ?>/"><?php echo e($subseccion->descripcion_subseccion); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
</nav>
<?php /**PATH /var/www/html/PFC/resources/views/partials/principal/menu.blade.php ENDPATH**/ ?>