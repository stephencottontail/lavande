<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Lavande
 */

get_header(); ?>

<main id="primary" class="site-main">
	
	<div class="row d-flex align-items-center">
		<header class="error-404-header">
			<h1 class="error-404-title"><?php _e( 'Oops!', 'lavande' ); ?></h1>
		</header>
	</div><!-- .row -->
	
	<div class="row d-flex justify-content-end">
		<div class="col-lg-10">
			<section class="error-404 not-found">
				<p>
					<?php
					printf( wp_kses(
						__( 'It looks like nothing was found here. Try <a href="$s">returning home</a> or performing a search.', 'lavande' ),
						array( 'a' => array( 'href' => array() ) ),
						esc_url( home_url( '/' ) )
					) );
					?>
				</p>

				<?php get_search_form(); ?>
			</section><!-- .error-404 -->
		</div><!-- .col-lg-10 -->
	</div><!-- .row -->
	
</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
