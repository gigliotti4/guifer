<section class="my-3">
    <div class="container-fluid">
        <?php echo $__env->make( 'layouts.general.form', [ 'buttonADD' => 0 , 'form' => 1 , 'close' => 0 , 'url' => url('/adm/contenido/' . $data['section'] . '/update') , 'modal' => 0 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>
<?php $__env->startPush('scripts'); ?>
<script>
    window.pyrus = new Pyrus("terminos", null, src);

    /** ------------------------------------- */
    init = ( callbackOK ) => {
        /** */
        $("#form .container-form").html( window.pyrus.formulario() );
        window.pyrus.editor( CKEDITOR );
        
        callbackOK.call( this );
    };
    /** */
    init( () => {
        window.pyrus.show( CKEDITOR , null , window.data.elementos.data );
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\Pablo\Desktop\Laravel\hidratools\resources\views/auth/parts/contenidoTerminos.blade.php ENDPATH**/ ?>