<?php $__env->startSection('content'); ?>
    <div class="centered">
        <a href="<?php echo e(route('niceaction', ['action' => 'hug'])); ?>">Greet</a>
        <a href="<?php echo e(route('niceaction', ['action' => 'hug'])); ?>">Shake</a>
        <a href="<?php echo e(route('niceaction', ['action' => 'hug'])); ?>">Hug</a>
        <br><br>
        <form action="<?php echo e(route('benice')); ?>" method="post">
            <label for="select-action">I want to...</label>
            <select name="action" id="select-action">
                <option value="greet">Greet</option>
                <option value="hug">Hug</option>
                <option value="shake">Shake</option>
            </select>
            <input type="text" name="name">
            <button type="submit">Do a nice action</button>
            <input type="hidden" value="<?php echo e(Session::token()); ?>" name="_token">
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>