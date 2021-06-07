<div class="blogs bg-white pb-5">
    <div class="container pt-3">
        <ol class="breadcrumb bg-transparent border-0 p-0">
            <li class="breadcrumb-item breadcrumb--home"><a href="{{ URL::to('/') }}"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ URL::to('/novedades' ) }}">Novedades</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $data[ 'category' ]->title }}</li>
        </ol>
        <div class="row mt-5">
            <div class="col-12 col-md">
                <div class="row wrapper-blog mt-n5">
                    @forelse( $data[ "blogs" ] AS $b )
                    <div class="hover col-12 col-md-6 mt-5">
                        @include( 'page.parts.blog' , [ 'elemento' => $b , 'type' => 0 ] )
                    </div>
                    @empty
                    <div class="col-12 mt-5 text-center">
                        @include( 'layouts.general.image' , [ 'i' => 'images/search_not_found.png' , 'c' => 'mx-auto not-found d-block mb-3' , 'n' => 'No encontrado' ] )
                        <h4 class="text-center">Sin registros</h4>
                    </div>
                    @endforelse
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center">{{ $data[ "blogs" ]->links() }}</div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                @include( 'page.parts.blog_lateral' )
            </div>
        </div>
    </div>
</div>