<?php
/**
 * The template for displaying Category pages.
 *
 * Used to display archive-type pages for posts in a category.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">
		<?php if ( have_posts() ) : ?>
			<header class="entry-header">
				<h1 class="entry-title"><?php printf( __( '%s', 'twentytwelve' ),  single_cat_title( '', false ) ); ?></h1>
			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content-archive', get_post_format() );

			endwhile;
			
			//PAGINATION
			

			global $wp_query;  
			$total_pages = $wp_query->max_num_pages;  
			if ($total_pages > 1){  
			  $current_page = max(1, get_query_var('paged'));  
			  echo paginate_links(array(  
				  'base' => get_pagenum_link(1) . '%_%',  
				  'format' => '/page/%#%',  
				  'current' => $current_page,  
				  'total' => $total_pages,  
				));  
			}

//END PAGINATION

			get_template_part( 'newsletter-include', 'none' );
			//twentytwelve_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar();?>
<?php get_footer(); ?>