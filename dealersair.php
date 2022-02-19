<?php
/**
 * @package DealersAir
 */
/*
Plugin Name: DealersAir
Plugin URI: https://dealersair.com/
Description: Modern solutions for WordPress themes.
Version: 0.1.0
Author: Vitalii Bokhin
Author URI: https://vitaliibokhin.com/
License: GNU General Public License v2 or later
Text Domain: dealersair
*/

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

define( 'DEALERSAIR_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/**
 * Add Blocks Category
 */
function filter_block_categories_when_post_provided( $block_categories, $editor_context ) {
    array_push(
        $block_categories,
        array(
            'slug'  => 'dealersair-blocks',
            'title' => __( 'DealersAir', 'dealersair' ),
            'icon'  => null,
        )
    );
    return $block_categories;
}
 
add_filter( 'block_categories_all', 'filter_block_categories_when_post_provided', 10, 2 );

/**
 * Include blocks
 */
require_once( DEALERSAIR_PLUGIN_DIR . 'blocks/blocks.php' );