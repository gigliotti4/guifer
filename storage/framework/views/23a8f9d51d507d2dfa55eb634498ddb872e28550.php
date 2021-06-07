<div class="wrapper-productos bg-white pb-5">
    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $data[ 'cabecera' ]->data[ 'header' ] , 'c' => 'cabecera' , 'in_div' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container pt-3">
        <ol class="breadcrumb bg-transparent border-0 p-0">
            <li class="breadcrumb-item home"><a href="<?php echo e(URL::to( '/' )); ?>"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to( 'productos' )); ?>">Productos</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to( 'productos/' . str_slug( $data[ 'categoria' ]->title ) . '/' . $data[ 'categoria' ]->id )); ?>"><?php echo e($data[ 'categoria' ]->title); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e($data[ 'subcategoria' ]->title); ?></li>
        </ol>
        <div class="row mt-5">
            <div class="col-12 col-md-4 col-lg-3 menu-lateral pb-5">
                <?php echo $__env->make( 'page.parts.menu' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-12 col-md-8 col-lg-9">
                <div class="row mt-n4">
                    <?php $__currentLoopData = $data[ "productos" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 col-md-4 mt-4 hover">
                            <a href="<?php echo e(URL::to( 'producto/' . str_slug( $producto->title ) . '/' . $producto->id )); ?>" class="d-block plus">
                                <?php if( $producto->is_nuevo ): ?>
                                    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => "images/new.png" , 'c' => 'position-absolute new' , 'n' => 'Nuevo producto - ' . $producto->title ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                                <div class="img">
                                    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => empty( $producto->images ) ? "" : $producto->images[0][ "image" ] , 'c' => 'img-producto w-100' , 'n' => $producto->title , 'in_div' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <p class="name"><?php echo e($producto->title); ?></p>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center">
                        <?php echo e($data[ "productos" ]->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/osolelar/hidratools_laravel/resources/views/page/subcategoria.blade.php ENDPATH**/ ?>