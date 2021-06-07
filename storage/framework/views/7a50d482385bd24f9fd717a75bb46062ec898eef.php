<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="w-100">
                    <h3 class="footer--title">Mapa del sitio</h3>
                    <ul class="list-unstyled mb-0 footer--list footer--list__column">
                        <?php $__currentLoopData = $elementos->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="text-truncate"><a href="<?php echo e($link ? URL::to("{$section['LINK']}") : '#'); ?>"><?php echo e($section['NAME']); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php if(!empty($elementos->social_networks)): ?>
                    <?php
                    $ARR_redes = [
                        "facebook" => '<i style="color: #A3A3A3; margin-right:10px; font-size: 16px;" class="fab fa-facebook-square"></i>',
                        "instagram" => '<i style="color: #A3A3A3; margin-right:10px; font-size: 16px;" class="fab fa-instagram"></i>',
                        "twitter" => '<i style="color: #A3A3A3; margin-right:10px; font-size: 16px;" class="fab fa-twitter"></i>',
                        "youtube" => '<i style="color: #A3A3A3; margin-right:10px; font-size: 16px;" class="fab fa-youtube"></i>',
                        "linkedin" => '<i style="color: #A3A3A3; margin-right:10px; font-size: 16px;" class="fab fa-linkedin-in"></i>'
                    ];
                    ?>
                    <div class="d-flex w-100 justify-content-start flex-column" style="">
                        Seguinos
                        <div class="mt-1">
                            <?php $__currentLoopData = $elementos->social_networks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e($v['url']); ?>" target="blank"><?php echo $ARR_redes[$v["redes"]]; ?> <?php echo e($v["titulo"]); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <a target="blank" class="header--fiscal" href="<?php echo e(asset($elementos->files['archivo']['i'])); ?>">
                        <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $elementos->files['image'] , 'c' => '' , 'n' => 'Fiscal ' . env('APP_NAME') ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg d-flex align-items-center justify-content-center">
                <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $elementos->images['logoFooter'] , 'c' => 'd-block footer--logo' , 'n' => 'Logo ' . env('APP_NAME') ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-12 col-md col-lg-3 mt-md-4 mt-lg-0">
                <h3 class="footer--title"><?php echo e(env('APP_NAME')); ?></h3>
                <ul class="list-unstyled mb-0 footer--list">
                    <li class="d-flex align-items-start">
                        <i class="footer--icon fas fa-map-marker-alt"></i>
                        <div class="footer--info">
                            <?php echo $__env->make( 'layouts.general.domicilio' , [ "dato" => $elementos->domicile , "link" => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </li>
                    <li class="d-flex align-items-start">
                        <i class="footer--icon fas fa-phone-alt"></i>
                        <div class="footer--info">
                            <?php $__currentLoopData = $elementos->phone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($t[ "tipo" ] == "tel"): ?>
                                    <?php echo $__env->make( 'layouts.general.telefono' , [ "dato" => $t ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </li>
                    <li class="d-flex align-items-start">
                        <i class="fab fa-whatsapp footer--icon"></i>
                        <div class="footer--info">
                            <?php $__currentLoopData = $elementos->phone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                <p class="text-truncate"><?php echo $__env->make( 'layouts.general.email' , [ "dato" => $e ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></p>
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
</footer><?php /**PATH /home/pablo/Escritorio/guifer2/resources/views/layouts/general/footer.blade.php ENDPATH**/ ?>