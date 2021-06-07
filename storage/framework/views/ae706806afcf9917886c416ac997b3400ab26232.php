<div class="wrapper-presupuesto wrapper-descargas pb-5 bg-white">
    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $data[ 'cabecera' ]->data[ 'header' ] , 'c' => 'cabecera' , 'in_div' => 1 , 'text' => 'DESCARGAS' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container pt-4 pb-5">
        <div class="row">
            <div class="col-12">
                <div class="list-group list-group-horizontal d-flex justify-content-center filtro" role="tablist">
                    <a class="list-group-item list-group-item-action bg-transparent active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">CATÁLOGOS</a>
                    <a class="list-group-item list-group-item-action bg-transparent" id="list-home-list2" data-toggle="list" href="#list-home2" role="tab" aria-controls="home2">LISTA DE PRECIOS</a>
                </div>
            </div>
            <div class="col-12 mt-5">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <div class="row mt-n4">
                            <?php $__currentLoopData = $data[ "descargas" ][ "1" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 col-md-4 mt-4">
                                <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $d->image , 'c' => 'w-100' , 'n' => empty( $d->name ) ? 'Descarga' : $d->name ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php
                                $file = null;
                                if( !empty( $d->file ) )
                                    $file = asset( $d->file[ 0 ][ 'file' ][ 'i' ] );
                                ?>
                                <div class="link p-3 d-flex justify-content-between align-items-center text-uppercase">
                                    <?php echo e($d->name); ?>

                                    <?php if( !empty( $file ) ): ?>
                                    <a href="<?php echo e($file); ?>" download class="btn btn-warning px-4 rounded-pill">descargar<i class="fas fa-arrow-alt-circle-down ml-2"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list-home2" role="tabpanel" aria-labelledby="list-profile-list">
                        <div class="row mt-n4">
                            <?php $__currentLoopData = $data[ "descargas" ][ "2" ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 col-md-4 mt-4">
                                <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $d->image , 'c' => 'w-100' , 'n' => empty( $d->name ) ? 'Descarga' : $d->name ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <select onchange="downloadFile( this );" class="link form-control rounded-0 d-flex justify-content-between align-items-center text-uppercase">
                                    <option value="" hidden selected><?php echo e($d->name); ?></option>
                                    <?php if( !empty( $d->file ) ): ?>
                                        <?php $__currentLoopData = $d->file; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(asset( $f[ 'file' ][ 'i' ] )); ?>" data-txt="<?php echo e($f[ 'name']); ?>" data-name="<?php echo e($f[ 'file' ][ 'n' ]); ?>" data-ext="<?php echo e($f[ 'file' ][ 'e' ]); ?>"><?php echo e($f[ 'name']); ?> [<?php echo e(strtoupper( $f[ 'file' ][ 'e' ] )); ?>]</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush( "scripts" ); ?>
<script>
    
    downloadFile = ( t ) => {
        if( $( t ).val() == "" )
            return false;
        let txt = $( t ).find( `option:selected` ).text();
        let name = $( t ).find( `option:selected` ).data( "name" );
        let ext = $( t ).find( `option:selected` ).data( "ext" );
        
        Toast.fire({
            icon: 'success',
            title: 'La descarga empezará en breve'
        });
        var link = document.createElement( "a" );
        href = $( t ).find( "option:selected" ).val();
        link.download = `${name}.${ext}`;
        link.href = href;
        document.body.appendChild( link );
        link.click();
        document.body.removeChild( link );
        $( t ).val( "" ).trigger( "change" );
    };
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/osolelar/hidratools_laravel/resources/views/client/descargas.blade.php ENDPATH**/ ?>