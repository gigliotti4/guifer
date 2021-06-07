<div class="py-5 empresa">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-8">
                <h2 class="title--important mb-4">Empresa</h2>
                {!! $elemento['texto'] !!}
            </div>
            <div class="col-12 col-md-6 col-lg-4 mt-md-4 mt-lg-0">
                @include('layouts.general.image', [ 'i' => $elemento["image"] , 'c' => 'empresa--image', 'n' => 'Imagen Empresa'])
            </div>
        </div>
    </div>
</div>