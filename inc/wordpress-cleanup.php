<?php
/**
 * WordPress Cleanup
 *
 * @package      TheDock
 * @author       Luis Colomé
 * @since        1.0.0
 * @license      GPL-2.0+
**/


/**
* Dont Update the Theme
*
* If there is a theme in the repo with the same name, this prevents WP from prompting an update.
*
* @since  1.0.0
* @author Bill Erickson
* @link   http://www.billerickson.net/excluding-theme-from-updates
* @param  array $r Existing request arguments
* @param  string $url Request URL
* @return array Amended request arguments
*/
function ea_dont_update_theme( $r, $url ) {
if ( 0 !== strpos( $url, 'https://api.wordpress.org/themes/update-check/1.1/' ) )
    return $r; // Not a theme update request. Bail immediately.
  $themes = json_decode( $r['body']['themes'] );
  $child = get_option( 'stylesheet' );
unset( $themes->themes->$child );
  $r['body']['themes'] = json_encode( $themes );
  return $r;
}
add_filter( 'http_request_args', 'ea_dont_update_theme', 5, 2 );


/**
 * Singular body class
 *
 */
 function ea_singular_body_class( $classes ) {
	if( is_singular() )
		$classes[] = 'singular';
	return $classes;
}
add_filter( 'body_class', 'ea_singular_body_class' );


/**
 * Clean body classes
 *
 */
 function ea_clean_body_classes( $classes ) {

	$allowed_classes = [
		'singular',
		'single',
		'page',
		'archive',
		'home',
		'admin-bar',
		'full-width-content',
		'content-sidebar',
		'sidebar-content',
		'content-width',
		'landing-page',
        'wp-custom-logo',
        'first-block-cover-full',
        'first-block-align-full',
	];

	return array_intersect( $classes, $allowed_classes );

}
add_filter( 'body_class', 'ea_clean_body_classes', 20 );

/**
 * Clean Nav Menu Classes
 * @author Bill Erickson
 */
 function ea_clean_nav_menu_classes( $classes ) {
	if( ! is_array( $classes ) )
		return $classes;

	foreach( $classes as $i => $class ) {

		// Remove class with menu item id
		$id = strtok( $class, 'menu-item-' );
		if( 0 < intval( $id ) )
			unset( $classes[ $i ] );

		// Remove menu-item-type-*
		if( false !== strpos( $class, 'menu-item-type-' ) )
			unset( $classes[ $i ] );

		// Remove menu-item-object-*
		if( false !== strpos( $class, 'menu-item-object-' ) )
			unset( $classes[ $i ] );

		// Change page ancestor to menu ancestor
		if( 'current-page-ancestor' == $class ) {
			$classes[] = 'current-menu-ancestor';
			unset( $classes[ $i ] );
		}
	}

	// Remove submenu class if depth is limited
	if( isset( $args->depth ) && 1 === $args->depth ) {
		$classes = array_diff( $classes, array( 'menu-item-has-children' ) );
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'ea_clean_nav_menu_classes', 5 );


/**
 * Clean Post Classes
 * @author Bill Erickson
 */
 function ea_clean_post_classes( $classes ) {

	if( ! is_array( $classes ) )
		return $classes;

	$allowed_classes = array(
  		'hentry',
  		'type-' . get_post_type(),
   	);

	return array_intersect( $classes, $allowed_classes );
}
add_filter( 'post_class', 'ea_clean_post_classes', 5 );

/**
 * Staff comment class
 * @author Bill Erickson
 */
function ea_staff_comment_class( $classes, $class, $comment_id, $comment, $post_id ) {
	if( empty( $comment->user_id ) )
		return $classes;
	$staff_roles = array( 'comment_manager', 'author', 'editor', 'administrator' );
	$staff_roles = apply_filters( 'ea_staff_roles', $staff_roles );
	$user = get_userdata( $comment->user_id );
	if( !empty( array_intersect( $user->roles, $staff_roles ) ) )
		$classes[] = 'staff';
	return $classes;
}
add_filter( 'comment_class', 'ea_staff_comment_class', 10, 5 );


/**
 * Remove avatars from comment list
 *
 */
function lcm_remove_avatars_from_comments( $avatar ) {
	global $in_comment_loop;
	return $in_comment_loop ? '' : $avatar;
}
add_filter( 'get_avatar', 'lcm_remove_avatars_from_comments' );


/**
 * Comment form, button class
 * @author Bill Erickson
 */
function ea_comment_form_button_class( $args ) {
	$args['class_submit'] = 'submit wp-block-button__link';
	return $args;
}
add_filter( 'comment_form_defaults', 'ea_comment_form_button_class' );


/**
 * Excerpt More
 *
 */
function lcm_excerpt_more() {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'lcm_excerpt_more' );

// Remove inline CSS for emoji
remove_action( 'wp_print_styles', 'print_emoji_styles' );
