<div class="wrapper-home bg-white">
    <?php echo $__env->make( 'layouts.general.slider' , [ 'slider' => $data[ 'slider' ] , 'sliderID' => "slider" , 'div' => 1 , 'arrow' => 0 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if( $data[ "productos" ]->isNotEmpty() ): ?>
    <div class="pb-5 pt-4 destacado wrapper-productos bg-white">
        <div class="wrapper-videos container">
            <h3 class="title mb-3 text-uppercase">Productos destacados</h3>
            <div class="mt-n4" id="productos-slick">
                <?php $__currentLoopData = $data[ "productos" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mt-4 hover p-3">
                        <a href="<?php echo e(URL::to( 'producto/' . str_slug( $producto->title ) . '/' . $producto->id )); ?>" class="d-block plus">
                            <?php if( $producto->is_nuevo ): ?>
                                <?php echo $__env->make( 'layouts.general.image' , [ 'i' => "images/new.png" , 'c' => 'position-absolute new' , 'n' => 'Nuevo producto - ' . $producto->title ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                            <div class="img">
                                <?php echo $__env->make( 'layouts.general.image' , [ 'i' => empty( $producto->images ) ? "" : $producto->images[0][ "image" ] , 'c' => 'img-producto w-100' , 'n' => $producto->title , 'in_div' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <p class="subname"><?php echo e($producto->categoria->title); ?></p>
                            <p class="name"><?php echo e($producto->title); ?></p>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $data[ "categoriasD" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mt-4 hover p-3">
                        <a href="<?php echo e(URL::to( 'productos/' . str_slug( $producto->categoria->title ) . '/' . $producto->categoria->id . '/' . str_slug( $producto->title ) . '/' . $producto->id )); ?>" class="d-block plus">
                            <?php if( $producto->is_nuevo ): ?>
                                <?php echo $__env->make( 'layouts.general.image' , [ 'i' => "images/new.png" , 'c' => 'position-absolute new' , 'n' => 'Nuevo producto - ' . $producto->title ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                            <div class="img">
                                <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $producto->image , 'c' => 'img-producto w-100' , 'n' => $producto->title , 'in_div' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <p class="subname"><?php echo e($producto->categoria->title); ?></p>
                            <p class="name"><?php echo e($producto->title); ?></p>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="wrapper-servicio wrapper-categoria py-3 bg-dark">
        <?php echo $__env->make( 'page.parts.categorias' , [ 'categorias' => $data[ 'categorias' ] , 'link' => 1 , 'text' => 'Línea de productos' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="wrapper-blogs">
        <div class="container">
            <div class="row pt-4 pb-5">
                <div class="col-12 col-md">
                    <div class="wrapper-videos">
                        <h3 class="title mb-3 text-uppercase">Últimas novedades</h3>
                        <div class="row wrapper-blog mt-n5">
                            <?php $__currentLoopData = $data[ "blogs" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="hover col-12 col-md-4 mt-5">
                                <?php echo $__env->make( 'page.parts.blog' , [ 'elemento' => $b , 'type' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <?php echo $__env->make( 'page.parts.home' , [ 'iconos' => $data[ 'contenido' ]->data ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php $__env->startPush( "scripts" ); ?>
<script>
    init = () => {
        $('#productos-slick').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    };
    
    init();
</script>
<?php $__env->stopPush(); ?><?php /**PATH C:\Users\Pablo\Desktop\Laravel\hidratools\resources\views/page/home.blade.php ENDPATH**/ ?>