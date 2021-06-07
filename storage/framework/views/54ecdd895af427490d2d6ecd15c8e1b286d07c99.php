<div class="wrapper-contacto bg-white pb-5">
    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $data[ 'cabecera' ]->data[ 'header' ] , 'c' => 'cabecera' , 'in_div' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container py-5">
        <h2 class="text-center mb-5" style="font-weight: var( --contacto-name-font-weight ); color: var( --contacto-name-color ); font-family: var( --contacto-name-font-family );">Mis datos</h2>
        <div class="row justify-content-center">
            <div class="col-12 col-md-7">
                <form action="" method="post">
                    <?php echo csrf_field(); ?>
                    <h3 class="title mb-4">Personales</h3>
                    <input type="hidden" name="type" value="datos">
                    <div class="row">
                        <div class="col-12 col-md">
                            <input placeholder="Nombre" required type="text" name="name" class="form-control" value="<?php echo e($data[ 'datos' ]->name); ?>">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 col-md">
                            <input placeholder="Email" required type="email" name="email" class="form-control" value="<?php echo e($data[ 'datos' ]->email); ?>">
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-warning px-4 rounded-pill">Cambiar</button>
                        </div>
                    </div>
                </form>
                <hr>
                <form action="" method="post">
                    <?php echo csrf_field(); ?>
                    <h3 class="title mb-4">Contraseña</h3>
                    <input type="hidden" name="type" value="pass">
                    
                    <div class="row">
                        <div class="col-12 col-md">
                            <input placeholder="Contraseña actual" required type="password" name="password" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 col-md">
                            <input placeholder="Contraseña nueva" required type="password" name="password_new" class="form-control">
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-warning px-4 rounded-pill">Cambiar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/osolelar/hidratools_laravel/resources/views/client/datos.blade.php ENDPATH**/ ?>