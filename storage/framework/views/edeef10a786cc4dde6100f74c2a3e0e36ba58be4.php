<div class="wrapper-videos">
    <h3 class="title text-center">Categorías</h3>
    <ul class="list-group wrapper-categorias">
        <?php $__currentLoopData = $data[ "blog_categorias" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="list-group-item border-0 d-flex justify-content-between"><a href="<?php echo e(URL::to( 'blogs/' . str_slug( $c->title ) . '/' . $c->id )); ?>"><?php echo e($c->title); ?></a><span class="badge badge-pill badge-warning"><?php echo e($c->blogs()->count()); ?></span></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<div class="wrapper-videos mt-5">
    <h3 class="title text-center">Últimos videos</h3>
    <?php $__currentLoopData = $data[ "videos" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mt-4 row">
            <div class="col-12 col-md">
                <iframe class="w-100" src="https://www.youtube.com/embed/<?php echo e($v->url); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p class="mt-2"><?php echo e($v->title); ?></p>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="wrapper-redes mt-5">
    <h3 class="title text-center">Redes sociales</h3>
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
    <div class="d-flex ml-n3 justify-content-center social-networks mt-4">
        <?php $__currentLoopData = $data[ "empresa" ]->social_networks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $red): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a class="ml-3" href="<?php echo e($red[ 'url' ]); ?>" target="_blank" rel="noopener noreferrer" title="<?php echo e($red[ 'titulo' ]); ?>"><?php echo $social_networks[ $red[ 'redes' ] ]; ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH /home/pablo/Escritorio/hidratools/resources/views/page/parts/blog_lateral.blade.php ENDPATH**/ ?>