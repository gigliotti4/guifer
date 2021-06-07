<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
    </head>
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
        <?php echo $__env->make( 'layouts.general.message' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="wrapper-body">
            <?php echo $__env->make( 'layouts.general.header' , [ 'elementos' => $data[ 'empresa' ], 'link' => 1, 'idioma' => App::getLocale() ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <section>
            <?php echo $__env->make( $data[ 'view' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </section>
            <?php echo $__env->make( 'layouts.general.footer' , [ 'elementos' => $data[ 'empresa' ], 'link' => 1, 'idioma' => App::getLocale() ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- Scripts -->
        <?php echo $__env->make( 'layouts.general.script' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
</html><?php /**PATH /home/pablo/Escritorio/guifer2/resources/views/layouts/main.blade.php ENDPATH**/ ?>