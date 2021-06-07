<div class="mt-2" id="wrapper-tabla">
    <div class="card-columns"></div>
    <?php if(isset( $paginate )): ?>
    <div class="mt-5 d-flex flex-wrap justify-content-center">
        <?php echo e($paginate->links()); ?>

    </div>
    <?php endif; ?>
</div><?php /**PATH /home3/guifer/public_html/laravel/resources/views/layouts/general/card.blade.php ENDPATH**/ ?>