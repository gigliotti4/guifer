<?php $__env->startPush('styles'); ?>
    <link href="<?php echo e(asset('css/menu.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('headTitle', config('app.name') . ' :: Administración'); ?>

<?php $__env->startSection('content'); ?>
<div class="modal fade" id="modalCombinacion" tabindex="-1" role="dialog" aria-labelledby="modalCombinacionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title">Combinaciones de teclas del sistema</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table mb-0">
                    <tbody>
                        <tr>
                            <td class="border-top-0">Alt+Ctrl+S</td>
                            <td class="border-top-0">Guardar elemento: guarda el contenido del elemento del formulario abierto</td>
                        </tr>
                        <tr>
                            <td>Alt+Ctrl+N</td>
                            <td>Abre o cierra el formulario: solo para secciones que tengan varios registros</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="wrapper flex-column">
    <header class="app-header navbar bg-white position-fixed shadow-sm w-100 px-0">
        <div class="d-flex align-items-center w-100">
            <nav class="navbar justify-content-between w-100 navbar-expand-lg navbar-light p-0">
                <div class="d-flex align-items-center ml-1">
                    <button id="btnMenu" class="btn btn-link mr-2" type="button" onclick="menu( this )">
                        <i class="fas fa-bars mt-n1"></i>
                    </button>
                    <a class="navbar-brand py-0" href="<?php echo e(route('adm')); ?>">ADMIN</a>
                </div>
                <button onclick="navMenu( this )" class="navbar-toggler mr-1" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarNavDropdown">
                    <ul class="navbar-nav px-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pr-5" href="#" id="navbarDropdownMenuUsuario" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span><i class="fas fa-user-circle mr-2"></i><?php echo e(Auth::user()->name); ?></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUsuario">
                                <?php if( !empty( Auth::user()->login) ): ?>
                                <a class="dropdown-item">
                                        <?php
                                        $date = date( "d/m/Y H:i" , strtotime( Auth::user()->login ) ) ;
                                        ?>
                                    <i class="fas fa-history mr-2 text-warning"></i><strong><?php echo e($date); ?></strong>
                                </a>
                                <?php endif; ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('usuarios.datos')); ?>"><i class="fas fa-database mr-2"></i>Mis Datos</a>
                                <a class="dropdown-item" href="<?php echo e(route('adm.logout')); ?>"><i class="fas text-danger fa-power-off mr-2"></i>Salir</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('usuarios.index')); ?>"><i class="fas fa-user-friends mr-2"></i>Usuarios</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase pr-5" href="#" id="navbarDropdownMenuEmpresa" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo e(config('app.name')); ?>

                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuEmpresa">
                                <a class="dropdown-item" href="<?php echo e(route('empresa.datos')); ?>"><i class="fab fa-centercode mr-2"></i>Datos de la Empresa</a>
                                <a class="dropdown-item" href="<?php echo e(route('imagen')); ?>"><i class="fas fa-image mr-2"></i>Imágenes sueltas</a>
                                <a class="dropdown-item" href="<?php echo e(route('empresa.form')); ?>"><i class="fab fa-wpforms mr-2"></i>Email de Formularios</a>
                                <a class="dropdown-item" href="<?php echo e(route('empresa.redes')); ?>"><i class='nav-icon fas fa-comment mr-2'></i>Redes Sociales</a>
                                <a class="dropdown-item" href="<?php echo e(route('metadatos.index')); ?>"><i class='nav-icon fas fa-bullhorn mr-2'></i>Metadatos</a>
                                <a class="dropdown-item" href="<?php echo e(route('empresa.terminos')); ?>"><i class='nav-icon fas fa-clipboard-check mr-2'></i>Términos y condiciones</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a onclick="showCombinacion( this );" class="nav-link" href="#"><i class="fas fa-keyboard mr-2"></i>Atajos</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('index')); ?>" class="nav-link" target="blank"><i class="fas mr-2 fa-external-link-alt"></i>Parte pública</a>
                        </li>
                        <?php if(isset( $data[ "err" ] )): ?>
                        <li class="nav-item">
                            <a data-toggle="tooltip" data-placement="bottom" title="Error de conexión con SQL Server" href="#" class="nav-link text-danger">ERROR DE CONEXIÓN<i class="fas fa-exclamation-triangle ml-1 text-warning"></i></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
    </header>
    
    <div class="app-body">
        <!-- Sidebar -->
        <nav id="sidebar">
            <?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </nav>
        <!-- Page Content -->
        <div id="content">
            <?php if( !isset( $data[ "SIN" ] ) ): ?>
            <nav aria-label="breadcrumb" class="d-flex align-items-center bg-white" id="breadcrumb">
                <ol class="breadcrumb border-0 rounded-0 bg-white mb-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('adm')); ?>">ADMIN</a></li>
                    <?php if(!isset($data["breadcrumb"])): ?>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e($data["title"]); ?></li>
                    <?php else: ?>
                        <?php echo $data["breadcrumb"]; ?>

                    <?php endif; ?>
                </ol>
            </nav>
            <?php endif; ?>
            <?php echo $__env->make($data['view'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pablo\Desktop\Laravel\hidratools\resources\views/auth/distribuidor.blade.php ENDPATH**/ ?>