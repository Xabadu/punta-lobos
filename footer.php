<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

		</section>
		<div id="footer-container">
			<?php if(is_front_page()) : ?>
				<footer id="footer-home">
					<div id="footer-icons" class="float-left">
						<a href="http://instagram.com/<?php echo get_option("los_lobos_instagram_user"); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						<a href="http://facebook.com/<?php echo get_option("los_lobos_facebook_user"); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					</div>
					<div id="footer-author" class="float-right">
						<p id="footer-author-name"></p>
					</div>
				</footer>
			<?php else : ?>
				<footer id="footer">
					<?php do_action( 'foundationpress_before_footer' ); ?>
					<?php dynamic_sidebar( 'footer-widgets' ); ?>
					<?php do_action( 'foundationpress_after_footer' ); ?>
				</footer>
			<?php endif; ?>

		</div>

		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
		</div><!-- Close off-canvas wrapper inner -->
	</div><!-- Close off-canvas wrapper -->
</div><!-- Close off-canvas content wrapper -->
<?php endif; ?>


<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>
</body>
</html>
