<?php

/*
 * Reset, unset or set WordPress default features
 */
if (!defined('ABSPATH')) {
  exit;
}

/**
 * Return a generic error when logging in.
 */
add_filter('login_errors', function () {
  return '<strong>Error:</strong> el usuario/correo electrónico y/o contraseña son incorrectos.';
});

/**
 * Add svg as an item for uploading
 */
add_filter('upload_mimes', function ($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
});
