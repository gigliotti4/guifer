<?php
$social_networks = [ 
    'instagram' => '<i class="fab fa-instagram"></i>',
    'linkedin' => '<i class="fab fa-linkedin-in"></i>',
    'youtube' => '<i class="fab fa-youtube"></i>',
    'facebook' => '<i class="fab fa-facebook-f"></i>',
    'twitter' => '<i class="fab fa-twitter"></i>',
    'pinterest' => '<i class="fab fa-pinterest-p"></i>'
];
?>
<header class="bg-transparent">
    <div class="container position-relative" style="min-height: 102px;">
        <?php
        $url = URL::to('/');
        if(auth()->guard('client')->check())
            $url = URL::to('cliente/descargas');
        ?>
        <a style="left: calc( 50% - calc( var( --logo-width ) / 2 ) ); top: 10px" class="navbar-brand py-0 position-absolute mr-0" href="<?php echo e($url); ?>">
            <img onError="this.src='<?php echo e(asset('images/general/no-img.png')); ?>'" src="<?php echo e(asset($data['empresa']->images['logo']['i'])); ?>?t=<?php echo time(); ?>" />
        </a>
        <div class="d-flex justify-content-between align-items-end position-relative pt-3" style="min-height: 102px;">
            <div class="d-none d-lg-block">
                <div class="d-flex social-networks ml-n3 pb-3">
                    <?php $__currentLoopData = $data[ "empresa" ]->social_networks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $red): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="ml-3" href="<?php echo e($red[ 'url' ]); ?>" target="_blank" rel="noopener noreferrer" title="<?php echo e($red[ 'titulo' ]); ?>"><?php echo $social_networks[ $red[ 'redes' ] ]; ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="login pb-3 d-none d-lg-block wrapper-contacto position-relative">
                <a target="_blank" href="https://wa.me/<?php echo e($data[ 'whatsapp' ][ 0 ][ 'telefono' ]); ?>" class="btn btn-outline-success whatsapp rounded-pill px-4 mr-2"><i class="fab fa-whatsapp mr-2"></i>¡Escribinos!</a>
                <?php if(auth()->guard('client')->check()): ?>
                <button class="btn btn-outline-warning px-4 rounded-pill" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hola, <?php echo e(auth()->guard('client')->user()->name); ?><i class="fas fa-user ml-2"></i></button>
                <div class="dropdown-menu dropdown-menu-right border-0 mt-3 bg-white p-0">
                    <ul class="login list-unstyled mb-0 p-0 shadow border-0">
                        <li class="p-3 bg-white">
                            <a style="font-size:inherit; font-weight: normal" class="d-block d-flex justify-content-between align-items-center" href="<?php echo e(URL::to('salir')); ?>">Cerrar sesión<i class="text-danger fas fa-sign-out-alt"></i></a>
                        </li>
                    </ul>
                </div>
                <?php else: ?>
                
                <div class="dropdown-menu dropdown-menu-right border-0 mt-3 bg-white p-0">
                    <ul class="login list-unstyled mb-0 p-0 shadow border-0">
                        <li class="p-4">
                            <div>
                                <form id="formLogueo" action="<?php echo e(url('/cliente/acceso')); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="contenedorForm w-100" id="form_formulario_login">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-12">
                                                <input name="username" id="username" class="form-control" type="text" placeholder="Usuario" required>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-12">
                                                <input name="password" id="password" class="form-control" type="password" placeholder="Contraseña" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-warning mx-auto rounded-pill px-4 d-block mx-auto mt-3 text-uppercase" type="submit">ingresar</button>
                                </form>
                            </div>
                        </li>
                        <li class="py-3 bg-light">
                            <p class="text-center mb-0"><a class="text-primary" href="#" onclick="registrar( this );">Olvidé mi contraseña</a></p>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <nav>
        <div class="container">
            <div class="d-none d-lg-block">
                <?php if(auth()->guard('client')->check()): ?>
                <div class="d-flex justify-content-end menu">
                    <?php
                    $flag = false;
                    $class = "d-block p-3";
                    if( Request::is( "cliente/descarga*" ) )
                        $class .= " active";
                    ?>
                    <div>
                        <a class="<?php echo e($class); ?>" href="<?php echo e(URL::to( 'cliente/descargas' )); ?>"><span>Descargas</span></a>
                    </div>

                    <?php
                    $flag = false;
                    $class = "d-block p-3";
                    if( Request::is( "cliente/datos*" ) )
                        $class .= " active";
                    ?>
                    <div>
                        <a class="<?php echo e($class); ?>" href="<?php echo e(URL::to( 'cliente/datos' )); ?>">Mis datos</a>
                    </div>
                </div>
                <?php else: ?>
                <div class="d-flex menu">
                    <?php $__currentLoopData = $data[ "empresa" ]->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if( empty( $s[ "FIRST"] ) ): ?>
                        <?php
                        $flag = false;
                        $class = "d-block p-3";
                        for( $i = 0 ; $i < count( $s[ "REQUEST" ] ) ; $i++ ) {
                            if( Request::is( "{$s[ 'REQUEST' ][ $i ]}*" ) )
                                $flag = true;
                        }
                        if( $flag )
                            $class .= " active";
                        ?>
                        <div>
                            <a class="<?php echo e($class); ?>" href="<?php echo e(URL::to( $s[ 'LINK' ] )); ?>"><span><?php echo e($s[ 'NAME' ]); ?></span></a>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="d-flex align-items-end justify-content-end">
                <div id="menu-buscador">
                    <div id="hamburger" class="hamburger mt-2" onclick="menuBody( this );">
                        <div class="position-relative p-3">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header><?php /**PATH C:\Users\Pablo\Desktop\Laravel\hidratools\resources\views/layouts/general/header.blade.php ENDPATH**/ ?>