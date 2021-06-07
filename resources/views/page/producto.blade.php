<div class="productos pb-5 pt-3">
    <div class="container">
        <ol class="breadcrumb border-0 rounded-0 bg-white mb-3" id="producto--breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL::to('productos') }}">Productos</a></li>
            <li class="breadcrumb-item"><a href="{{ URL::to($data['category']->url()) }}">{{ $data['category']->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $data["producto"]->title }}</li>
        </ol>
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                @include('page.parts.lateral' , ['elementos' => $data['categorias'],'link' => 1])
            </div>
            <div class="col-12 col-md-8 col-lg-9">
                <div class="row mt-3">
                    <div class="col-12 col-md" id="producto--images">
                        @include( 'layouts.general.slider' , [ 'slider' => $data['producto']->images() , 'sliderID' => "slider", 'class' => 'producto--image producto--image__big' , 'div' => 1 , 'arrow' => 0] )
                    </div>
                    <div class="col-12 col-md">
                        @php
                        $name = $data["producto"]->title;
                        $pdf = $data["producto"]->ficha();
                        $plano = $data["producto"]->plano();
                        @endphp
                        <input type="hidden" value="{{ $data['producto']->id }}" id="producto--id">
                        <h3 class="producto--title producto--title__elemento" id="producto--name">{{ $name }}</h3>
                        @if(!empty($data["producto"]->subtitle))
                        <div class="producto--resume">{!! $data["producto"]->subtitle !!}</div>
                        @endif
                        @if(!empty($data["producto"]->text))
                        <div class="producto--detalle">{!! $data["producto"]->text !!}</div>
                        @endif
                        <div class="d-flex justify-content-between mt-3">
                            <a class="btn btn-primary btn--element px-3" href="{{URL::to('solicitud-de-presupuesto')}}">Consultar</a>
                            @if(!empty($pdf))
                            <a href="{{ asset($pdf) }}" target="_blank" class="btn btn-primary btn--element producto--btn px-3"><i class="fas fa-file-pdf"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                @if(!empty($plano))
                <div class="row mt-5">
                    <div class="col-12">
                        <h3 class="mb-4">Productos Relacionados</h3>
                        @include('layouts.general.image', [ 'i' => $plano , 'c' => 'd-block w-50 mx-auto', 'n' => 'Plano'])
                    </div>
                </div>
                @endif
                @if(!empty($data["producto"]->table))
                <div class="row mt-5 producto--table">
                    <div class="col-12">
                        <div class="table-responsive">
                            {!! $data["producto"]->table !!}
                        </div>
                    </div>
                </div>
                @endif
                <div class="row mt-5">
                    <div class="col-12">
                        <ol class="breadcrumb border-0 rounded-0 p-0 bg-white mb-3">
                            <li class="breadcrumb-item"><a href="{{ URL::to('productos') }}">Productos</a></li>
                            <li class="breadcrumb-item"><a href="{{ URL::to($data['category']->url()) }}">{{ $data['category']->name }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $data["producto"]->title }}</li>
                        </ol>
                        <h3>Productos Relacionados</h3>
                    </div>
                    @foreach($data["productos"] AS $p)
                    @php
                    $name = $p->title;
                    $url = $p->url();
                    @endphp
                    <div class="col-12 col-md-6 col-lg-4 mt-4">
                        <div class="card border-0 producto--elemento hover position-relative">
                            <a class="plus" href="{{ URL::to($url) }}">
                                @include( 'layouts.general.image' , [ 'i' => $p->image() , 'c' => 'card-img-top producto--image', 'in_div' => 1 , 'n' => $name ] )
                                <div class="card-body img position-relative">
                                    <p class="card-title producto--elemento__titulo">{{ $name }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <p class="text-center text-muted">Las imágenes indicadas en este sitio web son meramente ilustrativas no contractuales.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push( "scripts" )
<script>
    prespuesto = t => {
        const id = document.querySelector("#producto--id").value;
        const breadcrumb = document.querySelector("#producto--breadcrumb");
        const breadcrumb__elements = breadcrumb.querySelectorAll("li")
        const images = document.querySelectorAll(".carousel-item");
        const name = document.querySelector("#producto--name").textContent;
        let category = "";
        let img = images[0].querySelector("img").src;
        for(let x in breadcrumb__elements) {
            if(x == 0 || x == "length" || x == "item" || x == "entries" || x == "forEach" || x == "keys" || x == "values")
                continue;
            if(category != "")
                category += ", ";
            category += breadcrumb__elements[x].textContent;
        }
        window.pedir = {};
        if (sessionStorage.pedir)
            window.pedir = JSON.parse(sessionStorage.pedir);
        if (!window.pedir[id]) {
            window.pedir[id] = {
                name: name,
                category: category,
                cant: 1,
                img: img
            };
        }
        sessionStorage.setItem("pedir", JSON.stringify(window.pedir));
        document.querySelector("#link--presupuesto").click();
    };
    enviar = ( t ) => {
        let url = t.action;
        let method = t.method;
        let idForm = t.id;
        let formElement = document.getElementById( idForm );
        let formData = new FormData( formElement );
        grecaptcha.ready(function() {
            $( ".form-control" ).prop( "readonly" , true );
            Toast.fire({
                icon: 'warning',
                title: 'Espere, enviando'
            });
            grecaptcha.execute("{{ $data[ 'empresa' ]->captcha[ 'public' ] }}", {action: 'contact'}).then( function( token ) {
                formData.append( "token", token );
                axios({
                    method: method,
                    url: url,
                    data: formData,
                    responseType: 'json',
                    config: { headers: {'Content-Type': 'multipart/form-data' }}
                })
                .then((res) => {
                    $( ".form-control" ).prop( "readonly" , false );
                    if( parseInt( res.data.estado ) ) {
                        $( ".form-control" ).val( "" );
                        Toast.fire({
                            icon: 'success',
                            title: res.data.mssg
                        });
                    } else
                        Toast.fire({
                            icon: 'error',
                            title: res.data.mssg
                        });
                })
                .catch((err) => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Ocurrió un error'
                    });
                })
                .then(() => {});
            });
        });
    };
</script>
@endpush