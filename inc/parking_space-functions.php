<?php

if (!defined('ABSPATH')) {
  exit;
}

if (!function_exists('br_get_parking_spaces')) {
  /**
   * Get collection of parking_space according to a customizable query.
   * 
   * @param array $query_args
   * @return false|array 
   */
  function br_get_parking_spaces($query_args = [])
  {
    $query_args_defaults = [
      'post_type'      => 'parking_space',
      'post_status'    => 'publish',
      'posts_per_page' => -1,
      'fields'         => 'ids',
      'orderby'        => 'title',
      'order'          => 'ASC',
    ];

    if (is_array($query_args) && count($query_args) > 0) {
      $query_args_defaults = array_merge($query_args_defaults, $query_args);
    }

    $query  = new WP_Query($query_args_defaults);
    $result = [];

    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();
        $result[] = new Parking_Space(get_the_ID());
      }
    } else {
      return false;
    }
    wp_reset_postdata();

    if (count($result) === 0) {
      return false;
    }

    return $result;
  }
}

if (!function_exists('br_get_available_parking_spaces')) {
  /**
   * Get the available parking spaces.
   * 
   * @return false|array 
   */
  function br_get_available_parking_spaces()
  {
    return br_get_parking_spaces([
      'meta_query' =>
      [
        'relation' => 'AND',
        [
          'key'     => 'current_tenant',
          'value'   => '0',
          'compare' => '<=',
          'type'    => 'NUMERIC',
        ]
      ]
    ]);
  }
}
