<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo e($data['metadato']['description']); ?>"/>
        <meta name=”keywords” content="<?php echo e($data['metadato']['keywords']); ?>"/>
        <?php
        $t = config( 'app.name' );
        if( strpos($data[ 'title' ],$t) !== false )
            $t = $data[ 'title' ];
        else
            $t .= ' :: ' . $data[ 'title' ];
        ?>
        <title><?php echo $__env->yieldContent( 'headTitle' , $t ); ?></title>
        <?php if( !empty( $data[ "empresa" ][ "images" ][ "favicon" ] ) ): ?>
            <?php switch( $data[ "empresa" ][ "images" ][ "favicon" ][ "i" ] ):
                case ("png"): ?>
                    <link rel="icon" type="image/png" href="<?php echo e(asset($data[ 'empresa' ]->images[ 'favicon' ][ 'i' ] )); ?>" />
                    <?php break; ?>
                <?php case ("svg"): ?>
                    <link rel="icon" href="<?php echo e(asset($data[ 'empresa' ]->images[ 'favicon' ][ 'i' ] )); ?>" type="image/svg+xml" />
                    <?php break; ?>
                <?php default: ?>
                    <link rel="shortcut icon" href="<?php echo e(asset( $data[ 'empresa' ]->images[ 'favicon' ][ 'i' ] )); ?>" />
            <?php endswitch; ?>
        <?php endif; ?>
        <!-- <Styles> -->
        <?php echo $__env->make( 'layouts.general.css' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/loading.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/loading-btn.css')); ?>">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
        <link href="<?php echo e(asset('css/css.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/page/page.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/page/header.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/page/footer.css')); ?>" rel="stylesheet">
        <?php echo $__env->yieldPushContent( 'styles' ); ?>
        <!-- </Styles> -->
        <!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '166936041420899');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=166936041420899&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Facebook Pixel Code -->  
    </head>
    <style>
    .modal-backdrop {
        z-index: -1;
    }
    </style>
    <body>
        <div class="modal fade bd-example-modal-lg" id="terminosModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title"><?php echo e($data[ "terminos" ]->contents[ "title" ]); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo $data[ "terminos" ]->contents[ "text" ]; ?>

                    </div>
                </div>
            </div>
        </div>
        <div id="wrapper-menu" class="position-fixed">
            <div id="hamburger-" class="hamburger position-absolute open d-none" style="right: 10px; top: 10px; z-index:111; height: 40px" onclick="menuBody( this );">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="container py-0">
                <?php
                $url = URL::to('/');
                if(auth()->guard('client')->check())
                    $url = URL::to('cliente/descargas');
                ?>
                <a href="<?php echo e($url); ?>">
                    <img onError="this.src='<?php echo e(asset('images/general/no-img.png')); ?>'" src="<?php echo e(asset($data['empresa']->images['logo']['i'])); ?>?t=<?php echo time(); ?>" />
                </a>
            </div>
            <div class="container">
                <ul class="list-group list-group-flush mb-0 bg-transparent">
                <?php if(auth()->guard('client')->check()): ?>
                    <?php
                    $flag = false;
                    if( Request::is( "cliente/descarga*" ) )
                        $flag = true;
                    ?>
                    <li class="list-group-item border-0 bg-transparent"><a <?php if( $flag ): ?> class="active" <?php endif; ?> href="<?php echo e(URL::to( 'cliente/descargas' )); ?>">Descargas</a></li>
                    <?php
                    $flag = false;
                    if( Request::is( "cliente/datos*" ) )
                        $flag = true;
                    ?>
                    <li class="list-group-item border-0 bg-transparent"><a <?php if( $flag ): ?> class="active" <?php endif; ?> href="<?php echo e(URL::to( 'cliente/datos' )); ?>">Mis datos</a></li>
                <?php else: ?>
                    <?php $__currentLoopData = $data[ "empresa" ]->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $flag = false;
                        for( $i = 0 ; $i < count( $s[ "REQUEST" ] ) ; $i++ ) {
                            if( Request::is( "{$s[ 'LINK' ][ $i ]}*" ) )
                                $flag = true;
                        }
                        ?>
                        <li class="list-group-item border-0 bg-transparent"><a <?php if( $flag ): ?> class="active" <?php endif; ?> href="<?php echo e(URL::to( $s[ 'LINK' ] )); ?>"><?php echo e($s[ 'NAME' ]); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <li class="list-group-item border-0 bg-transparent"><a href="#" data-toggle="modal" data-target="#search__modal">Buscar</a></li>
                </ul>
            </div>
        </div>
        <?php echo $__env->make( 'layouts.general.message' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="wrapper-body">
            <?php echo $__env->make( 'layouts.general.header' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <section>
            <div class="download position-fixed text-center">
                <p><i class="fas fa-download mr-2"></i>Descargar catálogo</p>
                <div class="d-flex">
                    <?php $__currentLoopData = $data[ "descarga_publica" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $file = null;
                    if( !empty( $d->file ) )
                        $file = $d->file[ 0 ][ 'file' ][ 'i' ];
                    ?>
                    <a href="<?php echo e(asset( $file )); ?>" download class="d-inline-block px-2"><?php echo e($d->name); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php echo $__env->make( $data[ 'view' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </section>
            <?php echo $__env->make( 'layouts.general.footer' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- Scripts -->
        <?php echo $__env->make( 'layouts.general.script' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Código de instalación Cliengo para  www.hidratools.com -->
        <script type="text/javascript">(function () {
            var ldk = document.createElement('script');
            ldk.type = 'text/javascript';
            ldk.async = true;
            ldk.src = 'https://s.cliengo.com/weboptimizer/5cfee268e4b0e439bc1d44f6/5cfee269e4b0e439bc1d44f9.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ldk, s);
        })();</script>
        <script>
            window.url = "<?php echo e(url()->current()); ?>";
            window.url_base = "<?php echo e(URL::to( '/' )); ?>";
            $( () => {
                $('#search__modal').on('shown.bs.modal', function (e) {
                    if(window.typeMENU !== undefined)
                        menuBody(null);
                });
                $( ".carousel-caption .texto" ).css( {
                    marginTop: $("header").height()
                } );
                $( "#accordionMenu a").on( "click" , ( e ) => {
                    $(this).parent().stopPropagation();
                });
                $( ".dropdown-menu" ).click( ( e ) => {
                    e.stopPropagation();
                });
                $(window).resize(() => {
                    $( ".carousel-caption .texto" ).css( {
                        marginTop: $( "header" ).height()
                    } );
                });
            });
        </script>
        <?php echo $__env->yieldPushContent( 'scripts' ); ?>
        <script src="<?php echo e(asset('js/bootstrap-autocomplete.js')); ?>"></script>
    </body>
</html><?php /**PATH /home/pablo/Escritorio/hidratools/resources/views/layouts/main.blade.php ENDPATH**/ ?>