<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lavande
 */
?>

<div id="secondary" class="widget-areas row justify-content-end">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<aside class="col-md-10 col-lg-5 widget-area widget-area-left">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside><!-- .widget-area -->
	<?php
	endif;
	
	if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<aside class="col-md-10 col-lg-5 widget-area widget-area-right">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</aside><!-- .widget-area -->
	<?php endif; ?>
</div><!-- .row -->