<section class="my-3">
    <div class="container-fluid">
        <div class="mb-4">
            <?php echo $__env->make('page.parts.empresa', ['elemento' => $data['elementos']->data, 'idioma' => 'es'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php echo $__env->make('layouts.general.form', ['buttonADD' => 0, 'form' => 1, 'close' => 0, 'url' => url('/adm/contenido/'.$data['section'].'/update'), 'modal' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>
<?php $__env->startPush('scripts'); ?>
<script>
    window.pyrus = new Pyrus("contenido_empresa", null, src);
    window.pyrus_video = new Pyrus("contenido_video");

    window.ARR_pyrus = [ "pyrus" , "pyrus_video", ];

    formSubmit = ( t ) => {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );

        let formData = new FormData( formElement );
        formData.append( "ATRIBUTOS", JSON.stringify(
            [
                { DATA: window.pyrus.objetoSimple, TIPO: "U"},
                { DATA: window.pyrus_video.objetoSimple, TIPO: "M", COLUMN: "video" , TAG : "video" , KEY: "video" }
            ]
        ));
        for( let x in CKEDITOR.instances )
            formData.set( x , CKEDITOR.instances[ `${x}` ].getData() );
        formSave( t , formData );
    };

    addVideo = ( t , value = null ) => {
        let target = $(`#wrapper-video`);
        let html = "";
        if( window[ `video` ] === undefined ) window[ `video` ] = 0;
        window[ `video` ] ++;

        html += '<div class="col-12 col-md-4 mt-3 video">';
            html += '<div class="bg-light p-2 border position-relative overflow-hidden">';
                html += window.pyrus_video.formulario( window[ `video` ] , `video` );
                html += `<i style="line-height:14px; cursor: pointer; right: 0; top: 0; padding: 5px;border-radius: 0 0 0 .4em;" onclick="remove_( this , 'video' )" class="fas fa-times position-absolute text-white bg-danger"></i>`;
            html += '</div>';
        html += '</div>';

        target.append( html );
        window.pyrus_video.show( CKEDITOR , url_simple , value , window[ `video` ] , "video" );
    };
    /** ------------------------------------- */
    init = ( callbackOK ) => {
        /** */
        let form = "";
        form += window.pyrus.formulario();

        form += `<div class="row justify-content-center pt-3">`;
            form += `<div class="col-md-6 col-12">`;
                form += `<button type="button" class="btn btn-block btn-dark text-center text-uppercase" onclick="addVideo( this )">Video institucional<i class="fas fa-plus ml-2"></i></button>`;
            form += `</div>`;
        form += `</div>`;
        form += `<div class="row mt-3n mb-5" id="wrapper-video"></div>`;
        $("#form .container-form").html( form );
        window.pyrus.editor( CKEDITOR );
        callbackOK.call( this );
    };
    /** */
    init( () => {
        if( Object.keys( window.data.elementos.data ).length != 0 ) {
            window.pyrus.show( CKEDITOR , url_simple , window.data.elementos.data );
            window.data.elementos.data.video.forEach( ( x ) => {
                addVideo( null , x );
            } );
        }
    });
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/auth/parts/contenidoEmpresa.blade.php ENDPATH**/ ?>