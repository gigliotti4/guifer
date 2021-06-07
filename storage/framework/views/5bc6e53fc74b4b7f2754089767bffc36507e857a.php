<div class="py-5 empresa">
    <div class="container">
        <h2 class="empresa__title"><?php echo $elemento[ 'title' ]; ?></h2>
        <div class="row mt-4">
            <div class="col-12 col-md">
                <div class="empresa__text mt-3"><?php echo $elemento[ 'text' ]; ?></div>
            </div>
            <div class="col-12 col-md empresa__image">
                <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $elemento[ 'image' ] , 'c' => 'w-100 d-block' , 'n' => 'Imagen Empresa' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/pablo/Escritorio/eurocam/resources/views/page/parts/empresa.blade.php ENDPATH**/ ?>