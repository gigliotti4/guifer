<div class="wrapper-videos">
    <h3 class="blogs--title blogs--title__lateral"><?php echo e(translate("label_categorias", App::getLocale())); ?></h3>
    <ul class="list-group blogs--categorias">
        <?php $__currentLoopData = $data["elementos"][ "blog_categorias" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="list-group-item border-0 d-flex justify-content-between"><a href="<?php echo e(URL::to( App::getLocale() . '/blogs/' . str_slug( $c->nombre[App::getLocale()] ) . '/' . $c->id )); ?>"><?php echo e($c->nombre[App::getLocale()]); ?></a><span class="badge badge-pill badge-warning categoria--count"><?php echo e($c->blogs()->count()); ?></span></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<div class="wrapper-redes mt-5">
    <h3 class="blogs--title blogs--title__lateral"><?php echo e(translate("label_redes", App::getLocale())); ?></h3>
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
    <div class="d-flex ml-n3 justify-content-center mt-4">
        <?php $__currentLoopData = $data[ "empresa" ]->redes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $red): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a class="ml-3 social-networks" href="<?php echo e($red[ 'url' ]); ?>" target="_blank" rel="noopener noreferrer" title="<?php echo e($red[ 'titulo' ]); ?>"><?php echo $social_networks[ $red[ 'redes' ] ]; ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/page/parts/blog_lateral.blade.php ENDPATH**/ ?>