<!-- Intro Section -->
<?php
    $bb_image = get_sub_field('bb_image');
    $bb_image_size = get_sub_field('image_size');
    $bb_image_position = get_sub_field('image_position');

    $bb_title = get_sub_field('bb_title');
    $bb_title_black = get_sub_field('title_black');
    $bb_text = get_sub_field('bb_text');

    $bb_link = get_sub_field('bb_link');
    
    if ($bb_title_black) {
        $final_title = '<h2 class="mb-4" style="color:#333;">' . $bb_title . '</h2>';
    } else {
        $final_title = '<h2 class="mb-4" style="color:' . $args['color_hex'] . '">' . $bb_title . '</h2>';
    }
    
    if ($bb_image_position == 'left') {
        $bb_margin = 'right';
    } else {
        $bb_margin = 'left';
    }

    if ($bb_image_size == 'small') {
        $bb_image_width = 'width: 350px;';
    } else {
        $bb_image_width = 'width: 450px;';
    }

    if ($bb_link) {
        $link_url = $bb_link['url'];
        $link_title = $bb_link['title'];
        $link_target = $bb_link['target'] ? $bb_link['target'] : '_self';
        $display_link =  '<a id="join-consult" href="' . esc_url( $link_url ) . '" title="Read More" class="btn btn-' . $args['color_name'] . '" target="' . esc_attr( $link_target ) . '">
        ' . esc_html( $link_title ) .
        '</a>';
    } else {
        $display_link = '';
    }

    $bb_text_column = 
        '<div style="flex:1" class="intro__text">' .
            $final_title .
            '<div class="mb-4">'. 
                $bb_text . 
            '</div>' .
            $display_link .
        '</div>'
    ;



    $bb_image_column =
        '<div 
            class="intro__image" 
            style="
                background-image:url( ' . esc_url($bb_image['url']) . ');
                width: 100%;' .
                $bb_image_width .
                'background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                margin-' . $bb_margin . ':30px;
            ">
        </div>'
    ;

    echo 
    '
    <section class="section">
        <div class="container">
            <div class="row">
                <div style="display:flex" class="intro__block">';
                    if ($bb_image_position == 'left') {
                        echo $bb_image_column . $bb_text_column;
                    } else {
                        echo $bb_text_column . $bb_image_column;
                    }
                echo '</div>
            </div>
        </div>
    </section>'
    ;
?>