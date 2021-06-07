<div class="iconos py-5 d-flex justify-content-center">
    <ul class="d-flex justify-content-center border px-5 py-3 rounded-pill">
        <?php $__currentLoopData = $elementos["icono"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="d-flex align-items-center">
            <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $i['image'] , 'c' => 'd-inline-block mr-3' , 'n' => 'Imagen' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $i["text"]; ?>

        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php if(isset($data[ "productos" ])): ?>
<div class="productos py-5">
    <h2 class="text-center productos--title">Líneas completas</h2>
    <div class="container pb-4 pt-3">
        <div class="row justify-content-center">
            <?php $__currentLoopData = $data[ "productos" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 col-md-4 mt-4">
                <a href="<?php echo e(URL::to('marca/' . $p->slug)); ?>" class="d-block productos--elemento">
                    <?php if(!empty($p->image)): ?>
                        <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $p->image , 'c' => 'd-block' , 'n' => $p->name ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <p class="text-center">Repuestos para <?php echo e($p->name); ?></p>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="servicio d-flex align-items-center" style="--img: url(<?php echo e(asset(@$elementos['txt']['caracteristicas_bg']['i'])); ?>)">
    <div class="container w-100">
        <?php echo $elementos['txt']['caracteristicas']; ?>

    </div>
</div>
<div class="repuestos py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 col-md-5 col-lg-6">
                <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $elementos['txt']['repuestos_img'] , 'c' => 'w-100 d-block' , 'n' => 'Imagen Empresa' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-12 col-lg-6 mt-md-4 mt-4 mt-lg-0">
                <?php echo $elementos['txt']['repuestos']; ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/pablo/Escritorio/eurocam/resources/views/page/parts/home.blade.php ENDPATH**/ ?>