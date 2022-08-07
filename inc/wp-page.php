<?php

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Page Table Columns
 */
add_filter('manage_pages_columns', function ($columns) {
  $date = $columns['date'];
  unset($columns['date']);
  $columns['menu_order'] = __('Menu Order', 'bb_theme');
  $columns['date']       = $date;
  return $columns;
}, 10);

add_action('manage_page_posts_custom_column', function ($column, $post_id) {
  switch ($column) {
    case 'menu_order':
      echo get_post_field('menu_order', $post_id);
      break;
  }
}, 10, 2);
