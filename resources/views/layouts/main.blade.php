<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ $data['metadato']['description'] }}"/>
        <meta name=”keywords” content="{{ $data['metadato']['keywords'] }}"/>
        @php
        $t = config( 'app.name' );
        if( strpos($data[ 'title' ],$t) !== false )
            $t = $data[ 'title' ];
        else
            $t .= ' :: ' . $data[ 'title' ];
        @endphp
        <title>@yield( 'headTitle' , $t )</title>
        @if( !empty( $data[ "empresa" ][ "images" ][ "favicon" ] ) )
            @switch( $data[ "empresa" ][ "images" ][ "favicon" ][ "i" ] )
                @case("png")
                    <link rel="icon" type="image/png" href="{{ asset($data[ 'empresa' ]->images[ 'favicon' ][ 'i' ] ) }}" />
                    @break
                @case("svg")
                    <link rel="icon" href="{{ asset($data[ 'empresa' ]->images[ 'favicon' ][ 'i' ] ) }}" type="image/svg+xml" />
                    @break
                @default
                    <link rel="shortcut icon" href="{{ asset( $data[ 'empresa' ]->images[ 'favicon' ][ 'i' ] ) }}" />
            @endswitch
        @endif
        <!-- <Styles> -->
        @include( 'layouts.general.css' )
        <link rel="stylesheet" href="{{ asset('css/loading.css') }}">
        <link rel="stylesheet" href="{{ asset('css/loading-btn.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
        <link href="{{ asset('css/css.css') }}" rel="stylesheet">
        <link href="{{ asset('css/page/page.css') }}" rel="stylesheet">
        <link href="{{ asset('css/page/header.css') }}" rel="stylesheet">
        <link href="{{ asset('css/page/footer.css') }}" rel="stylesheet">
        @stack( 'styles' )
        <!-- </Styles> -->
    </head>
    <body>
        <div class="modal fade bd-example-modal-lg" id="terminosModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">{{ $data[ "terminos" ]->contents[ "title" ] }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! $data[ "terminos" ]->contents[ "text" ] !!}
                    </div>
                </div>
            </div>
        </div>
        @include( 'layouts.general.message' )
        <div id="wrapper-body">
            @include( 'layouts.general.header' , [ 'elementos' => $data[ 'empresa' ], 'link' => 1, 'idioma' => App::getLocale() ] )
            <section>
            @include( $data[ 'view' ] )
            </section>
            @include( 'layouts.general.footer' , [ 'elementos' => $data[ 'empresa' ], 'link' => 1, 'idioma' => App::getLocale() ] )
        </div>
        <!-- Scripts -->
        @include( 'layouts.general.script' )
        <script>
            window.url = "{{ url()->current() }}";
            window.url_base = "{{ URL::to( '/' ) }}";
            $( () => {
                $('#search__modal').on('shown.bs.modal', function (e) {
                    if(window.typeMENU !== undefined)
                        menuBody(null);
                });
                $( ".carousel-caption .texto" ).css( {
                    marginTop: $("header").height()
                } );
                $( "#accordionMenu a").on( "click" , ( e ) => {
                    $(this).parent().stopPropagation();
                });
                $( ".dropdown-menu" ).click( ( e ) => {
                    e.stopPropagation();
                });
                $(window).resize(() => {
                    $( ".carousel-caption .texto" ).css( {
                        marginTop: $( "header" ).height()
                    } );
                });
            });
        </script>
        @stack( 'scripts' )
        <script src="{{ asset('js/bootstrap-autocomplete.js') }}"></script>
    </body>
</html>