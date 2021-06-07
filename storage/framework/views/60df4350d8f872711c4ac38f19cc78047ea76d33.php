<div class="wrapper-blogs bg-white pb-5">
    <?php echo $__env->make( 'layouts.general.image' , [ 'i' => $data[ 'cabecera' ]->data[ 'header' ] , 'c' => 'cabecera' , 'in_div' => 1 , 'text' => $data[ 'blog' ]->title ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container pt-3">
        <ol class="breadcrumb bg-transparent border-0 p-0">
            <li class="breadcrumb-item home"><a href="<?php echo e(URL::to( '/' )); ?>"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to( 'blogs' )); ?>">Blogs</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to( 'blogs/' . str_slug( $data[ 'blog' ]->category->title ) )); ?>"><?php echo e($data[ 'blog' ]->category->title); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e($data[ 'blog' ]->title); ?></li>
        </ol>
        <div class="row mt-5">
            <div class="col-12 col-md blog">
                <?php echo $__env->make( 'layouts.general.slider' , [ 'slider' => $data[ 'blog' ]->image , 'sliderID' => "slider" , 'div' => 0 , 'arrow' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                <p class="title-category"><?php echo e($data[ 'blog' ]->category->title); ?></p>
                <h3 class="title-simple mt-3"><?php echo e($data[ 'blog' ]->title); ?></h3>
                <div class="mt-2"><?php echo $data[ 'blog' ]->text; ?></div>
                <div class="mt-4 border-top pt-3 d-flex justify-content-between more">
                    <div>
                        <?php if( !empty( $data[ "previous" ] ) ): ?>
                        <a href="<?php echo e(URL::to( 'blog/' . str_slug( $data[ 'previous' ]->title ) . '__' . date( 'Y-m-d' , strtotime( $data[ 'previous' ]->date ) ) . '/' . $data[ 'previous' ]->id )); ?>" class="d-flex align-items-center"><i class="fas fa-angle-left mr-2"></i><?php echo e($data[ 'previous' ]->title); ?></a>
                        <?php endif; ?>
                    </div>
                    <div>
                        <?php if( !empty( $data[ "next" ] ) ): ?>
                        <a href="<?php echo e(URL::to( 'blog/' . str_slug( $data[ 'next' ]->title ) . '__' . date( 'Y-m-d' , strtotime( $data[ 'next' ]->date ) ) . '/' . $data[ 'next' ]->id )); ?>" class="d-flex align-items-center justify-content-end"><?php echo e($data[ 'next' ]->title); ?><i class="fas fa-angle-right ml-2"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <?php echo $__env->make( 'page.parts.blog_lateral' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\Pablo\Desktop\Laravel\hidratools\resources\views/page/blog.blade.php ENDPATH**/ ?>