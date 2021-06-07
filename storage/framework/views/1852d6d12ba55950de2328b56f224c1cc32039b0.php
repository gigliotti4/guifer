<a class="plus" href="<?php echo e(URL::to( App::getLocale() . '/blog/' . str_slug( $elemento->titulo[App::getLocale()] ) . '__' . date( 'Y-m-d' , strtotime( $elemento->fecha ) ) . '/' . $elemento->id )); ?>">
    <div class="img position-relative">
        <?php
        $fecha = "";
        $aux = strtotime( $elemento->fecha );
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
        <?php echo $__env->make( 'layouts.general.image' , [ 'i' => !empty( $elemento[ 'image' ] ) ? $elemento[ 'image' ][ 0 ][ 'image' ] : "" , 'n' => $elemento->titulo[App::getLocale()] , 'c' => 'w-100' ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php if( $type ): ?>
    <p class="title-category"><?php echo e($elemento->categoria->titulo[App::getLocale()]); ?></p>
    <?php endif; ?>
    <h4 class="blog--title d-flex justify-content-between"><?php echo e($elemento->titulo[App::getLocale()]); ?></h4>
    <?php if( $type ): ?>
    <div class="mt-2 resume"><?php echo $elemento->resumen[App::getLocale()]; ?></div>
    <?php endif; ?>
    <p class="mt-1 blog--more"><?php echo e(translate("label_mas", App::getLocale())); ?> ...</p>
</a><?php /**PATH /home/pablo/Escritorio/ga-srl/resources/views/page/parts/blog.blade.php ENDPATH**/ ?>