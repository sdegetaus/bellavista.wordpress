<?php

/**
 * The main template file
 *
 * @package Bellavista
 * @subpackage Bellavista Theme
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header();

wp_body_open();

if (have_posts()) {
  while (have_posts()) {
    the_post();
    the_content();
  }
} else {
  _e('<p>Sorry, no posts matched your criteria.</p>');
}

get_footer();
