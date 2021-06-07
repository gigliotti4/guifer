<header class="header <?php echo e($link ? 'fixed-top shadow-sm' : ''); ?>">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="header-logo d-flex align-items-center">
            <a href="<?php echo e($link ? URL::to('/') : '#'); ?>">
                <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $elementos->images['logo'] , 'c' => 'd-block header--logo header--logo__normal' , 'n' => 'Logo ' . env('APP_NAME') ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $elementos->images['logoIcon'] , 'c' => 'd-block header--logo header--logo__sticky' , 'n' => 'Logo ' . env('APP_NAME') ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </a>
        </div>
        <div id="menu-buscador">
            <div id="hamburger" class="hamburger" onclick="menuBody( this );">
                <div class="position-relative p-3">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="header--element d-none d-lg-block">
            <ul class="list-unstyled header--list header--list__separador justify-content-end">
                <?php $__currentLoopData = $elementos->telefono; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($t["in_header"]): ?>
                    <li class="d-flex align-items-start">
                        <?php if($t[ "tipo" ] == "tel"): ?>
                            <i class="footer--icon header--icon fas fa-phone-volume"></i>
                        <?php else: ?>
                            <i class="fab fa-whatsapp footer--icon header--icon"></i>
                        <?php endif; ?>
                        <div class="footer--info">
                            <?php echo $__env->make( 'layouts.general.telefono' , [ "dato" => $t ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <li class="d-flex align-items-start">
                    <i class="far fa-clock footer--icon header--icon"></i>
                    <?php echo e($elementos->horario); ?>

                </li>
            </ul>
            <ul class="list-unstyled mb-0 header--list justify-content-end">
                <?php if(isset($data["slug"])): ?>
                    <?php $__currentLoopData = $data["slug"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a <?php if(Request::is("marca/{$k}*")): ?> class="active" <?php endif; ?> href="<?php echo e($link ? URL::to('marca/' . $k) : '#'); ?>"><?php echo e($v); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <li><a <?php if(Request::is("empresa*")): ?> class="active" <?php endif; ?> href="<?php echo e($link ? URL::to('empresa') : '#'); ?>">Empresa</a></li>
                <li><a <?php if(Request::is("contacto*")): ?> class="active" <?php endif; ?> href="<?php echo e($link ? URL::to('contacto') : '#'); ?>">Contacto</a></li>
            </ul>
        </div>
    </div>
</header>
<div id="wrapper-menu" class="position-fixed">
    <div id="hamburger-" class="hamburger position-absolute open d-none" style="right: 10px; top: 10px; z-index:111; height: 40px" onclick="menuBody( this );">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <a class="mb-4 d-inline-block" href="<?php echo e($link ? URL::to('/') : '#'); ?>">
        <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $elementos->images['logo'] , 'c' => 'd-block header--logo' , 'n' => 'Logo ' . env('APP_NAME') ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </a>
    <ul class="list-unstyled flex-column header--list__small">
        <?php $__currentLoopData = $elementos->telefono; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($t["in_header"]): ?>
            <li class="d-flex align-items-start">
                <?php if($t[ "tipo" ] == "tel"): ?>
                    <i class="footer--icon header--icon fas fa-phone-volume"></i>
                <?php else: ?>
                    <i class="fab fa-whatsapp footer--icon header--icon"></i>
                <?php endif; ?>
                <div class="footer--info">
                    <?php echo $__env->make( 'layouts.general.telefono' , [ "dato" => $t ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <li class="d-flex align-items-start">
            <i class="far fa-clock footer--icon header--icon"></i>
            <?php echo e($elementos->horario); ?>

        </li>
    </ul>
    <hr>
    <ul class="list-unstyled mb-0 flex-column">
        <li><a <?php if(Request::is("/")): ?> class="active" <?php endif; ?> href="<?php echo e($link ? URL::to('/') : '#'); ?>">Inicio</a></li>
        <?php if(isset($data["slug"])): ?>
            <?php $__currentLoopData = $data["slug"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a <?php if(Request::is("marca/{$k}*")): ?> class="active" <?php endif; ?> href="<?php echo e($link ? URL::to('marca/' . $k) : '#'); ?>"><?php echo e($v); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <li><a <?php if(Request::is("empresa*")): ?> class="active" <?php endif; ?> href="<?php echo e($link ? URL::to('empresa') : '#'); ?>">Empresa</a></li>
        <li><a <?php if(Request::is("contacto*")): ?> class="active" <?php endif; ?> href="<?php echo e($link ? URL::to('contacto') : '#'); ?>">Contacto</a></li>
    </ul>
</div>
<?php /**PATH /home/pablo/Escritorio/eurocam/resources/views/layouts/general/header.blade.php ENDPATH**/ ?>