<div class="galeria py-5">
    <div class="container">
        <h2 class="title--important mb-4">Algunos de Nuestros Clientes</h2>
        <div class="row mt-n4">
            <?php $__currentLoopData = $data["elementos"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-4 col-lg-3 mt-4">
                    <div class="card">
                        <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $cliente->image , 'c' => 'card-img-top' , 'n' => 'Imagen' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="card-body p-0">
                            <?php if(!empty($cliente->name)): ?>
                            <div class="bg-ligth cliente--descripcion text-truncate">
                                <?php echo e($cliente->name); ?>

                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH /home3/guifer/public_html/laravel/resources/views/page/clientes.blade.php ENDPATH**/ ?>