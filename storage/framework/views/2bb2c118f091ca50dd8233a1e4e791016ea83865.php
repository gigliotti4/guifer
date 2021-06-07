<button class="btn btn-warning text-uppercase d-block d-sm-none rounded-0 mb-2" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    categorias<i class="fas fa-sort-amount-down ml-2"></i>
</button>
<?php
$url_prev = "categoria";
if( isset( $pedido ) )
    $url_prev = "pedido/categoria";
?>
<div class="sidebar collapse bg-transparent dont-collapse-sm sticky-top" id="collapseExample">
    <div class="sidebar mt-n2">
        <?php $__currentLoopData = $data[ "categorias"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="accordion md-accordion bg-transparent border-0 mt-2" id="accordionEx" role="tablist" aria-multiselectable="true">
            <div class="card bg-transparent border-0">
                <?php
                $subcategorias = $categoria->categorias()->where( "elim" , 0 )->orderBy( "order" )->get();
                ?>
                <div class="card-header bg-white p-0 border-bottom" role="tab" id="Hproductos<?php echo e($categoria->id); ?>">
                    <?php
                    $aria_expanded = "aria-expanded=false";
                    if( isset( $data[ 'categoria' ] ) ) {
                        if( $categoria->id == $data[ 'categoria' ]->id )
                            $aria_expanded = "aria-expanded=true";
                    }
                    $url_categoria = URL::to( 'productos/' . str_slug( $categoria->title ) . '/' . $categoria->id );
                    ?>
                    <h5 class="mb-0 parte d-flex justify-content-between align-items-center pb-2" data-parent="#accordionEx" data-toggle="collapse" data-target="#productos<?php echo e($categoria->id); ?>" <?php echo e($aria_expanded); ?> aria-controls="productos<?php echo e($categoria->id); ?>">
                        <a href="<?php echo e($url_categoria); ?>">
                            <?php echo e($categoria->title); ?>

                        </a>
                        <?php if( $subcategorias->isNotEmpty() ): ?>
                        <i class="fas fa-angle-down rotate-icon ml-3"></i>
                        <?php endif; ?>
                    </h5>
                </div>
                <?php if( $subcategorias->isNotEmpty() ): ?>
                    <?php
                    $class = "collapse pl-4 subcategorias";
                    if( isset( $data[ 'categoria' ] ) ) {
                        if( $categoria->id == $data[ 'categoria' ]->id )
                            $class .= " show";
                    }
                    ?>
                    <div id="productos<?php echo e($categoria->id); ?>" class="<?php echo e($class); ?>" role="tabpanel" aria-labelledby="Hproductos<?php echo e($categoria->id); ?>" data-parent="#accordionEx">
                        <div class="card-body bg-transparent p-0">

                        <?php $__currentLoopData = $subcategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="accordion md-accordion bg-transparent border-0 mt-2" id="accordionEx2" role="tablist" aria-multiselectable="true">
                                <div class="card bg-transparent border-0">
                                    <?php
                                    $productos = $subcategoria->productos()->where( "elim" , 0 )->orderBy( "order" )->get();
                                    ?>
                                    <div class="card-header bg-transparent p-0 border-0" role="tab" id="Hproductos<?php echo e($categoria->id); ?>">
                                        <?php
                                        $aria_expanded = "aria-expanded=false";
                                        if( isset( $data[ 'subcategoria' ] ) ) {
                                            if( $subcategoria->id == $data[ 'subcategoria' ]->id )
                                                $aria_expanded = "aria-expanded=true";
                                        }
                                        $url_categoria = URL::to( 'productos/' . str_slug( $categoria->title ) . '/' . $categoria->id . '/' . str_slug( $subcategoria->title ) . '/' . $subcategoria->id );
                                        ?>
                                        <h5 class="mb-0 parte d-flex justify-content-between border-bottom-0 align-items-center pb-2" data-parent="#accordionEx2" data-toggle="collapse" data-target="#productos<?php echo e($subcategoria->id); ?>" <?php echo e($aria_expanded); ?> aria-controls="productos<?php echo e($subcategoria->id); ?>">
                                            <a href="<?php echo e($url_categoria); ?>">
                                                <?php echo e($subcategoria->title); ?>

                                            </a>
                                        </h5>
                                    </div>
                                    <?php if( $productos->isNotEmpty() ): ?>
                                        <?php
                                        $class = "collapse";
                                        if( isset( $data[ 'subcategoria' ] ) ) {
                                            if( $subcategoria->id == $data[ 'subcategoria' ]->id )
                                                $class .= " show";
                                        }
                                        ?>
                                        <?php if( $productos->count() == 1 ): ?>
                                            <?php if( $productos[ 0 ]->title != $subcategoria->title ): ?>
                                                <div id="productos<?php echo e($subcategoria->id); ?>" class="<?php echo e($class); ?>" role="tabpanel" aria-labelledby="Hproductos<?php echo e($subcategoria->id); ?>" data-parent="#accordionEx2">
                                                    <div class="card-body bg-transparent p-0">
                                                        <ul class="list-group list-group-flush productos">
                                                            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                            $class = "d-block";
                                                            if( isset( $data[ "producto" ] ) ) {
                                                                if( $producto->id == $data[ "producto" ]->id )
                                                                    $class .= " active";
                                                            }
                                                            $url_producto = URL::to( 'producto/' . str_slug( $producto->title ) . '/' . $producto->id );
                                                            ?>
                                                            <li class="list-group-item bg-transparent border-0 py-2">
                                                                <a class="<?php echo e($class); ?>" href="<?php echo e($url_producto); ?>"><?php echo e($producto->title); ?></a>
                                                            </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <div id="productos<?php echo e($subcategoria->id); ?>" class="<?php echo e($class); ?>" role="tabpanel" aria-labelledby="Hproductos<?php echo e($subcategoria->id); ?>" data-parent="#accordionEx2">
                                                <div class="card-body bg-transparent p-0">
                                                    <ul class="list-group list-group-flush productos">
                                                        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                        $class = "d-block";
                                                        if( isset( $data[ "producto" ] ) ) {
                                                            if( $producto->id == $data[ "producto" ]->id )
                                                                $class .= " active";
                                                        }
                                                        $url_producto = URL::to( 'producto/' . str_slug( $producto->title ) . '/' . $producto->id );
                                                        ?>
                                                        <li class="list-group-item bg-transparent border-0 py-2">
                                                            <a class="<?php echo e($class); ?>" href="<?php echo e($url_producto); ?>"><?php echo e($producto->title); ?></a>
                                                        </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH /home/osolelar/hidratools_laravel/resources/views/page/parts/menu.blade.php ENDPATH**/ ?>