<?php /* Template Name: Página de todas as obras */ ?>
<?php
	global $wp;
	$current_url = home_url(add_query_arg(array(),$wp->request));

	$queryTaxonomy = array_key_exists('taxonomy', $_GET);
	if( $queryTaxonomy && $_GET['taxonomy'] == '') {
		wp_redirect($current_url);
		exit;
	}
?>
<?php get_header(); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 padding-0">
			<?php if (has_post_thumbnail()) { ?>
				<?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?>
			<?php } ?>
		</div>
	</div>
</div>
<div class="container-fluid bg-666 padver-15 mbottom-30">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php $taxonomies = get_terms('tipo_de_obra'); ?>
				<form class="form-inline text-center" action="<?= $current_url; ?>/" method="get">
					<div class="form-group">
						<select name="taxonomy" class="form-control">
							<option value="">Todas os tipos de obras</option>
							<?php foreach($taxonomies as $taxonomy) { ?>
							<option value="<?= $taxonomy->slug; ?>"><?= $taxonomy->name; ?></option>
							<?php } ?>
						</select>
					</div>
					<button class="btn btn-primario text-uppercase" type="submit">Filtrar</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php
					if( $queryTaxonomy ) {
						$taxonomy_args = array(
							array(
								'taxonomy' => 'tipo_de_obra',
								'field' => 'slug',
								'terms' => $_GET['taxonomy']
							)
						);
					}
					$args = array(
						'post_type' => 'obra',
						'tax_query' => $taxonomy_args
					);
					$loop = new WP_Query( $args );
					if($loop->have_posts()) { ?>
					<div class="row page_obras">
					<?php while( $loop->have_posts() ) {
						$loop->the_post(); ?>
						<div class="col-xs-12 col-sm-4 mbottom-30">
							<div class="bg-fff">
								<?php if (has_post_thumbnail()) { ?>
									<a href="<?= the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?></a>
								<?php } else { ?>
									<a href="<?= the_permalink(); ?>"><img src="http://placehold.it/768x450" alt="<?php the_title(); ?>" class="img-responsive center-block"></a>
								<?php } ?>
								<div class="body">
									<h2 class="title"><?php the_title(); ?></h2>
									<p><?php the_excerpt(); ?></p>
								</div>
								<p class="text-center mbottom-0 pbottom-15"><a href="<?= the_permalink(); ?>" class="btn btn-secundario txt-uppercase padhor-30 text-uppercase">Saiba mais</a></p>
							</div>
						</div>
					<?php } ?>
					</div>
				<?php } else { ?>
					<div class="row text-center">
						<div class="col-xs-12">
							<div class="bg-fff padver-50 padhor-30">
								<h2 class="text-uppercase font-700 mtop-50 mbottom-30">Ops!</h2>
								<p class="font-300 line-height-1-7 font-1-3em">Não encontramos nenhum resultado correnspondendo à sua pesquisa.</p>
								<p class="font-300 line-height-1-7 font-1-3em mbottom-30">Use outros termos de busca ou clique no botão abaixo para ver todas as opções disponíveis.</p>
								<a href="<?= $current_url; ?>/" class="btn btn-primario text-uppercase padhor-30 mbottom-50">Ver todas as opções</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
