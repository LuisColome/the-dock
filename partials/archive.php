<?php 

/**
 * Archive partial
 *
 * @package      TheDock
 * @author       Luis Colomé
 * @since        1.0.0
 * @license      GPL-2.0+
**/

echo '<article class="lcm-post">'; 

	echo '<a class="lcm-post__image-link" href="' . get_permalink() . '" tabindex="-1" aria-hidden="true">' . get_the_post_thumbnail( get_the_ID(), 'lcm-featured-image' ) . '</a>';

	echo '<header class="lcm-post__header">';
		// $categories = get_the_category();
		// $category = !empty( $categories ) ? esc_html( $categories[0]->name ) : '' ;
		// echo '<p class="lcm-post__meta">' . $category . '</p>';
		ea_entry_category();
 		echo '<h2 class="lcm-post__title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
		echo '<a class="lcm-post__read-more-link" href="' . get_permalink() . '" tabindex="-1" aria-hidden="true">Read More<span class="screen-reader-text"> of ' . get_the_title() . '</span></a>';
	echo '</header>';

echo '</article>';