<?php
/**
 * Site Footer
 *
 * @package      TheDock
 * @author       Luis Colomé
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Site Footer
 */
function lcm_site_footer() {
	echo '<div class="footer-left">';
		echo '<p class="copyright">Copyright &copy; ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) . ' ®. All Rights Reserved.</p>';
		echo '<p class="footer-links"><a href="' . home_url( 'privacy-policy' ) . '">Privacy Policy</a> <a href="' . home_url( 'terms' ) . '">Terms</a></p>';
	echo '</div>';
	// echo '<a class="backtotop" href="#">Back to top' . ea_icon( array( 'icon' => 'arrow-up' ) ) . '</a>';
}
add_action( 'genesis_footer', 'lcm_site_footer' );
remove_action( 'genesis_footer', 'genesis_do_footer' );

/**
 * Back to top link
 * 
 */
function lcm_back_to_top(){
	echo '<a class="backtotop" href="#">' . ea_icon( array( 'icon' => 'arrow-up' ) ) . '</a>';
}
add_action( 'genesis_after', 'lcm_back_to_top', 10 );