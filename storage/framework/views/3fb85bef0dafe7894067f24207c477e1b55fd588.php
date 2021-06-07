<section class="my-3">
    <div class="container-fluid">
        <form action="" method="post">
            <?php echo csrf_field(); ?>
            <?php for($i = 0; $i < count($data["elementos"]); $i++): ?>
                <div class="card mt-4 border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md">
                                <label>LINK</label>
                                <input oninvalid="this.setCustomValidity('No sea boludo, completa el campo con los valores correctos (a-z0-9_/)')" oninput="setCustomValidity('')" pattern="[a-z0-9_-/]+" required <?php if(isset($data['elementos'][$i]['LINK'])): ?> value="<?php echo e($data['elementos'][$i]['LINK']); ?>" <?php endif; ?> type="text" name="LINK[<?php echo e($i); ?>]" class="form-control form-control-sm">
                                <small class="form-text text-muted">URL visible</small>
                            </div>
                            <div class="col-12 col-md">
                                <label>NAME</label>
                                <input oninvalid="this.setCustomValidity('No sea boludo, completa el campo con los valores correctos (a-zA-Z0-9)')" oninput="setCustomValidity('')" pattern="[a-zA-Z0-9áéíóú\s]+" required <?php if(isset($data['elementos'][$i]['NAME'])): ?> value="<?php echo e($data['elementos'][$i]['NAME']); ?>" <?php endif; ?> type="text" name="NAME[<?php echo e($i); ?>]" class="form-control form-control-sm">
                                <small class="form-text text-muted">Nombre visible en el menu</small>
                            </div>
                            <div class="col-12 col-md">
                                <label>SHOW</label>
                                <select name="SHOW[<?php echo e($i); ?>]" class="form-control form-control-sm">
                                    <option <?php if(!$data['elementos'][$i]['SHOW']): ?> selected <?php endif; ?> value="0">Hidden</option>
                                    <option <?php if($data['elementos'][$i]['SHOW']): ?> selected <?php endif; ?> value="1">Visible</option>
                                </select>
                            </div>
                            <div class="col-12 col-md function">
                                <label>FUNCTION</label>
                                <input readonly oninvalid="this.setCustomValidity('No sea boludo, completa el campo con los valores correctos (a-z_)')" oninput="setCustomValidity('')" pattern="[a-z_]+" required <?php if(isset($data['elementos'][$i]['FUNCTION'])): ?> value="<?php echo e($data['elementos'][$i]['FUNCTION']); ?>" <?php endif; ?> type="text" name="FUNCTION[<?php echo e($i); ?>]" class="form-control form-control-sm">
                                <small class="form-text text-muted">Función en el controlador</small>
                                <label><span class="mr-2">Activar campo</span><input onchange="activeInput(this);" type="checkbox" name="" id=""></label>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2 request">
                            <div class="col-12 mb-1">
                                <label class="mb-1">REQUEST<button type="button" onclick="addRequest(this);" class="btn btn-primary btn-sm ml-3"><i class="fas fa-plus"></i></button></label>
                                <small class="mb-3 form-text text-muted">Palabras claves para activar el link</small>
                            </div>
                            <?php for($j = 0; $j < count($data['elementos'][$i]['REQUEST']); $j++): ?>
                            <div class="col-12 col-md d-flex option">
                                <input oninvalid="this.setCustomValidity('No sea boludo, completa el campo con los valores correctos (a-z- _ / *)')" oninput="setCustomValidity('')" pattern="[a-z-_/*]+" required value="<?php echo e($data['elementos'][$i]['REQUEST'][$j]); ?>" type="text" name="REQUEST[<?php echo e($i); ?>][]" class="form-control form-control-sm">
                                <button type="button" onclick="removeRequest(this);" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                            </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
            <button class="btn btn-success btn-lg px-4 mt-4 text-uppercase">RUTAS</button>
        </form>
    </div>
</div>
<?php $__env->startPush("scripts"); ?>
<script>
    activeInput = t => {
        let input = t.closest(".function").querySelector("input[type='text']");
        if (t.checked)
            input.removeAttribute("readonly");
        else
            input.setAttribute("readonly", true);
    };
    removeRequest = t => {
        const target = t.closest(".request");
        const elements = target.querySelectorAll(".option");
        const element = t.closest(".option");
        if (elements.length === 1) {
            Toast.fire({
                icon: 'error',
                title: 'No se puede eliminar'
            });
            return null;
        }
        element.remove();
    };
    addRequest = t => {
        const target = t.closest(".request");
        const elements = target.querySelectorAll(".option");
        let element = elements[0].cloneNode(true);
        element.querySelector("input").value = "";
        target.appendChild(element);
    };
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/pablo/Escritorio/guifer2/resources/views/auth/parts/empresaSecciones.blade.php ENDPATH**/ ?>