<section class="my-3">
    <div class="container-fluid">
        <?php echo $__env->make( 'layouts.general.form', [ 'buttonADD' => 1 , 'form' => 0 , 'close' => 1 , 'modal' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make( 'layouts.general.table', [
            "paginate" => $data["elementos"],
            "form" => [
                "url" => Route("clientes.index"),
                "placeholder" => "Buscar por Nombre o URL",
                "search" => isset($data["search"]) ? $data["search"] : null
            ]
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>
<?php $__env->startPush('scripts'); ?>
<script>
    window.pyrus = new Pyrus("clientes");
    /** -------------------------------------
     *      INICIO
     ** ------------------------------------- */
    init( () => {} );
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/pablo/Escritorio/guifer2/resources/views/auth/parts/clientes.blade.php ENDPATH**/ ?>