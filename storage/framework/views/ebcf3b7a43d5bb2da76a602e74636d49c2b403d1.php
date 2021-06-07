<div class="wrapper-servicio pb-5 bg-white">
    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $data[ 'cabecera' ]->data[ 'header' ] , 'c' => 'cabecera' , 'in_div' => 1 , 'text' => $data[ 'servicio' ]->title ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="mt-3">
        <div class="container">
            <ol class="breadcrumb bg-transparent border-0 p-0">
                <li class="breadcrumb-item home"><a href="<?php echo e(URL::to( '/' )); ?>"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to( 'servicios' )); ?>">Servicios</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e($data[ 'servicio' ]->title); ?></li>
            </ol>
            <div class="mt-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-9">
                        <?php echo $__env->make( 'layouts.general.slider' , [ 'slider' => $data[ 'servicio' ]->image , 'sliderID' => "slider" , 'div' => 0 , 'arrow' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <h3 class="title-simple mt-4 d-flex align-items-center justify-content-between"><?php echo e($data[ 'servicio' ]->title); ?><button onclick="consulta( this , '<?php echo e("servicio/" . str_slug( $data[ "servicio" ]->title ) . "/" . $data[ "servicio" ]->id); ?>' );" class="btn btn-warning px-3 rounded-pill text-uppercase">consultar</button></h3>
                        <div class="mt-2"><?php echo $data[ 'servicio' ]->text; ?></div>
                    </div>
                </div>
                <?php if( !empty( $data[ 'servicio' ]->youtube ) ): ?>
                <div class="row mt-4 justify-content-center">
                    <div class="col-12 col-md-10 col-lg-9">
                        <iframe class="w-100 mx-auto" src="https://www.youtube.com/embed/<?php echo e($data[ 'servicio' ]->youtube); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush( "scripts" ); ?>
<script>
    consulta = ( t , u ) => {
        window.location = `${window.url_base}/${u}/consulta`;
    };
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/osolelar/hidratools_laravel/resources/views/page/servicio.blade.php ENDPATH**/ ?>