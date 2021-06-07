<section class="my-3">
    <div class="container-fluid">
        @include( 'layouts.general.form', [ 'buttonADD' => 1 , 'form' => 0 , 'close' => 1 , 'modal' => 1 ] )
        @include( 'layouts.general.table', [
            "paginate" => $data["elementos"],
            "form" => [
                "url" => Route("languages.index"),
                "placeholder" => "Buscar por Clave u Opción",
                "search" => isset($data["search"]) ? $data["search"] : null
            ]
        ])
    </div>
</section>
@push('scripts')
<script>
    window.pyrus = new Pyrus("language");
    /** -------------------------------------
     *      INICIO
     ** ------------------------------------- */
    init( () => {} );
</script>
@endpush