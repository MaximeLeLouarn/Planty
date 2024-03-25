<?php
if (! defined('WP_DEBUG')) {
	die( 'Direct access forbidden.' );
}
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
});

// Removing <p> from popping up in cf7
add_filter('wpcf7_autop_or_not', '__return_false');


add_filter( 'wp_nav_menu_items', 'prefix_add_menu_item', 10, 2 );
/**
 * Add Menu Item to end of menu
 */
function prefix_add_menu_item ($items, $args) {
   if (is_user_logged_in() && ($args->theme_location == 'menu_2' || $args->theme_location == 'menu_mobile')) {
       $items .=  '<li class="hypermegatest"><a href="' . admin_url() . '" class="ct-menu-link adminFont">Admin</a></li>';
      }
       return $items;
	}

