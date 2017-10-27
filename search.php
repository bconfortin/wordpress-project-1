<?php get_header(); ?>

<?php // if (has_post_thumbnail()) { ?>
<style>
.top-thumbnail-title {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: 100%;
	font-size: 3em;
	font-weight: 700;
	color: #fff;
	text-align: center;
	text-transform: uppercase;
	-webkit-text-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
	   -moz-text-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
			text-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

@media all and (max-width: 768px) {
	.top-thumbnail-title {
		font-size: 1.5em;
	}
}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 padding-0">
			<?php // the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?>
			<img src="http://placehold.it/1920x450" alt="" class="img-responsive">
			<?php if ( have_posts() ) : ?>
				<h1 class="top-thumbnail-title">Resultados da busca por: <?= get_search_query(); ?></h1>
			<?php else : ?>
				<h1 class="top-thumbnail-title">Nenhum resultado encontrado.</h1>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php // } ?>
<div class="container-fluid ptop-30">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 <?php if (is_active_sidebar('widgets_direita')) { echo 'col-sm-8'; } ?>">
				<?php
				if ( get_query_var('paged') ) {
				    $paged = get_query_var('paged');
				} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
				    $paged = get_query_var('page');
				} else {
				    $paged = 1;
				}
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					//'posts_per_page' => 2,
					'posts_per_page' => get_option('posts_per_page'),
					'order' => 'DESC', // 'ASC'
    				'orderby' => 'date', // modified | title | name | ID | rand
					'paged' => $paged
				);
				$loop = new WP_Query( $args );
				if(have_posts()) { ?>
				    <?php while(have_posts()) {
						the_post(); ?>
						<div class="card-home bg-fff mbottom-30">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?></a>
							<div class="padding-15">
								<h2 class="font-700 font-1-5em text-uppercase mtop-0"><?php the_title(); ?></h2>
						        <p class="line-height-1-7 font-1-1em"><?= get_the_excerpt(); ?></p>
								<a href="<?php the_permalink(); ?>" class="btn btn-primario text-uppercase padhor-30">Leia mais</a>
							</div>
						</div>
				    <?php } ?>
					<?php if (max_num_pages > 1) { // custom pagination  ?>
				        <?php
				        $orig_query = $wp_query; // fix for pagination to work
				        $wp_query = $loop;
				        ?>
				        <nav class="row prev-next-posts mbottom-30">
				            <div class="col-xs-6 prev-posts-link">
				                <?php echo get_next_posts_link( '<div class="btn btn-blue padhor-10"><i class="fa fa-chevron-left mright-10"></i> Página anterior</div>', max_num_pages ); ?>
				            </div>
				            <div class="col-xs-6 next-posts-link text-right">
				                <?php echo get_previous_posts_link( '<div class="btn btn-blue padhor-10">Próxima página <i class="fa fa-chevron-right mleft-10"></i></div>' ); ?>
				            </div>
				        </nav>
				        <?php
				        $wp_query = $orig_query; // fix for pagination to work
				        ?>
				    <?php } ?>
				<?php } else { ?>
					<div class="row text-center">
						<div class="col-xs-12">
							<div class="bg-fff padver-50 padhor-30">
								<h2 class="text-uppercase font-700 mtop-50 mbottom-30">Ops!</h2>
								<p class="font-300 line-height-1-7 font-1-3em">Não encontramos nenhum resultado correnspondendo à sua pesquisa.</p>
								<p class="font-300 line-height-1-7 font-1-3em mbottom-30">Por favor, tente usar outros termos de busca.</p>
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>

				<?php } ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
