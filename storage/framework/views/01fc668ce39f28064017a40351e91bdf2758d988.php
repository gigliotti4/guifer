<div class="productos py-5">
    <div class="container pb-5">
        <h2 class="title--important mb-3">Buscador</h2>
        <form class="d-block my-5" action="" method="get">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 d-flex">
                    <input value="<?php echo e($data['search']); ?>" name="s" placeholder="Estoy buscando..." type="search" class="form-control form--input form-control-lg mr-3">
                    <button class="btn btn-primary btn--element px-5 rounded-pill">Buscar</button>
                </div>
                <div class="col-12 mt-3">
                    <p class="text-center">Total de registros encontrados: <?php echo e($data["total"]); ?></p>
                </div>
            </div>
        </form>
        <div class="row mt-n4 justify-content-center">
            <?php $__empty_1 = true; $__currentLoopData = $data["productos"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
            $name = $p->title;
            if(empty($name))
                $name = $p->nombre["es"];
            $url = $p->url();
            ?>
            <div class="col-12 col-md-4 mt-4">
                <div class="card border-0 producto--elemento hover position-relative">
                    <a class="plus" href="<?php echo e(URL::to($url)); ?>">
                        <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $p->image() , 'c' => 'card-img-top producto--image', 'in_div' => 1 , 'n' => $name ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
        <div class="row mt-5">
            <div class="col-12 justify-content-center d-flex">
                <?php echo e($data["productos"]->appends(["s" => $data["search"]])->links()); ?>

            </div>
        </div>
    </div>
</div><?php /**PATH /home/pablo/Escritorio/guifer2/resources/views/page/search.blade.php ENDPATH**/ ?>