<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newrig
 */

namespace WP_Rig\WP_Rig;

if ( ! newrig()->is_primary_sidebar_active() ) {
	return;
}

newrig()->print_styles( 'newrig-sidebar', 'newrig-widgets' );

?>
<aside id="secondary" class="primary-sidebar widget-area">
	<?php newrig()->display_primary_sidebar(); ?>
</aside><!-- #secondary -->
