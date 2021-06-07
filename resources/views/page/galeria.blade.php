<div class="galeria py-5">
    <div class="container">
        @if($data["elementos"]["image"]->isNotEmpty())
        <h2 class="title--important mb-3">{{ translate("link_galeria", App::getLocale())}}</h2>
        <div class="row mt-n4">
            @foreach($data["elementos"]["image"] AS $galeria)
                <div class="col-12 col-md-6 col-lg-4 mt-4">
                    <div class="card">
                        <div class="card-body p-0">
                            @include( 'layouts.general.image' , [ 'i' => $galeria->image , 'c' => 'img-fluid' , 'n' => 'Imagen' ] )
                            @if(!empty($galeria->nombre))
                            <div class="galeria--descripcion">
                                {{ $galeria->nombre }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <hr class="my-5">
        @endif
        @if($data["elementos"]["video"]->isNotEmpty())
        <h2 class="title--important mb-3">{{ translate("label_videos", App::getLocale())}}</h2>
        <div class="row mt-n4">
            @foreach($data["elementos"]["video"] AS $galeria)
                <div class="col-12 col-md-6 col-lg-4 mt-4">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$galeria->video}}"></iframe>
                            </div>
                            @if(!empty($galeria->nombre))
                            <div class="galeria--descripcion">
                                {{ $galeria->nombre }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>
</div>