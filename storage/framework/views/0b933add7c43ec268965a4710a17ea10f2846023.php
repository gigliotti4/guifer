<!DOCTYPE html>
<html>
<body>
<?php if( isset( $data[ "dato" ] ) ): ?>
    <p><strong>IDIOMA:</strong> <?php echo e($data[ "idioma" ]); ?></p>
    <p><strong>EMAIL:</strong> <?php echo e($data[ "dato" ]); ?></p>
<?php else: ?>
<?php echo $txt; ?>

<?php endif; ?>
</body>
</html><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/form/newsletter.blade.php ENDPATH**/ ?>