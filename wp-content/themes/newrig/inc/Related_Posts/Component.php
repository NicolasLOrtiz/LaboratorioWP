<?php
/**
 * WP_Rig\WP_Rig\Related_Posts\Component class
 *
 * @package newrig
 */

namespace WP_Rig\WP_Rig\Related_Posts;

use WP_Rig\WP_Rig\Component_Interface;
use WP_Rig\WP_Rig\Templating_Component_Interface;
use function WP_Rig\WP_Rig\newrig;
use function get_the_category;
use function add_action;
use function add_filter;
use function wp_enqueue_script;
use function get_theme_file_uri;
use function get_theme_file_path;
use function wp_script_add_data;
use function wp_localize_script;
use function add_image_size;


/**
 * Class for related posts.
 *
 * Exposes template tags:
 * * `newrig()->the_comments( array $args = [] )`
 *
 * @link https://wordpress.org/plugins/amp/
 */
class Component implements Component_Interface, Templating_Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'related_posts';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'wp_enqueue_scripts', [ $this, 'action_enqueue_related_posts_script' ] );
		add_action( 'after_setup_theme', [ $this, 'action_add_image_sizes' ] );
	}

	/**
	 * Gets template tags to expose as methods on the Template_Tags class instance, accessible through `newrig()`.
	 *
	 * @return array Associative array of $method_name => $callback_info pairs. Each $callback_info must either be
	 *               a callable or an array with key 'callable'. This approach is used to reserve the possibility of
	 *               adding support for further arguments in the future.
	 */
	public function template_tags() : array {
		return [
			'display_related_posts' => [ $this, 'display_related_posts' ],
		];
	}
	/**
	 * Add image size
	 */
	public function action_add_image_sizes(){
		add_image_size( 'newrigRelated', 720, 460, true );
	}

	/**
	 * Return comma-separated list of current post category IDs.
	 */
	public function get_post_category_ids() {
		$categories = get_the_category();
		$cat_ids = [];

		if ( ! empty( $categories ) ) {
			foreach ( $categories as $category ) {
				$cat_ids[] = $category->cat_ID;
			}
		}

		return implode( ',', $cat_ids );
	}

	/**
	 * Enqueues o script de posts relacionados.
	 */
	public function action_enqueue_related_posts_script() {

		// If the AMP plugin is active, return early.
		if ( newrig()->is_amp() ) {
			return;
		}

		// Enqueue the navigation script.
		if ( is_single() ) {
			wp_enqueue_script(
				'newrig-related-posts',
				get_theme_file_uri( '/assets/js/related.min.js' ),
				[],
				newrig()->get_asset_version( get_theme_file_path( '/assets/js/navigation.min.js' ) ),
				false
			);
			wp_script_add_data( 'newrig-related-posts', 'defer', true );
			wp_localize_script(
				'newrig-related-posts',
				'postdata',
				[
					'post_ID'  => get_the_ID(),
					'cat_ids'  => $this->get_post_category_ids(),
					'rest_url' => rest_url( 'wp/v2' ),
				]
			);
		}
	}

	/**
	 * Display Posts Relacionados
	 */
	public function display_related_posts() {
		printf(
			'<h2 class="related-header">%s</h2>
			 <aside class="related-posts alignfull">
				<div class="related-spinner"></div>
			 </aside>',
			esc_html( 'Related posts:', 'newrig' )
		);
	}
}
