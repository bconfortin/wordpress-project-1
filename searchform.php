<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<div class="text-center">
    <form role="search" method="get" class="search-form form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="form-group">
            <input type="search" id="<?php echo $unique_id; ?>" class="search-field form-control" placeholder="Faça uma busca" value="<?php echo get_search_query(); ?>" name="s" />
        </div>
    	<button type="submit" class="search-submit btn btn-blue text-uppercase"><i class="fa fa-search mright-5"></i>Pesquisar</button>
    </form>
</div>
