<section class="my-3">
    <div class="container-fluid">
        <div class="mb-4">
            <?php echo $__env->make('page.parts.servicio', ['elemento' => $data['elementos']->data, 'link' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php echo $__env->make('layouts.general.form', ['buttonADD' => 0, 'form' => 1, 'close' => 0, 'url' => url('/adm/contenido/'.$data['section'].'/update'), 'modal' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>
<?php $__env->startPush('scripts'); ?>
<script>
    window.pyrus = new Pyrus("contenido_servicio", null, src);

    formSubmit = ( t ) => {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );

        let formData = new FormData( formElement );
        formData.append( "ATRIBUTOS", JSON.stringify(
            [
                { DATA: window.pyrus.objetoSimple, TIPO: "M", COLUMN: "servicio" , TAG : "servicio" , KEY: "servicio" }
            ]
        ));
        formSave( t , formData );
    };

    addServicio = ( t , value = null ) => {
        let target = $(`#wrapper-servicio`);
        let html = "";
        if( window[ `servicio` ] === undefined )
            window[ `servicio` ] = 0;
        window[ `servicio` ] ++;

        html += '<div class="col-12 mt-3 servicio--adm">';
            html += '<div class="bg-light p-2 border position-relative overflow-hidden">';
                html += window.pyrus.formulario( window[ `servicio` ] , `servicio` );
                html += `<i style="line-height:14px; cursor: pointer; right: 0; top: 0; padding: 5px;border-radius: 0 0 0 .4em;" onclick="remove_( this , 'servicio--adm' )" class="fas fa-times position-absolute text-white bg-danger"></i>`;
            html += '</div>';
        html += '</div>';
        console.log(value)

        target.append( html );
        window.pyrus.editor( CKEDITOR , window[ `servicio` ] , "servicio" );
        window.pyrus.show( CKEDITOR , url_simple , value , window[ `servicio` ] , "servicio", 1 );
    };
    /** ------------------------------------- */
    init = ( callbackOK ) => {
        /** */
        let form = "";

        form += `<div class="row justify-content-center pt-3">`;
            form += `<div class="col-md-6 col-12">`;
                form += `<button type="button" class="btn btn-block btn-dark text-center text-uppercase" onclick="addServicio( this )">Servicio (Título, Texto e Imágen)<i class="fas fa-plus ml-2"></i></button>`;
            form += `</div>`;
        form += `</div>`;
        form += `<div class="row mt-3n mb-5" id="wrapper-servicio"></div>`;
        $("#form .container-form").html( form );
        callbackOK.call( this );
    };
    /** */
    init( () => {
        if( Object.keys( window.data.elementos.data.servicio ).length == 0 )
            addServicio( null );
        else
            window.data.elementos.data.servicio.forEach( ( x ) => {
                addServicio( null , x );
            } );
    });
</script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\guifer\resources\views/auth/parts/contenidoServicios.blade.php ENDPATH**/ ?>