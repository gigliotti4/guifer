<div class="mercadopago">
    <div class="container">
    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $elementos->images['ml'] , 'c' => 'd-block w-100' , 'n' => 'MP ' . env('APP_NAME') ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<footer class="footer" style="--img: url(<?php echo e(asset(@$elementos->images['icon']['i'])); ?>)">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md">
                <h3 class="footer--title">secciones</h3>
                <ul class="list-unstyled mb-0 footer--list">
                    <li class="text-truncate"><a href="<?php echo e($link ? URL::to('/') : '#'); ?>">Inicio</a></li>
                    <?php if(isset($data["slug"])): ?>
                        <?php $__currentLoopData = $data["slug"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="text-truncate"><a href="<?php echo e($link ? URL::to('marca/' . $k) : '#'); ?>"><?php echo e($v); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <li class="text-truncate"><a href="<?php echo e($link ? URL::to('empresa') : '#'); ?>">Empresa</a></li>
                    <li class="text-truncate"><a href="<?php echo e($link ? URL::to('contacto') : '#'); ?>">Contacto</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $elementos->images['logoFooter'] , 'c' => 'd-block footer--logo' , 'n' => 'Logo ' . env('APP_NAME') ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-12 col-md mt-md-4">
                <h3 class="footer--title"><?php echo e(env('APP_NAME')); ?></h3>
                <ul class="list-unstyled mb-0 footer--list">
                    <li class="d-flex align-items-start">
                        <i class="footer--icon fas fa-map-marker-alt"></i>
                        <div class="footer--info">
                            <?php echo $__env->make( 'layouts.general.domicilio' , [ "dato" => $elementos->domicilio , "link" => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </li>
                    <li class="d-flex align-items-start">
                        <i class="footer--icon fas fa-phone-volume"></i>
                        <div class="footer--info">
                            <?php $__currentLoopData = $elementos->telefono; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($t[ "tipo" ] == "tel"): ?>
                                    <?php echo $__env->make( 'layouts.general.telefono' , [ "dato" => $t ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </li>
                    <li class="d-flex align-items-start">
                        <i class="fab fa-whatsapp footer--icon"></i>
                        <div class="footer--info">
                            <?php $__currentLoopData = $elementos->telefono; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($t[ "tipo" ] == "wha"): ?>
                                    <?php echo $__env->make( 'layouts.general.telefono' , [ "dato" => $t ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </li>
                    <li class="d-flex align-items-start">
                        <i class="footer--icon far fa-envelope"></i>
                        <div class="footer--info">
                            <?php $__currentLoopData = $elementos->email; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make( 'layouts.general.email' , [ "dato" => $e ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="osole py-3">
        <div class="container">
            <div class="row by">
                <div class="col-12">
                    <p class="mb-0 d-flex">
                        <span class="mr-3">© <?php echo e(env('APP_YEAR')); ?></span>
                        <a target="_blank" href="<?php echo e(env('APP_UAUTHOR')); ?>" style="color:inherit" class="right text-uppercase">by <?php echo e(env('APP_AUTHOR')); ?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer><?php /**PATH /home/pablo/Escritorio/eurocam/resources/views/layouts/general/footer.blade.php ENDPATH**/ ?>