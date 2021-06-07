@if(!empty($slider))
<div id="{{ $sliderID }}" class="carousel slide wrapper-slider" data-ride="carousel">
    <ol class="carousel-indicators">
        @for($i = 0 ; $i < count( $slider ) ; $i++)
            <li data-target="#{{ $sliderID }}" data-slide-to="{{$i}}" @if( $i == 0 ) class="active" @endif></li>
        @endfor
    </ol>
    <div class="carousel-inner">
        @for( $i = 0 ; $i < count( $slider ) ; $i++ )
        <div class="carousel-item @if( $i == 0 ) active @endif">
            @php
            try {
                $img = $slider[ $i ]->image;
                if( gettype( $img ) != "string" )
                    $img = $slider[ $i ]->image[ 'i' ];
            } catch (\Throwable $th) {
                $img = $slider[ $i ];
                if(isset($slider[ $i ][ "image" ]))
                    $img = $slider[ $i ][ "image" ];
                if( gettype( $img ) != "string" )
                    $img = $slider[ $i ][ 'image' ][ 'i' ];
            }
            try {
                $text = $slider[$i]->text;
            } catch (\Throwable $th) {
                $text = "";
            }
            if(!isset($class))
                $class = "img";
            @endphp
            @if($div)
                <div class="{{ $class }}" style="background-image: url('{{ asset($img) }}');" >
                    @if(!empty($slider[$i]->text))
                    <div class="carousel-caption position-absolute w-100" style="top: 0; left: 0;">
                        <div class="container position-relative h-100 w-100 d-flex align-items-center justify-content-center">
                            <div class="texto">
                                {!! $text !!}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            @else
                @php
                $arr = ['i' => $img, 'c' => 'w-100 d-block', 'n' => 'Slider #' . ( $i + 1 ), 'f' => null];
                if (isset($f))
                    $arr['f'] = $f;
                if (isset($n))
                    $arr['n'] = $n . ' #' . ( $i + 1 );
                @endphp
                @include('layouts.general.image', $arr)
                @if(!empty($text))
                <div class="carousel-caption position-absolute w-100" style="top: 0; left: 0;">
                    <div class="container position-relative h-100 w-100 d-flex align-items-center justify-content-center">
                        <div class="texto">
                            {!! $text !!}
                        </div>
                    </div>
                </div>
                @endif
            @endif
        </div>
        @endfor
    </div>
    @if($arrow)
    <a class="carousel-control-prev" href="#{{ $sliderID }}" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#{{ $sliderID }}" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    @endif
</div>
@endif