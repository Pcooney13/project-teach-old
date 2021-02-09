<style>
    body {
        background: #edf2f2
    }
    .links__blue .panel-body a,
    .links__blue .text a {
        color:#039fda;
    }
    .links__purple .panel-body a,
    .links__purple .text a {
        color:#3a0e79;
    }
    .links__green .panel-body a,
    .links__green .text a {
        color:#7bbf43;
    }
    .links__orange .panel-body a,
    .links__orange .text a {
        color:#e09b3d;
    }

    .section {
        margin: 0 auto;
        padding: 30px 0;
    }
    .section__dd a {
        font-weight:bold;
    }
    .title {
        margin-bottom:16px;
        font-size: 36px !important;
        font-weight: 900;
    }
    .text {
        margin-bottom:16px;
    }
    .block {
        padding: 15px;
        background-color: white;
        box-shadow: 3px 6px 9px rgba(0,0,0,0.1);
        border-left-width: 5px;
        border-left-style: solid;
    }
    .panel-group {
        margin-bottom:0;
    }
</style>

<?php
$color_hex = get_sub_field('color');
// color fallback - PT Blue
if (empty($color_hex)) {
    $color_hex = '#039fda';
}
// Get color by name if its a PT color
$color_name = get_color_name($color_hex);

// Dropdowns
if (get_row_layout() == 'dropdowns') {
    get_template_part('templates/content-blocks/content', 'dropdowns', array(
        'color_name' => $color_name,
        'color_hex' => $color_hex,
    ));
    // Basic Block
} elseif (get_row_layout() == 'basic_block') {
    get_template_part('templates/content-blocks/content', 'basicblock', array(
        'color_name' => $color_name,
        'color_hex' => $color_hex,
    ));
    // Post Block
} elseif (get_row_layout() == 'post_block') {
    get_template_part('templates/content-blocks/content', 'postblock', array(
        'color_name' => $color_name,
        'color_hex' => $color_hex,
    ));
    // Custom Post Block
} elseif (get_row_layout() == 'custom_post_block') {
    get_template_part('templates/content-blocks/content', 'custom-postblock', array(
        'color_name' => $color_name,
        'color_hex' => $color_hex,
    ));
    // Request Services
} elseif (get_row_layout() == 'request_services') {
    get_template_part('templates/content-blocks/content', 'request-services', array(
        'color_name' => $color_name,
        'color_hex' => $color_hex,
    ));
}
?>
