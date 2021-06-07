<section class="my-3">
    <div class="container-fluid wrapper-<?php echo e($data[ 'section' ]); ?>">
        <?php echo $__env->make( 'layouts.general.slider' , [ 'slider' => $data[ 'elementos' ] , 'sliderID' => "slider" , 'div' => 0 , 'arrow' => 0 , 'idioma' => 'es' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make( 'layouts.general.form', [ 'buttonADD' => 1 , 'form' => 0 , 'close' => 1 , 'modal' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make( 'layouts.general.table' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>
<?php $__env->startPush('scripts'); ?>
<script>
    window.pyrus = new Pyrus("slider", null, src);
    /** -------------------------------------
        Agrega o ejecuta algún evento después de la carga inicial
     ** ------------------------------------- */
    addfinish = () => {
        $( `#${window.pyrus.name}_seccion`).val( window.data.section );
    };
    /** -------------------------------------
     *      INICIO
     ** ------------------------------------- */
    init( () => {} );
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/auth/parts/slider.blade.php ENDPATH**/ ?>