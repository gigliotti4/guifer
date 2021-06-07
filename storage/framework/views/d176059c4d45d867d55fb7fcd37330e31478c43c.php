<section class="my-3">
    <div class="container-fluid">
        <div class="mb-4">
            <?php echo $__env->make( 'page.parts.empresa' , [ 'elemento' => $data[ 'elementos' ]->data , 'sliders' => $data[ 'sliders' ] ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php echo $__env->make( 'layouts.general.form', [ 'buttonADD' => 0 , 'form' => 1 , 'close' => 0 , 'url' => url('/adm/contenido/' . $data['section'] . '/update') , 'modal' => 0 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>
<?php $__env->startPush('scripts'); ?>
<script>
    window.pyrus = new Pyrus("contenido_empresa", null, src);
    

    /** ------------------------------------- */
    init = ( callbackOK ) => {
        /** */
        let form = "";
        
        form += window.pyrus.formulario();

        $("#form .container-form").html( form );
        
        window.pyrus.editor( CKEDITOR );
        callbackOK.call( this );
    };
    /** */
    init( () => {
        if( Object.keys( window.data.elementos.data ).length != 0 )
            window.pyrus.show( CKEDITOR , url_simple , window.data.elementos.data );
    });
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/osolelar/hidratools_laravel/resources/views/auth/parts/contenidoEmpresa.blade.php ENDPATH**/ ?>