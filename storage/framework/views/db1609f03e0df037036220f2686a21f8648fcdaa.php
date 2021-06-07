<div class="galeria py-5">
    <div class="container">
        <h2 class="title--important mb-4"><?php echo e(translate("link_presupuesto", App::getLocale())); ?> (<span id="products--total">0</span>)</h2>

        <div class="table-responsive">
            <table class="table productos--table">
                <thead>
                    <th style="width: 150px;"></th>
                    <th style="width: 250px;">Producto</th>
                    <th>Marca</th>
                    <th style="width: 150px;">Cantidad</th>
                    <th style="width: 110px;" class="text-center">Eliminar</th>
                </thead>
                <tbody>
                    <tr id="tr--first">
                        <td colspan="5" class="text-center"><?php echo e(translate("txt_empty_table", App::getLocale())); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <form action="" id="formContacto" onsubmit="event.preventDefault(); enviar( this )" method="post">
            <div class="row mt-4 d-none" id="target--form">
                <div class="col-12">
                    <input type="hidden" name="elementos[idioma]" value="Idioma">
                    <input type="hidden" name="elementos[nombre]" value="Nombre">
                    <input type="hidden" name="elementos[email]" value="Email">
                    <input type="hidden" name="elementos[telefono]" value="Teléfono">
                    <input type="hidden" name="elementos[empresa]" value="Empresa">
                    <input type="hidden" name="elementos[mensaje]" value="Mensaje">
                    <input type="hidden" name="idioma" value="<?php echo e(App::getLocale()); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-12 col-md">
                            <input aria-label="<?php echo e(translate('label_nombre', App::getLocale())); ?>" placeholder="<?php echo e(translate('label_nombre', App::getLocale())); ?> (*)" required type="text" id="nombre" name="nombre" class="form-control form--input" value="<?php echo e(old('nombre')); ?>">
                        </div>
                        <div class="col-12 col-md">
                            <input aria-label="<?php echo e(translate('label_email', App::getLocale())); ?>" placeholder="<?php echo e(translate('label_email', App::getLocale())); ?> (*)" required type="email" id="email" name="email" class="form-control form--input" value="<?php echo e(old('nombre')); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md">
                            <input aria-label="<?php echo e(translate('label_telefono', App::getLocale())); ?>" placeholder="<?php echo e(translate('label_telefono', App::getLocale())); ?>" type="phone" id="telefono" name="telefono" class="form-control form--input" value="<?php echo e(old('telefono')); ?>">
                        </div>
                        <div class="col-12 col-md">
                            <input aria-label="<?php echo e(translate('label_empresa', App::getLocale())); ?>" placeholder="<?php echo e(translate('label_empresa', App::getLocale())); ?>" type="text" id="empresa" name="empresa" class="form-control form--input" value="<?php echo e(old('empresa')); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <textarea rows="10" aria-label="<?php echo e(translate('label_mensaje', App::getLocale())); ?>" placeholder="<?php echo e(translate('label_mensaje', App::getLocale())); ?> (*)" required id="mensaje" name="mensaje" class="form-control form--input"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 d-flex justify-content-between">
                    <a href="<?php echo e(URL::to(App::getLocale() . '/productos')); ?>" class="btn btn-lg btn-outline-primary px-5 rounded-pill"><?php echo e(translate("btn_anadir", App::getLocale())); ?></a>
                    <button id="btn--confirm" type="submit" disabled class="btn btn-lg btn-primary btn--element px-5 rounded-pill"><?php echo e(translate("link_presupuesto", App::getLocale())); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->startPush("scripts"); ?>
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo e($data[ 'empresa' ]->captcha[ 'public' ]); ?>"></script>
<script>
    const alert__title = "<?php echo e(translate("alert_title", App::getLocale())); ?>";
    const alert__question = "<?php echo e(translate("alert_question", App::getLocale())); ?>";
    const btn = "<?php echo e(translate("link_presupuesto", App::getLocale())); ?>";
    const btn__wait = "<?php echo e(translate("btn_wait", App::getLocale())); ?>";
    const btn__confirm = "<?php echo e(translate("btn_confirm", App::getLocale())); ?>";
    const btn__cancel = "<?php echo e(translate("btn_cancel", App::getLocale())); ?>";
    window.products = {};
    if (sessionStorage.pedir) {
        window.pedir = JSON.parse(sessionStorage.pedir);
        document.querySelector("#products--total").innerText = Object.keys(window.pedir).length;
        document.querySelector("#tr--first").classList.add("d-none");
        if (Object.keys(window.pedir).length) {
            document.querySelector("#btn--confirm").disabled = false;
            document.querySelector("#target--form").classList.remove("d-none");
            //document.querySelector("tbody").innerHTML = "";
            for (let x in window.pedir) {
                let tr = document.createElement("tr");
                let td_1 = document.createElement("td");
                let td_2 = document.createElement("td");
                let td_3 = document.createElement("td");
                let td_4 = document.createElement("td");
                let td_5 = document.createElement("td");
                td_1.innerHTML = `<img src="${window.pedir[x].img}" class="w-100"/>`;
                td_2.innerHTML = window.pedir[x].name;
                td_3.innerHTML = window.pedir[x].category;
                td_4.innerHTML = `<input onchange="update(this, ${x})" type="number" value="${window.pedir[x].cant}" class="form-control text-center form--input" min="1"/>`;
                td_5.innerHTML = `<button type="button" onclick="eliminar(this, ${x})" class="btn btn-danger" style="border-radius: .3em"><i class="far fa-times-circle"></i></button>`;
                td_5.classList.add("text-center")
                tr.appendChild(td_1);
                tr.appendChild(td_2);
                tr.appendChild(td_3);
                tr.appendChild(td_4);
                tr.appendChild(td_5);
                document.querySelector("tbody").appendChild(tr);
            }
        }
    }
    update = (t, number) => {
        if (window.pedir[number]) {
            window.pedir[number].cant = t.value;
            sessionStorage.setItem("pedir", JSON.stringify(window.pedir));
        }
    };
    eliminar = (t, number) => {
        alertify.confirm(alert__title, alert__question,
            () => {
                $(t).closest("tr").remove();
                if (document.querySelector("tbody").querySelectorAll("tr").length === 1) {
                    document.querySelector("#tr--first").classList.remove("d-none");
                    document.querySelector("#btn--confirm").disabled = true;
                    document.querySelector("#target--form").classList.add("d-none");
                }
                if (window.pedir[number]) {
                    delete window.pedir[number];
                    document.querySelector("#products--total").innerText = Object.keys(window.pedir).length;
                    sessionStorage.setItem("pedir", JSON.stringify(window.pedir));
                }
            },
            () => {
                $( t ).prop( "disabled" , false );
            }
        ).set('labels', {ok: btn__confirm, cancel: btn__cancel});
    };
    enviar = ( t ) => {
        let url = t.action;
        let method = t.method;
        let idForm = t.id;
        let formElement = document.getElementById( idForm );
        let formData = new FormData( formElement );
        formData.append("pedido", sessionStorage.pedir);
        document.querySelector("#btn--confirm").innerText = btn__wait;
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
                    document.querySelector("#btn--confirm").innerText = btn;
                    $( ".form-control" ).prop( "readonly" , false );
                    if( parseInt( res.data.estado ) ) {
                        setTimeout(() => {
                            sessionStorage.removeItem("pedir");
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
<?php $__env->stopPush(); ?><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/page/presupuesto.blade.php ENDPATH**/ ?>