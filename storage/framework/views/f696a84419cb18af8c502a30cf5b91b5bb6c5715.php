<?php if( $dato[ "is_link" ] ): ?>
    <?php if( !empty( $dato[ "telefono" ] ) && !empty( $dato[ "visible" ] ) ): ?>
        <?php if( $dato[ "tipo" ] == "tel" ): ?>
        <a class="text-truncate d-inline-block" title="<?php echo e($dato[ 'visible' ]); ?>" href="tel:<?php echo e($dato[ 'telefono' ]); ?>"><?php echo e($dato[ "visible" ]); ?></a>
        <?php else: ?>
        <a class="whatsapp text-truncate d-inline-block" title="WHATSAPP: <?php echo e($dato[ 'visible' ]); ?>" href="https://wa.me/<?php echo e($dato[ 'telefono' ]); ?>"><?php echo e($dato[ "visible" ]); ?></a>
        <?php endif; ?>
    <?php endif; ?>
<?php else: ?>
    <?php if( empty( $dato[ "telefono" ] ) && !empty( $dato[ "visible" ] ) ): ?>
    <span title="<?php echo e($dato[ 'visible' ]); ?>"><?php echo e($dato[ "visible" ]); ?></span>
    <?php elseif( empty( $dato[ "visible" ] ) && !empty( $dato[ "telefono" ] ) ): ?>
    <span title="<?php echo e($dato[ 'telefono' ]); ?>"><?php echo e($dato[ "telefono" ]); ?></span>
    <?php else: ?>
    <span title="<?php echo e($dato[ 'visible' ]); ?>"><?php echo e($dato[ "visible" ]); ?></span>
    <?php endif; ?>
<?php endif; ?>
<?php if( !empty( $dato[ "texto" ] ) ): ?>
<p class="text-center mt-n2"><?php echo e($dato[ "texto" ]); ?></p>
<?php endif; ?><?php /**PATH /home/pablo/Escritorio/guifer2/resources/views/layouts/general/telefono.blade.php ENDPATH**/ ?>