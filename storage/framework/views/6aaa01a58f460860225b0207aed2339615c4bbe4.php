<div class="lateral sticky-top">
    <button class="btn btn-primary text-uppercase d-block d-sm-none mb-2 lateral--btn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Productos
    </button>
    <div class="sidebar collapse dont-collapse-sm" id="accordionMenu">
        <ul class="list-group list-group-flush menu-lateral">
        <?php $__currentLoopData = $elementos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make("page.parts.menu", ["dato" => $m, "tipo" => 1, "padre" => null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div><?php /**PATH /home/pablo/Escritorio/guifer2/resources/views/page/parts/lateral.blade.php ENDPATH**/ ?>