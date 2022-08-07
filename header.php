<?php

/**
 * The header for our theme
 */
if (!defined('ABSPATH')) {
  exit;
}

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="ltr" class="no-js">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#000000">
  <?php wp_head(); ?>
</head>

<body <?php body_class('leading-none'); ?>>

  <?php
  /**
   * Theme's Header
   */
  get_template_part('parts/header.part', 'header.part');
