<div class="modal" id="modalExcel" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal--title__file"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('productos.all') }}" onsubmit="event.preventDefault(); update( this )" id="formUpdate" method="post">
                <div class="modal-body">
                    <p class="text-danger text-center"><i class="fas fa-exclamation-triangle"></i> No cambie las cabeceras de la tabla</p>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <th>codigo</th>
                                <th>destacado</th>
                                <th>ficha</th>
                                <th>plano</th>
                                <th>titulo</th>
                                <th>subtitulo</th>
                                <th>descripcion</th>
                                <th>palabras</th>
                                <th>img1</th>
                                <th>img2</th>
                                <th>img3</th>
                                <th>img4</th>
                                <th>img5</th>
                                <th>tabla</th>
                                <th>filas</th>
                                <th>fila1</th>
                                <th>fila2</th>
                                <th>fila3</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>AA</td>
                                    <td>1 o 0</td>
                                    <td>ficha.pdf</td>
                                    <td>plano.jpg</td>
                                    <td>Título del producto</td>
                                    <td>Subtitulo del producto, puede ser opcional</td>
                                    <td>Descripción del producto</td>
                                    <td>Palabras claves, separadas, por, coma</td>
                                    <td>img1.jpg</td>
                                    <td>img2.jpg</td>
                                    <td>img3.jpg</td>
                                    <td>img4.jpg</td>
                                    <td>img5.jpg</td>
                                    <td>cabecera 1;cabecera 2;cabecera 3</td>
                                    <td>3</td>
                                    <td>fila 1.1;fila 1.2;fila 1.3</td>
                                    <td>fila 2.1;fila 2.2;fila 2.3</td>
                                    <td>fila 3.1;fila 3.2;fila 3.3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal--modelo my-3">
                        <a href="{{ asset('modelo.xlsx') }}" download class="btn btn-link">Modelo para carga<i class="fas fa-download ml-2"></i></a>
                        <ul>
                            <li><i class="fas fa-folder-open"></i> las imágenes deben estar sueltas en la carpeta <strong><a target="blank" href="{{ asset('images/productos') }}">images/productos</a></strong></li>
                            <li><i class="fas fa-folder-open"></i> las fichas deben estar sueltas en la carpeta <strong><a target="blank" href="{{ asset('fichas') }}">fichas</a></strong></li>
                            <li><i class="fas fa-folder-open"></i> los planos deben estar sueltos en la carpeta <strong><a target="blank" href="{{ asset('images/planos') }}">images/planos</a></strong></li>
                        </ul>
                        <p class="text-muted">Todos los archivos subidos por FTP, respete la extensión que haya puesto en el archivo</p>
                        <hr>
                        <h3 class="text-center">Tabla</h3>
                        <p><strong>Tabla</strong>: la cabecera de la misma, separando los elementos con ;</p>
                        <p><strong>Filas</strong>: cantidad de filas de la tabla; las posteriores columnas contendrán los datos de esa línea, separando los elementos con ;</p>
                    </div>
                    <input type="hidden" name="category_id" value="" id="category_id" class="form-control">
                    <input required accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" type="file" name="file" placeholder="Archivo de carga" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Cargar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<section class="my-3">
    <div class="container-fluid">
        @include( 'layouts.general.form' , [ 'buttonADD' => 1 , 'form' => 1 , 'close' => 1 , 'modal' => 1 , "buttons" => [ [ "i" => "fas fa-file-excel" , "t" => "Productos" , "b" => "btn-primary"] ] ])
        @include( 'layouts.general.table', [
            "paginate" => $data["elementos"],
            "form" => [
                "url" => Route("categorias.index"),
                "placeholder" => "Buscar en Nombre",
                "search" => isset($data["search"]) ? $data["search"] : null
            ]
        ])
    </div>
</section>
@push('scripts')
<script>
    window.pyrus = new Pyrus("categoria", null, src);
    update = ( t ) => {
        let url = t.action;
        let method = t.method;
        let idForm = t.id;
        let formElement = document.getElementById( idForm );
        let formData = new FormData( formElement );
        Toast.fire({
            icon: 'warning',
            title: 'Espere. Actualizando'
        });
        axios({
            method: method,
            url: url,
            data: formData,
            responseType: 'json',
            config: { headers: {'Content-Type': 'multipart/form-data' }}
        })
        .then((res) => {
            $(t).find(".form-control").prop( "readonly" , false );
            if( parseInt( res.data.estado ) ) {
                $("#modalExcel").modal("hide");
                Toast.fire({
                    icon: 'success',
                    title: res.data.mssg
                });
            } else
                Toast.fire({
                    icon: 'error',
                    title: res.data.mssg
                });
        })
        .catch((err) => {
            Toast.fire({
                icon: 'error',
                title: 'Ocurrió un error'
            });
        })
        .then(() => {});
    };
    productosFunction = (t, id) => {
        let modal = $("#modalExcel");
        const target = t.closest("tr");
        const name = target.querySelector("td:nth-child(2)").textContent;
        document.querySelector("#category_id").value = id;
        document.querySelector("#modal--title__file").textContent = "Archivo XLS: " + name;
        modal.modal("show");
    };
    /** -------------------------------------
     *      INICIO
     ** ------------------------------------- */

    init = ( callbackOK , table = true , type = "table" , without = false ) => {
        let h = window.pyrus.formulario();

        $( "#form .modal-body" ).html( h );
        $( "#wrapper-tabla > div.card-body" ).html( window.pyrus.table( [ { NAME:"ACCIONES" , COLUMN: "acciones" , CLASS: "text-center" , WIDTH: "150px" } ] ) );
        window.pyrus.editor( CKEDITOR );
        window.pyrus.elements( $( "#tabla" ) , url_simple , window.data.elementos , [ "e" , "d" ], [ { icon : '<i class="fas fa-file-excel"></i>' , class: 'btn-primary', title: 'Productos' , function : 'productos' } ]);
        callbackOK.call( this , null );
    };
    init( () => {} );

    $('#modalExcel').on('hidden.bs.modal', function (e) {
        const inputs = e.target.querySelectorAll(".form-control");
        Array.prototype.forEach.call(inputs, input => {
            input.value = "";
        });
    })
</script>
@endpush