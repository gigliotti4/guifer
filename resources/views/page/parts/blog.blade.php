@php
$url = 'novedad/' . str_slug($elemento->title);
if(!empty($elemento->date))
    $url .= '__' . date('Y-m-d', strtotime($elemento->date));
$url .= '/' . $elemento->id;
@endphp
<a class="plus" href="{{ URL::to($url) }}">
    <div class="img position-relative">
        @if(!empty($elemento->date))
        @php
        $fecha = "";
        $aux = strtotime( $elemento->date );
        $mes = [
            "1" => "Ene",
            "2" => "Feb",
            "3" => "Mar",
            "4" => "Abr",
            "5" => "May",
            "6" => "Jun",
            "7" => "Jul",
            "8" => "Ago",
            "9" => "Sep",
            "10" => "Oct",
            "11" => "Nov",
            "12" => "Dic" ];
        $fecha = "<p>" . date( "d" , $aux ) . "</p><p>" . $mes[ date( "n" , $aux ) ] . "</p><p>" . date( "y" , $aux ) . "</p>";
        @endphp
        <div class="date position-absolute">{!! $fecha !!}</div>
        @endif
        @include( 'layouts.general.image' , [ 'i' => !empty( $elemento[ 'image' ] ) ? $elemento[ 'image' ][ 0 ][ 'image' ] : "" , 'n' => $elemento->title , 'c' => 'blog--image', 'in_div' => 1 ] )
    </div>
    @if( $type )
    <p class="title-category">{{ $elemento->categoria->title }}</p>
    @endif
    <h4 class="blog--title d-flex justify-content-between">{{ $elemento->title }}</h4>
    @if( $type )
    <div class="mt-2 resume">{!! $elemento->resume !!}</div>
    @endif
    <p class="mt-1 blog--more">Leer más ...</p>
</a>