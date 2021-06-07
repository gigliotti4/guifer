<div class="py-5 empresa">
    <div class="container">
        <h2 class="empresa__title"><?php echo $elemento['titulo'][$idioma]; ?></h2>
        <div class="empresa__text mt-3"><?php echo $elemento['texto'][$idioma]; ?></div>
    </div>
</div>
<?php if(!empty($elemento['video'])): ?>
<div class="servicio servicio--other py-5">
    <div class="container">
        <div class="servicio--element">
            <h2 class="title--important mb-3"><?php echo e(translate("title_video", $idioma)); ?></h2>
            <div class="row mt-n4 mt-3">
                <?php $__currentLoopData = $elemento["video"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-md-6 col-lg-4 mt-4">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo e($video['video']); ?>"></iframe>
                                </div>
                                <?php if(!empty($video['titulo'][$idioma])): ?>
                                <div class="galeria--descripcion empresa--video">
                                    <?php echo e($video['titulo'][$idioma]); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/page/parts/empresa.blade.php ENDPATH**/ ?>