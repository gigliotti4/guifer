<li class="list-group-item p-0" id="heading_{{ $tipo }}_{{ $dato->id }}">
    @php
    $class = "d-flex align-items-center justify-content-between lateral--element";
    $expanded = "true";
    if(isset($data[ "category_id" ])) {
        if( $dato->id != $data[ "category_id" ] ) {
            $class .= " collapsed";
            $expanded = "false";
        }
    } else
        $expanded = "false";
    @endphp
    <div class="{{ $class }}" data-toggle="collapse" data-target="#collapse_{{ $tipo }}_{{ $dato->id }}" aria-expanded="{{ $expanded }}">
        @php
        $nombre = $dato->name;
        $url = $dato->url();
        if(!$link)
            $url = "#";
        @endphp
        <a class="p-3 d-inline-block" href="{{ URL::to($url) }}">
            {{ $nombre }}
        </a>
    </div>
    {{--@if( $familias->isNotEmpty() )
        @if( $familias->isNotEmpty() )
        <i class="fas fa-angle-right mr-3"></i>
        @endif
        @php
        $class = "list-group pl-4 collapse";
        if(isset($data[ "marca_id" ])) {
            if( $dato->getTable() != "marcas" ) {
                if( isset( $data[ 'Arr_menu' ] ) ) {
                    if( in_array( $dato->id , $data[ 'Arr_menu' ] ) )
                        $class .= " show";
                }
            } elseif( $dato->id == $data[ "marca_id" ] )
                $class .= " show";
        }
        @endphp
        <ul class="{{ $class }}" id="collapse_{{ $tipo }}_{{ $dato->id }}"  aria-labelledby="heading_{{ $tipo }}_{{ $dato->id }}" data-parent="@if( $tipo == 1 ) #accordionMenu @else #heading_{{ $tipo }}_{{ $dato->id }} @endif">
        @foreach ($familias AS $f )
            @include('page.parts.menu', [ 'dato' => $f , "tipo" => 0 , "padre" => $dato ])
        @endforeach
        </ul>
    @endif--}}
</li>