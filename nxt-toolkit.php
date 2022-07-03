<?php
/**
 * @package nxt-toolkit
 */
/*
Plugin Name: Nxt Theme Toolkit
Plugin URI: https://dealersair.com/nxt-business-wordpress-theme
Description: Nxt Theme Toolkit
Version: 0.1.0
Author: Vitalii Bokhin
Author URI: https://bokhin.com
License: GNU General Public License v2 or later
Text Domain: nxt-toolkit
*/

if ( ! defined( '_NXT_TK_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_NXT_TK_VERSION', '0.1.0' );
}

// /*
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.

// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

// Copyright 2005-2015 Automattic, Inc.
// */

// // Make sure we don't expose any info if called directly
// if ( !function_exists( 'add_action' ) ) {
// 	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
// 	exit;
// }

// define( 'AKISMET_VERSION', '4.2.2' );
// define( 'AKISMET__MINIMUM_WP_VERSION', '5.0' );
// define( 'AKISMET__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
// define( 'AKISMET_DELETE_LIMIT', 10000 );

// register_activation_hook( __FILE__, array( 'Akismet', 'plugin_activation' ) );
// register_deactivation_hook( __FILE__, array( 'Akismet', 'plugin_deactivation' ) );

// require_once( AKISMET__PLUGIN_DIR . 'class.akismet.php' );
// require_once( AKISMET__PLUGIN_DIR . 'class.akismet-widget.php' );
// require_once( AKISMET__PLUGIN_DIR . 'class.akismet-rest-api.php' );

// add_action( 'init', array( 'Akismet', 'init' ) );

// add_action( 'rest_api_init', array( 'Akismet_REST_API', 'init' ) );

// if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
// 	require_once( AKISMET__PLUGIN_DIR . 'class.akismet-admin.php' );
// 	add_action( 'init', array( 'Akismet_Admin', 'init' ) );
// }

// //add wrapper class around deprecated akismet functions that are referenced elsewhere
// require_once( AKISMET__PLUGIN_DIR . 'wrapper.php' );

// if ( defined( 'WP_CLI' ) && WP_CLI ) {
// 	require_once( AKISMET__PLUGIN_DIR . 'class.akismet-cli.php' );
// }

define( 'NXT_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'NXT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Enqueue scripts and styles.
 */
function nxt_toolkit_scripts() {
	wp_enqueue_style( 'nxt-toolkit-head-style', NXT_PLUGIN_URL . 'css/style.head.css', array(), _NXT_TK_VERSION );
	
	wp_enqueue_script( 'nxt-toolkit-script', NXT_PLUGIN_URL . 'js/script.js', array(), _NXT_TK_VERSION, true );

	wp_add_inline_script(
		'nxt-toolkit-script', 
		'var sJS = { assetsDirPath: "'. NXT_PLUGIN_URL .'", deferScriptsStartLoading: function () {}, deferScriptsBefore: [], deferScriptsAfter: [] };',
		'before'
	);
}
add_action( 'wp_enqueue_scripts', 'nxt_toolkit_scripts' );

/**
 * Enqueue scripts and styles in footer.
 */
function nxt_toolkit_footer_styles() {
    wp_enqueue_style( 'nxt-foot-style', NXT_PLUGIN_URL . 'css/style.foot.css', array(), _NXT_TK_VERSION );
}
add_action( 'get_footer', 'nxt_toolkit_footer_styles' );

/**
 * Add blocks button to admin menu
 */
add_action( 'admin_menu', function () {
	add_menu_page( esc_html__('Blocks', 'nxt'), esc_html__('Blocks', 'nxt'), 'manage_options', 'edit.php?post_type=wp_block', '', 'dashicons-block-default', 4 );
});

/**
 * Dequeue blocks styles.
 */
add_action( 'wp_enqueue_scripts', function () {
	wp_dequeue_style( 'wp-block-library' );
});

/**
 * Enqueue blocks styles in footer.
 */
add_action( 'get_footer', function () {
    wp_enqueue_style( 'wp-block-library' );
});

/**
 * Add Blocks Category
 */
function filter_block_categories_when_post_provided( $block_categories, $editor_context ) {
    array_push(
        $block_categories,
        array(
            'slug'  => 'nxt-blocks',
            'title' => __( 'NXT Blocks', 'nxt-toolkit' ),
            'icon'  => null,
        )
    );
    return $block_categories;
}
 
add_filter( 'block_categories_all', 'filter_block_categories_when_post_provided', 10, 2 );

/**
 * Include blocks
 */
require_once NXT_PLUGIN_DIR . 'blocks/blocks.php';

/**
 * Include block patterns
 */
require_once NXT_PLUGIN_DIR . 'block-patterns/block-patterns.php';