<?php
/**
 * The Dock
 *
 * This file adds the landing page template to The Dock Theme.
 *
 * Template Name: Landing
 *
 * @package TheDock
 * @author  Luis Colomé
 * @license GPL-2.0-or-later
 * @link    https://luiscolome.com/
 */

add_filter( 'body_class', 'genesis_sample_landing_body_class' );
/**
 * Adds landing page body class.
 *
 * @since 1.0.0
 *
 * @param array $classes Original body classes.
 * @return array Modified body classes.
 */
function genesis_sample_landing_body_class( $classes ) {

	$classes[] = 'landing-page';
	return $classes;

}

// Removes Skip Links.
remove_action( 'genesis_before_header', 'genesis_skip_links', 5 );

add_action( 'wp_enqueue_scripts', 'genesis_sample_dequeue_skip_links' );
/**
 * Dequeues Skip Links Script.
 *
 * @since 1.0.0
 */
function genesis_sample_dequeue_skip_links() {

	wp_dequeue_script( 'skip-links' );

}

// Removes site header elements.
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

// Removes navigation.
remove_theme_support( 'genesis-menus' );

// Removes custom navigation
remove_action( 'genesis_header', 'ea_site_header', 11 );

// Removes site footer elements.
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

// Removes custom HTML footer and footer menu
remove_action( 'genesis_footer', 'lcm_site_footer', 12 );
remove_action( 'genesis_footer', 'lcm_footer_menu', 8 );

// Runs the Genesis loop.
genesis();