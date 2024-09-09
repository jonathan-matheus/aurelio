<?php
/**
 * Registers the post type meditations
 * 
 * @since 0.0.0
 * @return void
 */
function aurelio_meditations()
{
    register_post_type(
        'meditations',
        [
            'labels' => [
                'name' => esc_html__('Meditations', 'aurelio'),
                'singular_name' => esc_html__('Meditation', 'aurelio')
            ],
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-format-status'
        ]
    );
}
add_action("init", "aurelio_meditations");