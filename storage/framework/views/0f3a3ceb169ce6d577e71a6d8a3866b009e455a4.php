<div class="wrapper-home bg-white">
    <?php echo $__env->make( 'layouts.general.slider' , [ 'slider' => $data[ 'slider' ] , 'sliderID' => "slider" , 'div' => 1 , 'arrow' => 0] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($data["destacado"]->isNotEmpty()): ?>
    <div class="home--destacado">
        <div class="container">
            <h2 class="home--title">Productos destacados</h2>
            <div class="row">
                <div class="col-12" id="productos">
                    <?php $__currentLoopData = $data["destacado"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $table = $e->getTable();
                    if($table == "category") {
                        $name = $e->name;
                        $image = $e->image;
                    } else {
                        $name = $e->title;
                        $image = $e->image();
                    }
                    ?>
                    <div class="p-2 hover">
                        <a href="<?php echo e(URL::to($e->url())); ?>" class="producto--link plus">
                            <div class="img position-relative">
                                <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $image , 'c' => 'producto--image', 'in_div' => 1 , 'n' => $name ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <p class="producto--name producto--name__little"><?php echo e($name); ?></p>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php echo $__env->make( 'page.parts.home' , [ 'elementos' => $data[ 'contenido' ]->data, 'link' => 1] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->startPush( "scripts" ); ?>
<script>
    init = () => {
        $('#productos').slick({
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
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\guifer\resources\views/page/home.blade.php ENDPATH**/ ?>