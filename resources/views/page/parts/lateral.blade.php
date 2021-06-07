<div class="lateral sticky-top">
    <button class="btn btn-primary text-uppercase d-block d-sm-none mb-2 lateral--btn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Productos
    </button>
    <div class="sidebar collapse dont-collapse-sm" id="accordionMenu">
        <ul class="list-group list-group-flush menu-lateral">
        @foreach($elementos AS $m)
            @include("page.parts.menu", ["dato" => $m, "tipo" => 1, "padre" => null])
        @endforeach
        </ul>
    </div>
</div>