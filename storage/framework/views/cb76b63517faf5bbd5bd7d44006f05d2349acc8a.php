<footer>
    <div class="container pb-2 pt-4 position-relative">
        <div class="row justify-content-start pt-3">
            <div class="col-12 col-md-6 col-lg-4 d-flex order-o-1">
                <img class="logo align-self-center" src="<?php echo e(asset($data['empresa']->images['logoFooter'][ 'i' ])); ?>" alt="" srcset="">
            </div>
            <div class="col-12 col-md-6 col-lg order-o-3">
                <h3 class="title mb-2">Mapa del sitio</h3>
                <div class="d-flex">
                    <ul class="list-unstyled mb-0 menu">
                    <?php if(auth()->guard('client')->check()): ?>
                        <li><a href="<?php echo e(URL::to( 'cliente/descargas' )); ?>">Descargas</a></li>
                        <li><a href="<?php echo e(URL::to( 'cliente/datos' )); ?>">Mis datos</a></li>
                    <?php else: ?>
                        <?php $__currentLoopData = $data[ "empresa" ]->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(URL::to( $s[ 'LINK' ] )); ?>"><?php echo e($s[ 'NAME' ]); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="row justify-content-start">
            <div class="col-12 col-md-4 mt-0 col-lg">
                <?php echo $__env->make( 'layouts.general.domicilio' , [ "dato" => $data[ 'empresa' ]->domicile , "link" => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-12 col-md-4 mt-0 col-lg">
                <ul class="list-unstyled info mb-0">
                    <li class="d-flex align-items-start">
                        <i class="fas fa-phone-volume"></i>
                        <div>
                            <?php $__currentLoopData = $data[ "telefono" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make( 'layouts.general.telefono' , [ "dato" => $t ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </li>
                </ul>
            </div>
            <?php if( !empty( $data[ "whatsapp" ] ) ): ?>
                <div class="col-12 col-md-4 mt-0 col-lg">
                    <ul class="list-unstyled info mb-0">
                        <li class="d-flex align-items-start">
                            <i class="fab fa-whatsapp"></i>
                            <div>
                                <p>WhatsApp</p>
                                <?php $__currentLoopData = $data[ "whatsapp" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make( 'layouts.general.telefono' , [ "dato" => $t ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="col-12 col-md-4 mt-0 col-lg">
                <ul class="list-unstyled info mb-0">
                    <li class="d-flex align-items-start">
                        <i class="far fa-envelope"></i>
                        <div>
                            <p>Escríbanos a</p>
                            <?php $__currentLoopData = $data["empresa"]->email; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make( 'layouts.general.email' , [ "dato" => $e ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg">
                <p>Seguinos en</p>
                <?php
                $social_networks = [ 
                    'instagram' => '<i class="fab fa-instagram"></i>',
                    'linkedin' => '<i class="fab fa-linkedin-in"></i>',
                    'youtube' => '<i class="fab fa-youtube"></i>',
                    'facebook' => '<i class="fab fa-facebook-f"></i>',
                    'twitter' => '<i class="fab fa-twitter"></i>',
                    'pinterest' => '<i class="fab fa-pinterest-p"></i>'
                ];
                ?>
                <div class="d-flex social-networks ml-n2">
                    <?php $__currentLoopData = $data[ "empresa" ]->social_networks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $red): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="ml-2" href="<?php echo e($red[ 'url' ]); ?>" target="_blank" rel="noopener noreferrer" title="<?php echo e($red[ 'titulo' ]); ?>"><?php echo $social_networks[ $red[ 'redes' ] ]; ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="osole py-3">
        <div class="container">
            <div class="row by">
                <div class="col-12">
                    <p class="mb-0 d-flex justify-content-between">
                        <span>© 2019</span>
                        <a target="_blank" href="<?php echo e(env('APP_UAUTHOR')); ?>" style="color:inherit" class="right text-uppercase">by <?php echo e(env('APP_AUTHOR')); ?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer><?php /**PATH /home/osolelar/hidratools_laravel/resources/views/layouts/general/footer.blade.php ENDPATH**/ ?>