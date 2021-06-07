<header class="header">
    <div class="header--important">
        <div class="container d-flex justify-content-lg-between justify-content-md-end justify-content-end align-items-center">
            <ul class="list-unstyled header--list header--hidden header--list__separador justify-content-end align-items-center">
                <?php $__currentLoopData = $elementos->telefono; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($t["in_header"]): ?>
                    <li class="d-flex align-items-center">
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
                <li class="d-flex align-items-center">
                    <form action="<?php echo e($link ? URL::to($idioma . '/search') : '#'); ?>" method="get">
                        <button type="submit" class="btn btn-link btn-sm header--btn"><i class="fas fa-search" aria-hidden="true"></i></button>
                        <input <?php if(!$link): ?> disabled <?php endif; ?> type="search" placeholder="<?php echo e(translate('placeholder_buscar', $idioma)); ?>" name="s" class="header--input">
                    </form>
                </li>
            </ul>
            <ul class="list-unstyled header--list header--list__separador justify-content-end align-items-center">
                <li class="d-flex align-items-center">
                    <?php
                    $section = $elementos->sections[4];
                    $class = "text-uppercase header--hidden";
                    for($i = 0; $i < count($section["REQUEST"]); $i++) {
                        if (Request::is("{$idioma}/{$section["REQUEST"][$i]}"))
                            $class .= " active";
                    }
                    ?>
                    <a class="<?php echo e($class); ?>" id="link--presupuesto" href="<?php echo e($link ? URL::to("{$idioma}{$section['LINK']}") : '#'); ?>"><?php echo e(translate($section['TRANSLATE'], $idioma)); ?></a>
                </li>
                <li class="d-flex align-items-center">
                    <div class="header--select">
                        <div class="btn-group">
                            <?php
                            $language = [
                                "es" => "<span class='header--language__language header--language__es'><img src='" . asset('images/es.png') . "' class='header--language__image' /></span>",
                                "en" => "<span class='header--language__language header--language__en'><img src='" . asset('images/en.png') . "' class='header--language__image' /></span>",
                                "it" => "<span class='header--language__language header--language__it'><img src='" . asset('images/it.png') . "' class='header--language__image' /></span>"
                            ];
                            $url = [
                                "es" => !isset($data['urls']) ? str_replace("/{$idioma}/", "/es/", Request::url()) : $data['urls']['es'],
                                "en" => !isset($data['urls']) ? str_replace("/{$idioma}/", "/en/", Request::url()) : $data['urls']['en'],
                                "it" => !isset($data['urls']) ? str_replace("/{$idioma}/", "/it/", Request::url()) : $data['urls']['it']
                            ];
                            ?>
                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $language[$idioma]; ?>

                            </button>
                            <div class="dropdown-menu dropdown-menu-right header--language__menu">
                                <a href="<?php echo e($url['es']); ?>" class="header--language__item header--language__language header--language__es">
                                    <?php echo $__env->make('layouts.general.image', ['i' => 'images/es.png' , 'c' => 'header--language__image' , 'n' => 'ES'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </a>
                                <a href="<?php echo e($url['en']); ?>" class="header--language__item header--language__language header--language__en">
                                    <?php echo $__env->make('layouts.general.image', ['i' => 'images/en.png' , 'c' => 'header--language__image' , 'n' => 'EN'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </a>
                                <a href="<?php echo e($url['it']); ?>" class="header--language__item header--language__language header--language__it">
                                    <?php echo $__env->make('layouts.general.image', ['i' => 'images/it.png' , 'c' => 'header--language__image' , 'n' => 'IT'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="container d-flex justify-content-between align-items-center">
        <div class="header-logo d-flex align-items-center">
            <?php
            $section = $elementos->sections[0];
            $class = "text-uppercase";
            for($i = 0; $i < count($section["REQUEST"]); $i++) {
                if (Request::is("{$idioma}/{$section["REQUEST"][$i]}"))
                    $class = " active";
            }
            ?>
            <a href="<?php echo e($link ? URL::to("{$idioma}{$section['LINK']}") : '#'); ?>">
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
                    <?php if(empty($section["FIRST"])): ?>
                    <?php
                        $class = "";
                        for($i = 0; $i < count($section["REQUEST"]); $i++) {
                            if (Request::is("{$idioma}/{$section["REQUEST"][$i]}"))
                                $class = "active";
                        }
                    ?>
                    <li><a class="<?php echo e($class); ?>" href="<?php echo e($link ? URL::to("{$idioma}{$section['LINK']}") : '#'); ?>"><?php echo e(translate($section['TRANSLATE'], $idioma)); ?></a></li>
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
    </ul>
    <hr>
    <ul class="list-unstyled mb-0 flex-column">
        <?php $__currentLoopData = $elementos->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $class = "";
                for($i = 0; $i < count($section["REQUEST"]); $i++) {
                    if (Request::is("{$idioma}/{$section["REQUEST"][$i]}"))
                        $class = "active";
                }
            ?>
            <li><a class="<?php echo e($class); ?>" href="<?php echo e($link ? URL::to("{$idioma}{$section['LINK']}") : '#'); ?>"><?php echo e(translate($section['TRANSLATE'], $idioma)); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/layouts/general/header.blade.php ENDPATH**/ ?>