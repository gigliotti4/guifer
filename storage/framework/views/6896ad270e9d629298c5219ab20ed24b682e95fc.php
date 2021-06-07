<?php if(isset($form)): ?>
<div class="card mt-2 border-0">
    <div class="card-body">
        <form action="<?php echo e($form['url']); ?>" method="get">
            <div class="d-flex">
                <input aria-label="Search" oninvalid="this.setCustomValidity('Ingrese una palabra mayor a 3 caracteres')"  oninput="setCustomValidity('')" required pattern=".{3,}" <?php if(!empty($form["search"])): ?> value="<?php echo e($form["search"]); ?>" <?php endif; ?> placeholder="<?php echo e($form['placeholder']); ?>" type="search" class="form-control form-control-lg border-left-0 border-top-0 border-rigth-0" name="search"/>
                <a href="<?php echo e($form['url']); ?>" class="btn btn-info btn-lg border-0"><i class="fas fa-undo"></i></a>
                <button class="btn btn-success btn-lg border-0"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
</div>
<?php endif; ?>
<div class="card border-0 mt-2" id="wrapper-tabla">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0" id="tabla"></table>
        </div>
    </div>
    <?php if(isset( $paginate )): ?>
    <div class="card-footer d-flex justify-content-center">
        <?php if(!empty($form["search"])): ?>
        <?php echo e($paginate->appends(["search" => $form["search"]])->links()); ?>

        <?php else: ?>
        <?php echo e($paginate->links()); ?>

        <?php endif; ?>
    </div>
    <?php endif; ?>
</div><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/layouts/general/table.blade.php ENDPATH**/ ?>