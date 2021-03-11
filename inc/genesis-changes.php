<?php
/**
 * Genesis Changes
 *
 * @package      TheDock
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

// Theme Supports
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'navigation-widgets', 'search-form', 'script', 'style', ) );
add_theme_support( 'genesis-responsive-viewport' );
add_theme_support( 'genesis-after-entry-widget-area' );
add_theme_support( 'genesis-structural-wraps', array( 'header', 'menu-secondary', 'site-inner', 'footer-widgets', 'footer' ) );
add_theme_support( 'genesis-footer-widgets', 3 );
add_theme_support( 'genesis-menus', array( 'primary' => 'Header Menu', 'secondary' => 'Footer Menu' ) );

// Adds support for accessibility.
add_theme_support(
	'genesis-accessibility', array(
		'404-page',
		'drop-down-menu',
		'headings',
		'rems',
		'search-form',
		'skip-links',
		'screen-reader-text',
	)
);

// Adds posrt type support for featured image
add_post_type_support( 'post', 'page', array( 'genesis-singular-images' ) );

// h1 on home
add_filter( 'genesis_site_title_wrap', function( $wrap ) { return is_front_page() ? 'h1' : $wrap; } );

// Remove admin bar styling
add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );

// Don't enqueue child theme stylesheet
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );

// Remove Edit link
add_filter( 'genesis_edit_post_link', '__return_false' );

// Remove Genesis Favicon (use site icon instead)
remove_action( 'wp_head', 'genesis_load_favicon' );

// Remove Header Description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

// Remove unused sidebars
unregister_sidebar( 'header-right' );
unregister_sidebar( 'sidebar-alt' );


// Removes site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

/**
 * Remove Genesis Templates
 *
 */
 function ea_remove_genesis_templates( $page_templates ) {
	unset( $page_templates['page_archive.php'] );
	unset( $page_templates['page_blog.php'] );
	return $page_templates;
}
add_filter( 'theme_page_templates', 'ea_remove_genesis_templates' );

/**
 * Custom search form
 *
 */
function ea_search_form() {
	ob_start();
	get_template_part( 'searchform' );
	return ob_get_clean();
}
add_filter( 'genesis_search_form', 'ea_search_form' );


/**
 * Disable customizer theme settings
 *
 */
 function ea_disable_customizer_theme_settings( $config ) {
	// $remove = [ 'genesis_header', 'genesis_single', 'genesis_archives', 'genesis_footer' ];
	$remove = [ 'genesis_footer' ];
	foreach( $remove as $item ) {
		unset( $config['genesis']['sections'][ $item ] );
	}
	return $config;
}
//add_filter( 'genesis_customizer_theme_settings_config', 'ea_disable_customizer_theme_settings' );

/**
 * Modifies size of the Gravatar in the author box.
 *
 * @since 2.2.3
 *
 * @param int $size Original icon size.
 * @return int Modified icon size.
 */
function genesis_sample_author_box_gravatar( $size ) {

	return 90;

}
add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );

/**
 * Modifies size of the Gravatar in the entry comments.
 *
 * @since 2.2.3
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;
	return $args;

}
add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );