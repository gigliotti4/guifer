<div class="wrapper-blogs bg-white pb-5">
    <div class="container pt-3">
        <ol class="breadcrumb bg-transparent border-0 p-0">
            <li class="breadcrumb-item breadcrumb--home"><a href="<?php echo e(URL::to( '/' )); ?>"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to( '/novedades' )); ?>">Novedades</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to( '/novedades/' . str_slug( $data[ 'blog' ]->categoria->title) . '/' . $data[ 'blog' ]->categoria->id )); ?>"><?php echo e($data[ 'blog' ]->categoria->title); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e($data[ 'blog' ]->title); ?></li>
        </ol>
        <div class="row mt-5">
            <div class="col-12 col-md blog">
                <?php echo $__env->make( 'layouts.general.slider' , [ 'slider' => $data[ 'blog' ]->image , 'sliderID' => "slider" , 'div' => 1 , 'arrow' => 1, 'class' => 'blog--image'] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if(!empty($data[ 'blog' ]->date)): ?>
                <?php
                $fecha = "";
                $aux = strtotime( $data[ 'blog' ]->date );
                $mes = [
                    "1" => "Enero",
                    "2" => "Febrero",
                    "3" => "Marzo",
                    "4" => "Abril",
                    "5" => "Mayo",
                    "6" => "Junio",
                    "7" => "Julio",
                    "8" => "Agosto",
                    "9" => "Septiembre",
                    "10" => "Octubre",
                    "11" => "Noviembre",
                    "12" => "Diciembre" ];
                $fecha = date( "d" , $aux ) . " " . $mes[ date( "n" , $aux ) ] . " del " . date( "Y" , $aux );
                ?>
                <p class="date"><i class="far fa-clock mr-2"></i><?php echo e($fecha); ?></p>
                <?php endif; ?>
                <p class="title-category"><?php echo e($data[ 'blog' ]->categoria->title); ?></p>
                <h3 class="title-simple mt-3"><?php echo e($data[ 'blog' ]->title); ?></h3>
                <div class="mt-2"><?php echo $data[ 'blog' ]->text; ?></div>
                <div class="mt-4 border-top pt-3 d-flex justify-content-between more">
                    <div>
                        <?php if( !empty( $data[ "previous" ] ) ): ?>
                        <?php
                        $url = 'novedad/' . str_slug( $data[ 'previous' ]->title );
                        if(!empty($data[ 'previous' ]->date))
                            $url .= '__' . date( 'Y-m-d' , strtotime( $data[ 'previous' ]->date ) );
                        $url .= '/' . $data[ 'previous' ]->id
                        ?>
                        <a href="<?php echo e(URL::to( $url )); ?>" class="d-flex align-items-center"><i class="fas fa-angle-left mr-2"></i><?php echo e($data[ 'previous' ]->title); ?></a>
                        <?php endif; ?>
                    </div>
                    <div>
                        <?php if( !empty( $data[ "next" ] ) ): ?>
                        <?php
                        $url = 'novedad/' . str_slug( $data[ 'next' ]->title );
                        if(!empty($data[ 'next' ]->date))
                            $url .= '__' . date( 'Y-m-d' , strtotime( $data[ 'next' ]->date ) );
                        $url .= '/' . $data[ 'next' ]->id
                        ?>
                        <a href="<?php echo e(URL::to( $url )); ?>" class="d-flex align-items-center justify-content-end"><?php echo e($data[ 'next' ]->title); ?><i class="fas fa-angle-right ml-2"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <?php echo $__env->make( 'page.parts.blog_lateral' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/pablo/Escritorio/guifer2/resources/views/page/blog.blade.php ENDPATH**/ ?>