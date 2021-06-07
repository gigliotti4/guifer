<?php if(session('success')): ?>
    <div class="position-fixed w-100 text-center" style="z-index:9999; top:0;">
        <div class="alert alert-success alert-dismissible position-absolute fade show d-inline-block mb-0" style="top: 0; left: 40%;">
            <?php echo session('success')["mssg"]; ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php endif; ?>
<?php if($errors->any()): ?>
    <div class="position-fixed w-100 text-center" style="z-index:9999; top: 0;">
        <div class="alert alert-danger alert-dismissible position-absolute fade show d-inline-block mb-0" style="top: 0; left: 40%;">
            <?php echo $errors->first('mssg'); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php endif; ?><?php /**PATH /home3/guifer/public_html/laravel/resources/views/layouts/general/message.blade.php ENDPATH**/ ?>