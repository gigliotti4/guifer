<?php if(isset($data[ "marcas" ])): ?>
<div class="marcas py-5">
    <h2 class="marcas--title"><?php echo e(translate("text_marcas", $idioma)); ?></h2>
    <div class="container mt-4">
        <div class="d-flex justify-content-center px-5 flex-wrap">
            <?php $__currentLoopData = $data[ "marcas" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!empty($p->image)): ?>
                    <a href="<?php echo e(URL::to($idioma . '/productos/marca/' . str_slug($p->nombre) . '/' . $p->id)); ?>" class="d-inline-block">
                        <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $p->image , 'c' => 'marca--image' , 'n' => $p->nombre ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="home">
    <div class="container">
        <h2 class="home--title"><?php echo e($elementos["frase_1"][$idioma]); ?></h2>
        <h3 class="home--subtitle"><?php echo e($elementos["frase_2"][$idioma]); ?></h3>
        <ul class="home--numeros justify-content-center">
            <?php $__currentLoopData = $elementos["numero"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $numero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="home--numeros-list mt-4">
                <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $numero["image"] , 'c' => 'home--numero-img' , 'n' => $numero["order"] ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <p class="home--numero-number"><?php echo e($numero["order"]); ?></p>
                <p class="home--numero-text"><?php echo e($numero["texto"][$idioma]); ?></p>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/page/parts/home.blade.php ENDPATH**/ ?>