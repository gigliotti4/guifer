<?php $__env->startSection('headTitle', config('app.name') . ' :: Login'); ?>

<?php $__env->startPush('styles'); ?>
    <link href="<?php echo e(asset('css/adm/login.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<main class="position-relative d-flex justify-content-center align-items-center" style="height: 100vh;">
    <ol class="breadcrumb bg-white position-absolute by-osole border-bottom-0 border-rigth-0 m-0 rounded-0">
        <li class="breadcrumb-item" aria-current="page">Último cambio: <?php echo e(env('APP_DATE')); ?></li>
        <li class="breadcrumb-item" aria-current="page">V. <?php echo e(env('APP_VERSION')); ?></li>
        <li class="breadcrumb-item" aria-current="page"><a style="color:inherit" href="<?php echo e(URL::to('/')); ?>">Página<i class="ml-2 fas fa-external-link-alt"></i></a></li>
        <li class="breadcrumb-item" aria-current="page"><a target="_blank" href="<?php echo e(env('APP_UAUTHOR')); ?>" style="color:inherit">By <?php echo e(env('APP_AUTHOR')); ?></a></li>
        <li class="breadcrumb-item" aria-current="page"><a target="_blank" href="mailto:<?php echo e(env('APP_UAMAIL')); ?>" style="color:inherit"><?php echo e(env('APP_UAMAIL')); ?></a></li>
    </ol>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5 shadow">
                    <div class="card-body">
                        <h5 class="card-title text-center">Panel Administrativo<br/><strong><?php echo e(config('app.name')); ?></strong></h5>
                        <form class="form-signin" method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-label-group">
                                <input type="text" name="username" id="username" class="form-control" placeholder="Usuario" required autofocus value="<?php echo e(old('username')); ?>">
                                <label for="username"><i class="fas fa-user mr-2"></i>Usuario</label>
                                <?php if($errors->has('username')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('username')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                                <label for="password"><i class="fas fa-key mr-2"></i>Contraseña</label>
                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Acceso<i class="fas fa-sign-in-alt ml-2"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pablo\Desktop\Laravel\hidratools\resources\views/auth/login.blade.php ENDPATH**/ ?>