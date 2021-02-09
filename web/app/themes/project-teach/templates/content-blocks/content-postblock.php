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
?>

<section class="section section__dd links__<?php echo $args['color_name']; ?>">
    <?php 
        // Title
        if ($pb_title) :
            echo '<h2 class="title title__dd" style="color:' . $args['color_hex'] . '">' . $pb_title . '</h2>';
        endif;
        // Text
        if ($pb_text) :
            echo '<div class="text text__dd">' . $pb_text . '</div>';
        endif; 
    ?>


        <div style="border-color:<?php echo $args['color_hex']; ?>" class="block">
            <?php 
            // Category Posts
            if ($type_of_post == 'category_post') : 

                $main_args = array( 
			        'post_type' 	 => 'post', 
                    'posts_per_page' => $pb_to_show,
                    'cat' => $pb_category
                );
                
            // Specific Posts
            elseif ($type_of_post == 'specific_post' && !empty($featured_posts)) :

                $main_args = array( 
                    'post__in'      => $featured_posts,
                );

            endif;

            $main_post = new WP_Query($main_args); 

                //Posts Above Dropdown
                if($main_post->have_posts()) :
                    $count = 1;
                    $total_count = 1;
                    while($main_post->have_posts()) : $main_post->the_post();
                    
                        $excerpt = get_the_excerpt();
                        $title = get_the_title();
                        $page_link = get_the_permalink(); 
                        $post_image = get_the_post_thumbnail_url(); 
                        $categories = get_the_category();
                        $offset = rand(10,1000);
                        $authors = get_field('authors');
                        
                    
                        if ($count <= $pb_above_dd) : ?>
                            <?php if (empty($compact_content)) : ?>
                                <div <?php if ($count > 1) {echo 'class="mt-8"';} ?>>
                                    <div class="post__category post__category--list">
                                        <?php foreach($categories as $cat) : ?>
                                            <a style="color:<?php the_field('category_color', 'category_' . $cat->term_id); ?>;" href="/category/<?php echo $cat->slug;?>">
                                                <?php echo $cat->name; ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                    <h3 style="text-transform:none; font-weight:900; margin-top:0; margin-bottom:0; color:#000;" class="banner-title">
                                        <?php echo $title; ?>
                                    </h3>
                                </div>
                            <?php endif; ?>
                            <div class="row flex-row above-dd-row">
                                <!-- Image -->
                                <?php if (!empty(get_field('video'))) : ?>
                                    <div class="flex-graphic">
                                        <div class="video">
                                            <iframe src="<?php echo get_field('video'); ?>" frameborder="0"></iframe>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <a href="<?php echo $page_link; ?>" style="background-image:url(<?php echo $post_image; ?>); background-size: cover; background-position: center;" class="flex-graphic" alt="COVID-19: Special Topics | Schooling in the Time of COVID, Part Three"></a>
                                <?php endif; ?>
                                <!-- Content -->
                                <div class=" flex-type">
                                    <!-- Compact Title -->
                                    <?php if ($compact_content) : ?>
                                        <div class="post__category post__category--list">
                                            <?php foreach($categories as $cat) : ?>
                                                <a style="color:<?php the_field('category_color', 'category_' . $cat->term_id); ?>;" href="/category/<?php echo $cat->slug;?>">
                                                    <?php echo $cat->name; ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                        <h3 style="text-transform:none; font-weight:900; margin-top:0; margin-bottom:30px; color:#000;" class="banner-title">
                                            <?php echo $title; ?>
                                        </h3>
                                    <?php endif; ?>
                                    <!-- Authors -->
                                    <div class="flex flex-wrap mb-1">
                                        <?php if( have_rows('authors', get_the_ID()) ): ?>
                                            <?php while( have_rows('authors', get_the_ID()) ) : the_row();
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
		                                <?php endif; ?>
                                    </div>
                                    <!-- Excerpt -->
                                    <?php if (get_sub_field('show_excerpt')) : ?>
                                        <p style="padding-bottom:10px; padding-top:15px;" class="mmh-standard">
                                            <?php echo $excerpt; ?>
                                        </p>
                                    <?php endif; ?>
                                    <!-- Button -->
                                    <?php if (get_sub_field('show_read_more_button')) : ?>
                                        <a id="join-consult" href="<?php echo $page_link; ?>" title="Read More" class="btn btn-<?php echo $args['color_name']; ?>">
                                            <strong>Read More</strong>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; 
                        $count++;
                    endwhile;
                    rewind_posts();
                endif; 

                if ($hide_dd) :
                    // Don't Display anything if 'Hide Dropdown' is selected
                else:
                    // Posts in Dropdown
                    if($main_post->have_posts()) :
                        $count = 1; 
                        ?>

                        <div class="row below-dd-row">
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div style="background-color:<?php echo $args['color_hex']; ?>" class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse-<?php echo $offset; ?>-<?php echo $count; ?>" aria-expanded="false"><?php echo $pb_dd_title; ?></a>
                                            </h4>
                                        </div>
                                        <div id="collapse-<?php echo $offset; ?>-<?php echo $count; ?>" class="panel-collapse collapsed collapse">
                                            <?php while($main_post->have_posts()) : $main_post->the_post();

                                                $title = get_the_title();
                                                $page_link = get_the_permalink(); 
                                                $post_image = get_the_post_thumbnail_url(); 
                                                $categories = get_the_category();
                                                $authors = get_field('authors');

                                                if ($count > $pb_above_dd) : ?>
                                                    <div class="sidebar__list-item">                                                    
                                                        <div style="display:flex; align-items: center;">
                                                        <a href="<?php echo $page_link; ?>" style="width:140px; height:100px; margin-right:15px; background-image:url(<?php echo $post_image; ?>); background-size:cover; background-position:center;"></a>
                                                        <div style="flex:1;">
                                                            <div class="post__category post__category--list">
                                                                <?php foreach($categories as $cat) : ?>
                                                                    <a style="color:<?php the_field('category_color', 'category_' . $cat->term_id); ?>;" href="https://project-teach.launchpaddev.com/category/special-topics/covid-19/">
                                                                        <?php echo $cat->name; ?>
                                                                    </a>
                                                                <?php endforeach; ?>
                                                            </div>
                                                            <a class="post__title post__title--sidebar" href="<?php echo $page_link; ?>">
                                                                <?php echo $title; ?>
                                                            </a>
                                                            <?php if( have_rows('authors', get_the_ID()) ): ?>
                                                                <div class="author__list">
                                                                    <?php while( have_rows('authors', get_the_ID()) ) : the_row();
                                                                        $featured_posts = get_sub_field('author');
                                                                        if( $featured_posts ): ?>

                                                                            <a class="author author--list" href="<?php echo the_permalink($featured_posts->ID); ?>">
                                                                                <?php if (get_field('image', $featured_posts->ID)) : 
                                                                                    $author_image = get_field('image', $featured_posts->ID); ?>
                                                                                    <img src="<?php echo $author_image['url']; ?>" alt="<?php echo $author_image['alt']; ?>" class="author__image">
                                                                                <?php endif; ?>
                                                                                <p class="author__name"><?php the_field('name', $featured_posts->ID);?></p>
                                                                            </a>

                                                                        <?php endif; ?>
                                                                    <?php endwhile; ?>
                                                                </div>
		                                                    <?php endif; ?>

                                                        </div>
                                                    </div>
                                                    </div>
                                                <?php endif; 

                                                $count++;
                                            endwhile; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>  

        </div>

</section>