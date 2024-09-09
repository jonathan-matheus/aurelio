<?php
function aurelio_shorcode($atts = [], $content = null, $tag = '')
{
    $atts = array_change_key_case((array) $atts, CASE_LOWER);
    extract(
        shortcode_atts(
            [
                'id' => '',
                'orderby' => 'date'
            ],
            $atts,
            $tag
        )
    );

    if (!empty($id)) {
        $id = array_map('absint', explode(',', $id));
    }

    ob_start();
    require_once(AURELIO_PATH . 'views/meditations.php');

    return ob_get_clean();
}
add_shortcode('meditations', 'aurelio_shorcode');