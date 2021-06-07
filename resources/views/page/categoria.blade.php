<div class="productos pb-5 pt-3">
    <div class="container">
        <ol class="breadcrumb border-0 rounded-0 bg-white mb-3">
            <li class="breadcrumb-item"><a href="{{ URL::to('/productos') }}">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $data["categoria"]->name }}</li>
        </ol>
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                @include('page.parts.lateral' , ['elementos' => $data['categorias'], 'link' => 1])
            </div>
            <div class="col-12 col-md-8 col-lg-9">
                <div class="row mb-5">
                    <div class="col-12">
                        <p class="text-center text-muted">Las imágenes indicadas en este sitio web son meramente ilustrativas no contractuales.</p>
                    </div>
                </div>
                <div class="row mt-n4">
                    @forelse($data["productos"] AS $p)
                    @php
                    $name = $p->title;
                    $url = $p->url();
                    @endphp
                    <div class="col-12 col-md-4 mt-4">
                        <div class="card border-0 producto--elemento hover position-relative">
                            <a class="plus" href="{{ URL::to($url) }}">
                                @include( 'layouts.general.image' , [ 'i' => $p->image() , 'c' => 'card-img-top producto--image' , 'n' => $name ] )
                                <div class="card-body img position-relative">
                                    <p class="card-title producto--elemento__titulo">{{ $name }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 py-4">
                        @include( 'layouts.general.image' , [ 'i' => 'images/search_not_found.png' , 'c' => 'd-block mx-auto img--not-found' , 'n' => 'Not found' ] )
                        <h3 class="text-center">Sin resultados</h3>
                    </div>
                    @endforelse
                </div>
                @if($data["productos"]->isNotEmpty())
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center">{{ $data["productos"]->links() }}</div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>