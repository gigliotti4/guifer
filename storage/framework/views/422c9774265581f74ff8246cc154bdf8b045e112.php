<section class="my-3">
    <div class="container-fluid">
        <div class="wrapper-servicio wrapper-categoria py-4 bg-white mb-4">
            <?php echo $__env->make( 'page.parts.categorias' , [ 'categorias' => $data[ 'elementos' ] , 'link' => 0 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php echo $__env->make( 'layouts.general.form' , [ 'buttonADD' => 1 , 'form' => 0 , 'close' => 1 , 'modal' => 1 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if( isset( $data[ 'buscar' ] ) ): ?>
            <?php echo $__env->make( 'layouts.general.table' , [ 'paginate' => $data[ "elementos" ] , 'buscar' => $data[ 'buscar' ] ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make( 'layouts.general.table' , [ 'paginate' => $data[ "elementos" ] ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>
</section>
<?php $__env->startPush('scripts'); ?>
<script>
    window.pyrus = new Pyrus( "categoria" , null , src );
    
    partesFunction = ( t , id ) => {
        window.location = `${url_simple}/adm/categoria/${id}/subcategorias`;
    };
    
    init = ( callbackOK ) => {
        $( "#form .modal-body" ).html( window.pyrus.formulario() );
        /** */
        $( "#wrapper-tabla > div.card-body" ).html( window.pyrus.table( [ { NAME:"ACCIONES" , COLUMN: "acciones" , CLASS: "text-center" , WIDTH: "150px" } ] ) );
        
        window.pyrus.elements( $( "#tabla" ) , url_simple , window.data.elementos , [ "e" , "d" ] , [ { icon : '<i class="fab fa-modx"></i>' , class: 'btn-dark' , function : 'partes' , title : "Sub categorías" } ] );
        
        callbackOK.call( this , null );
    };

    init( () => {} );
</script>
<?php $__env->stopPush(); ?><?php /**PATH C:\Users\Pablo\Desktop\Laravel\hidratools\resources\views/auth/parts/categoria.blade.php ENDPATH**/ ?>