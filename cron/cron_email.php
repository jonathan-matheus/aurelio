<?php
function cron_emial()
{
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
            $content = get_the_content();
        }
    }

    $to = get_option('admin_email');
    $subject = 'Meditations';
    $message = $content;
    $headers = ['Content-Type: text/html; charset=UTF-8'];
    wp_mail($to, $subject, $message, $headers);
}
wp_schedule_event(strtotime('today 11:00'), 'daily', 'cron_email');
add_action('cron_email', 'cron_emial');