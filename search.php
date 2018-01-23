<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Lavande
 */

get_header(); ?>

<main id="primary" class="site-main">

	<?php if ( have_posts() ) : ?>
		<div class="row d-flex align-items-center">
			<header class="archive-header">
				<h1 class="archive-title">
					<?php
					/* translators: %s: search query. */
					printf( __( 'Search Results for &ldquo;%s&rdquo;', 'lavande' ), get_search_query() );
					?>
				</h1>
			</header><!-- .archive-header -->
		</div><!-- .row -->

		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			get_template_part( 'template-parts/content', get_post_format() );

		endwhile;

		the_posts_navigation( array(
			'prev_text' => __( '&laquo; Older Posts', 'lavande' ),
			'next_text' => __( 'Newer Posts &raquo;', 'lavande' )
		) );

	else : ?>

		<div class="row d-flex align-items-center">
			<header class="archive-header">
				<h1 class="archive-title">
					<?php
					/* translators: %s: search query. */
					printf( __( 'No results for &ldquo;%s&rdquo;', 'lavande' ), get_search_query() );
					?>
				</h1>
			</header><!-- .archive-header -->
		</div><!-- .row -->

		<?php
		get_template_part( 'template-parts/content', 'none' );

	endif; ?>
	
</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
