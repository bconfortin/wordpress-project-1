<?php
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-xs-12 col-sm-4">
    <aside id="secondary" class="widget-area" role="complementary">
    	<?php dynamic_sidebar( 'widgets_direita' ); ?>
    </aside>
</div>

<?php /*
<div class="col-xs-12 col-sm-4">
    <?php if ( is_active_sidebar( 'widgets_direita' ) ) : ?>
        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
            <?php dynamic_sidebar( 'widgets_direita' ); ?>
        </div><!-- #primary-sidebar -->
    <?php endif; ?>
</div>
*/ ?>
