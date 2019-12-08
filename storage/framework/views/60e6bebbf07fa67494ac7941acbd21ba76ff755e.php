<?php $__env->startSection("css"); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/principal.css')); ?>"/>
    <link  rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"  />
<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script type="text/javascript"  src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.bundle.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/map.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/compras.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/tablas.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/envio.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection("cabecera"); ?>
    <?php echo $__env->make('partials.principal.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("menu"); ?>
    <?php echo $__env->make('partials.principal.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("central"); ?>
    <?php echo $__env->make('partials.paneldecontrol.envios', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("pie"); ?>
    <?php echo $__env->make('partials.principal.pie', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/PFC/resources/views/envios.blade.php ENDPATH**/ ?>