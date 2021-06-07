<section class="my-3">
    <div class="container-fluid">
        <div style="display: block;" id="wrapper-form" class="">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-primary" role="alert">
                        Ingrese a qué mail desea redirigir los formularios que contiene el sitio.
                    </div>
                    <form id="form" onsubmit="event.preventDefault(); formSubmit(this);" class="pt-2" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <button type="submit" class="btn btn-lg px-5 mx-auto mb-2 btn-success text-uppercase text-center">cambios<i class="far fa-save ml-2"></i></button>
                        <div class="container-form py-3 mt-3">
                            <div class="row">
                                <div class="col-12 col-md-5 d-flex align-items-center">
                                    <label for="" class="m-0">
                                        Contacto - <a href="<?php echo e(URL::to('contacto')); ?>" target="blank" class="text-primary">ir al Formulario</a>
                                    </label>
                                </div>
                                <div class="col-12 col-md-7">
                                    <input type="email" required name="contacto" placeholder="Ingrese mail" <?php if(isset($data['elementos']['form']['contacto'])): ?> value="<?php echo e($data['elementos']['form']['contacto']); ?>" <?php endif; ?> class="form-control border-top-0 border-left-0 border-right-0 rounded-0">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-md-5 d-flex align-items-center">
                                    <label for="" class="m-0">
                                        Index
                                    </label>
                                </div>
                                <div class="col-12 col-md-7">
                                    <input type="email" required name="index" placeholder="Ingrese mail" <?php if(isset($data['elementos']['form']['index'])): ?> value="<?php echo e($data['elementos']['form']['index']); ?>" <?php endif; ?> class="form-control border-top-0 border-left-0 border-right-0 rounded-0">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script>
    formSubmit = function(t) {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );
        let formData = new FormData( formElement );
        formSave( t , formData );
    };
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/pablo/Escritorio/eurocam/resources/views/auth/parts/empresaForm.blade.php ENDPATH**/ ?>