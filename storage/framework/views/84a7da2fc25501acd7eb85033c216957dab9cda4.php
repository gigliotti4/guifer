<?php
try {
    $no_img = asset("images/no-img.png");
    if( gettype( $i ) != "string" )
        $i = $i[ "i" ];
} catch (\Throwable $th) {
    $i = $i[0]["image"]["i"];
}
?>
<?php if( isset( $in_div ) ): ?>
    <div class="<?php echo e($c); ?> d-flex" style="background-image: url('<?php echo e(asset($i)); ?>');">
    <?php if(isset( $text )): ?>
    <div class="container d-flex align-items-end">
        <div class="text"><?php echo e($text); ?></div>
    </div>
    <?php endif; ?>
    </div>
<?php else: ?>
    <img src="<?php echo e(asset( $i ) . '?t=' . time()); ?>" alt="<?php echo e($n); ?>" <?php if(isset( $f )): ?> <?php endif; ?> onerror="this.src='<?php echo e($no_img); ?>'" <?php if(isset( $c )): ?> class="<?php echo e($c); ?>" <?php endif; ?>/>
<?php endif; ?><?php /**PATH /home3/guifer/public_html/laravel/resources/views/layouts/general/image.blade.php ENDPATH**/ ?>