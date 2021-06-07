<div class="wrapper-blogs bg-white pb-5">
    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $data[ 'cabecera' ]->data[ 'header' ] , 'c' => 'cabecera' , 'in_div' => 1 , 'text' => 'BLOGS' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <div class="row pt-4 pb-5">
            <div class="col-12 col-md">
                <div class="wrapper-videos">
                    <h3 class="title text-center mb-3">Destacadas</h3>
                    <div class="row wrapper-blog mt-n5">
                        <?php $__currentLoopData = $data[ "blogs_destacado" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="hover col-12 col-md-6 mt-5">
                            <?php echo $__env->make( 'page.parts.blog' , [ 'elemento' => $b , 'type' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md">
                <div class="wrapper-videos">
                    <h3 class="title text-center mb-3">Noticias</h3>
                    <div class="row wrapper-blog mt-n5">
                        <?php $__currentLoopData = $data[ "blogs" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="hover col-12 col-md-6 mt-5">
                            <?php echo $__env->make( 'page.parts.blog' , [ 'elemento' => $b , 'type' => 0 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 d-flex justify-content-center"><?php echo e($data[ "blogs" ]->links()); ?></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <?php echo $__env->make( 'page.parts.blog_lateral' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\Pablo\Desktop\Laravel\hidratools\resources\views/page/blogs.blade.php ENDPATH**/ ?>