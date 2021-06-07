<div class="wrapper-productos bg-white pb-5">
    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $data[ 'cabecera' ]->data[ 'header' ] , 'c' => 'cabecera' , 'in_div' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container pt-3">
        <ol class="breadcrumb bg-transparent border-0 p-0">
            <li class="breadcrumb-item home"><a href="<?php echo e(URL::to( '/' )); ?>"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Buscador</li>
        </ol>
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <form action="<?php echo e(URL::to('buscar')); ?>" class="wrapper-contacto" method="get">
                    <div class="row">
                        <div class="col-12 col-md-8 col-lg-9 col-xl-9">
                            <div class="form-group m-0 w-100">
                                <input required pattern=".{3,}" <?php if(!empty($data['search'])): ?> value="<?php echo e($data['search']); ?>" <?php endif; ?> @end  placeholder="Buscar productos por título, descripción o contenido en general" type="search" name="search" class="form-control">
                                <small class="form-text text-muted">Buscar productos por título, descripción o contenido en general</small>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 col-xl-3">
                            <button class="d-block btn-block btn btn-warning px-4 rounded-pill">Buscar<i class="fas fa-angle-right ml-2"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 col-md">
                <div class="row mt-n4">
                    <?php $__empty_1 = true; $__currentLoopData = $data[ "productos" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-12 col-md-4 mt-4 hover">
                            <a href="<?php echo e(URL::to( 'producto/' . str_slug( $producto->title ) )); ?>" class="d-block plus">
                                <?php if( $producto->is_nuevo ): ?>
                                    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => "images/new.png" , 'c' => 'position-absolute new' , 'n' => 'Nuevo producto - ' . $producto->title ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                                <div class="img">
                                    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => empty( $producto->images ) ? "" : $producto->images[0][ "image" ] , 'c' => 'img-producto w-100' , 'n' => $producto->title , 'in_div' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <p class="name"><?php echo e($producto->title); ?></p>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-12 py-5">
                            <p class="text-center">No se encontraron registros</p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center">
                        <?php if(empty($data['search'])): ?>
                        <?php echo e($data[ "productos" ]->links()); ?>

                        <?php else: ?>
                        <?php echo e($data[ "productos" ]->appends(["search" => $data['search']])->links()); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/pablo/Escritorio/hidratools/resources/views/page/search.blade.php ENDPATH**/ ?>