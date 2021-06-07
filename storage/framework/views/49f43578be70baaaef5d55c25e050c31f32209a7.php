<a class="plus" href="<?php echo e(URL::to( 'blog/' . str_slug( $elemento->title ) . '__' . date( 'Y-m-d' , strtotime( $elemento->date ) ) . '/' . $elemento->id )); ?>">
    <div class="img position-relative">
        <?php
        $fecha = "";
        $aux = strtotime( $elemento->date );
        $mes = [
            "1" => "Ene",
            "2" => "Feb",
            "3" => "Mar",
            "4" => "Abr",
            "5" => "May",
            "6" => "Jun",
            "7" => "Jul",
            "8" => "Ago",
            "9" => "Sep",
            "10" => "Oct",
            "11" => "Nov",
            "12" => "Dic" ];
        $fecha = "<p>" . date( "d" , $aux ) . "</p><p>" . $mes[ date( "n" , $aux ) ] . "</p><p>" . date( "y" , $aux ) . "</p>";
        ?>
        <div class="date position-absolute"><?php echo $fecha; ?></div>
        <?php echo $__env->make( 'layouts.general.image' , [ 'i' => !empty( $elemento[ 'image' ] ) ? $elemento[ 'image' ][ 0 ][ 'image' ] : "" , 'n' => $elemento->title , 'c' => 'w-100' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php if( $type ): ?>
    <p class="title-category"><?php echo e($elemento->category->title); ?></p>
    <?php endif; ?>
    <h4 class="title-blog d-flex justify-content-between"><?php echo e($elemento->title); ?></h4>
    <?php if( $type ): ?>
    <div class="mt-2 resume"><?php echo $elemento->resume; ?></div>
    <?php endif; ?>
    <p class="mt-1" style="color: var( --blog-categoria-title-color );"><a>Leer más ...</a></p>
</a><?php /**PATH C:\Users\Pablo\Desktop\Laravel\hidratools\resources\views/page/parts/blog.blade.php ENDPATH**/ ?>