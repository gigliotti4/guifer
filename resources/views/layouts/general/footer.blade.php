<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="w-100">
                    <h3 class="footer--title">Mapa del sitio</h3>
                    <ul class="list-unstyled mb-0 footer--list footer--list__column">
                        @foreach($elementos->sections AS $section)
                            <li class="text-truncate"><a href="{{ $link ? URL::to("{$section['LINK']}") : '#' }}">{{ $section['NAME'] }}</a></li>
                        @endforeach
                    </ul>
                    @if(!empty($elementos->social_networks))
                    @php
                    $ARR_redes = [
                        "facebook" => '<i style="color: #A3A3A3; margin-right:10px; font-size: 16px;" class="fab fa-facebook-square"></i>',
                        "instagram" => '<i style="color: #A3A3A3; margin-right:10px; font-size: 16px;" class="fab fa-instagram"></i>',
                        "twitter" => '<i style="color: #A3A3A3; margin-right:10px; font-size: 16px;" class="fab fa-twitter"></i>',
                        "youtube" => '<i style="color: #A3A3A3; margin-right:10px; font-size: 16px;" class="fab fa-youtube"></i>',
                        "linkedin" => '<i style="color: #A3A3A3; margin-right:10px; font-size: 16px;" class="fab fa-linkedin-in"></i>'
                    ];
                    @endphp
                    <div class="d-flex w-100 justify-content-start flex-column" style="">
                        Seguinos
                        <div class="mt-1">
                            @foreach($elementos->social_networks AS $k => $v)
                                <a href="{{$v['url']}}" target="blank">{!! $ARR_redes[$v["redes"]] !!} {{$v["titulo"]}}</a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <a target="blank" class="header--fiscal" href="{{ asset($elementos->files['archivo']['i']) }}">
                        @include( 'layouts.general.image' , [ 'i' => $elementos->files['image'] , 'c' => '' , 'n' => 'Fiscal ' . env('APP_NAME') ] )
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg d-flex align-items-center justify-content-center">
                @include( 'layouts.general.image' , [ 'i' => $elementos->images['logoFooter'] , 'c' => 'd-block footer--logo' , 'n' => 'Logo ' . env('APP_NAME') ] )
            </div>
            <div class="col-12 col-md col-lg-3 mt-md-4 mt-lg-0">
                <h3 class="footer--title">{{ env('APP_NAME') }}</h3>
                <ul class="list-unstyled mb-0 footer--list">
                    <li class="d-flex align-items-start">
                        <i class="footer--icon fas fa-map-marker-alt"></i>
                        <div class="footer--info">
                            @include( 'layouts.general.domicilio' , [ "dato" => $elementos->domicile , "link" => 1 ] )
                        </div>
                    </li>
                    <li class="d-flex align-items-start">
                        <i class="footer--icon fas fa-phone-alt"></i>
                        <div class="footer--info">
                            @foreach( $elementos->phone AS $t )
                                @if ($t[ "tipo" ] == "tel")
                                    @include( 'layouts.general.telefono' , [ "dato" => $t ] )
                                @endif
                            @endforeach
                        </div>
                    </li>
                    <li class="d-flex align-items-start">
                        <i class="fab fa-whatsapp footer--icon"></i>
                        <div class="footer--info">
                            @foreach( $elementos->phone AS $t )
                                @if ($t[ "tipo" ] == "wha")
                                    @include( 'layouts.general.telefono' , [ "dato" => $t ] )
                                @endif
                            @endforeach
                        </div>
                    </li>
                    <li class="d-flex align-items-start">
                        <i class="footer--icon far fa-envelope"></i>
                        <div class="footer--info">
                            @foreach( $elementos->email as $e )
                                <p class="text-truncate">@include( 'layouts.general.email' , [ "dato" => $e ] )</p>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="osole py-3">
        <div class="container">
            <div class="row by">
                <div class="col-12">
                    <p class="mb-0 d-flex">
                        <span class="mr-3">© {{ env('APP_YEAR') }}</span>
                        <a target="_blank" href="{{ env('APP_UAUTHOR') }}" style="color:inherit" class="right text-uppercase">by {{ env('APP_AUTHOR') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>