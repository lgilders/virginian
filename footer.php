<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

		</section>
		<div id="footer-container">
			<footer id="footer" class="content-container row">
				<?php do_action( 'foundationpress_before_footer' ); ?>

                <div id="tertiary-links-footer" class="x-small-12 medium-8 large-7 columns">
                    <?php foundationpress_bottom_bar(); ?>
                </div>

                <div id="social-media-footer" class="x-small-12 medium-4 large-3 columns">
                    <?php get_template_part( '/parts/social-media' ); ?>
                </div>
			</footer>
            <?php do_action( 'foundationpress_after_footer' ); ?>
		</div>

        <footer id="subfooter">
            <?php get_template_part( '/parts/sub-footer' ); ?>
        </footer>

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
