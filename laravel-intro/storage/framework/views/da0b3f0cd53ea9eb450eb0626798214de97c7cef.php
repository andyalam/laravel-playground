<?php $__env->startSection('title'); ?>
    Trending Quotes
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="quotes">
        <h1>Latest Quotes</h1>
        <article class="quote">
            <div class="delete"><a href="#">X</a></div>
            Quote text
            <div class="info">Created by <a href="">Andy</a> on ...</div>
        </article>
        Pagination
    </section>
    <section class="edit-quote">
        <h1>Add a Quote</h1>
        <form>
            <div class="input-group">
                <label for="author">Your Name</label>
                <input type="text" name="author" id="author" placeholder="Your Name">
            </div>
            <div class="input-group">
                <label for="quote">Your Quote</label>
                <textarea name="quote" id="quote" rows="5" placeholder="Quote"></textarea>
            </div>
            <button class="btn" type="submit">Submit Quote</button>
            <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
        </form>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>