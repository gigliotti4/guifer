<?php if( !empty( $slider ) ): ?>
<div id="<?php echo e($sliderID); ?>" class="carousel slide wrapper-slider" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php for($i = 0 ; $i < count( $slider ) ; $i++): ?>
            <li data-target="#<?php echo e($sliderID); ?>" data-slide-to="<?php echo e($i); ?>" <?php if( $i == 0 ): ?> class="active" <?php endif; ?>></li>
        <?php endfor; ?>
    </ol>
    <div class="carousel-inner">
        <?php for( $i = 0 ; $i < count( $slider ) ; $i++ ): ?>
        <div class="carousel-item <?php if( $i == 0 ): ?> active <?php endif; ?>">
            <?php
            try {
                $img = $slider[ $i ]->image;
                if( gettype( $img ) != "string" )
                    $img = $slider[ $i ]->image[ 'i' ];
            } catch (\Throwable $th) {
                $img = $slider[ $i ][ "image" ];
                if( gettype( $img ) != "string" )
                    $img = $slider[ $i ][ 'image' ][ 'i' ];
            }
            ?>
            <?php if( $div ): ?>
            <div class="img" style="background-image: url( <?php echo e(asset( $img )); ?> );" >
                <?php if( !empty( $slider[$i]->text ) ): ?>
                <div class="carousel-caption position-absolute w-100" style="top: 0; left: 0;">
                    <div class="container position-relative h-100 w-100 d-flex align-items-center justify-content-end">
                        <div class="texto text-left w-50">
                            <?php echo $slider[$i]->text; ?>

                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php else: ?>
            <?php
            $arr = [ 'i' => $img , 'c' => 'w-100 d-block' , 'n' => 'Slider #' . ( $i + 1 ) ];
            if( isset( $f ) )
                $arr[ 'f' ] = $f;
            if( isset( $n ) )
                $arr[ 'n' ] = $n . ' #' . ( $i + 1 );
            ?>
            <?php echo $__env->make( 'layouts.general.image' , $arr , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php
            $dd = null;
            try {
                $dd = $slider[$i]->text;
            } catch (\Throwable $th) {
                $dd = "";
            }
            ?>
            <?php if( !empty( $dd ) ): ?>
            <div class="carousel-caption position-absolute w-100" style="top: 0; left: 0;">
                <div class="container position-relative h-100 w-100 d-flex align-items-center justify-content-end">
                    <div class="texto w-50">
                        <?php echo $dd; ?>

                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>
        </div>
        <?php endfor; ?>
    </div>
    <?php if( $arrow ): ?>
    <a class="carousel-control-prev" href="#<?php echo e($sliderID); ?>" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#<?php echo e($sliderID); ?>" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <?php endif; ?>
</div>
<?php endif; ?><?php /**PATH C:\Users\Pablo\Desktop\Laravel\hidratools\resources\views/layouts/general/slider.blade.php ENDPATH**/ ?>