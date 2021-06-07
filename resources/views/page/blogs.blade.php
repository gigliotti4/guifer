<div class="blogs pt-5 pb-2">
    <div class="container">
        <h2 class="title--important mb-4">Novedades</h2>
    </div>
</div>
<div class="blogs blogs--important py-3">
    <div class="container">
        <div class="row pt-4 pb-5">
            <div class="col-12 col-md">
                <div class="wrapper-videos">
                    <h3 class="blogs--title blogs--title__lateral mb-3">Destacados</h3>
                    <div class="row wrapper-blog mt-n5">
                        @foreach( $data["elementos"][ "blogs_destacado" ] AS $b )
                        <div class="hover col-12 col-md-6 mt-5">
                            @include( 'page.parts.blog' , [ 'elemento' => $b , 'type' => 1 ] )
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blogs py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md">
                <h3 class="blogs--title blogs--title__lateral mb-3">Últimas novedades</h3>
                <div class="row blog mt-n5">
                    @foreach( $data["elementos"][ "blogs" ] AS $b )
                    <div class="hover col-12 col-lg-6 mt-5">
                        @include( 'page.parts.blog' , [ 'elemento' => $b , 'type' => 0 ] )
                    </div>
                    @endforeach
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center">{{ $data["elementos"][ "blogs" ]->links() }}</div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                @include( 'page.parts.blog_lateral' )
            </div>
        </div>
    </div>
</div>