<?php

/*
 * General modifications/functions we apply to the admin area
 */
if (!defined('ABSPATH')) {
  exit;
}

/**
 * Remove items from the admin SIDE menu.
 */
add_action('admin_menu', function () {
  remove_menu_page('edit-comments.php');
});

/**
 * Remove items from the admin BAR menu.
 */
add_action('admin_bar_menu', function ($wp_admin_bar) {
  $wp_admin_bar->remove_node('comments');
}, 999);
