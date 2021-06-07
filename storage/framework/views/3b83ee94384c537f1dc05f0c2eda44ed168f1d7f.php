<section class="my-3">
    <div class="container-fluid">
        <?php echo $__env->make( 'layouts.general.form' , [ 'buttonADD' => 1 , 'form' => 0 , 'close' => 1 , 'modal' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make( 'layouts.general.table' , [ 'paginate' => $data[ "elementos" ] ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>
<?php $__env->startPush('scripts'); ?>
<script>
    window.pyrus = new Pyrus( "subcategoria" , null , src );

    addfinish = ( data = null ) => {
        $( `#${window.pyrus.name}_categoria_id` ).val( window.data.categoria_id )
    };

    init( () => {} );
</script>
<?php $__env->stopPush(); ?><?php /**PATH C:\Users\Pablo\Desktop\Laravel\hidratools\resources\views/auth/parts/subcategoria.blade.php ENDPATH**/ ?>