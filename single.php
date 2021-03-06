<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lavande
 */
get_header(); ?>

<main id="primary" class="site-main">

	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', 'single' );

		the_post_navigation( array(
			'prev_text' => sprintf( '<span class="nav-title">%s</span>%%title', _x( 'Previous Post', 'used in single post navigation', 'lavande' ) ),
			'next_text' => sprintf( '<span class="nav-title">%s</span>%%title', _x( 'Next Post', 'used in single post navigation', 'lavande' ) )
		) );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
