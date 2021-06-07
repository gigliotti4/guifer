<div class="wrapper-videos">
    <h3 class="blogs--title blogs--title__lateral">Categorías</h3>
    <ul class="list-group blogs--categorias">
        @foreach( $data["elementos"][ "blog_categorias" ] AS $c )
        <li class="list-group-item border-0 d-flex justify-content-between"><a href="{{ URL::to( 'novedades/' . str_slug($c->title) . '/' . $c->id ) }}">{{ $c->title }}</a><span class="badge badge-pill badge-warning categoria--count">{{ $c->blogs()->count() }}</span></li>
        @endforeach
    </ul>
</div>
@if($data[ "empresa" ]->social_networks)
<div class="wrapper-redes mt-5">
    <h3 class="blogs--title blogs--title__lateral">Redes Sociales</h3>
    @php
    $social_networks = [
        'instagram' => '<i class="fab fa-instagram"></i>',
        'linkedin' => '<i class="fab fa-linkedin-in"></i>',
        'youtube' => '<i class="fab fa-youtube"></i>',
        'facebook' => '<i class="fab fa-facebook-f"></i>',
        'twitter' => '<i class="fab fa-twitter"></i>',
        'pinterest' => '<i class="fab fa-pinterest-p"></i>'
    ];
    @endphp
    <div class="d-flex ml-n3 justify-content-center mt-4">
        @foreach( $data[ "empresa" ]->social_networks AS $k => $red )
        <a class="ml-3 social-networks" href="{{ $red[ 'url' ] }}" target="_blank" rel="noopener noreferrer" title="{{ $red[ 'titulo' ] }}">{!! $social_networks[ $red[ 'redes' ] ] !!}</a>
        @endforeach
    </div>
</div>
@endif