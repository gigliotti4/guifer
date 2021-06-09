<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('headTitle'); ?></title>
    <link href="<?php echo e(asset('favicon.png')); ?>" rel="icon" type="image/png">
    <link href="<?php echo e(asset('css/adm/login.css')); ?>" rel="stylesheet">
    <?php echo $__env->make('layouts.general.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <?php echo $__env->make('layouts.general.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('layouts.general.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        window.url = "<?php echo e(url()->current()); ?>";
        window.usr_data = <?php echo json_encode( Auth::user() , 15, 512) ?>;
        const src = "<?php echo e(asset('images/no-img.png')); ?>";
        const url_simple = `<?php echo e(URL::to('/')); ?>`;
        <?php if(isset( $data )): ?>
        window.data = <?php echo json_encode($data, 15, 512) ?>;
        if( window.data.url !== undefined )
            window.url = window.data.url;
        <?php endif; ?>
        $( () => {
            $( '[data-toggle="tooltip"]' ).tooltip();
            if( localStorage.sidebar !== undefined )
                $( "#btnMenu" ).click();

            if( $( "#sidebar" ).find( `a[href="${window.url}"]` ).data( "link" ) == "u" ) {
                $( "#sidebar" ).find( `a[href="${window.url}"]` ).addClass( "active" );
                $( "#sidebar" ).find( `a[href="${window.url}"]` ).closest( "ul" ).addClass( "show" );
                $( "#sidebar" ).find( `a[href="${window.url}"]` ).closest( "ul" ).prev().attr( "aria-expanded" , true ).parent().addClass( "active" );
            } else
                $( "#sidebar" ).find( `a[href="${window.url}"]` ).parent().addClass( "active" );
        } );
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\guifer\resources\views/layouts/app.blade.php ENDPATH**/ ?>