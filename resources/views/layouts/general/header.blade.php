<header class="header">
    <div class="header--important">
        <div class="container d-flex justify-content-lg-between justify-content-md-end justify-content-end align-items-stretch">
            <div class="header--datos d-none d-lg-block">
                <ul class="list-unstyled header--list header--list__normal header--hidden header--list__separador justify-content-end align-items-center">
                    @if($elementos->phone)
                        @php
                        $phone = [];
                        foreach($elementos->phone AS $t) {
                            if ($t["in_header"]) {
                                if (!isset($phone[$t[ "tipo" ]]))
                                    $phone[$t[ "tipo" ]] = [];
                                $phone[$t[ "tipo" ]][] = $t;
                            }
                        }
                        @endphp
                        @isset($phone["tel"])
                        <li class="d-flex align-items-center">
                            <i class="footer--icon header--icon fas fa-phone-alt"></i>
                            <div class="footer--info d-flex align-items-center">
                            @for($i = 0; $i < count($phone["tel"]); $i++)
                                @if($i != 0)
                                <span class="mx-1">/</span>
                                @endif
                                @include( 'layouts.general.telefono' , [ "dato" => $phone["tel"][$i]])
                            @endfor
                            </div>
                        </li>
                        @endisset
                        @isset($phone["wha"])
                        <li class="d-flex align-items-center">
                        <i class="fab fa-whatsapp footer--icon header--icon"></i>
                            <div class="footer--info d-flex align-items-center">
                            @for($i = 0; $i < count($phone["wha"]); $i++)
                                @if($i != 0)
                                <span>/</span>
                                @endif
                                @include( 'layouts.general.telefono' , [ "dato" => $phone["wha"][$i]])
                            @endfor
                            </div>
                        </li>
                        @endisset
                    @endif
                </ul>
                <p class="header--schedule"><i class="far fa-clock footer--icon header--icon"></i>{{ $elementos->schedule }}</p>
            </div>
            <div class="header--search">
                <form action="{{ $link ? URL::to('/search') : '#' }}" method="get">
                    <button type="submit" class="btn btn-link btn-sm header--btn"><i class="fas fa-search" aria-hidden="true"></i></button>
                    <input pattern="(.|\s)*\S(.|\s)*" @if(!$link) disabled @endif type="search" required placeholder="Estoy buscando" name="s" class="header--input">
                </form>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-between align-items-end">
        <div class="header-logo d-flex align-items-center">
            @php
            $section = $elementos->sections[0];
            $class = "text-uppercase";
            for($i = 0; $i < count($section["REQUEST"]); $i++) {
                if (Request::is("{$section["REQUEST"][$i]}"))
                    $class = " active";
            }
            @endphp
            <a href="{{ $link ? URL::to("{$section['LINK']}") : '#' }}">
                @include( 'layouts.general.image' , [ 'i' => $elementos->images['logo'] , 'c' => 'd-block header--logo' , 'n' => 'Logo ' . env('APP_NAME') ] )
            </a>
        </div>
        <div id="menu-buscador">
            <div id="hamburger" class="hamburger" onclick="menuBody( this );">
                <div class="position-relative p-3">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="header--element d-none d-lg-block">
            <ul class="list-unstyled mb-0 header--list justify-content-end">
                @foreach($elementos->sections AS $section)
                    @if($section["SHOW"])
                    @php
                        $class = "header--link";
                        for($i = 0; $i < count($section["REQUEST"]); $i++) {
                            if (Request::is("{$section["REQUEST"][$i]}"))
                                $class .= " active";
                        }
                    @endphp
                    <li><a class="{{$class}}" href="{{ $link ? URL::to("{$section['LINK']}") : '#' }}">{{ $section['NAME'] }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</header>
<div id="wrapper-menu" class="position-fixed">
    <div id="hamburger-" class="hamburger position-absolute open d-none" style="right: 10px; top: 10px; z-index:111; height: 40px" onclick="menuBody( this );">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <a class="mb-4 d-inline-block" href="{{ $link ? URL::to('/') : '#' }}">
        @include( 'layouts.general.image' , [ 'i' => $elementos->images['logo'] , 'c' => 'd-block header--logo' , 'n' => 'Logo ' . env('APP_NAME') ] )
    </a>
    <ul class="list-unstyled flex-column header--list__small">
        @if($elementos->phone)
            @foreach( $elementos->phone AS $t )
                @if ($t["in_header"])
                <li class="d-flex align-items-start">
                    @if ($t[ "tipo" ] == "tel")
                        <i class="footer--icon header--icon fas fa-phone-alt"></i>
                    @else
                        <i class="fab fa-whatsapp footer--icon header--icon"></i>
                    @endif
                    <div class="footer--info">
                        @include( 'layouts.general.telefono' , [ "dato" => $t ] )
                    </div>
                </li>
                @endif
            @endforeach
        @endif
    </ul>
    <hr>
    <ul class="list-unstyled mb-0 flex-column">
        @foreach($elementos->sections AS $section)
            @php
                $class = "";
                for($i = 0; $i < count($section["REQUEST"]); $i++) {
                    if (Request::is("{$section["REQUEST"][$i]}"))
                        $class = "active";
                }
            @endphp
            <li><a class="{{$class}}" href="{{ $link ? URL::to("{$section['LINK']}") : '#' }}">{{ $section['NAME'] }}</a></li>
        @endforeach
    </ul>
</div>