<?php
if( !class_exists( 'WooCommerce' ) )
{
	return;
}


// Setup woo.
function business_press_woo_setup()
{
	add_theme_support( 'woocommerce' );

	if( get_theme_mod( 'support_gallery_zoom', '1' ) == 1 )
	{
		add_theme_support( 'wc-product-gallery-zoom' );
	}

	if( get_theme_mod( 'support_gallery_lightbox', '1' ) == 1 )
	{
		add_theme_support( 'wc-product-gallery-lightbox' );
	}

	if( get_theme_mod( 'support_gallery_slider', '1' ) == 1 )
	{
		add_theme_support( 'wc-product-gallery-slider' );
	}
	
}
add_action( 'after_setup_theme', 'business_press_woo_setup' );


//business_press_product_per_page
$business_press_product_per_page = absint( get_theme_mod( 'business_press_product_per_page', '12' ) );
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return ' . $business_press_product_per_page . ';' ), 20 );


//business_press_related_product_per_column / it will equal to number of products per column
if( !function_exists( 'business_press_related_products_args' ) )
{
	function business_press_related_products_args( $args )
	{
		$args['posts_per_page'] = absint( get_theme_mod( 'business_press_product_per_column', '4' ) );
		$args['columns'] = 1;
		return $args;
	}
}
add_filter( 'woocommerce_output_related_products_args', 'business_press_related_products_args' );


//business_press_product_per_column
if( !function_exists( 'business_press_loop_columns' ) )
{
	function business_press_loop_columns()
	{
		return absint( get_theme_mod( 'business_press_product_per_column', '4' ) );
	}
}
add_filter('loop_shop_columns', 'business_press_loop_columns');


//remove default wc breadcrumbs
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

// Enable / Disable related product base on setting.
if( get_theme_mod( 'display_related_prdkt', '1' ) == 0 )
{
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
}

//Next ?
