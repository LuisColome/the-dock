<?php 
/**
 * Site Logo
 *
 * @package      TheDock
 * @author       Luis Colomé
 * @since        1.0.0
 * @license      GPL-2.0+
**/


/*
 * Remplazamos el título del sitio por código HTML personalizado.
 */
function personal_genesis_seo_title( $titulo ) {
    $titulo_front = '<h1 itemprop="headline" class="site-title"><a title="' . get_bloginfo('name') . '" href="' . get_bloginfo('url') . '">Custom Title (h1)</a></h1>';
    $titulo = '<p itemprop="headline" class="site-title"><a title="' . get_bloginfo('name') . '" href="' . get_bloginfo('url') . '">Custom Title (p)</a></p>';
	if( is_front_page() ) {
        return $titulo_front;
    }else{
        return $titulo;
    }
}
//add_filter( 'genesis_seo_title', 'personal_genesis_seo_title', 10, 1 );