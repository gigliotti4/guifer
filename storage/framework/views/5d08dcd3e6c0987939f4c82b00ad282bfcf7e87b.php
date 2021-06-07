<div class="wrapper-home">
    <div class="wrapper-icono py-5 bg-white">
        <div class="container">
            <div class="title mb-5"><?php echo $iconos[ 'title' ][ 'text' ]; ?></div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="row mt-3n justify-content-center">
                        <?php for( $i = 0 ; $i < count( $iconos[ 'icono' ] ) ; $i ++ ): ?>
                        <div class="col-12 mt-3 col-md-6 col-lg-4 d-flex justify-content-center iconos">
                            <div class="d-flex py-4">
                                <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $iconos[ 'icono' ][ $i ][ 'image' ] , 'n' => 'Ícono #' . $i ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="ml-4"><?php echo $iconos[ 'icono' ][ $i ][ 'text' ]; ?></div>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\Pablo\Desktop\Laravel\hidratools\resources\views/page/parts/home.blade.php ENDPATH**/ ?>