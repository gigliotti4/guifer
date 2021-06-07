<div class="productos pb-5 pt-3">
    <div class="container-fluid">
        <ol class="breadcrumb border-0 rounded-0 bg-white mb-3">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to(App::getLocale() . '/productos')); ?>"><?php echo e(translate("link_productos", App::getLocale())); ?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to(App::getLocale() . '/productos/marca/' . str_slug($data['marca']->nombre) . '/' . $data['marca']->id)); ?>"><?php echo e($data['marca']->nombre); ?></a></li>
            <?php $__currentLoopData = $data["familias"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="breadcrumb-item <?php if($f->id == $data['familia']->id): ?> active <?php endif; ?>"><a href="<?php echo e(URL::to(App::getLocale() . '/productos/familia/' . str_slug($f->nombre[App::getLocale()]) . '/' . $f->id)); ?>"><?php echo e($f->nombre[App::getLocale()]); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4">
                <?php echo $__env->make('page.parts.lateral' , ['elementos' => $data['marcas'], 'idioma' => App::getLocale(), 'link' => 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-12 col-md-8 col-lg-8">
                <div class="producto--name d-flex justify-content-between align-items-center">
                    <h3 class="producto--title"><?php echo e($data["familia"]->nombre[App::getLocale()]); ?></h3>
                    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $data["marca"]->image , 'c' => 'producto--logo' , 'n' => $data["marca"]->nombre ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="producto--text">
                    <?php echo $data["familia"]->contenido[App::getLocale()]; ?>

                </div>
                <div class="row mt-n4">
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
        </div>
    </div>
</div><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/page/familia.blade.php ENDPATH**/ ?>