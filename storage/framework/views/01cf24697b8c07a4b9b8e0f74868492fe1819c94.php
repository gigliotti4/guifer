<div class="productos py-5">
    <div class="container">
        <h2 class="title--important mb-3"><?php echo e(translate("link_productos", App::getLocale())); ?></h2>
        <div class="row">
            <?php $__currentLoopData = $data["marcas"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!empty($marca->portada)): ?>
                <div class="col-12 col-md-6 mt-4 hover">
                    <a href="<?php echo e(URL::to(App::getLocale() . '/productos/marca/' . str_slug($marca->nombre) . '/' . $marca->id)); ?>" class="plus">
                        <div class="img position-relative d-flex align-items-stretch h-100 producto--elemento producto--elemento__body">
                            <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $marca->portada , 'c' => 'producto--image' , 'n' => $marca->nombre, 'in_div' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div>
                                <h5 class="producto--title producto--title__marca"><?php echo e($marca->nombre); ?></h5>
                                <div class="producto--text"><?php echo $marca->detalle[App::getLocale()]; ?></div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/page/productos.blade.php ENDPATH**/ ?>