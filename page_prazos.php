<?php /* Template Name: Prazos */ ?>
<?php get_header(); ?>

<?php
if(have_posts()) {
	while(have_posts()) {
		the_post();
		?>
		<?php if (has_post_thumbnail()) { ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 padding-0">
					<?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?>
				</div>
			</div>
		</div>
		<?php } else { ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 padding-0">
					<img src="http://placehold.it/1920x450" alt="<?php the_title(); ?>" class="img-responsive">
				</div>
			</div>
		</div>
		<?php } ?>

		<div class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 page_valores">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
<?php } } ?>
<?php get_footer(); ?>
