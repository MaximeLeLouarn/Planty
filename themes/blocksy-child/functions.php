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

// Add admin item in the menu
// add_filter( 'wp_nav_menu_items', 'add_extra_item_to_nav_menu', 10, 2 );
// function add_extra_item_to_nav_menu( $items, $args ) {}


// function add_admin_menu() {
// 	add_menu_page('admin','Admin', 'manage_options', 'Admin', 'add_admin_menu_main', 2);
// }
// add_action('admin_menu','add_admin_menu');
// function add_admin_menu_main(){}

add_filter( 'wp_nav_menu_items', 'prefix_add_menu_item', 10, 2 );
/**
 * Add Menu Item to end of menu
 */
function prefix_add_menu_item ($items, $args) {
   if($args->theme_location == 'desktop') {
       $items .=  '<li class="hypermegatest">admin</li>';
      }
       return $items;
	}

