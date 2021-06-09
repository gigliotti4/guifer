<section class="my-3">
    <div class="container-fluid">
        <?php echo $__env->make( 'layouts.general.form', [ 'buttonADD' => 1 , 'form' => 0 , 'close' => 1 , 'modal' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make( 'layouts.general.table' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script>
    window.pyrus = new Pyrus( "redes" );
    /** ------------------------------------- */
    init( function() {});
</script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\guifer\resources\views/auth/parts/empresaRedes.blade.php ENDPATH**/ ?>