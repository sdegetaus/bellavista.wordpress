<?php

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Define global locations.
 */
if (!defined('BB_THEME_URL')) {
  define('BB_THEME_URL', get_stylesheet_directory_uri() . '/');
}

if (!defined('BB_THEME_PATH')) {
  define('BB_THEME_PATH', get_template_directory() . '/');
}

if (!defined('BB_INCLUDES_PATH')) {
  define('BB_INCLUDES_PATH', BB_THEME_PATH . 'inc/');
}

if (!defined('BB_EXTENSIONS_PATH')) {
  define('BB_EXTENSIONS_PATH', BB_THEME_PATH . 'extensions/');
}

// Global Classes
require_once(BB_INCLUDES_PATH . 'class-parking_space.php');

// Extensions
// ...

// Includes
require_once(BB_INCLUDES_PATH . 'reset.php');
require_once(BB_INCLUDES_PATH . 'pt.php');
require_once(BB_INCLUDES_PATH . 'admin.php');
require_once(BB_INCLUDES_PATH . 'wp-nav_menu.php');
require_once(BB_INCLUDES_PATH . 'wp-page.php');

// Functions
require_once(BB_INCLUDES_PATH . 'parking_space-functions.php');

/**
 * Theme specific supports.
 */
add_action('after_setup_theme', function () {
  add_theme_support('title-tag');
  add_theme_support('custom-logo');
  add_theme_support('menus');
  add_theme_support('html5', [
    'search-form',
    'gallery',
  ]);

  // register_nav_menus(
  //   [
  //     'main-menu-desktop' => 'Main Menu Desktop',
  //     'main-menu-mobile'  => 'Main Menu Mobile',

  //     'footer-col-1'      => 'Footer Column #1',
  //     'footer-col-2'      => 'Footer Column #2',
  //     'footer-col-3'      => 'Footer Column #3',
  //     'footer-col-4'      => 'Footer Column #4',
  //   ]
  // );

  /**
   * Handle Image Sizes
   */

  // removing
  remove_image_size('1536x1536');
  remove_image_size('2048x2048');

  // add_image_size('full-width', 1920, 0, false);
});

/**
 * Remove default images sizes from WordPress.
 */
add_filter('intermediate_image_sizes',  function ($sizes) {
  $images_to_remove = [
    'medium',
    'medium_large',
    'large',
  ];
  $new_sizes = [];
  foreach ($sizes as $size) {
    if (!in_array($size, $images_to_remove)) {
      $new_sizes[] = $size;
    }
  }
  return $new_sizes;
}, 10);

/**
 * Enqueue styles & scripts.
 */
add_action('wp_enqueue_scripts', function () {
  /**
   * Add PHP variables to JS object (on all pages it is going to be available, but its shape may vary).
   * @link https://wordpress.stackexchange.com/questions/96370/pass-php-variable-to-javascript
   */
  $params = [
    'admin_ajax_url' => admin_url('admin-ajax.php'),
  ];

  /**
   * Last time CSS & JS ./dist folder modified.
   * Converted to hex for a shorter, conciser string.
   * Used to clear browser's cache.
   * 
   * More info:
   * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/#comment-2056
   */

  function bb_enqueue_style($name, $path)
  {
    return wp_enqueue_style($name, BB_THEME_URL . $path, [], dechex(filemtime(BB_THEME_PATH . $path)));
  }

  function bb_enqueue_script($name, $path, $deps)
  {
    return wp_enqueue_script($name, BB_THEME_URL . $path, $deps, dechex(filemtime(BB_THEME_PATH . $path)), true);
  }

  /**
   * Globals.
   */
  bb_enqueue_style('br-global', 'dist/style/index.css');

  // remove gutenberg's stylesheet
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');

  /**
   * Conditional Enqueuing
   * @link https://docs.woocommerce.com/document/conditional-tags/
   */
  if (is_front_page()) {
    bb_enqueue_style('br-front-page', 'dist/style/pages/front-page.css');
  }

  // with 'localize' the JS object gets added to the page
  wp_localize_script('br-global', 'bb_global_params', $params);
});

/**
 * [ADMIN]
 * Enqueue admin styles & scrips.
 */
add_action('admin_enqueue_scripts', function ($hook_suffix) {
  // global $typenow;
  // wp_enqueue_style('bb-admin', BB_THEME_URL . 'dist/style/admin.css');
  // // nav-menus.php fix
  // if ('nav-menus.php' === $hook_suffix) {
  //   wp_enqueue_style('bb-admin-nav-menus', BB_THEME_URL . 'dist/style/admin/nav-menus.css');
  // }
}, 10);

/**
 * Remove Block Editor.
 */
add_filter('use_block_editor_for_post_type', '__return_false', 10);

/**
 * Remove Admin Bar.
 */
add_filter('show_admin_bar', '__return_false');
