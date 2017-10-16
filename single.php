<?php get_header(); ?>

<?php
if(have_posts()) {
	while(have_posts()) {
		the_post();
		$obra_meta_data = get_post_meta( $post->ID );
		//$obra_taxonomies = the_taxonomies( array( 'post' => $post->ID ) );
		$avatar_id = $obra_meta_data['_listing_image_id'][0];
		$metaImagem = wp_get_attachment_image( $avatar_id, 'full', false, array( 'class' => 'img-responsive hidden-md hidden-lg' ) );
		$termLocalizacao = wp_get_post_terms($post->ID, 'localizacao');
		$termLocalizacaoCidade = $termLocalizacao[0]->name;
		$termLocalizacaoEstado = $termLocalizacao[1]->name;

		$termTipoDeObra = wp_get_post_terms($post->ID, 'tipo_de_obra');
		$termObra = $termTipoDeObra[0]->name; ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 padding-0">
			<?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive hidden-sm hidden-xs')); ?>
			<?php echo $metaImagem; ?>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 mtop-30">
				<article>
					<section class="section-single-head">

					</section>
					<section class="section-single-body padding-30 bg-fff">
				        <h1 class="title"><?php the_title(); ?></h1>
						<p>Data de publicação: <?php the_date(); ?></p>
						<?php the_content(); ?>
						<p>Prazo da obra: <?php echo $obra_meta_data['obra_prazo'][0]; ?> dias</p>
						<p>Obra concluída em:<?php echo $obra_meta_data['obra_conclusao'][0]; ?> dias</p>
						<p>Cidade: <?php echo $termLocalizacaoCidade; ?></p>
						<p>Estado: <?php echo $termLocalizacaoEstado; ?></p>
					</section>
				</article>
			</div>
			<div class="col-xs-12 col-sm-4 mtop-30">
				<?php if ( is_active_sidebar( 'widgets_direita' ) ) : ?>
					<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
						<?php dynamic_sidebar( 'widgets_direita' ); ?>
					</div><!-- #primary-sidebar -->
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php } } ?>

<?php get_footer(); ?>
