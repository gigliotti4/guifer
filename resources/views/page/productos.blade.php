<div class="productos py-5">
    <div class="container">
        <h2 class="title--important mb-3">Productos</h2>
        <div class="row">
            @foreach($data["elementos"] AS $categoria)
                <div class="col-12 col-md-6 col-lg-4 mt-4 hover">
                    <a href="{{ URL::to($categoria->url()) }}" class="plus">
                        <div class="img position-relative d-flex align-items-stretch flex-column h-100 producto--elemento producto--elemento__body">
                            @include( 'layouts.general.image' , [ 'i' => $categoria->image , 'c' => 'producto--image border-0' , 'n' => $categoria->name, 'in_div' => 1 ] )
                            <div>
                                <h5 class="producto--title text-center producto--title__marca">{{ $categoria->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>