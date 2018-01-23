<?php $__env->startSection('content'); ?>
    <div class="centered">
        <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('niceaction', ['action' => lcfirst($action->name)])); ?>"><?php echo e($action->name); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <br><br>
        <?php if(count($errors) > 0): ?>
            <div>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
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