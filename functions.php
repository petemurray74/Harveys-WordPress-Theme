<?php
function harveys_widgets_init() {
	// register generic sidebar
	register_sidebar( array(
		'name' => __( 'Generic Sidebar', 'twentytwelve' ),
		'id' => 'sidebar-harveys-4',
		'description' => __( 'Used to display items across the site', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// register section sidebar
	register_sidebar( array(
		'name' => __( 'Section Sidebar', 'twentytwelve' ),
		'id' => 'sidebar-harveys-5',
		'description' => __( 'Used to display items across department sections', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	//register footer widget
		register_sidebar( array(
		'name' => __( 'Footer Sidebar', 'twentytwelve' ),
		'id' => 'sidebar-harveys-footer',
		'description' => __( 'The site wide footer', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	//remove front page second sidebar
	unregister_sidebar( 'sidebar-3' );
}
add_action( 'widgets_init', 'harveys_widgets_init',11 );

// Register second menu.
register_nav_menus( array(
  'primary' => __( 'Main Navigation', 'harveys' ),
  'secondary' => __('Secondary Navigation', 'harveys')
) );



function harveys_scripts_styles()
{
	wp_enqueue_style( 'harveys-Robots-fonts', 'http://fonts.googleapis.com/css?family=Roboto+Slab' );
	wp_enqueue_script( 'twentytwelve-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'harveys_scripts_styles',100 );

/*----ADD ANALYTICS----*/
function ga(){ ?>
     <script type="text/javascript">
    
       var _gaq = _gaq || [];
       _gaq.push(['_setAccount', 'UA-6452121-1']);
       _gaq.push(['_trackPageview']);
    
       (function() {
         var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
         ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
         var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
       })();
    
     </script>
<?php }
add_action('wp_head', 'ga','50');

function remove_twentytwelve_actions() {
    remove_action('body_class', 'twentytwelve_body_class');
}
// Call 'remove_twentytwelve_actions' during WP initialization
add_action('init','remove_twentytwelve_actions');

// parent function tweaked to include sidebar-harveys-4 
// otherwise if only sidebar-harveys-4 was active then the body class included 'full-width'
//  
function harveys_body_class( $classes ) {
	$background_color = get_background_color();

	if ( ! (is_active_sidebar( 'sidebar-1' ) || is_active_sidebar( 'sidebar-harveys-4' )) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_color ) )
		$classes[] = 'custom-background-empty';
	elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
		$classes[] = 'custom-background-white';

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'harveys_body_class' );

//
// overrides parent twentytwelve_entry_meta
// removes author name
//

function twentytwelve_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = '';
	} elseif ( $categories_list ) {
		$utility_text = '';
	} else {
		$utility_text = '';
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}

// changing post thumbnail to a sensible size (was 624)
add_action( 'after_setup_theme', 'harveys_setup' ,11);

function harveys_setup() {
	set_post_thumbnail_size( 150, 150, true ); // Unlimited height, soft crop
}

function harveys_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'harveys_add_editor_styles' );
?>