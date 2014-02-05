<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
		</div><!-- #main .wrapper -->
	</div><!-- #page -->
<div class="footer-wrap">	
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<div>
			<?php if ( is_active_sidebar( 'sidebar-harveys-footer' ) ) {dynamic_sidebar( 'sidebar-harveys-footer' );} ?>
			</div>
		</div><!-- .site-info -->
		<div style="clear:both;"></div>
	</footer><!-- #colophon -->
</div>	
<?php wp_footer(); ?>
</body>
</html>