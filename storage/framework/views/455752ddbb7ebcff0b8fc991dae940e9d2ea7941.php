<div id="superiorCabecera" class="row">
    <div id="enviosGratis" class="col-12 col-sm-12 text-sm-center col-lg-6 text-lg-left col-xl-8">
        <p>Envío gratuito a pedidos superiores a 75€ (a toda la península)</p>
    </div>
    <div id="loginSuperior" class="col-12 col-lg-auto col-xl-2 ">

        <?php if(auth()->guard()->guest()): ?>
            <p><a href="/autenticarse"><i class="fa fa-user"></i>Mi cuenta</a></p>
        <?php else: ?>
            <p><a href="/panel-de-control"><i
                        class="fa fa-user"></i> <?php echo e(Auth::user()->nombre); ?> <?php echo e(Auth::user()->apellido1); ?></a> <a
                    href="<?php echo e(route('logout')); ?>"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i id="logoutI"
                                                                                                         class="fas fa-times-circle "></i></a>
            </p>
        <?php endif; ?>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>
    </div>
    <div id="carrito" class="col-12  col-lg-3 col-xl-2">
        <p><i class="fas fa-shopping-cart"></i> (0) Productos</p>
    </div>
</div>
<div id="medioCabecera">
    <div id="logo" class="col-12 col-sm-6 col-lg-6 col-xl-4">
        <a href="/"><img src="<?php echo e(asset('images/logo.png')); ?>"></a>
    </div>
    <div id="buscador" class="col-12 col-sm-6 col-lg-6 col-xl-3 ">
        <div class="input-group md-form form-sm form-1 col-11">
            <div class="input-group-prepend">
    <span class="input-group-text lighten-3" ><i class="fas fa-search text-white"
                                                                     aria-hidden="true"></i></span>
            </div>
            <input id="buscadorI" class="form-control my-0 py-1 col-11" type="text" placeholder="Busca entre los artículos"
                   aria-label="Buscador">
        </div>
    </div>
    <div id="escribenos" class="col-12 col-sm-6 col-lg-6 col-xl-2">
        <div id="escribenosIcono" class="col-12   col-xl-2">
            <i class="far fa-envelope "></i>
        </div>
        <div id="escribenosTexto" class="col-12  col-xl-10">
            <h4>Escríbenos</h4>
            <p>ventas@ferrofarmacia.com</p>
        </div>
    </div>
    <div id="llamanos" class="col-12 col-sm-6 col-lg-6 col-xl-3">
        <div id="llamanosIcono" class="col-12  offset-lg-2 col-xl-2">
            <i class="fab fa-whatsapp"></i>
        </div>
        <div id="llamanosTexto" class="col-12   col-xl-10">
            <h4>Llamadas o Whatsapp</h4>
            <p>981 66 66 66 - 666 66 66 66</p>
        </div>
    </div>
</div>
<div id="inferiorCabecera">
    <ul>
        <?php $__currentLoopData = $Secciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $slugSeccion=$seccion->slug_seccion;
            ?>
            <li><a href="/categoria/<?php echo e($slugSeccion); ?>/"><?php echo e($seccion->descripcion_seccion); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

</div>
<?php /**PATH /var/www/html/PFC/resources/views////partials/principal/header.blade.php ENDPATH**/ ?>