<section class="my-3">
    <div class="container-fluid">
        <div class="mb-4">
            @include('page.parts.home' , ['elementos' => $data['elementos']->data, 'link' => 0])
        </div>
        @include( 'layouts.general.form', [ 'buttonADD' => 0 , 'form' => 1 , 'close' => 0 , 'url' => url('/adm/contenido/' . $data['section'] . '/update') , 'modal' => 0 ] )
    </div>
</section>
@push('scripts')
<script>
    window.pyrus = new Pyrus("contenido_home", null, src);
    window.pyrus_numero = new Pyrus("contenido_home_numero", null, src);

    window.ARR_pyrus = [ "pyrus_numero" , "pyrus", ];

    formSubmit = ( t ) => {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );

        let formData = new FormData( formElement );
        formData.append( "ATRIBUTOS", JSON.stringify(
            [
                { DATA: window.pyrus.objetoSimple, TIPO: "U" },
                { DATA: window.pyrus_numero.objetoSimple, TIPO: "M", COLUMN: "numero" , TAG : "numero" , KEY: "numero" }
            ]
        ));
        formSave( t , formData );
    };

    addNumero = ( t , value = null ) => {
        let target = $(`#wrapper-numero`);
        let html = "";
        if( window[ `numero` ] === undefined ) window[ `numero` ] = 0;
        window[ `numero` ] ++;

        html += '<div class="col-12 col-md-4 mt-3 numero">';
            html += '<div class="bg-light p-2 border position-relative overflow-hidden">';
                html += window.pyrus_numero.formulario( window[ `numero` ] , `numero` );
                html += `<i style="line-height:14px; cursor: pointer; right: 0; top: 0; padding: 5px;border-radius: 0 0 0 .4em;" onclick="remove_( this , 'numero' )" class="fas fa-times position-absolute text-white bg-danger"></i>`;
            html += '</div>';
        html += '</div>';

        target.append( html );
        window.pyrus_numero.editor( CKEDITOR , window[ `numero` ] , "numero" );
        window.pyrus_numero.show( CKEDITOR , url_simple , value , window[ `numero` ] , "numero", 1 );
    };

    /** ------------------------------------- */
    init = ( callbackOK ) => {
        /** */
        let form = "";
        form += `<div class="row justify-content-center pt-3">`;
            form += `<div class="col-md-6 col-12">`;
                form += `<button type="button" class="btn btn-block btn-dark text-center text-uppercase" onclick="addNumero( this )">N??mero (T??tulo, Texto e Im??gen)<i class="fas fa-plus ml-2"></i></button>`;
            form += `</div>`;
        form += `</div>`;
        form += `<div class="row mt-3n mb-5" id="wrapper-numero"></div>`;
        form += window.pyrus.formulario();
        $("#form .container-form").html( form );
        window.pyrus.editor( CKEDITOR );
        callbackOK.call( this );
    };
    /** */
    init( () => {

        window.pyrus.show( null , url_simple , window.data.elementos.data );
        window.data.elementos.data.numero.forEach( ( x ) => {
            addNumero( null , x );
        } );
    });
</script>
@endpush
