<?php

$result = false;
if (isset($_GET['action']) && $_GET['action'] === 'reserve') {
  if (
    isset($_GET['parking_space_id']) &&
    !empty($_GET['parking_space_id']) &&
    is_numeric($_GET['parking_space_id'])
  ) {
    $post = get_post($_GET['parking_space_id']);
    if ($post) {
      $busy = get_post_meta($post->ID, 'busy', true);
      if ($busy) {
        $result = 'Busy! ' . $post->ID;
      } else {
        update_post_meta($post->ID, 'busy', 1);
        $result = 'Success ' . $post->ID;
      }
    }
  }
}

if (!defined('ABSPATH')) {
  exit;
}

get_header();

wp_body_open();

$all_spaces_query = new WP_Query([
  'post_type'  => 'parking_space',
  'limit'      => -1,
]);

$available_spaces_query = new WP_Query([
  'post_type'  => 'parking_space',
  'limit'      => -1,
  'meta_query' => [
    'relation' => 'AND',
    [
      'key'     => 'type',
      'value'   => 'available',
      'compare' => '==',
    ],
    [
      'relation' => 'OR',
      [
        'key'     => 'busy',
        'compare' => 'NOT EXISTS',
      ],
      [
        'key'     => 'busy',
        'value'   => 0,
      ]
    ]
  ],
]);

?>

<main id="page-content">
  <div class="container">

    <div class="wrapper w-full">

      <?php if (!empty($result)) : ?>
        <div class="message"><?php echo $result; ?></div>
      <?php endif; ?>

      <?php echo wp_get_attachment_image(20, 'full-size'); ?>

      <?php /* if ($all_spaces_query->have_posts()) : ?>
        <ul>
          <?php
          while ($all_spaces_query->have_posts()) :
            $all_spaces_query->the_post();
          ?>
            <li>
              <strong><?php echo get_the_title(); ?></strong><br>
              <span>Type: <?php echo get_field('type'); ?></span><br>
              <span>Dueño: <?php echo get_field('owner'); ?></span><br>
              <span><?php echo (get_field('busy') ? 'Ocupador por: ' . get_field('taken_by') : 'Disponible para rentar'); ?></span>
            </li>
          <?php
          endwhile;
          wp_reset_postdata();
          ?>
        </ul>
      <?php endif; */ ?>

      <?php if ($available_spaces_query->have_posts()) : ?>
        <form class="flex w-full justify-center items-center flex-wrap">
          <div class="form-row">
            <label for="parking_space_id">Estacionamientos Disponibles</label>
            <select name="parking_space_id" id="parking_space_id">
              <?php
              while ($available_spaces_query->have_posts()) :
                $available_spaces_query->the_post();
              ?>
                <option value="<?php echo get_the_ID(); ?>"><?php echo get_the_title(); ?></option>
              <?php
              endwhile;
              wp_reset_postdata();
              ?>
            </select>
            <input type="hidden" name="action" value="reserve">
          </div>
          <div class="form-row">
            <button type="submit" class="btn btn-lg font-500 w-full justify-center items-center">Reservar</button>
          </div>
        <?php endif; ?>
        </form>
    </div>

  </div>
</main>

<?php
get_footer();
