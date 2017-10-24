<?php get_header(); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 padding-0">
			<?php echo do_shortcode('[smartslider3 slider=2]'); ?>
			<?php // echo do_shortcode('[foogallery id="31"]'); ?>
			<!-- <img src="http://placehold.it/1920x900" alt="" class="img-responsive mbottom-30"> -->
		</div>
	</div>
</div>
<div class="container-fluid bg-fff ptop-50 pbottom-20">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-3 mbottom-30">
						<a href="" class="special-square">
							<div class="content">
								<div class="inner-content">
									Diferenciais
								</div>
							</div>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 mbottom-30">
						<a href="" class="special-square">
							<div class="content">
								<div class="inner-content">
									Prazos
								</div>
							</div>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 mbottom-30">
						<a href="" class="special-square">
							<div class="content">
								<div class="inner-content">
									Valores
								</div>
							</div>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 mbottom-30">
						<a href="" class="special-square">
							<div class="content">
								<div class="inner-content">
									Contato
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-4">
				<?php if ( is_active_sidebar( 'widgets_direita' ) ) : ?>
					<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
						<?php dynamic_sidebar( 'widgets_direita' ); ?>
					</div><!-- #primary-sidebar -->
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid bg-f5f5f5 ptop-50 pbottom-20">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php
				$args = array(
					'post_type' => 'obra',
					'posts_per_page' => 2
				);
				$loop = new WP_Query( $args );
				if($loop->have_posts()) {
					while($loop->have_posts()) {
						 $loop->the_post();
						 ?>
						 <div class="card-home bg-fff mbottom-30">
 							<!-- <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?></a> -->
 							<h2 class="index-obra-title"><?php the_title(); ?></h2>
 							<div class="index-obra-body">
 								<p class="text"><?= get_the_excerpt(); ?></p>
 								<p class="button"><a href="<?php the_permalink(); ?>" class="btn btn-primario text-uppercase padhor-30 inline-block">Leia mais</a>
 							</div>
 						</div>
					<?php }
				}
				?>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid bg-f5f5f5 ptop-50 pbottom-20">
	<div class="container">
		<div class="row">
			<?php
			$args = array(
				'post_type' => 'obra',
				'posts_per_page' => 2
			);
			$loop = new WP_Query( $args );
			if($loop->have_posts()) {
				while($loop->have_posts()) {
					 $loop->the_post();
					 $obra_meta_data = get_post_meta( $post->ID );
					 $avatar_id = $obra_meta_data['_listing_image_id'][0];
					 $metaImagem = wp_get_attachment_image( $avatar_id, 'full', false, array( 'class' => 'img-responsive' ) );
					 ?>
			 		<div class="col-xs-6">
						<div class="card-home bg-fff mbottom-30">
							<a href="<?php the_permalink(); ?>"><?= $metaImagem; ?></a>
							<a href="<?php the_permalink(); ?>" class="block index-obra-title"><?php the_title(); ?></a>
						</div>
					</div>
				<?php }
			}
			?>
		</div>
	</div>
</div>

<div class="container-fluid bg-fff ptop-50 pbottom-20">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h2 class="color-primary font-2em text-uppercase text-center font-700 mtop-0 mbottom-30">Nossos clientes</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-sm-3 col-md-3 mbottom-30">
				<a href=""><img src="http://placehold.it/768x768" alt="" class="img-responsive"></a>
			</div>
			<div class="col-xs-6 col-sm-3 col-md-3 mbottom-30">
				<a href=""><img src="http://placehold.it/768x768" alt="" class="img-responsive"></a>
			</div>
			<div class="col-xs-6 col-sm-3 col-md-3 mbottom-30">
				<a href=""><img src="http://placehold.it/768x768" alt="" class="img-responsive"></a>
			</div>
			<div class="col-xs-6 col-sm-3 col-md-3 mbottom-30">
				<a href=""><img src="http://placehold.it/768x768" alt="" class="img-responsive"></a>
			</div>

		</div>
	</div>
</div>


<?php get_footer(); ?>
