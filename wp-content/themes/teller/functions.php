<?php
/**
 * teller functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package teller
 */

if ( ! function_exists( 'teller_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function teller_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on teller, use a find and replace
	 * to change 'teller' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'teller', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'blog-post-image', 800, 436, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'teller' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'teller_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_editor_style( 'editor-style.css' );
}
endif;
add_action( 'after_setup_theme', 'teller_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function teller_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'teller_content_width', 640 );
}
add_action( 'after_setup_theme', 'teller_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function teller_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'teller' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'teller_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function teller_scripts() {
	wp_enqueue_style( 'teller-style', get_stylesheet_uri() );

    $fonts_url='https://fonts.googleapis.com/css?family=Roboto:400,700,300|PT+Serif:300,400,700';
           if(!empty($fonts_url)){
            wp_enqueue_style('teller-fonts',esc_url_raw($fonts_url),array(),null);
    }

    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css', array());

	// wp_enqueue_script( 'teller-navigation', get_template_directory_uri() . '/js/navigation.js', array(), rand(), true );

	wp_enqueue_script( 'teller-responsive', get_template_directory_uri() . '/js/jquery.slicknav.js', array('jquery'), rand(), true );

	wp_enqueue_script( 'teller-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), rand(), false );

	wp_enqueue_script( 'teller-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'teller_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

add_editor_style('style.css');

/**
 * Register Hook Activation.
 * @since 2.0.1
 */
add_action( 'admin_init', 'teller_update_admin_notice' );
function teller_update_admin_notice() {
	if ( isset( $_GET['teller_hide_notice'] ) && $_GET['teller_hide_notice'] ) {
        update_option( 'teller_theme_show_notice', 1 );
	}
}

add_action( 'admin_notices', 'teller_render_admin_notice' );
/**
 * Admin Notice on Activation.
 * @since 2.0.1
 */
function teller_render_admin_notice() {

    /* Check option, if not available then display notice */
    if( ! get_option( 'teller_theme_show_notice' ) ) {
		$url = add_query_arg( 'teller_hide_notice', '1' );
        ?>
        <div class="teller-notice updated notice wp-clearfix" style="padding-right: 38px; position: relative; background-image: url(<?php echo get_template_directory_uri() . '/images/admin-notice-bg.png'; ?>)">
            <div class="left">We plan to do a Major Update. <a href="https://envaios.com/themes/teller/demo/feedback" target="_blank">What Features do you Need?</a></div>
			<div class="right">Get Heard! Participate in a 3 Minute. Survey!</div>
			<a href="<?php echo $url; ?>" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></a>
        </div>
        <?php
    }
}

/**
 * Delete admin notice on swtich theme.
 * @since 2.0.1
 */
add_action('switch_theme', 'teller_remove_option');
function teller_remove_option () {
  	delete_option( 'teller_theme_show_notice', 1 );
}


/**
 * Admin Notice custom css.
 * @since 2.0.1
 */
add_action('admin_head', 'teller_admin_custom_css');
function teller_admin_custom_css() {
	echo '<link href="https://fonts.googleapis.com/css?family=Droid+Sans:300,400,700&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">';
  	echo '<style type="text/css">
    div.teller-notice {
		background-color: #fff;
		border: 0;
		border: 1px solid #ccc;
		box-shadow: none;
		background-repeat: no-repeat;
		background-position: left center;
		background-size: 210px;
		border-radius: 5px;
    	padding: 14px 50px 14px 220px !important;
		font-size: 16px;
		font-family: "Roboto", sans-serif;
		color: #272736;
	}
	div.teller-notice .notice-dismiss {
		text-decoration: none;
		top: 8px;
	}
	div.teller-notice .notice-dismiss:before {
		content: "\f335";
		width: 12px;
	    height: 12px;
	    border-radius: 100%;
		color: #bbb;
	    border: 1px solid #bbb;
	    font-size: 12px;
	    line-height: 13px;
	}
	div.teller-notice .left {
		float: left;
	}
	div.teller-notice .right {
		float: right;
		color: #afadad;
		font-size: 14px;
		color: #9d9fa8;
	}
	@media only screen and (max-width: 1105px) {
		div.teller-notice {
			background-size: 175px;
			padding: 10px 50px 10px 180px !important;
    		font-size: 12px;
		}
		div.teller-notice .notice-dismiss {
			top: 4px;
		}
		div.teller-notice .right {
			font-size: inherit;
		}
	}
	@media only screen and (max-width: 1023px) {
		div.teller-notice {
			background-size: 156px;
		    padding: 8px 50px 8px 160px !important;
		    font-size: 11px !important;
		}
		div.teller-notice .notice-dismiss {
			top: 2px;
		}
	}
	@media only screen and (max-width: 836px) {
		div.teller-notice {
			background-image: none !important;
			padding: 9px 50px 10px 20px !important;
		}
		div.teller-notice .notice-dismiss {
			top: 2px;
		}
	}
	@media only screen and (max-width: 836px) {
		div.teller-notice .left,
		div.teller-notice .right {
			float: none;
		}
		div.teller-notice .notice-dismiss {
			top: 10px;
		}
	}
  </style>';
}

/**
 * Image resize dimensions
 * @since 2.0.1
 */
add_filter('image_resize_dimensions', 'teller_image_crop_dimensions', 10, 6);
function teller_image_crop_dimensions($default, $orig_w, $orig_h, $new_w, $new_h, $crop){
    if ( !$crop ) return null; // let the wordpress default function handle this

    $aspect_ratio = $orig_w / $orig_h;
    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

    $crop_w = round($new_w / $size_ratio);
    $crop_h = round($new_h / $size_ratio);

    $s_x = floor( ($orig_w - $crop_w) / 2 );
    $s_y = floor( ($orig_h - $crop_h) / 2 );

    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}

/**
 * Favicon
 * @since 2.0.1
 */
add_action( 'wp_head', 'teller_favicon' );
function teller_favicon() {
	echo '<link rel="shortcut icon" type="image/png" href="' . get_template_directory_uri() . '/images/favicon.png"/>';
}
