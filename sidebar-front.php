<?php
/**
 * The sidebar containing the front page widget areas.
 *
 * If no active widgets in either sidebar, they will be hidden completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/*
 * The front page widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
if ( ! is_active_sidebar( 'sidebar-2' ) )
	return;

// If we get this far, we have widgets. Let's do this.
?>
<div id="secondary" role="complementary">
	<div class="row">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div><!-- .first -->
</div><!-- #secondary -->