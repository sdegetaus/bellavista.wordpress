<?php

if (!defined('ABSPATH')) {
  exit;
}


// $result = false;
// if (isset($_GET['action']) && $_GET['action'] === 'reserve') {
//   if (
//     isset($_GET['parking_space_id']) &&
//     !empty($_GET['parking_space_id']) &&
//     is_numeric($_GET['parking_space_id'])
//   ) {
//     $post = get_post($_GET['parking_space_id']);
//     if ($post) {
//       $busy = get_post_meta($post->ID, 'busy', true);
//       if ($busy) {
//         $result = 'Busy! ' . $post->ID;
//       } else {
//         update_post_meta($post->ID, 'busy', 1);
//         $result = 'Success ' . $post->ID;
//       }
//     }
//   }
// }

get_header();

$parking_spaces = br_get_available_parking_spaces();

if (empty($parking_spaces)) {
  return;
}

?>

<main class="my-16 mx-auto max-w-xs px-4 sm:mt-24">
  <form type="get">

    <label for="parking_space" class="block text-sm font-medium text-gray-700"><?php _e('Parking Space', 'bellavista'); ?></label>
    <select id="parking_space" name="parking_space" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
      <?php foreach ($parking_spaces as $parking_space) : ?>
        <option value="<?php echo $parking_space->get_id(); ?>"><?php echo $parking_space->get_title(); ?></option>
      <?php endforeach; ?>
    </select>

    <div class="pt-3">
      <div class="flex justify-end">
        <button type="submit" class="inline-flex justify-center w-full py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><?php _e('Reserve', 'bellavista'); ?></button>
      </div>
    </div>
  </form>
</main>

<?php
get_footer();
