<?php 
    $pb_title = get_sub_field('post_block_title');
    $pb_text = get_sub_field('post_block_text');
    $pb_category = get_sub_field('post_block_category');
    $pb_above_dd = get_sub_field('posts_above_dropdown');
    $pb_to_show = get_sub_field('posts_to_show');
    $pb_dd_title = get_sub_field('dropdown_title');
    $type_of_post = get_sub_field('type_of_post_block');
    $featured_posts = get_sub_field('specific_posts');
    $hide_dd = get_sub_field('hide_dropdown');
    $compact_content = get_sub_field('compact_content');

    echo '<section class="section section__dd links__' . $args['color_name'] . '">';

        // Title
        if ($pb_title) :
            echo '<h2 class="title title__dd" style="color:' . $args['color_hex'] . '">' . $pb_title . '</h2>';
        endif;

        // Text
        if ($pb_text) :
            echo '<div class="text text__dd">' . $pb_text . '</div>';
        endif; 

        echo '<div style="border-color:' . $args['color_hex'] . '" class="block">';
            
            //Posts Above Dropdown
            if( have_rows('custom_post_block') ):
                
                $count = 1;
                $total_count = 1;

                while( have_rows('custom_post_block') ) : the_row(); 

                    $repeater_pb_title = get_sub_field('title');
                    $repeater_pb_text = get_sub_field('text');
                    $repeater_pb_category = get_sub_field('category');
                    $featured_media = get_sub_field('featured_media');
                    
                    $repeater_title_html = 
                        '<div class="post__category post__category--list">' .
                            '<a style="color:' . $args['color_hex'] . '">' .
                                $repeater_pb_category .
                            '</a>' .
                        '</div>' .

                        '<h3 style="text-transform:none; font-weight:900; margin-top:0; margin-bottom:15px; color:#000;" class="banner-title">' .
                            $repeater_pb_title . 
                        '</h3>';

                    if ($count <= $pb_above_dd) :

                        if (empty($compact_content)) : 
                        
                            echo $repeater_title_html;

                        endif; ?>

                            <div class="row flex-row above-dd-row">

                                <!-- Video -->
                                <?php 
                                $image = get_sub_field('image');
                                
                                if( !empty( $image ) ): ?>
                                    <!-- Image -->
                                <a href="<?php echo $page_link; ?>" style="background-image:url(<?php echo esc_url($image['url']); ?>); background-size: cover; background-position: center;" class="flex-graphic" alt="<?php echo esc_url($image['alt']); ?>"></a>
                                <?php elseif ($featured_media == 'video') : ?>
                                    <div class="flex-graphic">
                                        <div class="video">
                                            <iframe src="<?php echo get_sub_field('video'); ?>" frameborder="0"></iframe>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <!-- Content -->
                                <div class=" flex-type">
                                    <?php if ($compact_content) : 
                                        
                                        echo $repeater_title_html;

                                    endif; ?>
                                    <!-- Authors -->
                                    <?php if( have_rows('authors') ): ?>
                                        <div class="flex flex-wrap mb-1">
                                            <?php while( have_rows('authors') ) : the_row();
    		                            	    $featured_posts = get_sub_field('author');
    		                            	    if( $featured_posts ): ?>

                                                    <div class="author__list">
                                                        <a class="author author--list" href="<?php echo the_permalink($featured_posts->ID); ?>">
                                                            <?php if (get_field('image', $featured_posts->ID)) : 
                                                                $author_image = get_field('image', $featured_posts->ID); ?>
                                                                <img class="author__image author__image--featured" src="<?php echo $author_image['url']; ?>" alt="">
                                                            <?php endif; ?>
                                                            <p style="line-height:1;" class="author__name author__name--featured">
                                                                <?php the_field('name', $featured_posts->ID);?><br>
                                                                <span style="padding:0; margin-top:-5px; font-weight: 500; line-height:1; font-size: 15px; color: #aaa;" class="mmh-standard">
                                                                    <?php the_field('affliation', $featured_posts->ID); ?>
                                                                </span>
                                                            </p>
                                                        </a>
                                                    </div>

                                                <?php endif; ?>
                                            <?php endwhile; ?>
                                        </div>
		                            <?php endif; ?>

                                    <!-- Excerpt -->
                                        <p style="padding-bottom:10px; padding-top:15px;" class="mmh-standard">
                                    <?php if (get_sub_field('text')): ?>
                                            <?php the_sub_field('text'); ?>
                                    <?php endif; ?>
                                        </p>
                                    <!-- Text Links -->
                                    <?php if( have_rows('text_links') ): ?>
                                        <?php while( have_rows('text_links') ) : the_row(); ?>
                                            
                                            <?php 
                                                $link = get_sub_field('link');
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>
                                            <p>
                                                <a class="button" style="color: <?php echo $args['color_hex']; ?>; filter: saturate(1.5);" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                                    <?php echo esc_html( $link_title ); ?>
                                                </a>
                                            </p>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <!-- Button -->
                                    <?php if (get_sub_field('primary_button')): ?>
                                        <?php 
                                            $p_link = get_sub_field('primary_button');
                                            $link_url = $p_link['url'];
                                            $link_title = $p_link['title'];
                                            $link_target = $p_link['target'] ? $p_link['target'] : '_self';
                                        ?>
                                        <a id="join-consult" href="<?php echo esc_url( $link_url ); ?>" title="Read More" class="btn btn-<?php echo $args['color_name']; ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                            <?php echo esc_html( $link_title ); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; 
                        $count++;
                

                        endwhile;
                if ($hide_dd) :
                    // Don't Display anything if 'Hide Dropdown' is selected
                else:
                    // echo 'not hiding dd';    
                endif;
            endif; ?>

        </div>

</section>