<div class="galeria py-5">
    <div class="container">
        <h2 class="title--important mb-4">Solicitud de Presupuesto</h2>

        <form action="" id="formContacto" onsubmit="event.preventDefault(); enviar( this )" method="post">
            <div class="row mt-4 justify-content-center" id="target--form">
                <div class="col-12">
                    <input type="hidden" name="elementos[nombre]" value="Nombre">
                    <input type="hidden" name="elementos[email]" value="Email">
                    <input type="hidden" name="elementos[telefono]" value="Teléfono">
                    <input type="hidden" name="elementos[empresa]" value="Empresa">
                    <input type="hidden" name="elementos[mensaje]" value="Mensaje">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <input aria-label="Nombre" placeholder="Nombre (*)" required type="text" id="nombre" name="nombre" class="form-control form--input" value="<?php echo e(old('nombre')); ?>">
                        </div>
                        <div class="col-12 col-lg mt-md-3 mt-lg-0">
                            <input aria-label="Email" placeholder="Email (*)" required type="email" id="email" name="email" class="form-control form--input" value="<?php echo e(old('nombre')); ?>">
                        </div>
                        <div class="col-12 col-lg mt-md-3 mt-lg-0">
                            <input aria-label="Teléfono" placeholder="Teléfono" type="phone" id="telefono" name="telefono" class="form-control form--input" value="<?php echo e(old('telefono')); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg">
                            <textarea rows="10" aria-label="Mensaje" placeholder="Mensaje (*)" required id="mensaje" name="mensaje" class="form-control form--input"></textarea>
                        </div>
                        <div class="col-12 col-lg mt-md-3 mt-lg-0">
                            <input aria-label="Empresa" placeholder="Empresa" type="text" id="empresa" name="empresa" class="form-control form--input" value="<?php echo e(old('empresa')); ?>">
                            <input aria-label="Archivo" placeholder="Archivo" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*, .zip,.rar,.7zip" type="file" id="file" name="file" class="form-control form--input mt-3">
                            <small class="text-muted">Archivos tipo Imagen, Word, Excel, .pdf, .txt, .rar, .zip</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-lg btn-primary btn--element px-5 rounded-pill">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->startPush("scripts"); ?>
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo e($data[ 'empresa' ]->captcha[ 'public' ]); ?>"></script>
<script>
    enviar = ( t ) => {
        let url = t.action;
        let method = t.method;
        let idForm = t.id;
        let formElement = document.getElementById( idForm );
        let formData = new FormData( formElement );
        grecaptcha.ready(function() {
            $( ".form-control" ).prop( "readonly" , true );
            grecaptcha.execute("<?php echo e($data[ 'empresa' ]->captcha[ 'public' ]); ?>", {action: 'contact'}).then( function( token ) {
                formData.append( "token", token );
                axios({
                    method: method,
                    url: url,
                    data: formData,
                    responseType: 'json',
                    config: { headers: {'Content-Type': 'multipart/form-data' }}
                })
                .then((res) => {
                    $(t).find(".form-control").prop( "readonly" , false );
                    if( parseInt( res.data.estado ) ) {
                        setTimeout(() => {
                            location.reload();
                            Toast.fire({
                                icon: 'success',
                                title: res.data.mssg
                            });
                        }, 1000);
                    } else
                        Toast.fire({
                            icon: 'error',
                            title: res.data.mssg
                        });
                })
                .catch((err) => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Error'
                    });
                })
                .then(() => {});
            });
        });
    };
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home3/guifer/public_html/laravel/resources/views/page/presupuesto.blade.php ENDPATH**/ ?>