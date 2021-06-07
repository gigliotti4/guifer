<div class="position-relative h-100">
    <ul class="list-unstyled bg-white nav components d-block m-0 p-0">
        <?php $__currentLoopData = MENU; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(isset($i["separar"])): ?>
            <li class="nav-item"><hr></li>
            <?php elseif(!isset($i["submenu"])): ?>
            <li class="nav-item" title="<?php echo e($i['nombre']); ?>">
                <a class="nav-link" data-link="a" href="<?php echo e($i['url']); ?>">
                    <?php echo $i["icono"]; ?>

                    <?php if(!isset($i["ok"])): ?>
                    <strike><span class="nav-label"><?php echo e($i["nombre"]); ?></span></strike>
                    <?php else: ?>
                    <span class="nav-label"><?php echo e($i["nombre"]); ?></span>
                    <?php endif; ?>
                </a>
            </li>
            <?php else: ?>
            <li class="nav-item <?php if(route::current()->getName() == 'categorias.index' && $i[ 'id' ] == 'productos' || route::current()->getName() == 'productoimage.index' && $i[ 'id' ] == 'productos' || route::current()->getName() == 'productos.index' && $i[ 'id' ] == 'productos' || route::current()->getName() == 'descargapartes.index' && $i[ 'id' ] == 'descargas'): ?> active <?php endif; ?>" title="<?php echo e($i['nombre']); ?>">
                <a class="nav-link" href="#<?php echo e($i[ 'id' ]); ?>Submenu" data-toggle="collapse" aria-expanded="<?php if(route::current()->getName() == 'categorias.index' && $i[ 'id' ] == 'productos' || route::current()->getName() == 'productoimage.index' && $i[ 'id' ] == 'productos' || route::current()->getName() == 'productos.index' && $i[ 'id' ] == 'productos' || route::current()->getName() == 'descargapartes.index' && $i[ 'id' ] == 'descargas'): ?> true <?php else: ?> false <?php endif; ?>">
                    <?php echo $i['icono']; ?>

                    <?php if(!isset($i["ok"])): ?>
                    <strike><span class="nav-label"><?php echo e($i['nombre']); ?></span></strike>
                    <?php else: ?>
                    <span class="nav-label"><?php echo e($i['nombre']); ?></span>
                    <?php endif; ?>
                </a>
                <ul class="collapse list-unstyled <?php if(route::current()->getName() == 'categorias.index' && $i[ 'id' ] == 'productos' || route::current()->getName() == 'productoimage.index' && $i[ 'id' ] == 'productos' || route::current()->getName() == 'productos.index' && $i[ 'id' ] == 'productos' || route::current()->getName() == 'descargapartes.index' && $i[ 'id' ] == 'descargas'): ?> show <?php endif; ?>" id="<?php echo e($i['id']); ?>Submenu">
                <?php $__currentLoopData = $i["submenu"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item" title="<?php echo e($o['nombre']); ?>"    >
                    <a class="nav-link" data-link="u" href="<?php echo e($o['url']); ?>">
                        <?php echo $o['icono']; ?>

                        <span class="nav-label"><?php echo e($o['nombre']); ?></span>
                    </a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    
    <a class="nav-soporte position-absolute" href="https://osole.freshdesk.com/support/home" target="_blank">
        <i class="nav-icon fas fa-ticket-alt"></i>
        <span class="nav-label">Soporte</span>
    </a>
</div><?php /**PATH /home/osolelar/hidratools_laravel/resources/views/layouts/menu.blade.php ENDPATH**/ ?>