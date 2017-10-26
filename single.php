<?php get_header(); ?>

<?php
if(have_posts()) {
	while(have_posts()) {
		the_post(); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 padding-0">
			<?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive center-block')); ?>
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
