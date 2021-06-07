<div class="productos pb-5 pt-3">
    <div class="container">
        <ol class="breadcrumb border-0 rounded-0 bg-white mb-3">
            <li class="breadcrumb-item"><a href="{{ URL::to(App::getLocale() . '/productos') }}">{{ translate("link_productos", App::getLocale()) }}</a></li>
            <li class="breadcrumb-item"><a href="{{ URL::to(App::getLocale() . '/productos/marca/' . str_slug($data['marca']->nombre) . '/' . $data['marca']->id) }}">{{ $data['marca']->nombre }}</a></li>
            @foreach($data["familias"] AS $f)
                <li class="breadcrumb-item @if($f->id == $data['familia']->id) active @endif"><a href="{{ URL::to(App::getLocale() . '/productos/familia/' . str_slug($f->nombre[App::getLocale()]) . '/' . $f->id) }}">{{ $f->nombre[App::getLocale()] }}</a></li>
            @endforeach
        </ol>
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4">
                @include('page.parts.lateral' , ['elementos' => $data['marcas'], 'idioma' => App::getLocale(), 'link' => 1])
            </div>
            <div class="col-12 col-md-8 col-lg-8">
                <div class="producto--name d-flex justify-content-between align-items-center">
                    <h3 class="producto--title">{{ $data["familia"]->nombre[App::getLocale()] }}</h3>
                    @include( 'layouts.general.image' , [ 'i' => $data["marca"]->image , 'c' => 'producto--logo' , 'n' => $data["marca"]->nombre ] )
                </div>
                <div class="producto--text">
                    {!! $data["familia"]->contenido[App::getLocale()] !!}
                </div>
                <div class="row mt-n4">
                    @forelse($data["productos"] AS $p)
                    @php
                    $table = substr($p->getTable(), 0, -1);
                    $name = $p->nombre[App::getLocale()];
                    if(empty($name))
                        $name = $p->nombre["es"];
                    $url = URL::to(App::getLocale() . "/productos/{$table}/" . str_slug($name) . '/' . $p->id);
                    @endphp
                    <div class="col-12 col-md-4 mt-4">
                        <div class="card border-0 producto--elemento hover position-relative">
                            @if($table == "producto")
                                <div class="producto--elemento__alert">{{ translate("txt_producto", App::getLocale()) }}</div>
                            @endif
                            <a class="plus" href="{{ $url }}">
                                @include( 'layouts.general.image' , [ 'i' => $p->image , 'c' => 'card-img-top' , 'n' => $name ] )
                                <div class="card-body img position-relative">
                                    <p class="card-title producto--elemento__titulo">{{ $name }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 py-4">
                        @include( 'layouts.general.image' , [ 'i' => 'images/search_not_found.png' , 'c' => 'd-block mx-auto img--not-found' , 'n' => 'Not found' ] )
                        <h3 class="text-center">{{ translate("sin_registros", App::getLocale()) }}</h3>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>