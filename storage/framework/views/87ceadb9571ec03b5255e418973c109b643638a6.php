<li class="list-group-item p-0" id="heading_<?php echo e($tipo); ?>_<?php echo e($dato->id); ?>">
    <?php
    $class = "d-flex align-items-center justify-content-between lateral--element";
    $expanded = "true";
    if(isset($data[ "marca_id" ])) {
        if( $dato->getTable() != "marcas" ) {
            if( !in_array( $dato->id , $data[ 'Arr_menu' ] ) ) {
                $class .= " collapsed";
                $expanded = "false";
            }
        } elseif( $dato->id != $data[ "marca_id" ] ) {
            $class .= " collapsed";
            $expanded = "false";
        }
    } else
        $expanded = "false";
    ?>
    <div class="<?php echo e($class); ?>" data-toggle="collapse" data-target="#collapse_<?php echo e($tipo); ?>_<?php echo e($dato->id); ?>" aria-expanded="<?php echo e($expanded); ?>">
        <?php
        $nombre = $dato->nombre;
        if( $tipo ) {
            $familias = $dato->familias()->whereNull( "familia_id" )->orderBy( "orden" )->get();
            $url = URL::to( $idioma . '/productos/marca/' . str_slug( $dato->nombre ) . '/' . $dato->id);
        } else {
            $familias = $dato->familias;
            $url = URL::to( $idioma . '/productos/familia/' . str_slug( $dato->nombre[$idioma] ) . '/' . $dato->id);
        }
        if(!$link)
            $url = "#";
        if( gettype( $nombre ) != "string" )
            $nombre = $nombre[$idioma];
        ?>
        <a class="p-3 d-inline-block" href="<?php echo e($url); ?>">
            <?php echo e($nombre); ?>

        </a>
        <?php if( $familias->isNotEmpty() ): ?>
        <i class="fas fa-angle-right mr-3"></i>
        <?php endif; ?>
    </div>
    <?php if( $familias->isNotEmpty() ): ?>
        <?php
        $class = "list-group pl-4 collapse";
        if(isset($data[ "marca_id" ])) {
            if( $dato->getTable() != "marcas" ) {
                if( isset( $data[ 'Arr_menu' ] ) ) {
                    if( in_array( $dato->id , $data[ 'Arr_menu' ] ) )
                        $class .= " show";
                }
            } elseif( $dato->id == $data[ "marca_id" ] )
                $class .= " show";
        }
        ?>
        <ul class="<?php echo e($class); ?>" id="collapse_<?php echo e($tipo); ?>_<?php echo e($dato->id); ?>"  aria-labelledby="heading_<?php echo e($tipo); ?>_<?php echo e($dato->id); ?>" data-parent="<?php if( $tipo == 1 ): ?> #accordionMenu <?php else: ?> #heading_<?php echo e($tipo); ?>_<?php echo e($dato->id); ?> <?php endif; ?>">
        <?php $__currentLoopData = $familias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('page.parts.menu', [ 'dato' => $f , "tipo" => 0 , "padre" => $dato ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
</li><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/page/parts/menu.blade.php ENDPATH**/ ?>