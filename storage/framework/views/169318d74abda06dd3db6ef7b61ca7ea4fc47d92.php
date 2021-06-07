<div class="galeria py-5">
    <div class="container">
        <?php if($data["elementos"]["image"]->isNotEmpty()): ?>
        <h2 class="title--important mb-3"><?php echo e(translate("link_galeria", App::getLocale())); ?></h2>
        <div class="row mt-n4">
            <?php $__currentLoopData = $data["elementos"]["image"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-6 col-lg-4 mt-4">
                    <div class="card">
                        <div class="card-body p-0">
                            <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $galeria->image , 'c' => 'img-fluid' , 'n' => 'Imagen' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php if(!empty($galeria->nombre)): ?>
                            <div class="galeria--descripcion">
                                <?php echo e($galeria->nombre); ?>

                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <hr class="my-5">
        <?php endif; ?>
        <?php if($data["elementos"]["video"]->isNotEmpty()): ?>
        <h2 class="title--important mb-3"><?php echo e(translate("label_videos", App::getLocale())); ?></h2>
        <div class="row mt-n4">
            <?php $__currentLoopData = $data["elementos"]["video"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-6 col-lg-4 mt-4">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo e($galeria->video); ?>"></iframe>
                            </div>
                            <?php if(!empty($galeria->nombre)): ?>
                            <div class="galeria--descripcion">
                                <?php echo e($galeria->nombre); ?>

                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/page/galeria.blade.php ENDPATH**/ ?>