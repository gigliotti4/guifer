<div class="wrapper-productos bg-white pb-5">
    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $data[ 'cabecera' ]->data[ 'header' ] , 'c' => 'cabecera' , 'in_div' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="wrapper-servicio wrapper-categoria py-4 bg-white mb-4">
        <?php echo $__env->make( 'page.parts.categorias' , [ 'categorias' => $data[ 'categorias' ] , 'link' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div><?php /**PATH C:\Users\Pablo\Desktop\Laravel\hidratools\resources\views/page/productos.blade.php ENDPATH**/ ?>