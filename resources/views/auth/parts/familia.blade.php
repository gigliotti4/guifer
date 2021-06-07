<section class="my-3">
    <div class="container-fluid">
        <div class="mb-4">
            @include('page.parts.lateral' , ['elementos' => $data['marcas_complete'], 'idioma' => 'es', 'link' => 0])
        </div>
        @include( 'layouts.general.form' , [ 'buttonADD' => 1 , 'form' => 0 , 'close' => 1 , 'modal' => 1 , "buttons" => [ [ "i" => "fas fa-clipboard-list" , "t" => "Elementos" , "b" => "btn-dark" ] ] ])
        @include( 'layouts.general.table', [
            "paginate" => $data["elementos"],
            "form" => [
                "url" => isset($data["url_search"]) ? $data["url_search"] : Route("familias.index"),
                "placeholder" => "Buscar en Nombre y Detalles",
                "search" => isset($data["search"]) ? $data["search"] : null
            ]
        ])
    </div>
</section>
@push('scripts')
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
@endpush