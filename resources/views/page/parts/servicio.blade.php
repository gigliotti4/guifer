<div class="servicio py-5">
    <div class="container">
        @if(!empty($elemento["servicio"]))
        <div class="servicio--element">
            <h2 class="title--important mb-3">Servicio técnico</h2>
            <div class="row mt-n4">
                @for($i = 0; $i < count($elemento["servicio"]); $i++)
                    <div class="col-12 mt-4 servicio {{ $i % 2 == 0 ? 'servicio--par' : 'servicio--impar'}}">
                        <div class="d-flex align-items-center justify-content-between">
                            @include( 'layouts.general.image' , [ 'i' => $elemento["servicio"][$i]["image"] , 'c' => 'servicio--icon' , 'n' => 'Imagen ' . $i ] )
                            <div class="servicio--text">
                                <h4 class="servicio--title">{{ $elemento["servicio"][$i]["titulo"] }}</h4>
                                <div>{!! $elemento["servicio"][$i]["texto"] !!}</div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        @endif
    </div>
</div>