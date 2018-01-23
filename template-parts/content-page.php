<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lavande
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row d-flex align-items-center">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	</div>
	<div class="row d-flex justify-content-end">
		<div class="col-md-10">
			<?php lavande_post_thumbnail(); ?>
		
			<div class="entry-content">
				<?php
				the_content();
		
				lavande_link_pages();
				?>
			</div><!-- .entry-content -->
		
			<?php if ( get_edit_post_link() ) : ?>
				<footer class="entry-footer">
					<div class="row d-flex">
						<div class="col-lg-2 meta-wrapper edit-wrapper">
							<?php
							edit_post_link(
								sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Edit <span class="screen-reader-text">%s</span>', 'lavande' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									get_the_title()
								),
								'<span class="edit-link">',
								'</span>'
							);
							?>
						</div><!-- .edit-wrapper -->
					</div><!-- .row -->
				</footer><!-- .entry-footer -->
			<?php endif; ?>
		</div><!-- .col-md-10 -->
	</div><!-- .row -->
</article><!-- #post-<?php the_ID(); ?> -->
