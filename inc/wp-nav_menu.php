<?php

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Remove menu items IDs.
 */
add_filter('nav_menu_item_id', '__return_empty_string', 10, 1);

/**
 * Add menu classes to the anchor element.
 */
add_filter('nav_menu_css_class', function ($classes, $item, $args) {
  // default classes
  $new_classes = ['text-base', 'text-gray-500', 'hover:text-gray-900'];
  if (in_array('current-menu-item', $classes)) {
    $new_classes[] = 'current';
  }
  return $new_classes;
}, 10, 3);
