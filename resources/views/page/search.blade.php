<div class="productos py-5">
    <div class="container pb-5">
        <h2 class="title--important mb-3">Buscador</h2>
        <form class="d-block my-5" action="" method="get">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 d-flex">
                    <input pattern="(.|\s)*\S(.|\s)*" value="{{ $data['search'] }}" name="s" placeholder="Estoy buscando..." type="search" class="form-control form--input form-control-lg mr-3">
                    <button class="btn btn-primary btn--element px-5 rounded-pill">Buscar</button>
                </div>
                <div class="col-12 mt-3">
                    <p class="text-center">Total de registros encontrados: {{ $data["total"] }}</p>
                </div>
            </div>
        </form>
        <div class="row mt-n4 justify-content-center">
            @forelse($data["productos"] AS $p)
            @php
            $name = $p->title;
            if(empty($name))
                $name = $p->nombre["es"];
            $url = $p->url();
            @endphp
            <div class="col-12 col-md-4 mt-4">
                <div class="card border-0 producto--elemento hover position-relative">
                    <a class="plus" href="{{ URL::to($url) }}">
                        @include( 'layouts.general.image' , [ 'i' => $p->image() , 'c' => 'card-img-top producto--image', 'in_div' => 1 , 'n' => $name ] )
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
        <div class="row mt-5">
            <div class="col-12 justify-content-center d-flex">
                {{$data["productos"]->appends(["s" => $data["search"]])->links()}}
            </div>
        </div>
    </div>
</div>