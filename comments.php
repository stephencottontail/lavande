<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lavande
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<div class="row d-flex justify-content-end">
		<div class="col col-md-10">
			<?php
			// You can start editing here -- including this comment!
			if ( have_comments() ) : ?>
				<h2 class="comments-title">
					<?php printf( __( 'Comments (%s)', 'lavande' ), number_format_i18n( get_comments_number() ) ); ?>
				</h2><!-- .comments-title -->

				<ol class="comment-list">
					<?php
					wp_list_comments( array(
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 64,
						'callback'    => 'lavande_show_comments'
					) );
					?>
				</ol><!-- .comment-list -->
		
				<?php
				the_comments_navigation( array(
					'prev_text' => __( '&laquo; Older Comments', 'lavande' ),
					'next_text' => __( 'Newer Comments &raquo;', 'lavande' )
				) );
		
				// If comments are closed and there are comments, let's leave a little note, shall we?
				if ( ! comments_open() ) : ?>
					<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'lavande' ); ?></p>
				<?php
				endif;
		
			endif; // Check for have_comments().
		
			comment_form();
			?>
		</div><!-- .col-lg-10 -->
	</div><!-- .row -->
</div><!-- #comments -->
