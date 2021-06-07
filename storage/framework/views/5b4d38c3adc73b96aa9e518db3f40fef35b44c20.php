<div class="productos pb-5 pt-3">
    <div class="container">
        <ol class="breadcrumb border-0 rounded-0 bg-white mb-3" id="producto--breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to(App::getLocale() . '/productos')); ?>"><?php echo e(translate("link_productos", App::getLocale())); ?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to(App::getLocale() . '/productos/marca/' . str_slug($data['marca']->nombre) . '/' . $data['marca']->id)); ?>"><?php echo e($data['marca']->nombre); ?></a></li>
            <?php $__currentLoopData = $data["familias"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="breadcrumb-item <?php if($f->id == $data['familia']->id): ?> active <?php endif; ?>"><a href="<?php echo e(URL::to(App::getLocale() . '/productos/familia/' . str_slug($f->nombre[App::getLocale()]) . '/' . $f->id)); ?>"><?php echo e($f->nombre[App::getLocale()]); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <?php echo $__env->make('page.parts.lateral' , ['elementos' => $data['marcas'], 'idioma' => App::getLocale(), 'link' => 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-12 col-md-8 col-lg-9">
                <div class="producto--name d-flex justify-content-between align-items-center">
                    <h3 class="producto--title"><?php echo e($data["marca"]->nombre); ?></h3>
                    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $data["marca"]->image , 'c' => 'producto--logo' , 'n' => $data["marca"]->nombre ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-md" id="producto--images">
                        <?php echo $__env->make( 'layouts.general.slider' , [ 'slider' => $data['producto']->image , 'sliderID' => "slider" , 'div' => 0 , 'arrow' => 0, 'idioma' => App::getLocale()] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-12 col-md">
                        <?php
                        $name = $data["producto"]->nombre[App::getLocale()];
                        $pdf = $data["producto"]->pdf[App::getLocale()];
                        if(empty($name))
                            $name = $data["producto"]->nombre["es"];
                        if(empty($pdf))
                            $pdf = $data["producto"]->pdf["es"];
                        ?>
                        <input type="hidden" value="<?php echo e($data['producto']->id); ?>" id="producto--id">
                        <h3 class="producto--title producto--title__elemento" id="producto--name"><?php echo e($name); ?></h3>
                        <div class="producto--resume"><?php echo $data["producto"]->resumen[App::getLocale()]; ?></div>
                        <?php if(!empty($data["producto"]->detalle[App::getLocale()])): ?>
                        <div class="producto--detalle"><?php echo $data["producto"]->detalle[App::getLocale()]; ?></div>
                        <?php endif; ?>
                        <div class="d-flex justify-content-between mt-3">
                            <button onclick="prespuesto(this);" class="btn btn-primary producto--btn px-3" type="button"><?php echo e(translate("link_presupuesto", App::getLocale())); ?></button>
                            <?php if(!empty($pdf)): ?>
                            <a href="<?php echo e($pdf); ?>" target="_blank" class="btn btn-primary producto--btn px-3"><i class="fas fa-file-pdf"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if(!empty($data["producto"]->descripcion[App::getLocale()])): ?>
                <div class="row mt-3">
                    <div class="col-12"><?php echo $data["producto"]->descripcion[App::getLocale()]; ?></div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush( "scripts" ); ?>
<script>
    prespuesto = t => {
        const id = document.querySelector("#producto--id").value;
        const breadcrumb = document.querySelector("#producto--breadcrumb");
        const breadcrumb__elements = breadcrumb.querySelectorAll("li")
        const images = document.querySelectorAll(".carousel-item");
        const name = document.querySelector("#producto--name").textContent;
        let category = "";
        let img = images[0].querySelector("img").src;
        for(let x in breadcrumb__elements) {
            if(x == 0 || x == "length" || x == "item" || x == "entries" || x == "forEach" || x == "keys" || x == "values")
                continue;
            if(category != "")
                category += ", ";
            category += breadcrumb__elements[x].textContent;
        }
        window.pedir = {};
        if (sessionStorage.pedir)
            window.pedir = JSON.parse(sessionStorage.pedir);
        if (!window.pedir[id]) {
            window.pedir[id] = {
                name: name,
                category: category,
                cant: 1,
                img: img
            };
        }
        sessionStorage.setItem("pedir", JSON.stringify(window.pedir));
        document.querySelector("#link--presupuesto").click();
    };
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
<?php $__env->stopPush(); ?><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/page/producto.blade.php ENDPATH**/ ?>