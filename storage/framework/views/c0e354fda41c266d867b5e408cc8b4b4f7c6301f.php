<div class="wrapper-empresa pb-5 bg-white">
    <?php echo $__env->make( 'layouts.general.slider' , [ 'slider' => $data[ 'slider' ] , 'sliderID' => "slider" , 'div' => 1 , 'arrow' => 0 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make( 'page.parts.empresa' , [ 'elemento' => $data[ 'contenido' ]->data ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div><?php /**PATH /home/osolelar/hidratools_laravel/resources/views/page/empresa.blade.php ENDPATH**/ ?>