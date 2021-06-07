<div class="productos py-5">
    <div class="container pb-5">
        <h2 class="title--important mb-3"><?php echo e(translate("title_buscar", App::getLocale())); ?></h2>
        <form class="d-block my-5" action="" method="get">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 d-flex">
                    <input value="<?php echo e($data['search']); ?>" name="s" placeholder="<?php echo e(translate('placeholder_buscar', App::getLocale())); ?>" type="search" class="form-control form--input form-control-lg mr-3">
                    <button class="btn btn-primary btn--element px-5 rounded-pill"><?php echo e(translate('btn_buscar', App::getLocale())); ?></button>
                </div>
            </div>
        </form>
        <div class="row mt-n4 justify-content-center">
            <?php $__empty_1 = true; $__currentLoopData = $data["productos"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
            $table = substr($p->getTable(), 0, -1);
            $name = $p->nombre[App::getLocale()];
            if(empty($name))
                $name = $p->nombre["es"];
            $url = URL::to(App::getLocale() . "/productos/{$table}/" . str_slug($name) . '/' . $p->id);
            ?>
            <div class="col-12 col-md-4 mt-4">
                <div class="card border-0 producto--elemento hover position-relative">
                    <?php if($table == "producto"): ?>
                    <div class="producto--elemento__alert"><?php echo e(translate("txt_producto", App::getLocale())); ?></div>
                    <?php endif; ?>
                    <a class="plus" href="<?php echo e($url); ?>">
                        <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $p->image , 'c' => 'card-img-top' , 'n' => $name ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="card-body img position-relative">
                            <p class="card-title producto--elemento__titulo"><?php echo e($name); ?></p>
                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 py-4">
                <?php echo $__env->make( 'layouts.general.image' , [ 'i' => 'images/search_not_found.png' , 'c' => 'd-block mx-auto img--not-found' , 'n' => 'Not found' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <h3 class="text-center"><?php echo e(translate("sin_registros", App::getLocale())); ?></h3>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/page/search.blade.php ENDPATH**/ ?>