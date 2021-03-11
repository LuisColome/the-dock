<?php
/**
 * Template Tags
 *
 * @package      TheDock
 * @author       Luis Colomé
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Entry Category
 * 
 * @author  Bill Erickson
 */
function ea_entry_category() {
	$term = ea_first_term();
	if( !empty( $term ) && ! is_wp_error( $term ) )
		echo '<p class="lcm-post__category"><a href="' . get_term_link( $term, 'category' ) . '">' . $term->name . '</a></p>';
}

/**
 * Post Summary Image
 * 
 * @author  Bill Erickson
 */
function ea_post_summary_image( $size = 'thumbnail_medium' ) {
	echo '<a class="post-summary__image" href="' . get_permalink() . '" tabindex="-1" aria-hidden="true">' . wp_get_attachment_image( ea_entry_image_id(), $size ) . '</a>';
}