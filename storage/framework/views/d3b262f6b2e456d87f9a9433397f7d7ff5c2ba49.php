<section class="my-3">
    <div class="container-fluid">
        <div class="mb-4">
            <?php echo $__env->make('page.parts.lateral' , ['elementos' => $data['marcas_complete'], 'idioma' => 'es', 'link' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php echo $__env->make( 'layouts.general.form' , [ 'buttonADD' => 1 , 'form' => 0 , 'close' => 1 , 'modal' => 1 , "buttons" => [ [ "i" => "fas fa-clipboard-list" , "t" => "Elementos" , "b" => "btn-dark" ] ] ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make( 'layouts.general.table', [
            "paginate" => $data["elementos"],
            "form" => [
                "url" => isset($data["url_search"]) ? $data["url_search"] : Route("familias.index"),
                "placeholder" => "Buscar en Nombre y Detalles",
                "search" => isset($data["search"]) ? $data["search"] : null
            ]
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>
<?php $__env->startPush('scripts'); ?>
<script>
    window.pyrus = new Pyrus("familia", {marca_id: {DATA: window.data.marcas}}, src);
    familiasFunction = (t, id) => {
        window.location = `${url_simple}/adm/producto/familias/${id}/elementos`;
    };

    init = function( callbackOK ) {
        $( "#form .modal-body" ).html( window.pyrus.formulario() );
        $( "#form .container-form" ).html(window.pyrus.formulario());
        $( "#wrapper-tabla > div.card-body" ).html(window.pyrus.table([{NAME:"ACCIONES", COLUMN: "acciones", CLASS: "text-center", WIDTH:"150px"}]));
        window.pyrus.elements( $( "#tabla" ) , url_simple , window.data.elementos , [ "e" , "d" ] , [ { icon : '<i class="fas fa-clipboard-list"></i>' , class: 'btn-dark', title: 'Elementos' , function : 'familias' } ] );
        window.pyrus.editor( CKEDITOR );

        setTimeout(() => {
            callbackOK.call(this);
        }, 50);
    }
    init( () => {} );
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/auth/parts/familia.blade.php ENDPATH**/ ?>