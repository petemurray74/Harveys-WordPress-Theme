<?php
/**
 * Harveys' template for displaying archived content. 
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="list-entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
	</header><!-- .entry-header -->
	<div class="entry-summary"><?php the_post_thumbnail(); ?>
		<p class="date"><?php the_date();?></p> 
		<?php the_excerpt();
		//wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); 
		//the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) );
		//echo balanceTags(wp_trim_words( get_the_content(), $num_words = 20, $more = null ), true);
		?>
		<a class="read-more" href="<?php the_permalink() ?>">Read More</a>
	</div><!-- .entry-summary -->
</article><!-- #post -->		