<section class="my-3">
    <div class="container-fluid">
        <div class="alert alert-primary" role="alert">
            <h2 class="text-center">Imagen de cabecera de secciones</h2>
        </div>
        <?php $__currentLoopData = $data[ "cabeceras" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div id="wrapper-form-<?php echo e($k); ?>" class="mt-4">
            <div class="card">
                <div class="card-body">
                    <form id="form_<?php echo e($k); ?>" onsubmit="event.preventDefault(); formSubmit(this , '<?php echo e($k); ?>');" novalidate class="" action="<?php echo e(url('/adm/contenido/' . $k . '/update')); ?>" method="put" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <button class="btn btn-success px-5 text-uppercase d-block mx-auto mb-4">header <strong><?php echo e($v); ?></strong><i class="fas fa-save ml-3"></i></button>
                        <div class="container-form-<?php echo e($k); ?>"></div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php $__env->startPush('scripts'); ?>
<script>
    const src_large = "<?php echo e(asset('images/no-img-large.jpg')); ?>";

    formSubmit = ( t , tipo ) => {
        let idForm = t.id;
        let url = t.action;
        let method = t.method;
        let formElement = document.getElementById(idForm);
        if(method == "GET" || method == "get") method = "post";
        let formData = new FormData(formElement);
        
        formData.append("ATRIBUTOS",JSON.stringify(
            [
                { DATA: window[ `pyrus_${tipo}` ].objetoSimple, TIPO: "U" }
            ]
        ));

        formSave( t , formData );
    };
    /** ------------------------------------- */
    init = ( callbackOK ) => {
        for( let x in window.data.cabeceras ) {
            window[ `pyrus_${x}` ] = new Pyrus( `${x}` , null , src_large );
            $(`#form_${x} .container-form-${x}`).html(window[ `pyrus_${x}` ].formulario());
        }
        callbackOK.call(this,null);
    };
    /** */
    init( () => {
        for( let x in window.data.cabeceras ) {
            window[ `pyrus_${x}` ].show( null , url_simple , window.data.contenido[ x ].data );
        }
    });
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/osolelar/hidratools_laravel/resources/views/auth/parts/cabecera.blade.php ENDPATH**/ ?>