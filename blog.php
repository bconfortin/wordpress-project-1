<?php /* Template Name: Blog */ ?>
<?php get_header(); ?>

<?php if (has_post_thumbnail()) { ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 padding-0">
			<?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?>
		</div>
	</div>
</div>
<?php } ?>
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
				if($loop->have_posts()) { ?>
				    <?php while($loop->have_posts()) {
						$loop->the_post(); ?>
						<div class="card-home bg-fff mbottom-30">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?></a>
							<div class="padding-15">
								<h2 class="font-700 font-1-5em text-uppercase mtop-0"><?php the_title(); ?></h2>
						        <p class="line-height-1-7 font-1-1em"><?= get_the_excerpt(); ?></p>
								<a href="<?php the_permalink(); ?>" class="btn btn-primario text-uppercase padhor-30">Leia mais</a>
							</div>
						</div>
				    <?php } ?>
					<?php if ($loop->max_num_pages > 1) { // custom pagination  ?>
				        <?php
				        $orig_query = $wp_query; // fix for pagination to work
				        $wp_query = $loop;
				        ?>
				        <nav class="row prev-next-posts mbottom-30">
				            <div class="col-xs-6 prev-posts-link">
				                <?php echo get_next_posts_link( '<div class="btn btn-blue padhor-10"><i class="fa fa-chevron-left mright-10"></i> Página anterior</div>', $loop->max_num_pages ); ?>
				            </div>
				            <div class="col-xs-6 next-posts-link text-right">
				                <?php echo get_previous_posts_link( '<div class="btn btn-blue padhor-10">Próxima página <i class="fa fa-chevron-right mleft-10"></i></div>' ); ?>
				            </div>
				        </nav>
				        <?php
				        $wp_query = $orig_query; // fix for pagination to work
				        ?>
				    <?php } ?>
				<?php } ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
