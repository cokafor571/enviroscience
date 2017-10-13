<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Starterpack
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'starterpack' ); ?></a>

    <nav id="site-navigation" class="main-navigation" role="navigation">
        <?php the_custom_logo(); ?>
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button>
        <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
    </nav><!-- #site-navigation -->

    <figure class="header-image"> <?php the_header_image_tag(); ?> </figure>

    <div class="page-header">
		<p class="header-location">100 Day St. Orange NJ, 07051</p>
		<p class="header-number">(973)-672-5000</p>
		<p class="header-email">envirosciencejo@gmail.com</p>
	</div>
    
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">

            <div class="site-branding-text">
                <?php
                if ( is_front_page() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
                    <header class="entry-header"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></header>
                <?php
                endif;

                if ( is_front_page() ) : 
                    
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                    <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                <?php
                    endif;
                endif; ?>
            </div>
		</div><!-- .site-branding -->

		
	</header><!-- #masthead -->

	<div id="content" class="site-content">
