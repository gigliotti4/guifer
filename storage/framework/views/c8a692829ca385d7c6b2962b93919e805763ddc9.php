<?php if( $buttonADD ): ?>
<button id="btnADD" onclick="add( this )" class="btn position-fixed rounded-circle btn-primary text-uppercase" type="button"><i class="fas fa-plus"></i></button>
<?php endif; ?>
<?php if( isset( $data[ "buttons" ] ) ): ?>
<div class="my-2">
    <?php $__currentLoopData = $data[ "buttons" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <button class="btn <?php echo e($d[ 'b' ]); ?> text-center rounded-0">
        <i class="<?php echo e($d[ 'i' ]); ?>" aria-hidden="true"></i> <?php echo e($d[ 't' ]); ?>

    </button>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if(isset( $buttons )): ?>
        <?php $__currentLoopData = $buttons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <button onclick="<?php echo e($d[ 'f' ]); ?>Function( this );" class="btn <?php echo e($d[ 'b' ]); ?> text-center rounded-0">
            <i class="<?php echo e($d[ 'i' ]); ?>" aria-hidden="true"></i> <?php echo e($d[ 't' ]); ?>

        </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>
<?php endif; ?>
<?php if( !$modal ): ?>
<div <?php if( !$form ): ?> style="display: none;" <?php endif; ?> id="wrapper-form" class="mt-3">
    <div class="card border-0">
        <div class="card-body">
            <?php if( $close ): ?>
            <button onclick="remove(this)" type="button" class="close close-form position-absolute" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <?php endif; ?>
            <form id="form" onsubmit="event.preventDefault(); formSubmit(this);" novalidate class="pt-2" action="<?php if(isset( $url )): ?> <?php echo e($url); ?> <?php endif; ?>" <?php if( $buttonADD ): ?> method="post" <?php else: ?> method="put" <?php endif; ?> enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <button class="btn btn-success px-5 text-uppercase btn-lg"><i class="fas fa-save"></i></button>
                <div class="container-form py-3 my-3"></div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success px-5 text-uppercase btn-lg"><i class="fas fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php else: ?>
<div class="modal fade bd-example-modal-lg" id="formModal" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="formModalLabel"></h5>
                <button type="button" class="close" onclick="remove( this );">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" onsubmit="event.preventDefault(); formSubmit(this);" novalidate class="pt-2" action="<?php if(isset( $url )): ?> <?php echo e($url); ?> <?php endif; ?>" <?php if( $buttonADD ): ?> method="post" <?php else: ?> method="put" <?php endif; ?> enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body"></div>
                <div class="modal-footer bg-light">
                    <button type="button" onclick="remove( this );" class="btn btn-danger px-5 text-uppercase">cerrar</button>
                    <button type="submit" class="btn btn-success px-5 text-uppercase"></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?><?php /**PATH /home/pablo/Escritorio/hidratools/resources/views/layouts/general/form.blade.php ENDPATH**/ ?>