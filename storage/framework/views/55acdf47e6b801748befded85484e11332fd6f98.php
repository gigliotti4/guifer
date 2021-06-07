<div class="py-5 empresa">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-8">
                <h2 class="title--important mb-4">Empresa</h2>
                <?php echo $elemento['texto']; ?>

            </div>
            <div class="col-12 col-md-6 col-lg-4 mt-md-4 mt-lg-0">
                <?php echo $__env->make('layouts.general.image', [ 'i' => $elemento["image"] , 'c' => 'empresa--image', 'n' => 'Imagen Empresa'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/pablo/Escritorio/guifer2/resources/views/page/parts/empresa.blade.php ENDPATH**/ ?>