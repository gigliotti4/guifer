<section class="my-3">
    <div class="container-fluid">
        <?php echo $__env->make( 'layouts.general.form', [ 'buttonADD' => 1 , 'form' => 0 , 'close' => 1 , 'modal' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make( 'layouts.general.table', [
            "paginate" => $data["elementos"],
            "form" => [
                "url" => Route("newsletter.index"),
                "placeholder" => "Buscar por Email",
                "search" => isset($data["search"]) ? $data["search"] : null
            ]
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>
<?php $__env->startPush('scripts'); ?>
<script>
    window.pyrus = new Pyrus("newsletter");
    /** -------------------------------------
     *      INICIO
     ** ------------------------------------- */

    init = function( callbackOK ) {
        $( "#form .modal-body" ).html( window.pyrus.formulario() );
        $( "#form .container-form" ).html(window.pyrus.formulario());
        $( "#wrapper-tabla > div.card-body" ).html(window.pyrus.table([{NAME:"ACCIONES", COLUMN: "acciones", CLASS: "text-center", WIDTH:"150px"}]));
        window.pyrus.elements( $( "#tabla" ) , url_simple , window.data.elementos , [ "d" ]);
        window.pyrus.editor( CKEDITOR );

        setTimeout(() => {
            callbackOK.call(this);
        }, 50);
    }
    init( () => {} );
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/auth/parts/newsletter.blade.php ENDPATH**/ ?>