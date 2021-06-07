<section class="my-3">
    <div class="container-fluid">
        <div class="mb-4">
            <?php echo $__env->make('page.parts.servicio', ['elemento' => $data['elementos']->data, 'link' => 0, 'idioma' => 'es'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php echo $__env->make('layouts.general.form', ['buttonADD' => 0, 'form' => 1, 'close' => 0, 'url' => url('/adm/contenido/'.$data['section'].'/update'), 'modal' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>
<?php $__env->startPush('scripts'); ?>
<script>
    window.pyrus = new Pyrus("contenido_servicio", null, src);
    window.pyrus_post = new Pyrus("contenido_post");
    window.pyrus_form = new Pyrus("contenido_post_form");
    window.pyrus_icon = new Pyrus("contenido_post_icono", null, src);

    window.ARR_pyrus = [ "pyrus_icon" , "pyrus_post", "pyrus" ];

    formSubmit = ( t ) => {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );

        let formData = new FormData( formElement );
        formData.append( "ATRIBUTOS", JSON.stringify(
            [
                { DATA: window.pyrus_post.objetoSimple, TIPO: "U"},
                { DATA: window.pyrus.objetoSimple, TIPO: "M", COLUMN: "servicio" , TAG : "servicio" , KEY: "servicio" },
                { DATA: window.pyrus_icon.objetoSimple, TIPO: "M", COLUMN: "icono" , TAG : "icono" , KEY: "icono" },
                { DATA: window.pyrus_form.objetoSimple, TIPO: "U", COLUMN: "form"},
            ]
        ));
        formSave( t , formData );
    };

    addServicio = ( t , value = null ) => {
        let target = $(`#wrapper-servicio`);
        let html = "";
        if( window[ `servicio` ] === undefined ) window[ `servicio` ] = 0;
        window[ `servicio` ] ++;

        html += '<div class="col-12 col-md-4 mt-3 servicio--adm">';
            html += '<div class="bg-light p-2 border position-relative overflow-hidden">';
                html += window.pyrus.formulario( window[ `servicio` ] , `servicio` );
                html += `<i style="line-height:14px; cursor: pointer; right: 0; top: 0; padding: 5px;border-radius: 0 0 0 .4em;" onclick="remove_( this , 'servicio--adm' )" class="fas fa-times position-absolute text-white bg-danger"></i>`;
            html += '</div>';
        html += '</div>';

        target.append( html );
        window.pyrus.editor( CKEDITOR , window[ `servicio` ] , "servicio" );
        window.pyrus.show( CKEDITOR , url_simple , value , window[ `servicio` ] , "servicio" );
    };
    addIcono = ( t , value = null ) => {
        let target = $(`#wrapper-icon`);
        let html = "";
        if( window[ `icon` ] === undefined ) window[ `icon` ] = 0;
        window[ `icon` ] ++;

        html += '<div class="col-12 col-md-4 mt-3 icon">';
            html += '<div class="bg-light p-2 border position-relative overflow-hidden">';
                html += window.pyrus_icon.formulario( window[ `icon` ] , `icono` );
                html += `<i style="line-height:14px; cursor: pointer; right: 0; top: 0; padding: 5px;border-radius: 0 0 0 .4em;" onclick="remove_( this , 'icon' )" class="fas fa-times position-absolute text-white bg-danger"></i>`;
            html += '</div>';
        html += '</div>';

        target.append( html );
        window.pyrus_icon.editor( CKEDITOR , window[ `icon` ] , "icono" );
        window.pyrus_icon.show( CKEDITOR , url_simple , value , window[ `icon` ] , "icono" );
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
        form += `<fieldset class="border p-3">`;
            form += `<legend class="border-bottom">Post-Venta</legend>`;
            form += window.pyrus_post.formulario();
            form += `<div class="row justify-content-center pt-3">`;
                form += `<div class="col-md-6 col-12">`;
                    form += `<button type="button" class="btn btn-block btn-dark text-center text-uppercase" onclick="addIcono( this )">Ícono (Título e Imágen)<i class="fas fa-plus ml-2"></i></button>`;
                form += `</div>`;
            form += `</div>`;
            form += `<div class="row mt-3n" id="wrapper-icon"></div>`;
        form += `</fieldset>`;
        form += `<fieldset class="border p-3">`;
            form += `<legend class="border-bottom">Texto formulario</legend>`;
            form += window.pyrus_form.formulario();
        form += `</fieldset>`;
        $("#form .container-form").html( form );
        window.pyrus_post.editor(CKEDITOR);
        window.pyrus_form.editor(CKEDITOR);
        callbackOK.call( this );
    };
    /** */
    init( () => {
        //if( Object.keys( window.data.elementos.data ).length != 0 )
        window.pyrus_post.show(CKEDITOR, url_simple, window.data.elementos.data);
        window.pyrus_form.show(CKEDITOR, url_simple, window.data.elementos.data.form);
        if( Object.keys( window.data.elementos.data.icono ).length == 0 )
            addIcono( null );
        else
            window.data.elementos.data.icono.forEach( ( x ) => {
                addIcono( null , x );
            } );
        if( Object.keys( window.data.elementos.data.servicio ).length == 0 )
            addIcono( null );
        else
            window.data.elementos.data.servicio.forEach( ( x ) => {
                addServicio( null , x );
            } );
    });
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/auth/parts/contenidoServicios.blade.php ENDPATH**/ ?>