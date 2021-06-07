<div class="wrapper-home bg-white">
    @include( 'layouts.general.slider' , [ 'slider' => $data[ 'slider' ] , 'sliderID' => "slider" , 'div' => 1 , 'arrow' => 0] )
    @if($data["destacado"]->isNotEmpty())
    <div class="home--destacado">
        <div class="container">
            <h2 class="home--title">Productos destacados</h2>
            <div class="row">
                <div class="col-12" id="productos">
                    @foreach($data["destacado"] AS $e)
                    @php
                    $table = $e->getTable();
                    if($table == "category") {
                        $name = $e->name;
                        $image = $e->image;
                    } else {
                        $name = $e->title;
                        $image = $e->image();
                    }
                    @endphp
                    <div class="p-2 hover">
                        <a href="{{ URL::to($e->url()) }}" class="producto--link plus">
                            <div class="img position-relative">
                                @include( 'layouts.general.image' , [ 'i' => $image , 'c' => 'producto--image', 'in_div' => 1 , 'n' => $name ] )
                            </div>
                            <p class="producto--name producto--name__little">{{ $name }}</p>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    @include( 'page.parts.home' , [ 'elementos' => $data[ 'contenido' ]->data, 'link' => 1] )
</div>
@push( "scripts" )
<script>
    init = () => {
        $('#productos').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    };
    init();
</script>
@endpush