<!DOCTYPE html>
<html>
<body>
    <?php $__currentLoopData = $elementos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(isset( $$k )): ?>
    <p><strong><?php echo e($v); ?>:</strong> <?php echo e($$k); ?></p>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php
    $pedido = json_decode( $pedido , true );
    ?>
    <table style="width: 100%" border="0">
        <thead>
            <th style="width: 150px; padding: 0.75rem; vertical-align: top; border-top: 1px solid #dee2e6;"></th>
            <th style="width: 250px; padding: 0.75rem; vertical-align: top; border-top: 1px solid #dee2e6;">Producto</th>
            <th style="padding: 0.75rem; vertical-align: top; border-top: 1px solid #dee2e6;">Marca</th>
            <th style="width: 150px; padding: 0.75rem; vertical-align: top; border-top: 1px solid #dee2e6;">Cantidad</th>
        </thead>
        <tbody>
            <?php $__currentLoopData = $pedido; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="padding: 0.75rem; vertical-align: top; border-top: 1px solid #dee2e6;"><img src="<?php echo e($e['img']); ?>" style="width:100%"/></td>
                <td style="padding: 0.75rem; vertical-align: top; border-top: 1px solid #dee2e6;"><?php echo e($e["name"]); ?></td>
                <td style="padding: 0.75rem; vertical-align: top; border-top: 1px solid #dee2e6;"><?php echo e($e["category"]); ?></td>
                <td style="text-align:center; padding: 0.75rem; vertical-align: top; border-top: 1px solid #dee2e6;"><?php echo e($e["cant"]); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/form/presupuesto.blade.php ENDPATH**/ ?>