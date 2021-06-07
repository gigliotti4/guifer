@isset($data[ "marcas" ])
<div class="marcas py-5">
    <h2 class="marcas--title">{{ translate("text_marcas", $idioma) }}</h2>
    <div class="container mt-4">
        <div class="d-flex justify-content-center px-5 flex-wrap">
            @foreach($data[ "marcas" ] AS $p)
                @if(!empty($p->image))
                    <a href="{{ URL::to($idioma . '/productos/marca/' . str_slug($p->nombre) . '/' . $p->id) }}" class="d-inline-block">
                        @include( 'layouts.general.image' , [ 'i' => $p->image , 'c' => 'marca--image' , 'n' => $p->nombre ] )
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endisset
<div class="home home--important">
    <div class="container">
        <ul class="home--numeros justify-content-center">
            @foreach($elementos["numero"] AS $numero)
            <li class="home--numeros-list">
                @include( 'layouts.general.image' , [ 'i' => $numero["image"] , 'c' => 'home--numero-img' , 'n' => $numero["order"] ] )
                <div class="home--numero-text">{!! $numero["texto"] !!}</div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="home">
    <div class="container">
        <div class="home--frase">{!! $elementos["texto"] !!}</div>
    </div>
</div>