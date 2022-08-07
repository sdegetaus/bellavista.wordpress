<?php

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Challenge Table Columns
 */
add_filter('manage_parking_space_posts_columns', function ($columns) {
  unset($columns['date']);
  $columns['title']      = __('ID', 'bellavista');
  $columns['owner']      = __('Owner', 'bellavista');
  $columns['status']     = __('Status', 'bellavista');
  $columns['dates']      = __('Dates', 'bellavista');
  return $columns;
}, 99);

add_action('manage_parking_space_posts_custom_column', function ($column, $post_id) {
  switch ($column) {
    case 'owner':
      if ($owner = get_field('owner', $post_id)) {
        if ($user_data = get_userdata($owner)) {
          echo $user_data->display_name;
          break;
        }
      }
      echo __('No Owner');
      break;
    case 'status':
      if ($current_tenant = get_field('current_tenant', $post_id)) {
        if ($user_data = get_userdata($current_tenant)) {
          echo '<span style="color:red;font-weight:500;">' . __('Rented', 'bellavista') . '</span><br>';
          echo '<span>' . $user_data->display_name . '</span>';
          break;
        }
      }
      echo '<span style="color:green;font-weight:500;">' . __('Free', 'bellavista') . '</span>';
      break;
    case 'dates':
      $date_start = get_field('date_start', $post_id);
      $date_end   = get_field('date_end',   $post_id);

      if (empty($date_start) && empty($date_end)) {
        echo '&ndash;';
        break;
      }

      if (!empty($date_start)) {
        echo '<strong>' . __('Start', 'bellavista') . '</strong>:  ' . date('l d, F Y, H:i', strtotime($date_start)) . ' hrs<br>';
      }

      if (!empty($date_end)) {
        echo '<strong>' . __('End', 'bellavista') . '</strong>:  ' . date('l d, F Y, H:i', strtotime($date_end)) . ' hrs';
      }

      break;
  }
}, 10, 2);

// add_filter(
//   'manage_edit-parking_space_sortable_columns',
//   function ($columns) {
//     $columns['menu_order'] = 'menu_order';
//     return $columns;
//   }
// );
