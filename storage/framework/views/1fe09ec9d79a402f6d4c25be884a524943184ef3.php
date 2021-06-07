<div class="wrapper-servicio pb-5 bg-white">
    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $data[ 'cabecera' ]->data[ 'header' ] , 'c' => 'cabecera' , 'in_div' => 1 , 'text' => 'SERVICIOS' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="mt-5">
        <?php echo $__env->make( 'page.parts.servicios' , [ 'servicios' => $data[ 'servicios' ] , 'link' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div><?php /**PATH /home/osolelar/hidratools_laravel/resources/views/page/servicios.blade.php ENDPATH**/ ?>