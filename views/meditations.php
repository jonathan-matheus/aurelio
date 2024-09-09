<?php
/**
 * List all meditations
 */

$args = [
    'post_type' => 'meditations',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'orderby' => 'rand'
];

$my_query = new WP_Query($args);
if ($my_query->have_posts()) {
    while ($my_query->have_posts()) {
        $my_query->the_post();
        the_content();
    }
}

wp_reset_postdata();