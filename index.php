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
						<a href="" class="special-square bg-diferenciais">
							<div class="content">
								<div class="inner-content">
									Diferenciais
								</div>
							</div>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 mbottom-30">
						<a href="" class="special-square bg-prazos">
							<div class="content">
								<div class="inner-content">
									Prazos
								</div>
							</div>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 mbottom-30">
						<a href="" class="special-square bg-valores">
							<div class="content">
								<div class="inner-content">
									Valores
								</div>
							</div>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 mbottom-30">
						<a href="" class="special-square bg-contato">
							<div class="content">
								<div class="inner-content">
									Contato
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
$args = array(
	'post_type' => 'obra',
	'posts_per_page' => 2
);
$loop = new WP_Query( $args );
if($loop->have_posts()) { ?>
	<div class="container-fluid bg-f5f5f5 ptop-50 pbottom-20">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
				<?php while($loop->have_posts()) {
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
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<?php /*
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
					 $metaImagem = wp_get_attachment_image_url( $avatar_id, 'full', false );
					 ?>
			 		<div class="col-xs-12 col-sm-4">
						<div class="card-home bg-fff mbottom-30">
							<?php if ($metaImagem != false && $metaImagem != "") { ?>
								<a href="<?php the_permalink(); ?>"><img src="<?= $metaImagem; ?>" class="img-responsive"></a>
							<?php } else { ?>
								<a href="<?php the_permalink(); ?>"><img src="http://placehold.it/768x500" class="img-responsive"></a>
							<?php } ?>
							<a href="<?php the_permalink(); ?>" class="block index-obra-title-2"><?php the_title(); ?></a>
							<div class="index-obra-body-2">
								<p><?= get_the_excerpt(); ?></p>
								<p><a href="<?php the_permalink(); ?>" class="btn btn-primario text-uppercase padhor-30 inline-block">Leia mais</a>
							</div>
						</div>
					</div>
				<?php }
			}
			?>
		</div>
	</div>
</div>
*/ ?>

<?php
$args = array(
	'post_type' => 'cliente',
	'posts_per_page' => 12
);
$loop = new WP_Query( $args );
if($loop->have_posts()) { ?>
	<div class="container-fluid bg-fff ptop-50 pbottom-20">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2 class="color-primary font-2em text-uppercase text-center font-700 mtop-0 mbottom-30">Nossos clientes</h2>
				</div>
			</div>
			<div class="row">
			<?php while($loop->have_posts()) {
		  		$loop->the_post();
		 		$cliente_meta_data = get_post_meta( $post->ID );
		 	?>
				<div class="col-xs-6 col-sm-3 col-md-3 mbottom-30">
					<div class="thumbnail">
					<?php if ($cliente_meta_data['cliente_site'][0]) { ?>
						<a href="<?= $cliente_meta_data['cliente_site'][0]; ?>"><?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?></a>
					<?php } else { ?>
						<?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?>
					<?php } ?>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>

<?php /*
<div class="col-xs-12 col-sm-4">
	<?php if ( is_active_sidebar( 'widgets_direita' ) ) : ?>
		<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'widgets_direita' ); ?>
		</div>
	<?php endif; ?>
</div>
*/ ?>

<?php get_footer(); ?>
