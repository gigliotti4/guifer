<div class="productos pb-5 pt-3">
    <div class="container">
        <ol class="breadcrumb border-0 rounded-0 bg-white mb-3">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/productos')); ?>">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e($data["categoria"]->name); ?></li>
        </ol>
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <?php echo $__env->make('page.parts.lateral' , ['elementos' => $data['categorias'], 'link' => 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-12 col-md-8 col-lg-9">
                <div class="row mb-5">
                    <div class="col-12">
                        <p class="text-center text-muted">Las imágenes indicadas en este sitio web son meramente ilustrativas no contractuales.</p>
                    </div>
                </div>
                <div class="row mt-n4">
                    <?php $__empty_1 = true; $__currentLoopData = $data["productos"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                    $name = $p->title;
                    $url = $p->url();
                    ?>
                    <div class="col-12 col-md-4 mt-4">
                        <div class="card border-0 producto--elemento hover position-relative">
                            <a class="plus" href="<?php echo e(URL::to($url)); ?>">
                                <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $p->image() , 'c' => 'card-img-top producto--image' , 'n' => $name ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="card-body img position-relative">
                                    <p class="card-title producto--elemento__titulo"><?php echo e($name); ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 py-4">
                        <?php echo $__env->make( 'layouts.general.image' , [ 'i' => 'images/search_not_found.png' , 'c' => 'd-block mx-auto img--not-found' , 'n' => 'Not found' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <h3 class="text-center">Sin resultados</h3>
                    </div>
                    <?php endif; ?>
                </div>
                <?php if($data["productos"]->isNotEmpty()): ?>
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center"><?php echo e($data["productos"]->links()); ?></div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div><?php /**PATH /home3/guifer/public_html/laravel/resources/views/page/categoria.blade.php ENDPATH**/ ?>