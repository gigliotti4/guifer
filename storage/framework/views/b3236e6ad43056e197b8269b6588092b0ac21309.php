<?php
$domicilio = "";
$domicilio = "{$dato[ 'calle' ]} {$dato[ 'altura' ]}";
if( !empty( $dato[ 'cp' ] ) )
    $domicilio .= " ({$dato[ 'cp' ]})";
if( !empty( $dato[ 'localidad' ] ) )
    $domicilio .= ", {$dato[ 'localidad' ]}";
if( !empty( $dato[ 'provincia' ] ) )
    $domicilio .= ", {$dato[ 'provincia' ]}";
if( !empty( $dato[ 'detalle' ] ) )
    $domicilio .= " - {$dato[ 'detalle' ]}";
?>
<?php if( $link ): ?>
    <a href="<?php echo e($dato[ 'link' ]); ?>"><?php echo e($domicilio); ?></a>
<?php else: ?>
    <?php echo e($domicilio); ?>

<?php endif; ?><?php /**PATH /home/pablo/Escritorio/hidratools/resources/views/layouts/general/domicilio.blade.php ENDPATH**/ ?>