<section class="my-3">
    <div class="container-fluid">
        <form action="" method="post">
            <?php echo csrf_field(); ?>
            <?php for($i = 0; $i < count($data["elementos"]); $i++): ?>
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md">
                                <label for="">LINK</label>
                                <input value="<?php echo e($data['elementos'][$i]['LINK']); ?>" type="text" name="LINK[<?php echo e($i); ?>]" class="form-control">
                            </div>
                            <div class="col-12 col-md">
                                <label for="">TRANSLATE</label>
                                <input value="<?php echo e($data['elementos'][$i]['TRANSLATE']); ?>" type="text" name="TRANSLATE[<?php echo e($i); ?>]" class="form-control">
                            </div>
                            <div class="col-12 col-md">
                                <label for="">FIRST</label>
                                <input value="<?php echo e($data['elementos'][$i]['FIRST']); ?>" type="text" name="FIRST[<?php echo e($i); ?>]" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 mb-1">
                                <label for="">REQUEST</label>
                            </div>
                            <?php for($j = 0; $j < count($data['elementos'][$i]['REQUEST']); $j++): ?>
                            <div class="col-12 col-md">
                                <input value="<?php echo e($data['elementos'][$i]['REQUEST'][$j]); ?>" type="text" name="REQUEST[<?php echo e($i); ?>][<?php echo e($j); ?>]" class="form-control">
                            </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
            <button class="btn btn-success btn-lg px-4 mt-4 text-uppercase">RUTAS</button>
        </form>
    </div>
</div><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/auth/parts/empresaSecciones.blade.php ENDPATH**/ ?>