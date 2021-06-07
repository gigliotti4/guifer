<div class="wrapper-videos bg-white pb-5">
    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $data[ 'cabecera' ]->data[ 'header' ] , 'c' => 'cabecera' , 'in_div' => 1 , 'text' => 'VIDEOS' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container py-5">
        <h3 class="title text-uppercase">VIDEOS EXPLICATIVOS</h3>
        <div class="row">
            <?php $__currentLoopData = $data[ "videos" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 col-md-4 mt-3">
                <iframe class="w-100" src="https://www.youtube.com/embed/<?php echo e($v->url); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p class="p-2 mt-n2"><?php echo e($v->title); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH /home/osolelar/hidratools_laravel/resources/views/page/videos.blade.php ENDPATH**/ ?>