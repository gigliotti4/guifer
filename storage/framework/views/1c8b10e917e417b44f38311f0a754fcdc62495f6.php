<div class="container">
    <h3 class="title text-uppercase mb-5">Seleccione un servicio</h3>
    <div class="row mt-n5">
        <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $url = URL::to( 'servicio/' . str_slug( $s->title ) . '/' . $s->id );
        if( !$link )
            $url = "#";
        ?>
        <div class="col-12 col-md-4 d-flex align-items-stretch mt-5">
            <div class="card border-0 w-100 hover">
                <a href="<?php echo e($url); ?>" class="d-block plus">
                    <div class="img">
                        <?php echo $__env->make( 'layouts.general.image' , [ 'i' => !empty( $s->image ) ? $s->image[ 0 ][ "image" ] : "" , 'c' => 'card-img-top' , 'n' => $s->title ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="card-body border-0 p-0">
                        <h5 class="card-title d-flex justify-content-between text-dark p-2"><?php echo e($s->title); ?></h5>
                        <div class="card-text"><?php echo $s->resume; ?></div>
                    </div>
                </a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH /home/osolelar/hidratools_laravel/resources/views/page/parts/servicios.blade.php ENDPATH**/ ?>