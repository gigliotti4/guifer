<div class="container py-5">
    <div class="row">
        <div class="col-12 col-md">
            <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $elemento[ 'image' ] , 'c' => 'w-100 d-block' , 'n' => 'Imagen Empresa' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-12 col-md">
            <div class="title"><?php echo $elemento[ 'title' ]; ?></div>
            <div class="text mt-3"><?php echo $elemento[ 'text' ]; ?></div>
        </div>
    </div>
</div><?php /**PATH C:\Users\Pablo\Desktop\Laravel\hidratools\resources\views/page/parts/empresa.blade.php ENDPATH**/ ?>