<div class="container">
    <?php if( isset( $text ) ): ?>
    <h3 class="title text-uppercase"><?php echo e($text); ?></h3>
    <?php else: ?>
    <h3 class="title text-uppercase">Seleccione una categoría</h3>
    <?php endif; ?>
    <div class="row mt-3">
        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 col-md-4">
            <div class="card border-0 hover bg-transparent">
                <?php
                $href = "#";
                if( $link )
                    $href = URL::to( 'productos/' . str_slug( $c->title ) . '/' . $c->id );
                ?>
                <a href="<?php echo e($href); ?>" class="d-block position-relative categoria plus">
                    <div class="img">
                        <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $c->logo , 'c' => 'position-absolute logo' , 'n' => $c->title ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $c->image , 'c' => 'card-img-top' , 'n' => $c->title ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="card-body border-0 p-2">
                        <h5 class="card-title d-flex justify-content-between"><?php echo e($c->title); ?></h5>
                        <div class="card-text"><?php echo $c->resume; ?></div>
                    </div>
                </a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH C:\Users\Pablo\Desktop\Laravel\hidratools\resources\views/page/parts/categorias.blade.php ENDPATH**/ ?>