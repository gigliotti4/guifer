<div class="productos py-5">
    <div class="container">
        <h2 class="title--important mb-3">Productos</h2>
        <div class="row">
            <?php $__currentLoopData = $data["elementos"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-6 col-lg-4 mt-4 hover">
                    <a href="<?php echo e(URL::to($categoria->url())); ?>" class="plus">
                        <div class="img position-relative d-flex align-items-stretch flex-column h-100 producto--elemento producto--elemento__body">
                            <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $categoria->image , 'c' => 'producto--image border-0' , 'n' => $categoria->name, 'in_div' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div>
                                <h5 class="producto--title text-center producto--title__marca"><?php echo e($categoria->name); ?></h5>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH /home3/guifer/public_html/laravel/resources/views/page/productos.blade.php ENDPATH**/ ?>