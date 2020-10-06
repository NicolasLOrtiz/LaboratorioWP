<?php
/**
 * WP_Rig\WP_Rig\Editor\Component class
 *
 * @package newrig
 */

namespace WP_Rig\WP_Rig\Editor;

use WP_Rig\WP_Rig\Component_Interface;
use function add_action;
use function add_theme_support;

/**
 * Class for integrating with the block editor.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'editor';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'after_setup_theme', [ $this, 'action_add_editor_support' ] );
	}

	/**
	 * Adds support for various editor features.
	 */
	public function action_add_editor_support() {
		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for wide-aligned images.
		add_theme_support( 'align-wide' );

		/**
		 * Add support for color palettes.
		 *
		 * To preserve color behavior across themes, use these naming conventions:
		 * - Use primary and secondary color for main variations.
		 * - Use `theme-[color-name]` naming standard for standard colors (red, blue, etc).
		 * - Use `custom-[color-name]` for non-standard colors.
		 *
		 * Add the line below to disable the custom color picker in the editor.
		 * add_theme_support( 'disable-custom-colors' );
		 */
		add_theme_support(
			'editor-color-palette',
			[
				[
					'name'  => __( 'Primary', 'newrig' ),
					'slug'  => 'theme-primary',
					'color' => '#e36d60',
				],
				[
					'name'  => __( 'Secondary', 'newrig' ),
					'slug'  => 'theme-secondary',
					'color' => '#41848f',
				],
				[
					'name'  => __( 'Red', 'newrig' ),
					'slug'  => 'theme-red',
					'color' => '#C0392B',
				],
				[
					'name'  => __( 'Green', 'newrig' ),
					'slug'  => 'theme-green',
					'color' => '#27AE60',
				],
				[
					'name'  => __( 'Blue', 'newrig' ),
					'slug'  => 'theme-blue',
					'color' => '#2980B9',
				],
				[
					'name'  => __( 'Yellow', 'newrig' ),
					'slug'  => 'theme-yellow',
					'color' => '#F1C40F',
				],
				[
					'name'  => __( 'Black', 'newrig' ),
					'slug'  => 'theme-black',
					'color' => '#1C2833',
				],
				[
					'name'  => __( 'Grey', 'newrig' ),
					'slug'  => 'theme-grey',
					'color' => '#95A5A6',
				],
				[
					'name'  => __( 'White', 'newrig' ),
					'slug'  => 'theme-white',
					'color' => '#ECF0F1',
				],
				[
					'name'  => __( 'Dusty daylight', 'newrig' ),
					'slug'  => 'custom-daylight',
					'color' => '#97c0b7',
				],
				[
					'name'  => __( 'Dusty sun', 'newrig' ),
					'slug'  => 'custom-sun',
					'color' => '#eee9d1',
				],
			]
		);

		/*
		 * Add support custom font sizes.
		 *
		 * Add the line below to disable the custom color picker in the editor.
		 * add_theme_support( 'disable-custom-font-sizes' );
		 */
		add_theme_support(
			'editor-font-sizes',
			[
				[
					'name'      => __( 'Small', 'newrig' ),
					'shortName' => __( 'S', 'newrig' ),
					'size'      => 16,
					'slug'      => 'small',
				],
				[
					'name'      => __( 'Medium', 'newrig' ),
					'shortName' => __( 'M', 'newrig' ),
					'size'      => 25,
					'slug'      => 'medium',
				],
				[
					'name'      => __( 'Large', 'newrig' ),
					'shortName' => __( 'L', 'newrig' ),
					'size'      => 31,
					'slug'      => 'large',
				],
				[
					'name'      => __( 'Larger', 'newrig' ),
					'shortName' => __( 'XL', 'newrig' ),
					'size'      => 39,
					'slug'      => 'larger',
				],
			]
		);
	}
}
