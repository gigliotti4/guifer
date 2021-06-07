<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-start justify-content-md-center align-items-center">
                <div>
                    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $elementos->images['logoFooter'] , 'c' => 'd-block footer--logo' , 'n' => 'Logo ' . env('APP_NAME') ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php if(!empty($elementos->redes)): ?>
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
                        <?php echo e(translate("text_seguinos", $idioma)); ?>

                        <div class="mt-1">
                            <?php $__currentLoopData = $elementos->redes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e($v['url']); ?>" target="blank"><?php echo $ARR_redes[$v["redes"]]; ?> <?php echo e($v["titulo"]); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg">
                <h3 class="footer--title"><?php echo e(translate("label_secciones", $idioma)); ?></h3>
                <ul class="list-unstyled mb-0 footer--list footer--list__column">
                    <?php $__currentLoopData = $elementos->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $class = "";
                            for($i = 0; $i < count($section["REQUEST"]); $i++) {
                                if (Request::is($section["REQUEST"][$i]))
                                    $class = "active";
                            }
                        ?>
                        <li class="text-truncate"><a class="<?php echo e($class); ?>" href="<?php echo e($link ? URL::to("{$idioma}{$section['LINK']}") : '#'); ?>"><?php echo e(translate($section['TRANSLATE'], $idioma)); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg mt-md-4 mt-lg-0">
                <h3 class="footer--title"><?php echo e(translate("label_newsletter", $idioma)); ?></h3>
                <div>
                    <?php echo $elementos->text["text_footer"][$idioma]; ?>

                </div>
                <form class="d-flex footer-form" onsubmit="event.preventDefault();enviarNewsletter(this);" action="<?php echo e(URL::to('newsletter')); ?>" id="form-newsletter" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="idioma" value="<?php echo e($idioma); ?>">
                    <input required type="email" name="dato" class="form-control" placeholder="<?php echo e(translate('placeholder_email', $idioma)); ?>">
                    <button class="btn footer--btn"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
            <div class="col-12 col-md mt-md-4 mt-lg-0">
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
</footer><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/layouts/general/footer.blade.php ENDPATH**/ ?>