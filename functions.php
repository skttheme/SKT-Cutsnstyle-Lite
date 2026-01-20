<?php   
/**
 * SKT Cutsnstyle functions and definitions
 *
 * @package SKT Cutsnstyle
 */

// Set the word limit of post content 
function skt_cutsnstyle_lite_content($limit) {
$content = explode(' ', get_the_content(), $limit);
if (count($content)>=$limit) {
array_pop($content);
$content = implode(" ",$content).'...';
} else {
$content = implode(" ",$content);
}	
$content = preg_replace('/\[.+\]/','', $content);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}

/**
 * Filter the except length to 16 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function skt_cutsnstyle_lite_excerpt_length( $length ) {
    return 16;
}
add_filter( 'excerpt_length', 'skt_cutsnstyle_lite_excerpt_length', 999 );

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'skt_cutsnstyle_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function skt_cutsnstyle_lite_setup() { 
	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'skt-cutsnstyle-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );  
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 302,
		'flex-height' => true,
	) );
	add_theme_support( 'custom-header', array( 'header-text' => false ) );		
	add_image_size('skt-cutsnstyle-lite-homepage-thumb',240,145,true);
	add_image_size( 'skt-cutsnstyle-lite-page-thumb', 340, 279,true ); //340 pixels wide (and croped images)
	register_nav_menus( array(
		'primary' => esc_attr__( 'Primary Menu', 'skt-cutsnstyle-lite' ),
	) );
	add_theme_support( 'custom-background', array( 
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // skt_cutsnstyle_lite_setup
add_action( 'after_setup_theme', 'skt_cutsnstyle_lite_setup' ); 

function skt_cutsnstyle_lite_widgets_init() {	
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'skt-cutsnstyle-lite' ),
		'description'   => __( 'Appears on blog page sidebar', 'skt-cutsnstyle-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Header Widget', 'skt-cutsnstyle-lite' ),
		'description'   => __( 'Appears on site of header', 'skt-cutsnstyle-lite' ),
		'id'            => 'sidebar-header',
		'before_widget' => '<div class="column-1 %2$s">',		
		'before_title'  => '<h3 style="display:none;">',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>',
	) );	
	
}
add_action( 'widgets_init', 'skt_cutsnstyle_lite_widgets_init' );
/*
* Use this function for Sets up theme defaults blog sidebar.
*/

function skt_cutsnstyle_lite_font_url(){
		$font_url = '';	
		
		/* Translators: If there are any character that are not
		* supported by Roboto, trsnalate this to off, do not
		* translate into your own language.
		*/
		
		$roboto = _x('on','roboto:on or off','skt-cutsnstyle-lite');		
		
		/* Translators: If there has any character that are not supported 
		*  by Arimo, translate this to off, do not translate
		*  into your own language.
		*/
		$arimo = _x('on','arimo:on or off','skt-cutsnstyle-lite');	
		
		/* Translators: If there has any character that are not supported 
		*  by Scada, translate this to off, do not translate
		*  into your own language.
		*/
		$scada = _x('on','Scada:on or off','skt-cutsnstyle-lite');			
		
		if('off' !== $roboto || 'off' !== $arimo ){
			$font_family = array();	
					
			if('off' !== $roboto){
				$font_family[] = 'Roboto:300,400,600,700,800,900';
			}
			
			if('off' !== $arimo){
				$font_family[] = 'Arimo:400';
			}	
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}

function skt_cutsnstyle_lite_scripts() {
	wp_enqueue_style('skt-cutsnstyle-lite-font', skt_cutsnstyle_lite_font_url(), array());
	wp_enqueue_style( 'skt-cutsnstyle-lite-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'skt-cutsnstyle-lite-editor-style', get_template_directory_uri()."/editor-style.css" );
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'skt-cutsnstyle-lite-main-style', get_template_directory_uri()."/css/responsive.css" );		
	wp_enqueue_style( 'skt-cutsnstyle-lite-base-style', get_template_directory_uri()."/css/style_base.css" );
	wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'skt-cutsnstyle-lite-custom_js', get_template_directory_uri() . '/js/custom.js' );	
	wp_enqueue_style( 'animate', get_template_directory_uri()."/css/animation.css" );
	
	wp_enqueue_script( 'jquery-functions', get_template_directory_uri().'/grayscale-effects/js/functions.js', array('jquery') );
	wp_enqueue_script( 'jquery-grayscale', get_template_directory_uri().'/grayscale-effects/js/grayscale.js', array('jquery') );
	wp_enqueue_style( 'grayscale', get_template_directory_uri().'/grayscale-effects/css/grayscale.css' );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skt_cutsnstyle_lite_scripts' );

function skt_cutsnstyle_lite_ie_stylesheet(){
	global $wp_styles;
	
	/** Load our IE-only stylesheet for all versions of IE.
	*   <!--[if lt IE 9]> ... <![endif]-->
	*
	*  Note: It is also possible to just check and see if the $is_IE global in WordPress is set to true before
	*  calling the wp_enqueue_style() function. If you are trying to load a stylesheet for all browsers
	*  EXCEPT for IE, then you would HAVE to check the $is_IE global since WordPress doesn't have a way to
	*  properly handle non-IE conditional comments.
	*/
	wp_enqueue_style('skt-cutsnstyle-lite-ie', get_template_directory_uri().'/css/ie.css', array('skt-cutsnstyle-lite-style'));
	$wp_styles->add_data('skt-cutsnstyle-lite-ie','conditional','IE');
	}
add_action('wp_enqueue_scripts','skt_cutsnstyle_lite_ie_stylesheet');


function skt_cutsnstyle_lite_pagination() {
    /*Set this function for pagination links*/
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $page_format as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	}
}

define('SKT_URL','https://www.sktthemes.org');
define('SKT_THEME_URL','https://www.sktthemes.org/themes/');
define('SKT_THEME_DOC','http://sktthemesdemo.net/documentation/skt-cutnstyle-doc/');
define('SKT_PRO_THEME_URL','https://www.sktthemes.org/shop/cutsnstyle/');
define('SKT_PRO_FONT_AWESOME_URL','http://fortawesome.github.io/Font-Awesome/icons/');
define('SKT_FREE_THEME_URL','https://www.sktthemes.org/shop/cutsnstyle-lite/');
define('SKT_LIVE_DEMO','http://sktthemesdemo.net/cutsnstyle/');


function skt_cutsnstyle_lite_credit(){
		return "&copy; 2023 <span>SKT Cutsnstyle</span>. All Rights Reserved";		
}
function skt_cutsnstyle_lite_themebytext(){
		return "Theme by SKT Themes";
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template for about theme.
 */
require get_template_directory() . '/inc/about-themes.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

// get slug by id
function skt_cutsnstyle_lite_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}

function skt_cutsnstyle_lite_customizer_styles() {
    wp_enqueue_style( 'sktcutsnstylelite-customizer', trailingslashit( get_template_directory_uri() ).'css/customizer.css', null );
}
add_action( 'customize_controls_print_styles', 'skt_cutsnstyle_lite_customizer_styles', 99 );

if ( ! function_exists( 'skt_cutsnstyle_lite_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function skt_cutsnstyle_lite_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

// WordPress wp_body_open backward compatibility
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
} 