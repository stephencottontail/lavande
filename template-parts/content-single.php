<?php
/**
 * Template part for displaying single posts
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
		
		<div class="entry-meta">
			<?php lavande_posted_on(); ?>
		</div><!-- .entry-meta -->
	</div><!-- .row -->
	<div class="row d-flex justify-content-end">
		<div class="col-md-10">
			<?php lavande_post_thumbnail(); ?>
		
			<div class="entry-content">
				<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lavande' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );
				
				wp_link_pages( array(
					'before'           => '<div class="page-links">',
					'after'            => '</div>',
					'next_or_number'   => 'next',
					'previouspagelink' => __( 'Previous Page', 'lavande' ),
					'nextpagelink'     => __( 'Next Page', 'lavande' )
				) );
				?>
			</div><!-- .entry-content -->
		
			<footer class="entry-footer">
				<div class="row d-flex">				
					<?php if ( 'post' === get_post_type() ) : ?>
						<div class="col-lg-5 meta-wrapper">
							<div class="cat-links">
								<?php
								/* translators: used between list items, there is a space after the comma */
								$categories_list = get_the_category_list( __( ', ', 'lavande' ) );
								if ( $categories_list ) :
								?>
									<span class="meta-title"><?php _e( 'Categories', 'lavande' ); ?></span>
									<?php
									echo $categories_list;
									
								else : ?>
									<span class="meta-title"><?php _e( 'No Categories', 'lavande' ); ?></span>
								<?php endif; ?>
							</div><!-- .cats-links -->
						</div><!-- .cats-wrapper -->
						
						<div class="col-lg-5 meta-wrapper">
							<div class="tags-links">
								<?php
								/* translators: used between list items, there is a space after the comma */
								$tags_list = get_the_tag_list( '', _x( ', ', 'list item separator', 'lavande' ) );
								if ( $tags_list ):
								?>
									<span class="meta-title"><?php _e( 'Tags', 'lavande' ); ?></span>
									<?php
									echo $tags_list;
								
								else : ?>
									<span class="meta-title"><?php _e( 'No Tags', 'lavande' ); ?></span>
								<?php endif; ?>
							</div><!-- .tags-links -->
						</div><!-- .tags-wrapper -->
					<?php endif; ?>
					
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
					</div>
				</div><!-- .row -->
			</footer><!-- .entry-footer -->
		</div><!-- .col-md-10 -->
	</div><!-- .row -->
</article><!-- #post-<?php the_ID(); ?> -->