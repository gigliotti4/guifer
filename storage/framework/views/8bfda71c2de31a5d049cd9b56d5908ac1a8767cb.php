<div class="blogs pt-5 pb-2">
    <div class="container">
        <h2 class="title--important mb-4"><?php echo e(translate("link_blogs", App::getLocale())); ?></h2>
    </div>
</div>
<div class="blogs blogs--important py-3">
    <div class="container">
        <div class="row pt-4 pb-5">
            <div class="col-12 col-md">
                <div class="wrapper-videos">
                    <h3 class="blogs--title blogs--title__lateral mb-3"><?php echo e(translate("label_destacadas", App::getLocale())); ?></h3>
                    <div class="row wrapper-blog mt-n5">
                        <?php $__currentLoopData = $data["elementos"][ "blogs_destacado" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="hover col-12 col-md-6 mt-5">
                            <?php echo $__env->make( 'page.parts.blog' , [ 'elemento' => $b , 'type' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blogs py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md">
                <h3 class="blogs--title blogs--title__lateral mb-3"><?php echo e(translate("link_noticias", App::getLocale())); ?></h3>
                <div class="row blog mt-n5">
                    <?php $__currentLoopData = $data["elementos"][ "blogs" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="hover col-12 col-md-6 mt-5">
                        <?php echo $__env->make( 'page.parts.blog' , [ 'elemento' => $b , 'type' => 0 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center"><?php echo e($data["elementos"][ "blogs" ]->links()); ?></div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <?php echo $__env->make( 'page.parts.blog_lateral' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/page/blogs.blade.php ENDPATH**/ ?>