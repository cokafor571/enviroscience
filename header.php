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

    <?php
    if ( is_front_page() ) : ?>

    <div class="header-group">
        <div class="page-header">
            <p>Free Shipping on Orders Over $30.00!</p>
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>

        <div class="main-navigation-wrapper">
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php the_custom_logo(); ?>
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button>
                <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>

                <div class="woo-menu">

                    <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
                        <input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                        <input type="submit" value="&#xf002;" />
                        <input type="hidden" name="post_type" value="product" />
                    </form>
                    
                <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
                        
                    <div class="secondary-cart">
                        <?php $items = WC()->cart->get_cart();
                        $item_count = count($items); ?>
                        <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><span class="cart-contents-count"><?php echo $item_count; ?></span></a>
                        <div class="cart-dropdown">
                            <div class="cart-dropdown-inner">
                            <?php if ($items) { ?>
                                <h4>Shopping Bag</h4>

                            <?php foreach($items as $item => $values) { 
                                $_product = $values['data']->post; ?>
                                
                                <div class="dropdown-cart-wrap">
                                    <div class="dropdown-cart-left">
                                        <?php $variation = $values['variation_id'];
                                        if ($variation) {
                                            echo get_the_post_thumbnail( $values['variation_id'], 'thumbnail' ); 
                                        } else {
                                            echo get_the_post_thumbnail( $values['product_id'], 'thumbnail' ); 
                                        } ?>
                                    </div>

                                    <div class="dropdown-cart-right">
                                        <h5><?php echo $_product->post_title; ?></h5>
                                        <p><strong>Quantity:</strong> <?php echo $values['quantity']; ?></p>
                                        <?php global $woocommerce;
                                        $currency = get_woocommerce_currency_symbol();
                                        $price = get_post_meta( $values['product_id'], '_regular_price', true);
                                        $sale = get_post_meta( $values['product_id'], '_sale_price', true);
                                        ?>
                                        
                                        <?php if($sale) { ?>
                                            <p class="price"><strong>Price:</strong> <del><?php echo $currency; echo $price; ?></del> <?php echo $currency; echo $sale; ?></p>
                                        <?php } elseif($price) { ?>
                                            <p class="price"><strong>Price:</strong> <?php echo $currency; echo $price; ?></p>    
                                        <?php } ?>
                                    </div>

                                    <div class="clear"></div>
                                </div>
                            <?php } ?>

                                <div class="dropdown-cart-wrap dropdown-cart-subtotal">
                                    <div class="dropdown-cart-left">
                                        <h6>Subtotal</h6>
                                    </div>

                                    <div class="dropdown-cart-right">
                                        <h6><?php echo WC()->cart->get_cart_total(); ?></h6>
                                    </div>

                                    <div class="clear"></div>
                                </div>

                                <?php $cart_url = $woocommerce->cart->get_cart_url();
                                $checkout_url = $woocommerce->cart->get_checkout_url(); ?>

                                <div class="dropdown-cart-wrap dropdown-cart-links">
                                    <div class="dropdown-cart-left dropdown-cart-link">
                                        <a href="<?php echo $cart_url; ?>">View Cart</a>
                                    </div>

                                    <div class="dropdown-cart-right dropdown-checkout-link">
                                        <a href="<?php echo $checkout_url; ?>">Checkout</a>
                                    </div>

                                    <div class="clear"></div>
                                </div>
                            <?php } else { ?>
                                <h4>Shopping Bag</h4>

                                <div class="dropdown-cart-wrap">
                                    <p>Your cart is empty.</p>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>

                <?php } ?>
                </div>
                
            </nav><!-- #site-navigation -->
        </div>
    </div> <?php else : ?>
        <div class="main-navigation-wrapper">
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php the_custom_logo(); ?>
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button>
                <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>

                <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        
                    $count = WC()->cart->cart_contents_count;
                    ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php 
                    if ( $count > 0 ) {
                        ?>
                        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
                        <?php
                    }
                        ?></a>
                
                <?php } ?>
            </nav><!-- #site-navigation -->
        </div>
        <?php
            endif; 

    if (  is_woocommerce() ) :

        $args = array(
            'delimiter' => ' / '
        );

        woocommerce_breadcrumb( $args ); 
        
    endif; 
    
    if ( ! is_woocommerce() && ! is_cart()  && ! is_checkout() ) : ?>
	<header id="masthead" class="site-header" role="banner">
        <figure class="header-image"> <?php the_header_image_tag(); ?> </figure>
		<div class="site-branding">

            <div class="site-branding-text">
                <?php
                if ( is_front_page() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
                    <header class="entry-header"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></header>
                <?php
                endif;

                if ( is_front_page() ) : ?>
                    <div class="site-description">
                        <button>SHOP</button>
                        <button>BLOG</button>
                    </div>
                <?php
                endif; ?>
            </div>
            
		</div><!-- .site-branding -->

	</header><!-- #masthead -->
    <?php elseif ( is_woocommerce() && ! is_single() ) : ?>
            <header class="woocommerce-products-header">

                <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

                    <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>

                <?php endif; ?>

                <?php
                    /**
                        * woocommerce_before_shop_loop hook.
                        *
                        * @hooked wc_print_notices - 10
                        * @hooked woocommerce_result_count - 20
                        * @hooked woocommerce_catalog_ordering - 30
                        */
                    do_action( 'woocommerce_before_shop_loop' );
                ?>

            </header>
        <?php endif; ?>

	<div id="content" class="site-content">

