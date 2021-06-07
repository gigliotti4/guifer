<div class="modal  bd-example-modal-lg fade" id="modal-zoom" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <img src="" alt="" class="w-100" id="img-zoom">
            </div>
            <div class="modal-footer">
                <div class="w-100 text-center" id="text-zoom"></div>    
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" role="dialog" id="modal-consulta">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="formContacto" onsubmit="event.preventDefault(); enviar( this )" method="post" class="wrapper-contacto">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" name="elementos[producto]" value="Producto">
                    <input type="hidden" name="elementos[nombre]" value="Nombre">
                    <input type="hidden" name="elementos[email]" value="Email">
                    <input type="hidden" name="elementos[telefono]" value="Teléfono">
                    <input type="hidden" name="elementos[empresa]" value="Empresa">
                    <input type="hidden" name="elementos[mensaje]" value="Mensaje">

                    <div class="d-flex align-items-center mb-3">
                        <label class="mr-2 mb-0">Modelo a consultar: <strong id="producto-name"></strong></label>
                        <input type="hidden" name="producto" value="" id="producto"/>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 col-md">
                            <input placeholder="Ingrese Nombre (*)" required type="text" id="nombre" name="nombre" class="form-control" value="<?php echo e(old('nombre')); ?>">
                        </div>
                        <div class="col-12 col-md">
                            <input placeholder="Ingrese Correo electrónico (*)" required type="email" id="email" name="email" class="form-control" value="<?php echo e(old('nombre')); ?>">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 col-md">
                            <input placeholder="Ingrese Teléfono" type="phone" id="telefono" name="telefono" class="form-control" value="<?php echo e(old('telefono')); ?>">
                        </div>
                        <div class="col-12 col-md">
                            <input placeholder="Ingrese Empresa" type="text" id="empresa" name="empresa" class="form-control" value="<?php echo e(old('empresa')); ?>">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <textarea rows="10" placeholder="Escriba su mensaje (*)" required id="mensaje" name="mensaje" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary px-4 rounded-pill text-uppercase" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-warning px-4 rounded-pill">Enviar<i class="fas fa-angle-right ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="wrapper-productos bg-white pb-5">
    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $data[ 'cabecera' ]->data[ 'header' ] , 'c' => 'cabecera' , 'in_div' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container pt-3">
        <ol class="breadcrumb bg-transparent border-0 p-0">
            <li class="breadcrumb-item home"><a href="<?php echo e(URL::to( '/' )); ?>"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to( 'productos' )); ?>">Productos</a></li>
            <li class="breadcrumb-item breadcrumb-name"><a href="<?php echo e(URL::to( 'productos/' . str_slug( $data[ 'categoria' ]->title ) . '/' . $data[ 'categoria' ]->id )); ?>"><?php echo e($data[ 'categoria' ]->title); ?></a></li>
            <?php if( isset( $data[ 'subcategoria' ] ) ): ?>
                <?php if( strcasecmp( $data[ 'subcategoria' ]->title , $data[ 'producto' ]->title ) != 0 ): ?>
                <li class="breadcrumb-item breadcrumb-name"><a href="<?php echo e(URL::to( 'productos/' . str_slug( $data[ 'categoria' ]->title ) . '/' . $data[ 'categoria' ]->id . '/' . str_slug( $data[ 'subcategoria' ]->title ) . '/' . $data[ 'subcategoria' ]->id )); ?>"><?php echo e($data[ 'subcategoria' ]->title); ?></a></li>
                <?php endif; ?>
            <?php endif; ?>
            <li class="breadcrumb-item breadcrumb-name active" aria-current="page"><?php echo e($data[ 'producto' ]->title); ?></li>
        </ol>
        <div class="row mt-5">
            <div class="col-12 col-md-4 col-lg-3 menu-lateral pb-5">
                <?php echo $__env->make( 'page.parts.menu' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-12 col-md-8 col-lg-9 ficha" id="ficha-print">
                <div class="row">
                    <div class="col-12 col-md slider zoom">
                        <?php echo $__env->make( 'layouts.general.slider' , [ 'slider' => $data[ 'producto' ]->images , 'sliderID' => "slider" , 'div' => 0 , 'arrow' => 1 , 'f' => 'zoom( this )' , 'n' => $data[ 'producto' ]->title ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-12 col-md-7 descripcion">
                        <h4 class="subtitle"><?php echo e($data[ 'producto' ]->subtitle); ?></h4>
                        <h2 class="title"><?php echo e($data[ 'producto' ]->title); ?></h2>
                        <div class="my-3"><?php echo $data[ 'producto' ]->descripcion; ?></div>
                        <div class="d-flex justify-content-between buttons-producto">
                            <?php if( !empty( $data[ 'producto' ]->manual ) ): ?>
                            <a href="<?php echo e(asset( $data[ 'producto' ]->manual[ 'i' ] )); ?>" download class="btn btn-outline-warning px-3 rounded-pill text-uppercase mr-2">manual de uso</a>
                            <?php endif; ?>
                            <?php if( !empty( $data[ 'producto' ]->ficha ) ): ?>
                            <a href="<?php echo e(asset( $data[ 'producto' ]->ficha[ 'i' ] )); ?>" class="btn btn-outline-warning px-3 rounded-pill text-uppercase mr-2">ficha pdf<i class="fas fa-arrow-alt-circle-down ml-2"></i></a>
                            <?php endif; ?>
                            <button onclick="ficha( this );" class="btn btn-outline-warning px-3 rounded-pill text-uppercase">generar ficha</button>
                            <button onclick="consulta( this , '<?php echo e(str_slug( $data[ "producto" ]->title ) . "/" . $data[ "producto" ]->id); ?>' );" class="btn btn-warning px-3 rounded-pill text-uppercase">consultar</button>
                        </div>
                    </div>
                </div>
                <?php if( !empty( $data[ 'producto' ]->youtube ) ): ?>
                <div class="row my-5 youtube">
                    <div class="col-12 col-md-5 d-flex align-items-center">
                        <div>
                            <p class="mb-3">Para más información, mire el video a continuación</p>
                            <p class="mb-2">Seguinos en nuestro canal de YouTube</p>
                            <p><i class="fab fa-youtube mr-2"></i><a href="https://www.youtube.com/channel/UCh-Nt6hzTiLAp0Q25MeGlKw" target="blank">Hidratools Herramientas</a></p>
                        </div>
                    </div>
                    <div class="col-12 col-md-7">
                        <iframe class="w-100" style="height: 300px" src="https://www.youtube.com/embed/<?php echo e($data[ 'producto' ]->youtube); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <?php endif; ?>
                <?php if( !empty( $data[ 'producto' ]->utilidad ) ): ?>
                <div class="row my-5">
                    <div class="col-12 utilidades">
                        <h3 class="title text-uppercase mb-2">utilidades</h3>
                        <?php echo $data[ 'producto' ]->utilidad; ?>

                    </div>
                </div>
                <?php endif; ?>
                <?php if( !empty( $data[ 'producto' ]->caracteristicas ) ): ?>
                <div class="row mt-2 caracteristicas mt-n3">
                    <?php for( $c = 0 ; $c < count( $data[ 'producto' ]->caracteristicas ) ; $c++ ): ?>
                    <div class="col-12 col-md-4 mt-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $data[ 'producto' ]->caracteristicas[ $c ][ 'image' ] , 'n' => 'Características #' . ( $i + 1 ) ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="ml-2"><?php echo $data[ 'producto' ]->caracteristicas[ $c ][ 'text' ]; ?></div>
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>
                <?php endif; ?>
                <?php if( !empty( $data[ 'producto' ]->text ) ): ?>
                <div class="row my-5">
                    <div class="col-12 text">
                        <div>
                            <?php echo $data[ 'producto' ]->text; ?>

                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if( !empty( $data[ 'producto' ]->planos ) ): ?>
                <div class="row mb-5">
                    <div class="col-12 planos zoom">
                        <h3 class="title text-uppercase mb-2">planos</h3>
                        <?php for( $c = 0 ; $c < count( $data[ 'producto' ]->planos ) ; $c++ ): ?>
                            <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $data[ 'producto' ]->planos[ $c ][ 'image' ] , 'n' => 'Plano #' . ( $c + 1 ) , 'f' => 'zoom( this )' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endfor; ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php if( !empty( $data[ 'producto' ]->accesorios ) ): ?>
                <div class="row mb-5">
                    <div class="col-12 accesorios">
                        <h3 class="title text-uppercase mb-2">accesorios</h3>
                        <div class="row mt-n3">
                            <?php for( $c = 0 ; $c < count( $data[ 'producto' ]->accesorios ) ; $c++ ): ?>
                                <div class="col-12 col-md-4 mt-3">
                                    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $data[ 'producto' ]->accesorios[ $c ][ 'image' ] , 'c' => 'w-100 mb-1' , 'n' => $data[ 'producto' ]->accesorios[ $c ][ 'title' ] ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <h5 class="title"><?php echo e($data[ 'producto' ]->accesorios[ $c ][ 'title' ]); ?></h5>
                                    <div class="mt-2"><?php echo $data[ 'producto' ]->accesorios[ $c ][ 'text' ]; ?></div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div id="print">
    <div class="page-header">
        <div>
            <img id="img-logo" src="<?php echo e(asset( $data[ 'empresa' ]->images[ 'logo' ][ 'i' ] )); ?>">
            <?php if( empty( $data[ 'producto' ]->categoria->categoria_id ) ): ?>
                <img id="img-marca" src="<?php echo e(asset( $data[ 'producto' ]->categoria->logo[ 'i' ] )); ?>">
            <?php else: ?>
                <img id="img-marca" src="<?php echo e(asset( $data[ 'producto' ]->categoria->categoria->logo[ 'i' ] )); ?>">
            <?php endif; ?>
        </div>
    </div>
    <div class="page-header-space"></div>
    <div class="page-footer-space"></div>
    <div class="page-footer text-center"> <div></div></div>
</div>
<?php $__env->startPush( "scripts" ); ?>
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo e($data[ 'empresa' ]->captcha[ 'public' ]); ?>"></script>
<script>
    enviar = ( t ) => {
        let url = t.action;
        let method = t.method;
        let idForm = t.id;
        let formElement = document.getElementById( idForm );
        let formData = new FormData( formElement );
        grecaptcha.ready(function() {
            $( ".form-control" ).prop( "readonly" , true );
            Toast.fire({
                icon: 'warning',
                title: 'Espere, enviando'
            });
            grecaptcha.execute("<?php echo e($data[ 'empresa' ]->captcha[ 'public' ]); ?>", {action: 'contact'}).then( function( token ) {
                formData.append( "token", token );
                axios({
                    method: method,
                    url: url,
                    data: formData,
                    responseType: 'json',
                    config: { headers: {'Content-Type': 'multipart/form-data' }}
                })
                .then((res) => {
                    $( ".form-control" ).prop( "readonly" , false );
                    if( parseInt( res.data.estado ) ) {
                        $( ".form-control" ).val( "" );
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
            });
        });
    };
    string_to_slug = ( str ) => {
        str = str.replace(/^\s+|\s+$/g, '');
        str = str.toLowerCase();
        let from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
        let to   = "aaaaeeeeiiiioooouuuunc------";
        for ( let i=0, l=from.length ; i<l ; i++ )
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));

        str = str.replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');

        return str;
    }
    ficha = ( t ) => {
        window.print();
    };
    consulta = ( t , u ) => {
        window.location = `${window.url_base}/consulta/${u}`;
    };
    consultar = ( t ) => {
        let modelo = $( t ).closest( "tr" ).find( "td:first-child" ).text();
        let index = $( t ).closest( "tr" ).index();
        let nombre = "";
        $( ".breadcrumb-name" ).each( function( x ) {
            if( nombre != "" )
                nombre += " / ";
            nombre += $( this ).text();
        } );
        nombre += ` / ${modelo}`;
        $( "#producto-name" ).text( nombre );
        $( "#producto" ).val( nombre );
        $( "#modal-consulta" ).modal( "show" );
        //window.location = `${$( "#name-completo" ).val()}/${index}/${string_to_slug( modelo )}`;
    };
    zoom = ( x ) => {
        let txt = $( x ).prop( "alt" );
        let src = $( x ).prop( "src");
        $( "#img-zoom" ).prop( "src" , src );
        $( "#text-zoom" ).text( txt );
        $( "#modal-zoom" ).modal( "show" );
    };
    init = ( callbackOK ) => {
        $( ".text table thead tr:first-child" ).append( `<th rowspan="${$( ".text table thead tr" ).length}" class="td-not">-</th>` );
        $( ".text table tbody tr" ).each( function( x ) {
            $( this ).append( '<td class="td-not"><button onclick="consultar( this );" class="btn rounded-pill px-4 btn-warning">Consultar</button></td>' )
        } );
        callbackOK.call( this , null );
    };
    init( () => {} );
</script>
<?php $__env->stopPush(); ?><?php /**PATH C:\Users\Pablo\Desktop\Laravel\hidratools\resources\views/page/producto.blade.php ENDPATH**/ ?>