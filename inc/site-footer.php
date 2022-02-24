<?php
/**
 * Site Footer
 *
 * @package      TheDock
 * @author       Luis Colomé
 * @since        1.0.0
 * @license      GPL-2.0+
**/

// Remove Genesis default footer
remove_action( 'genesis_footer', 'genesis_do_footer' );

/**
 * Site Footer - Creds + social links
 */
function lcm_site_footer() {
    echo '<div class="site-footer__creds-wrapper">';

        echo '<div class="site-footer__social">';
	        echo '<a class="site-footer__social__link" href="#">' . ea_icon( array( 'icon' => 'facebook', 'group' => 'social', 'size' => '24' ) ) . '</a>';
	        echo '<a class="site-footer__social__link" href="#">' . ea_icon( array( 'icon' => 'twitter', 'group' => 'social', 'size' => '24' ) ) . '</a>';
	        echo '<a class="site-footer__social__link" href="#">' . ea_icon( array( 'icon' => 'linkedin', 'group' => 'social', 'size' => '24' ) ) . '</a>';
        echo '</div>';

        echo '<div class="site-footer__creds">';
            echo '<p class="site-footer__copyright">&copy; ' . date( 'Y' ) . ' <a href="' . get_bloginfo('url') . '" class="site-footer__link">' . get_bloginfo( 'name' ) . '</a> - WordPress Theme by <a href="htpps://Luiscolome.com/" class="site-footer__link">Luis Colomé</a></p>';
        echo '</div>';

	echo '</div>';
}
add_action( 'genesis_footer', 'lcm_site_footer', 12 );

/**
 * Back to top link
 * 
 */
function lcm_back_to_top(){
	echo '<a class="backtotop" href="#">' . ea_icon( array( 'icon' => 'arrow-up' ) ) . '</a>';
}
add_action( 'genesis_footer', 'lcm_back_to_top', 10 );