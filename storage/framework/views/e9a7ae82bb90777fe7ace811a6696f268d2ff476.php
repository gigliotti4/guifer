<div class="wrapper-blogs bg-white pb-5">
    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $data[ 'cabecera' ]->data[ 'header' ] , 'c' => 'cabecera' , 'in_div' => 1 , 'text' => 'BLOGS / ' . $data[ 'category' ]->title ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container pt-3">
        <ol class="breadcrumb bg-transparent border-0 p-0">
            <li class="breadcrumb-item home"><a href="<?php echo e(URL::to( '/' )); ?>"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to( 'blogs' )); ?>">Blogs</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e($data[ 'category' ]->title); ?></li>
        </ol>
        <div class="row mt-5">
            <div class="col-12 col-md">
                <div class="wrapper-videos">
                    <div class="row wrapper-blog mt-n5">
                        <?php $__empty_1 = true; $__currentLoopData = $data[ "blogs" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="hover col-12 col-md-6 mt-5">
                            <?php echo $__env->make( 'page.parts.blog' , [ 'elemento' => $b , 'type' => 0 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-12 mt-5 text-center">
                            <?php echo $__env->make( 'layouts.general.image' , [ 'i' => 'images/search_not_found.png' , 'c' => 'mx-auto not-found d-block mb-3' , 'n' => 'No encontrado' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <h4 class="text-center">Sin registros</h4>
                        </div>
                        <?php endif; ?>
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
</div><?php /**PATH C:\Users\Pablo\Desktop\Laravel\hidratools\resources\views/page/blog_category.blade.php ENDPATH**/ ?>