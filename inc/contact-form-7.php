<?php
/**
 * Contact Form 7 support
 *
 * @package      TheDock
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/


/**
 * Remove the P tag from the CF7 forms.
 * 
 */
add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * Load Recaptcha and CF7 CSS/JS only on pages where contact form exists.
 * It uses get_header hook to load the functions before wp_head. 
 * 
 * https://contactform7.com/loading-javascript-and-stylesheet-only-when-it-is-necessary/
 * 
 */
add_action('wp_print_scripts', function () {
	global $post;
	if ( is_a( $post, 'WP_Post' ) && !has_shortcode( $post->post_content, 'contact-form-7') ) {

        // removes CF7 CSS and JS from the script que.
        add_filter( 'wpcf7_load_js', '__return_false' );
        add_filter( 'wpcf7_load_css', '__return_false' );
		
        // removes Google recaptcha script from the script que.
        wp_dequeue_script( 'google-recaptcha' );
		wp_dequeue_script( 'wpcf7-recaptcha' );
	}
});