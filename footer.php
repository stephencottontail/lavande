<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lavande
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="row d-flex align-items-end">
			<div class="col-xs-12 col-lg-5 footer-wrapper site-info">
				<?php
				$footer_text = get_theme_mod( 'footer_text' );
				
				if ( $footer_text ) :
					echo wp_kses( $footer_text, array(
						'a'      => array(
							'href' => array()
						),
						'span' => array(
							'class' => array()
						),
						'em'     => array(),
						'i'      => array(),
						'strong' => array(),
						'b'      => array()
					) );
				else :
				?>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'lavande' ) ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'lavande' ), 'WordPress' );
						?>
					</a>
					<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s', 'lavande' ), 'Lavande', '<a href="http://stephencottontail.com/">Stephen Dickinson</a>' );
				
				endif;
				?>
			</div><!-- .site-info -->
			<?php if ( function_exists( 'jetpack_social_menu' ) && has_nav_menu( 'jetpack-social-menu' ) ) : ?>
				<div class="col-xs-12 col-lg-3 footer-wrapper social-media">
					<?php jetpack_social_menu(); ?>
				</div><!-- .social-media -->
			<?php endif; ?>
		</div><!-- .row -->
	</footer><!-- .site-footer -->
</div><!-- .site.container-fluid -->

<?php wp_footer(); ?>

</body>
</html>
