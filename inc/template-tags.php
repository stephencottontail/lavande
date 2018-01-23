<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Lavande
 */

if ( ! function_exists( 'lavande_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function lavande_posted_on() {
	$time_string = sprintf( '<time class="entry-date published updated" datetime="%1$s">%2$s</time>',
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
	
	if ( ! is_singular() ) {
		$time_string = sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		);
	}

	$author = sprintf( '<span class="author vcard"><a href="%1$s" class="url fn n">%2$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_html( get_the_author() )
	);
	
	$author = sprintf( _x( 'by %s', 'post author', 'lavande' ),
		$author
	);

	echo '<span class="meta-info posted-on">' . $time_string . '</span><span class="meta-info byline"> ' . $author . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'lavande_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function lavande_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}
	?>
	
	<div class="entry-thumbnail">
		<a href="<?php echo esc_url( get_attachment_link( get_post_thumbnail_id() ) ); ?>" aria-hidden="true">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>
	</div>
<?php
}
endif;

if ( ! function_exists( 'lavande_show_comments' ) ) :
/**
 * A custom function to display comments.
 */
function lavande_show_comments( $comment, $args, $depth ) {
	global $post;
  
	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
			<article class="pingback-body">
				<header class="pingback-header">
					<?php _e( 'Pingback', 'lavande' ); ?>
				</header><!-- .pingback-header -->
				
				<div class="pingback-content">
					<cite><?php comment_author_link(); ?></cite>
					<?php edit_comment_link( __( 'Edit', 'lavande' ), '<span class="pingback-edit">', '</span>' ); ?>
				</div>
			</article>
	
	<?php else : ?>
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? 'comment-wrapper' : array( 'comment-wrapper', 'parent' ) ); ?>>
			<article class="comment-body">
				<header class="comment-header d-flex align-items-center">
					<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
			
					<cite class="fn"><?php echo get_comment_author_link(); ?></cite>
					
					<?php
					if ( ! empty( $comment->comment_parent ) ) :
						$parent_comment = get_comment( $comment->comment_parent );
						
						$reply_to = sprintf( '<a href="%1$s">%2$s</a>',
							esc_url( get_comment_link( $parent_comment ) ),
							esc_html( $parent_comment->comment_author )
						);
						?>
						<span class="in-reply-to"><?php printf( __( 'In reply to %s', 'lavande' ), $reply_to ); ?></span>
					<?php endif; ?>
				</header><!-- .comment-header -->
				
				<div class="comment-content">
					<?php
					if ( '0' == $comment->comment_approved ) : ?>
						<span class="awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'lavande' ); ?></span>
					<?php
					endif;
					
					comment_text();
					?>
				</div><!-- .comment-content -->
				
				<footer class="comment-footer">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" class="comment-time"><time datetime="<?php comment_time( 'c' ); ?>"><?php printf( _x( '%1$s, %2$s', '1: comment date, 2: comment time', 'lavande' ),
						get_comment_date(), /* %1$s */
						get_comment_time() /* %2$s */
					); ?></time></a>
					
					<div class="comment-actions">
						<?php
						comment_reply_link( array_merge( $args, array(
							'add_below' => 'comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<span class="comment-reply comment-action">',
							'after'     => '</span>',
						) ) );
						
						edit_comment_link( __( 'Edit', 'lavande' ), '<span class="comment-edit comment-action">', '</span>' );
						?>
					</div><!-- .comment-actions -->
				</footer><!-- .comment-footer -->
			</article>
			
	<?php
	endif; // end check for comment type
	
} // end of function
endif;

if ( ! function_exists( 'lavande_link_pages' ) ) :
/**
 * Let's display multipage posts differently
 */
function lavande_link_pages() {
	global $multipage;
	global $page;
	global $numpages;
	
	if ( ! $multipage ) {
		return;
	}
	?>
	
	<div class="page-links">
		<?php /* translators: 1 = current page, 2 = number of pages for a multipage post */ ?>
		<span class="page-links-title"><?php printf( __( 'Page %1$s of %2$s', 'lavande' ), number_format_i18n( $page ), number_format_i18n( $numpages ) ); ?></span>
		
		<?php
		wp_link_pages( array(
			'before'           => null,
			'after'            => null,
			'next_or_number'   => 'next',
			'previouspagelink' => __( 'Previous Page', 'lavande' ),
			'nextpagelink'     => __( 'Next Page', 'lavande' )
		) );
		?>
	</div><!-- .page-links -->
	
	<?php
}
endif;
