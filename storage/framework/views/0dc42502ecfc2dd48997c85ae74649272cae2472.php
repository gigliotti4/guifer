<div class="card border-0 mt-2" id="wrapper-tabla">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0" id="tabla"></table>
        </div>
    </div>
    <?php if(isset( $paginate )): ?>
    <div class="card-footer d-flex justify-content-center">
        <?php if( isset( $buscar ) ): ?>
        <?php echo e($paginate->appends( [ "buscar" => $buscar ] )->links()); ?>

        <?php else: ?>
        <?php echo e($paginate->links()); ?>

        <?php endif; ?>
    </div>
    <?php endif; ?>
</div><?php /**PATH /home/pablo/Escritorio/hidratools/resources/views/layouts/general/table.blade.php ENDPATH**/ ?>