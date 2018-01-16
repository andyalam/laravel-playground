<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <link rel="stylesheet" href="<?php echo e(URL::to('css/main.css')); ?>">
        <?php echo $__env->yieldContent('styles'); ?>
    </head>
    <body>
        <?php echo $__env->make('includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="main">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </body>
</html>