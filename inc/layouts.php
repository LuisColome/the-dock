<?php
/**
 * Layouts
 *
 * @package      TheDock
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

// Unregister genesis layouts
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
// genesis_unregister_layout( 'sidebar-content' );
//genesis_unregister_layout( 'content-sidebar' );

// Add new layouts
genesis_register_layout( 'content-width', [ 'label' => __( 'Content Width', 'thedock' ), ] );

/**
 * Function to forze the layout.
 */
function __genesis_return_content_width_layout() {
  return 'content-width';
}

// Remove layout metabox
//remove_theme_support( 'genesis-inpost-layouts' );
remove_theme_support( 'genesis-archive-layouts' );

// Don't load default data into empty sidebar
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
add_action( 'genesis_sidebar', function() { dynamic_sidebar( 'sidebar' ); } );

// Add New Sidebars
// genesis_register_widget_area( array( 'id' => 'blog-sidebar', 'name' => 'Blog Sidebar' ) );


// Remove sidebar for content layout
add_action( 'genesis_meta', function() {
	$layout = genesis_site_layout();
	if( 'content-width' === $layout ) {
		remove_action( 'genesis_after_content', 'genesis_get_sidebar' );
		remove_action( 'genesis_after_content_sidebar_wrap', 'genesis_get_sidebar_alt' );
	}
});

/**
 * Gutenberg layout class
 * @link https://www.billerickson.net/change-gutenberg-content-width-to-match-genesis-layout/
 *
 * @param string $classes
 * @return string
 */
function ea_gutenberg_layout_class( $classes ) {
	$screen = get_current_screen();
	if( ! $screen->is_block_editor() )
		return $classes;

	$layout = false;
	$post_id = isset( $_GET['post'] ) ? intval( $_GET['post'] ) : false;
  
	// Get post-specific layout
	if( $post_id )
		$layout = genesis_get_custom_field( '_genesis_layout', $post_id );
    
	// Pages use full width as default, see below
	if( empty( $layout ) && 'page' === get_post_type() )
		$layout = 'full-width-content';
    
	// If no post-specific layout, use site-wide default
	elseif( empty( $layout ) )
		$layout = genesis_get_option( 'site_layout' );

	$classes .= ' ' . $layout . ' ';
	return $classes;
}
add_filter( 'admin_body_class', 'ea_gutenberg_layout_class' );

/**
 * Full width layout for pages as default
 *
 * @param string $layout 
 * @return string
 */
function lcm_full_width_pages( $layout ) {
	if( is_page() )
		$layout = 'full-width-content';
	return $layout;
}
add_filter( 'genesis_pre_get_option_site_layout', 'lcm_full_width_pages' );