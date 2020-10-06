<?php
/**
 * Template part for displaying related posts.
 *
 * @package newrig
 */

namespace WP_Rig\WP_Rig;

newrig()->print_styles( 'newrig-related' );

newrig()->display_related_posts();

