<!DOCTYPE html>
<html>
<body>
    <?php $__currentLoopData = $elementos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(isset( $$k )): ?>
    <p><strong><?php echo e($v); ?>:</strong> <?php echo e($$k); ?></p>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH C:\Users\Pablo\Desktop\Laravel\hidratools\resources\views/form/contacto.blade.php ENDPATH**/ ?>