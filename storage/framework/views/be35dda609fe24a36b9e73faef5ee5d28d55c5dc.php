<div>
    <?php echo $__env->make( 'page.parts.servicio' , [ 'elemento' => $data[ 'contenido' ]->data, 'link' => 1] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->startPush( "scripts" ); ?>
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
                    $(t).find(".form-control").prop( "readonly" , false );
                    if( parseInt( res.data.estado ) ) {
                        $(t).find(".form-control").val( "" );
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
                        title: 'Error'
                    });
                })
                .then(() => {});
            });
        });
    };
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/pablo/Escritorio/guifer2/resources/views/page/servicios.blade.php ENDPATH**/ ?>