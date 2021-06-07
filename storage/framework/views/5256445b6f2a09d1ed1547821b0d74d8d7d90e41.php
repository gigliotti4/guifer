<div class="servicio py-5">
    <div class="container">
        <?php if(!empty($elemento["servicio"])): ?>
        <div class="servicio--element">
            <h2 class="title--important mb-3"><?php echo e(translate("link_servicios", $idioma)); ?></h2>
            <div class="row mt-n4">
                <?php for($i = 0; $i < count($elemento["servicio"]); $i++): ?>
                    <div class="col-12 mt-4 servicio <?php echo e($i % 2 == 0 ? 'servicio--par' : 'servicio--impar'); ?>">
                        <div class="d-flex align-items-center">
                            <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $elemento["servicio"][$i]["image"] , 'c' => 'servicio--icon' , 'n' => 'Imagen ' . $i ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="servicio--text">
                                <h4 class="servicio--title"><?php echo e($elemento["servicio"][$i]["titulo"][$idioma]); ?></h4>
                                <div><?php echo $elemento["servicio"][$i]["texto"][$idioma]; ?></div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<div class="servicio servicio--other py-5">
    <div class="container">
        <?php if(!empty($elemento["texto"][$idioma])): ?>
        <div class="servicio--element">
            <h2 class="title--important mb-3"><?php echo e(translate("label_post", $idioma)); ?></h2>
            <div class="servicio--text servicio--postventa">
                <?php echo $elemento["texto"][$idioma]; ?>

            </div>
            <?php if(!empty($elemento["icono"])): ?>
            <div class="row justify-content-center mt-3 mb-n4">
                <?php for($i = 0; $i < count($elemento["icono"]); $i++): ?>
                <div class="col-12 col-md-4 col-lg-3 mt-4">
                    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $elemento["icono"][$i]["image"] , 'c' => 'servicio--icon__postventa' , 'n' => 'Imagen ' . $i ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <p class="servicio--title servicio--title__postventa"><?php echo e($elemento["icono"][$i]["titulo"][$idioma]); ?></p>
                </div>
                <?php endfor; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<div class="servicio servicio--form py-5">
    <div class="container">
        <div class="servicio--text servicio--postventa">
            <div>
                <?php echo $elemento["form"]["texto"][$idioma]; ?>

            </div>
            <div class="row  justify-content-center mt-4">
                <div class="col-12 col-md-10 col-lg-8">
                    <form <?php if($link): ?> action="<?php echo e(URL::to($idioma . '/servicios')); ?>" <?php endif; ?> id="formContacto" onsubmit="event.preventDefault(); enviar( this )" method="post">
                        <input type="hidden" name="elementos[idioma]" value="Idioma">
                        <input type="hidden" name="elementos[nombre]" value="Nombre">
                        <input type="hidden" name="elementos[email]" value="Email">
                        <input type="hidden" name="elementos[telefono]" value="Teléfono">
                        <input type="hidden" name="elementos[empresa]" value="Empresa">
                        <input type="hidden" name="elementos[mensaje]" value="Mensaje">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="idioma" value="<?php echo e($idioma); ?>">
                        <div class="row">
                            <div class="col-12 col-md">
                                <input <?php if(!$link): ?> disabled <?php endif; ?> aria-label="<?php echo e(translate('label_nombre', $idioma)); ?>" placeholder="<?php echo e(translate('label_nombre', $idioma)); ?> (*)" required type="text" id="nombre" name="nombre" class="form-control form--input" value="<?php echo e(old('nombre')); ?>">
                            </div>
                            <div class="col-12 col-md">
                                <input <?php if(!$link): ?> disabled <?php endif; ?> aria-label="<?php echo e(translate('label_email', $idioma)); ?>" placeholder="<?php echo e(translate('label_email', $idioma)); ?> (*)" required type="email" id="email" name="email" class="form-control form--input" value="<?php echo e(old('nombre')); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md">
                                <input <?php if(!$link): ?> disabled <?php endif; ?> aria-label="<?php echo e(translate('label_telefono', $idioma)); ?>" placeholder="<?php echo e(translate('label_telefono', $idioma)); ?>" type="phone" id="telefono" name="telefono" class="form-control form--input" value="<?php echo e(old('telefono')); ?>">
                            </div>
                            <div class="col-12 col-md">
                                <input <?php if(!$link): ?> disabled <?php endif; ?> aria-label="<?php echo e(translate('label_empresa', $idioma)); ?>" placeholder="<?php echo e(translate('label_empresa', $idioma)); ?>" type="text" id="empresa" name="empresa" class="form-control form--input" value="<?php echo e(old('empresa')); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <textarea rows="10" <?php if(!$link): ?> disabled <?php endif; ?> aria-label="<?php echo e(translate('label_mensaje', $idioma)); ?>" placeholder="<?php echo e(translate('label_mensaje', $idioma)); ?> (*)" required id="mensaje" name="mensaje" class="form-control form--input"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <button <?php if(!$link): ?> disabled <?php endif; ?> class="btn btn-primary btn--element px-5 rounded-pill"><?php echo e(translate('btn_enviar', $idioma)); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/page/parts/servicio.blade.php ENDPATH**/ ?>