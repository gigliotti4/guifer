<header class="header">
    <div class="header--important">
        <div class="container d-flex justify-content-lg-between justify-content-md-end justify-content-end align-items-stretch">
            <div class="header--datos d-none d-lg-block">
                <ul class="list-unstyled header--list header--list__normal header--hidden header--list__separador justify-content-end align-items-center">
                    <?php if($elementos->phone): ?>
                        <?php
                        $phone = [];
                        foreach($elementos->phone AS $t) {
                            if ($t["in_header"]) {
                                if (!isset($phone[$t[ "tipo" ]]))
                                    $phone[$t[ "tipo" ]] = [];
                                $phone[$t[ "tipo" ]][] = $t;
                            }
                        }
                        ?>
                        <?php if(isset($phone["tel"])): ?>
                        <li class="d-flex align-items-center">
                            <i class="footer--icon header--icon fas fa-phone-alt"></i>
                            <div class="footer--info d-flex align-items-center">
                            <?php for($i = 0; $i < count($phone["tel"]); $i++): ?>
                                <?php if($i != 0): ?>
                                <span class="mx-1">/</span>
                                <?php endif; ?>
                                <?php echo $__env->make( 'layouts.general.telefono' , [ "dato" => $phone["tel"][$i]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endfor; ?>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php if(isset($phone["wha"])): ?>
                        <li class="d-flex align-items-center">
                        <i class="fab fa-whatsapp footer--icon header--icon"></i>
                            <div class="footer--info d-flex align-items-center">
                            <?php for($i = 0; $i < count($phone["wha"]); $i++): ?>
                                <?php if($i != 0): ?>
                                <span>/</span>
                                <?php endif; ?>
                                <?php echo $__env->make( 'layouts.general.telefono' , [ "dato" => $phone["wha"][$i]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endfor; ?>
                            </div>
                        </li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
                <p class="header--schedule"><i class="far fa-clock footer--icon header--icon"></i><?php echo e($elementos->schedule); ?></p>
            </div>
            <div class="header--search">
                <form action="<?php echo e($link ? URL::to('/search') : '#'); ?>" method="get">
                    <button type="submit" class="btn btn-link btn-sm header--btn"><i class="fas fa-search" aria-hidden="true"></i></button>
                    <input pattern="(.|\s)*\S(.|\s)*" <?php if(!$link): ?> disabled <?php endif; ?> type="search" required placeholder="Estoy buscando" name="s" class="header--input">
                </form>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-between align-items-end">
        <div class="header-logo d-flex align-items-center">
            <?php
            $section = $elementos->sections[0];
            $class = "text-uppercase";
            for($i = 0; $i < count($section["REQUEST"]); $i++) {
                if (Request::is("{$section["REQUEST"][$i]}"))
                    $class = " active";
            }
            ?>
            <a href="<?php echo e($link ? URL::to("{$section['LINK']}") : '#'); ?>">
                <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $elementos->images['logo'] , 'c' => 'd-block header--logo' , 'n' => 'Logo ' . env('APP_NAME') ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            <ul class="list-unstyled mb-0 header--list justify-content-end">
                <?php $__currentLoopData = $elementos->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($section["SHOW"]): ?>
                    <?php
                        $class = "header--link";
                        for($i = 0; $i < count($section["REQUEST"]); $i++) {
                            if (Request::is("{$section["REQUEST"][$i]}"))
                                $class .= " active";
                        }
                    ?>
                    <li><a class="<?php echo e($class); ?>" href="<?php echo e($link ? URL::to("{$section['LINK']}") : '#'); ?>"><?php echo e($section['NAME']); ?></a></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <?php if($elementos->phone): ?>
            <?php $__currentLoopData = $elementos->phone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($t["in_header"]): ?>
                <li class="d-flex align-items-start">
                    <?php if($t[ "tipo" ] == "tel"): ?>
                        <i class="footer--icon header--icon fas fa-phone-alt"></i>
                    <?php else: ?>
                        <i class="fab fa-whatsapp footer--icon header--icon"></i>
                    <?php endif; ?>
                    <div class="footer--info">
                        <?php echo $__env->make( 'layouts.general.telefono' , [ "dato" => $t ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </ul>
    <hr>
    <ul class="list-unstyled mb-0 flex-column">
        <?php $__currentLoopData = $elementos->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $class = "";
                for($i = 0; $i < count($section["REQUEST"]); $i++) {
                    if (Request::is("{$section["REQUEST"][$i]}"))
                        $class = "active";
                }
            ?>
            <li><a class="<?php echo e($class); ?>" href="<?php echo e($link ? URL::to("{$section['LINK']}") : '#'); ?>"><?php echo e($section['NAME']); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div><?php /**PATH /home/pablo/Escritorio/guifer2/resources/views/layouts/general/header.blade.php ENDPATH**/ ?>