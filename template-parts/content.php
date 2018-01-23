<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lavande
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row d-flex align-items-center">
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->
		
		<div class="entry-meta">
			<?php lavande_posted_on(); ?>
		</div><!-- .entry-meta -->
	</div><!-- .row -->
</article><!-- #post-<?php the_ID(); ?> -->
