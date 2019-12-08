<!doctype html>
<html>
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body>
    <header><?php echo $__env->yieldContent('cabecera'); ?></header>
    <main>
        <?php echo $__env->yieldContent('menu'); ?>
        <?php echo $__env->yieldContent('central'); ?>
    </main>
    <footer>
        <?php echo $__env->yieldContent('pie'); ?>
    </footer>
    <?php echo $__env->yieldContent('js'); ?>
</body>
</html>
<?php /**PATH /var/www/html/PFC/resources/views////layouts/template.blade.php ENDPATH**/ ?>