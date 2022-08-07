<?php

/*
 * Register all the CPT & Taxonomies we need
 */
if (!defined('ABSPATH')) {
  exit;
}

/**
 * Register CPT's & Taxonomies
 */
add_action('init', function () {

  // Keys
  $parking_space = 'parking_space';

  // Parking Space CPT
  register_post_type($parking_space, [
    'labels'              =>
    [
      'name'                       => __('Parking Spaces'),
      'singular_name'              => __('Parking Space'),
      'menu_name'                  => __('Parking Spaces'),
      'search_items'               => __('Search Parking Spaces'),
      'popular_items'              => __('Popular Parking Spaces'),
      'all_items'                  => __('All Parking Spaces'),
      'parent_item'                => __('Parent Parking Space'),
      'parent_item_colon'          => __('Parent Parking Space:'),
      'edit_item'                  => __('Edit Parking Space'),
      'view_item'                  => __('View Parking Space'),
      'update_item'                => __('Update Parking Space'),
      'add_new_item'               => __('Add New Parking Space'),
      'new_item_name'              => __('New Parking Space Name'),
      'add_or_remove_items'        => __('Add or remove Parking Spaces'),
      'choose_from_most_used'      => __('Choose from the most used Parking Spaces'),
      'not_found'                  => __('No Parking Spaces found'),
      'no_terms'                   => __('No Parking Spaces'),
    ],
    'public'              => true,
    'exclude_from_search' => true,
    'publicly_queryable'  => false,
    'show_in_admin_bar'   => false,
    'show_in_nav_menus'   => false,
    'has_archive'         => false,
    'menu_position'       => 21,
    'hierarchical'        => false,
    'supports'            => ['title', 'editor', 'slug', 'page-attributes'],
    'show_in_rest'        => false,
    'menu_icon'           => 'dashicons-car',
  ]);

  // Default PTs
  // ...

  // WooCommerce PTs
  // ...

  // Custom PTs 
  require_once('pt-parking_space.php');
});
