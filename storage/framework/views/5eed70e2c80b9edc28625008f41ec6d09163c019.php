<div class="servicio py-5">
    <div class="container">
        <?php if(!empty($elemento["servicio"])): ?>
        <div class="servicio--element">
            <h2 class="title--important mb-3">Servicio técnico</h2>
            <div class="row mt-n4">
                <?php for($i = 0; $i < count($elemento["servicio"]); $i++): ?>
                    <div class="col-12 mt-4 servicio <?php echo e($i % 2 == 0 ? 'servicio--par' : 'servicio--impar'); ?>">
                        <div class="d-flex align-items-center justify-content-between">
                            <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $elemento["servicio"][$i]["image"] , 'c' => 'servicio--icon' , 'n' => 'Imagen ' . $i ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="servicio--text">
                                <h4 class="servicio--title"><?php echo e($elemento["servicio"][$i]["titulo"]); ?></h4>
                                <div><?php echo $elemento["servicio"][$i]["texto"]; ?></div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH /home/pablo/Escritorio/guifer2/resources/views/page/parts/servicio.blade.php ENDPATH**/ ?>