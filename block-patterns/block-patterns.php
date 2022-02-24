<?php
/**
 * Twenty Twenty-Two: Block Patterns
 *
 * @since Twenty Twenty-Two 1.0
 */

/**
 * Registers block patterns and categories.
 *
 * @since Twenty Twenty-Two 1.0
 *
 * @return void
 */
function nxt_toolkit_register_block_patterns() {
	$block_pattern_categories = array(
		'featured' => array( 'label' => __( 'Featured', 'nxt-toolkit' ) ),
		'footer'   => array( 'label' => __( 'Footers', 'nxt-toolkit' ) ),
		'header'   => array( 'label' => __( 'Headers', 'nxt-toolkit' ) ),
		'query'    => array( 'label' => __( 'Query', 'nxt-toolkit' ) ),
		'pages'    => array( 'label' => __( 'Pages', 'nxt-toolkit' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'nxt_toolkit_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'general-section-content',
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'nxt_toolkit_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = NXT_PLUGIN_DIR . 'block-patterns/patterns/' . $block_pattern . '.php' ;

		register_block_pattern(
			'nxt-patterns/' . $block_pattern,
			require $pattern_file
		);
	}
}

add_action( 'init', 'nxt_toolkit_register_block_patterns', 9 );