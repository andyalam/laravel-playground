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
        <form action="<?php echo e(route('add_action')); ?>" method="post">
            <label for="name">Name of Action:</label>
            <input type="text" name="name" id="name">
            <label for="Niceness">Niceness #:</label>
            <input type="text" name="niceness">
            <button type="submit">Do a nice action</button>
            <input type="hidden" value="<?php echo e(Session::token()); ?>" name="_token">
        </form>
        <br><br>
        <ul>
            <?php $__currentLoopData = $logged_actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logged_action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <?php echo e($logged_action->nice_action->name); ?>

                    <?php $__currentLoopData = $logged_action->nice_action->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($category->name); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php echo $logged_actions->links(); ?>


        <?php if($logged_actions->lastPage() > 1): ?>
            <?php for($i = 1; $i <= $logged_actions->lastPage(); $i++): ?>
                    <a href="<?php echo e($logged_actions->url($i)); ?>"><?php echo e($i); ?></a>
            <?php endfor; ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>