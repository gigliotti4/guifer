<section class="my-3">
    <div class="container-fluid">
        <div class="mb-4">
            <h3 class="text-center mb-3">Encabezado de página</h3>
            <?php echo $__env->make('layouts.general.header', ['elementos' => $data['elementos'], 'link' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <h3 class="text-center mt-4 mb-3">Pie de página</h3>
            <?php echo $__env->make('layouts.general.footer', ['elementos' => $data['elementos'], 'link' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php echo $__env->make( 'layouts.general.form', [ 'buttonADD' => 0 , 'form' => 1 , 'close' => 0, 'url' => url('/adm/empresa/update') , 'modal' => 0 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script>
    window.pyrus = new Pyrus("empresa");
    window.pyrusImage = new Pyrus("empresa_images", null, src);
    window.pyrusFile = new Pyrus("empresa_file", null, src);
    window.pyrusDomicilio = new Pyrus( "empresa_domicilio" );
    window.pyrusTelefono = new Pyrus( "empresa_telefono" );
    window.pyrusEmail = new Pyrus( "empresa_email" );
    window.pyrusCaptcha = new Pyrus( "empresa_captcha" );

    window.ARR_pyrus = [ "pyrusImage" , "pyrusDomicilio" , "pyrusTelefono" , "pyrusEmail" ];

    formSubmit = ( t ) => {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );

        let formData = new FormData( formElement );
        formData.append( "ATRIBUTOS", JSON.stringify(
            [
                { DATA: window.pyrus.objetoSimple, TIPO: "U"},
                { DATA: window.pyrusImage.objetoSimple, TIPO: "U", COLUMN: "images" },
                { DATA: window.pyrusFile.objetoSimple, TIPO: "U", COLUMN: "files" },
                { DATA: window.pyrusCaptcha.objetoSimple, TIPO: "U", COLUMN: "captcha" },
                { DATA: window.pyrusDomicilio.objetoSimple, TIPO: "U", COLUMN: "domicile" },
                { DATA: window.pyrusTelefono.objetoSimple, TIPO: "M", COLUMN: "phone" , TAG : "phone" , KEY : "phone" },
                { DATA: window.pyrusEmail.objetoSimple, TIPO: "A", COLUMN: "email" }
            ]
        ));
        for( let x in CKEDITOR.instances )
            formData.set( x , CKEDITOR.instances[ `${x}` ].getData() );
        formSave( t , formData );
    };
    /** ------------------------------------- */
    addTelefono = ( t, value = null ) => {
        let target = $( `#wrapper-phone` );
        let html = "";
        if (window[`telefono`] === undefined)
            window[`telefono`] = 0;
        window[ `telefono` ] ++;
        html += '<div class="col-12 col-md-4 mt-3 element">';
            html += '<div class="bg-light p-2 border overflow-hidden position-relative">';
                html += window.pyrusTelefono.formulario( window[ `telefono` ] , `phone` );
                html += `<i style="line-height:14px; cursor: pointer; right: 0; top: 0; padding: 5px;border-radius: 0 0 0 .4em;" onclick="remove_( this , 'element' )" class="fas fa-times position-absolute text-white bg-danger"></i>`;
            html += '</div>';
        html += '</div>';

        target.append(html);

        window.pyrusTelefono.show( null , url_simple , value , window[ `telefono` ] , `phone`, 1 );
    };

    addEmail = ( t , value = null ) => {
        let target = $(`#wrapper-email`);
        let html = "";
        if( window[ `email` ] === undefined )
            window[ `email` ] = 0;
        window[ `email` ] ++;

        html += '<div class="col-12 col-md-6 mt-3 element">';
            html += '<div class="bg-light p-2 border position-relative overflow-hidden">';
                html += window.pyrusEmail.formulario( window[ `email` ] , `email` );
                html += `<i style="line-height:14px; cursor: pointer; right: 0; top: 0; padding: 5px;border-radius: 0 0 0 .4em;" onclick="remove_( this , 'element' )" class="fas fa-times position-absolute text-white bg-danger"></i>`;
            html += '</div>';
        html += '</div>';

        target.append( html );
        window.pyrusEmail.show( null , url_simple , { email : value } , window[ `email` ] , `email`, 1 );
    };
    /** ------------------------------------- */
    init = ( callbackOK ) => {
        form = "";
        form += `<fieldset class="border p-3">`;
            form += `<legend class="border-bottom">Generales</legend>`;
            form += window.pyrus.formulario();
        form += `</fieldset>`;
        form += `<fieldset class="border p-3">`;
            form += `<legend class="border-bottom">Archivos varios</legend>`;
            form += window.pyrusFile.formulario();
        form += `</fieldset>`;
        /** */
        form += `<fieldset class="border p-3">`;
            form += `<legend class="border-bottom">Logotipos & Favicon</legend>`;
            form += window.pyrusImage.formulario();
        form += `</fieldset>`;
        form += `<fieldset class="border p-3">`;
            form += `<legend class="border-bottom">Domicilio</legend>`;
            form += window.pyrusDomicilio.formulario();
        form += `</fieldset>`;

        form += `<fieldset class="border p-3">`;
            form += `<legend class="border-bottom">Captcha (Google)</legend>`;
            form += window.pyrusCaptcha.formulario();
        form += `</fieldset>`;
        form += `<div class="row justify-content-center pt-3">`;
            form += `<div class="col-md-3 col-12">`;
                form += `<button id="btnTelefono" type="button" class="btn btn-block btn-dark text-center text-uppercase" onclick="addTelefono( this )">Teléfono<i class="fas fa-plus ml-2"></i></button>`;
            form += `</div>`;
        form += `</div>`;
        form += `<div class="row mt-0" id="wrapper-phone"></div>`;
        form += `<div class="row justify-content-center pt-3 border-top">`;
            form += `<div class="col-md-3 col-12">`;
                form += `<button id="btnEmail" type="button" class="btn btn-block btn-info text-center text-uppercase" onclick="addEmail( this )">Email<i class="fas fa-plus ml-2"></i></button>`;
            form += `</div>`;
        form += `</div>`;
        form += `<div class="row mt-0" id="wrapper-email"></div>`;

        $("#form .container-form").html( form );
        callbackOK.call( this );
    };
    /** */
    init( () => {
        window.pyrus.show(null, url_simple, window.data.elementos);
        window.pyrusFile.show(null, url_simple, window.data.elementos.files);
        window.pyrusImage.show(null, url_simple, window.data.elementos.images);
        window.pyrusDomicilio.show(null, url_simple , window.data.elementos.domicile);
        window.pyrusCaptcha.show(null, null, window.data.elementos.captcha);
        window.data.elementos.email.forEach(e => {addEmail($("#btnEmail"), e); });
        window.data.elementos.phone.forEach(t => {addTelefono($("#btnTelefono"), t); });
    });
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/pablo/Escritorio/guifer2/resources/views/auth/parts/empresa.blade.php ENDPATH**/ ?>