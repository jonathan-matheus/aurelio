<?php
/**
 * Registers a REST route to return a random meditation.
 *
 * @since 0.0.0
 */
function aurelio_api_post_rand()
{
    register_rest_route(
        'aurelio/v1',
        'post',
        [
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => 'aurelio_api_post_rand_callback'
        ]
    );
}
add_action('rest_api_init', 'aurelio_api_post_rand');

/**
 * Retrieves a random meditation from the database.
 *
 * @since 0.0.0
 *
 * @return string The content of the random meditation.
 */
function aurelio_api_post_rand_callback()
{
    $args = [
        'post_type' => 'meditations',
        'posts_per_page' => 1,
        'orderby' => 'rand',
        'post_status' => 'publish'
    ];

    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) {
        while ($my_query->have_posts()) {
            $my_query->the_post();
            return esc_html(get_the_content());
        }
    }
    wp_reset_postdata();
}