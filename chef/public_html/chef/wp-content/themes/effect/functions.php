<?php

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

include_once('baztro.php');

function effect_scripts() {
	wp_enqueue_style( 'effect-style', get_stylesheet_uri() );
	wp_enqueue_style('sc', get_template_directory_uri(). '/css/sc.css' );
		wp_enqueue_script( 'effect-nivo-slider', get_template_directory_uri() . '/js/nivo.slider.js', array('jquery') );
		wp_enqueue_style( 'effect-nivo-slider-style', get_template_directory_uri()."/css/nivo.css" );
		if ( ( of_get_option('slider_enabled') != 0 ) && ( is_front_page() ||  is_home() ) )  {
		wp_enqueue_script( 'effect-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery','effect-nivo-slider') );
	}

	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	}
add_action( 'wp_enqueue_scripts', 'effect_scripts' );

if ( ! isset( $content_width ) )
	$content_width = 770;


	/*
	* Home Icon for Menu
	*/
	
function effect_hdmenu() {	
		echo '<ul>';
		if ('page' != get_option('show_on_front')) {
		if (is_front_page())
$class = 'class="current_page_item home-icon"';
else
$class = 'class="home-icon"';
			echo '<li ' . $class . ' ><a href="'.esc_url(home_url()) . '/"><img src="'. get_template_directory_uri() . '/images/home.jpg" width="26" height="24" alt="Home"/></a></li>';
		}
		wp_list_pages('title_li=');
		echo '</ul>';
	}

add_filter( 'wp_nav_menu_items', 'effect_home_link', 10, 2 );
function effect_home_link($items, $args) {
if (is_front_page())
$class = 'class="current_page_item home-icon"';
else
$class = 'class="home-icon"';
$homeMenuItem =
'<li ' . $class . '>' .
$args->before .
'<a href="' .esc_url(home_url( '/' )) . '" title="Home">' .
$args->link_before . '<img src="'. get_template_directory_uri() . '/images/home.jpg" width="26" height="24" alt="Home"/>' . $args->link_after .
'</a>' .
$args->after .
'</li>';
$items = $homeMenuItem . $items;
return $items;
}

//function to call first uploaded image in functions file
function main_image() {
$files = get_children('post_parent='.get_the_ID().'&post_type=attachment
&post_mime_type=image&order=desc');
  if($files) :
    $keys = array_reverse(array_keys($files));
    $j=0;
    $num = $keys[$j];
    $image=wp_get_attachment_image($num, 'large', true);
    $imagepieces = explode('"', $image);
    $imagepath = $imagepieces[1];
    $main=wp_get_attachment_url($num);
		$template=get_template_directory();
		$the_title=get_the_title();
    print "<img src='$main' alt='$the_title' class='frame' />";
  endif;
}

function effect_post_meta_data() {
	printf( __( '%2$s  %4$s', 'effect' ),
	'meta-prep meta-prep-author posted', 
	sprintf( '<span itemprop="datePublished" class="timestamp updated">%3$s</span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_html( get_the_date() )
	),
	'byline',
	sprintf( '<span class="author vcard" itemprop="author" itemtype="http://schema.org/Person"><span class="fn">%3$s</span></span>',
		get_author_posts_url( get_the_author_meta( 'ID' ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'effect' ), get_the_author() ),
		esc_attr( get_the_author() )
		)
	);
}

/* Enable support for post-thumbnails ********************************************/
		
	// If we want to ensure that we only call this function if
	// the user is working with WP 2.9 or higher,
	// let's instead make sure that the function exists first
	
function effect_theme_setup() { 
	 
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'defaultthumb', 350, 350);
		add_image_size( 'popularpost', 75, 75 );
	    load_theme_textdomain('effect', get_template_directory() . '/languages');
	  add_editor_style();
	$args = array(
'default-image' => get_template_directory_uri() . '/images/bg.png',

		); 
		add_theme_support( 'custom-background', $args ); 
        add_theme_support('automatic-feed-links');
		}
		register_nav_menus(
			array(
 				'effect-navigation' => __('Navigation', 'effect'),
 				'primary' => __('Primary', 'effect'),
				)		
		);
	
	add_action( 'after_setup_theme', 'effect_theme_setup' );
	
/* Excerpt ********************************************/

    function effect_excerptlength_teaser($length) {
    return 10;
    }
    function effect_excerptlength_index($length) {
    return 22;
    }
    function effect_excerptmore($more) {
    return '...';
    }
    
    
    function effect_excerpt($length_callback='', $more_callback='') {
    global $post;
    add_filter('excerpt_length', $length_callback);
 
    add_filter('excerpt_more', $more_callback);
   
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = ''.$output.'';
    echo $output;
    }

	

/* Widgets ********************************************/

    function effect_widgets_init() {

	register_sidebar(array(
		'name' => __( 'Sidebar Right', 'effect' ),
	    'before_widget' => '<div class="box clearfloat"><div class="boxinside clearfloat">',
	    'after_widget' => '</div></div>',
	    'before_title' => '<h4 class="widgettitle">',
	    'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => __( 'Bottom Menu 1', 'effect' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __( 'Bottom Menu 2', 'effect' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));	

	register_sidebar(array(
		'name' => __( 'Bottom Menu 4', 'effect' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));	

	
}
add_action('widgets_init', 'effect_widgets_init');
//---------------------------- [ Pagenavi Function ] ------------------------------//
 
function effect_pagenavi() {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $args['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $args['total'] = $max;
  $args['current'] = $current;
 
  $total = 1;
  $args['mid_size'] = 3;
  $args['end_size'] = 1;
  $args['prev_text'] = '&#171; Prev';
  $args['next_text'] = 'Next &raquo;';
 
  if ($max > 1) echo '<div class="wp-pagenavi">';
 if ($total == 1 && $max > 1) $pages = '<span class="pages">Page ' . $current . ' of ' . $max . '</span>';
 echo $pages . paginate_links($args);
 if ($max > 1) echo '</div>';
}

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since effect 1.6
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function effect_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'effect' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'effect_wp_title', 10, 2 );

?>