<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lavande
 */

?>

<div class="row d-flex justify-content-end">
	<div class="col-lg-10">
		<section class="no-results not-found">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	
				<p><?php
					printf(
						wp_kses(
							/* translators: 1: link to WP admin new post page. */
							__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'lavande' ),
							array(
								'a' => array(
									'href' => array(),
								),
							)
						),
						esc_url( admin_url( 'post-new.php' ) )
					);
				?></p>
	
			<?php elseif ( is_search() ) : ?>
	
				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'lavande' ); ?></p>
				<?php
				get_search_form();
	
			else : ?>
	
				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'lavande' ); ?></p>
				<?php
				get_search_form();
	
			endif; ?>
		</section><!-- .no-results -->
	</div><!-- .col-lg-10 -->
</div><!-- .row -->