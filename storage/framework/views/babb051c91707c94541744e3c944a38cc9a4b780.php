<li class="list-group-item p-0" id="heading_<?php echo e($tipo); ?>_<?php echo e($dato->id); ?>">
    <?php
    $class = "d-flex align-items-center justify-content-between lateral--element";
    $expanded = "true";
    if(isset($data[ "category_id" ])) {
        if( $dato->id != $data[ "category_id" ] ) {
            $class .= " collapsed";
            $expanded = "false";
        }
    } else
        $expanded = "false";
    ?>
    <div class="<?php echo e($class); ?>" data-toggle="collapse" data-target="#collapse_<?php echo e($tipo); ?>_<?php echo e($dato->id); ?>" aria-expanded="<?php echo e($expanded); ?>">
        <?php
        $nombre = $dato->name;
        $url = $dato->url();
        if(!$link)
            $url = "#";
        ?>
        <a class="p-3 d-inline-block" href="<?php echo e(URL::to($url)); ?>">
            <?php echo e($nombre); ?>

        </a>
    </div>
    
</li><?php /**PATH /home3/guifer/public_html/laravel/resources/views/page/parts/menu.blade.php ENDPATH**/ ?>