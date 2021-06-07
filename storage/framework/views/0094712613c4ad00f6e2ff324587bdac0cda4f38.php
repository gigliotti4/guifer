<div class="wrapper-contacto bg-white pb-5">
    <div class="mapa">
        <?php echo $data[ "empresa" ]->domicilio[ "mapa" ]; ?>

    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="info">
                    <h3 class="footer--title footer--title__important"><?php echo e(env('APP_NAME')); ?></h3>
                    <div class="text mb-4"><?php echo $data[ "empresa" ]->texto[ "text_contact" ]; ?></div>
                    <div class="d-flex">
                        <div class="icono">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="mb-1 text-uppercase">dirección</h3>
                            <?php echo $__env->make( 'layouts.general.domicilio' , [ "dato" => $data[ 'empresa' ]->domicilio , "link" => 0 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    <div class="d-flex mt-4">
                        <div class="icono">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="mb-1 text-uppercase">teléfonos</h3>
                            <?php $__currentLoopData = $data[ 'empresa' ]->telefono; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($t[ "tipo" ] == "tel"): ?>
                                    <?php echo $__env->make( 'layouts.general.telefono' , [ "dato" => $t ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="d-flex mt-4">
                        <div class="icono">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="mb-1 text-uppercase">whatsapp</h3>
                            <?php $__currentLoopData = $data[ 'empresa' ]->telefono; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($t[ "tipo" ] == "wha"): ?>
                                    <?php echo $__env->make( 'layouts.general.telefono' , [ "dato" => $t ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="mt-4 d-flex">
                        <div class="icono">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="mb-1 text-uppercase">Correo</h3>
                            <?php $__currentLoopData = $data["empresa"]->email; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo $__env->make( 'layouts.general.email' , [ "dato" => $e ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md">
                <form action="" id="formContacto" onsubmit="event.preventDefault(); enviar( this )" method="post">
                    <input type="hidden" name="elementos[nombre]" value="Nombre">
                    <input type="hidden" name="elementos[email]" value="Email">
                    <input type="hidden" name="elementos[telefono]" value="Teléfono">
                    <input type="hidden" name="elementos[empresa]" value="Empresa">
                    <input type="hidden" name="elementos[mensaje]" value="Mensaje">

                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-12 col-md">
                            <input placeholder="Ingrese Nombre (*)" required type="text" id="nombre" name="nombre" class="form-control" value="<?php echo e(old('nombre')); ?>">
                        </div>
                        <div class="col-12 col-md">
                            <input placeholder="Ingrese Correo electrónico (*)" required type="email" id="email" name="email" class="form-control" value="<?php echo e(old('nombre')); ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md">
                            <input placeholder="Ingrese Teléfono" type="phone" id="telefono" name="telefono" class="form-control" value="<?php echo e(old('telefono')); ?>">
                        </div>
                        <div class="col-12 col-md">
                            <input placeholder="Ingrese Empresa" type="text" id="empresa" name="empresa" class="form-control" value="<?php echo e(old('empresa')); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <textarea rows="10" placeholder="Escriba su mensaje (*)" required id="mensaje" name="mensaje" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-warning px-5 rounded-pill">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush( "scripts" ); ?>
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
            Toast.fire({
                icon: 'warning',
                title: 'Espere, enviando'
            });
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
                    $( ".form-control" ).prop( "readonly" , false );
                    if( parseInt( res.data.estado ) ) {
                        $( ".form-control" ).val( "" );
                        Toast.fire({
                            icon: 'success',
                            title: res.data.mssg
                        });
                    } else
                        Toast.fire({
                            icon: 'error',
                            title: res.data.mssg
                        });
                })
                .catch((err) => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Ocurrió un error'
                    });
                })
                .then(() => {});
            });
        });
    };
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/pablo/Escritorio/eurocam/resources/views/page/contacto.blade.php ENDPATH**/ ?>