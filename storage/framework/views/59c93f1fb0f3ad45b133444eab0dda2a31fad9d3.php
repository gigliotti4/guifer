<section class="my-3">
    <div class="container-fluid">
        <?php echo $__env->make( 'layouts.general.form', [ 'buttonADD' => 0 , 'form' => 0 , 'close' => 1 , 'modal' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make( 'layouts.general.table' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    window.pyrus = new Pyrus("metadatos");

    /** ------------------------------------- */
    
    add = function(t, seccion = "", data = null) {
        let btn = $(t);
        let action = `${url_simple}/adm/${window.pyrus.name}/update/${seccion}`;
        let method = "PUT";
        window.formAction = "UPDATE";
        window.elementData = data;

        $( "#formModalLabel" ).text( "Editar elemento " + seccion.toUpperCase()  );
        
        window.pyrus.show( CKEDITOR , url_simple , data );
        $( `#${window.pyrus.name}_seccion` ).val( seccion );
        $( "#form" ).prop( "action" , action ).prop( "method" , method );
        $( "#formModal" ).modal( "show" );
        $('.modal input[type="text"]:visible:enabled:first' ).focus();
    };
    /** ------------------------------------- */
    edit = function(t, seccion) {
        $( '[data-toggle="tooltip"]' ).tooltip( 'hide' );
        add( $( "#btnADD" ) , seccion , window.data.elementos.metadatos[ seccion ] );
    };
    /** ------------------------------------- */
    /** -------------------------------------
     *      INICIO
     ** ------------------------------------- */
    init = ( callbackOK ) => {
        /** */
        $( "#form .modal-body" ).html( window.pyrus.formulario() );
        $( "#wrapper-tabla > div.card-body" ).html( window.pyrus.table( [ { NAME:"ACCIONES" , COLUMN: "acciones" , CLASS: "text-center" , WIDTH: "50px" } ] ) );
        
        window.pyrus.editor( CKEDITOR );
        window.pyrus.elements( $( "#tabla" ) , url_simple , window.data.elementos.metadatos , [ "e" ] );
        callbackOK.call( this , null );
    };
    init( () => {});
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/auth/parts/empresaMetadatos.blade.php ENDPATH**/ ?>