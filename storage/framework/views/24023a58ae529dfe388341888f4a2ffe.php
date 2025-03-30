<h2>Your Favorite Movies</h2>

<?php $__currentLoopData = $favorites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div>
        <h3><?php echo e($movie->title); ?></h3>
        <img src="<?php echo e($movie->poster); ?>" alt="<?php echo e($movie->title); ?>">
        <p><?php echo e($movie->year); ?></p>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\HP\Downloads\Babeesna\myapp\resources\views/dashboard.blade.php ENDPATH**/ ?>