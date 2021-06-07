<section class="my-3">
    <div class="container-fluid">
        @include( 'layouts.general.form', [ 'buttonADD' => 1 , 'form' => 0 , 'close' => 1 , 'modal' => 1 ] )
        @include( 'layouts.general.table', [
            "paginate" => $data["elementos"],
            "form" => [
                "url" => Route("newsletter.index"),
                "placeholder" => "Buscar por Email",
                "search" => isset($data["search"]) ? $data["search"] : null
            ]
        ])
    </div>
</section>
@push('scripts')
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
@endpush