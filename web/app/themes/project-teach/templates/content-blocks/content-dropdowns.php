<?php 
    $offset = rand(10,1000);
    $dd_title = get_sub_field('dropdown_title');
    $dd_text = get_sub_field('dropdown_text');
    $dd_repeater = get_sub_field('dropdown_repeater');    

    // Start
    echo '<section class="section section__dd links__' . $args['color_name'] . '">';
        // Title
        if ($dd_title) :
            echo '<h2 class="title title__dd" style="color:' . $args['color_hex'] . '">' . $dd_title . '</h2>';
        endif;
        // Text
        if ($dd_text) :
            echo '<div class="text text__dd">' . $dd_text . '</div>';
        endif; 
        echo '
        <div style="border-color:' . $args['color_hex'] . '" class="block">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
                        
                        if (have_rows('dropdown_repeater')):
                            $count = 1;
                            
                            while (have_rows('dropdown_repeater')) : the_row();
                                $dd_block_title = get_sub_field('dd_block_title');
                                $dd_block_text = get_sub_field('dd_block_text');
                                
                                echo '
                                <div class="panel panel-default">
                                    <div style="background-color:' . $args['color_hex'] . '" class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse-' . $offset . '-' . $count . '" aria-expanded="false">' . $dd_block_title . '</a>
                                        </h4>
                                    </div>
                                    <div id="collapse-' . $offset . '-' . $count . '" class="panel-collapse collapsed collapse">
                                        <div class="covid-resource panel-body">' . $dd_block_text . '</div>
                                    </div>
                                </div>';
                                $count++;
                            endwhile;
                        endif;

                    echo '
                    </div>
                </div>
            </div>
        </div>
    </section>'; 
?>
