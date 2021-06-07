<div class="galeria py-5">
    <div class="container">
        <h2 class="title--important mb-4">Algunos de Nuestros Clientes</h2>
        <div class="row mt-n4">
            @foreach($data["elementos"] AS $cliente)
                <div class="col-12 col-md-4 col-lg-3 mt-4">
                    <div class="card">
                        @include( 'layouts.general.image' , [ 'i' => $cliente->image , 'c' => 'card-img-top' , 'n' => 'Imagen' ] )
                        <div class="card-body p-0">
                            @if(!empty($cliente->name))
                            <div class="bg-ligth cliente--descripcion text-truncate">
                                {{ $cliente->name }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>