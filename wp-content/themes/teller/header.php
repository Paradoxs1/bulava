<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package teller
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'teller' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
        <div class="wrap">
		<div class="site-branding">
            <a href="/" rel="home">Bulava</a>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->

        </div>
	</header><!-- #masthead -->

	<?php if( ( is_home() || is_search() || is_archive() ) && get_header_image() ) { ?>

	    <div class="featured-widget" style="background-image: url('<?php header_image(); ?>')">
	    </div>
	<?php } ?>
    <div id="content" class="site-content">
        <div class="wrap clearfix">
