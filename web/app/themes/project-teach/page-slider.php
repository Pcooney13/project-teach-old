<?php require_once('header.php'); ?>

<?php
    $video_args = array( 
        'post_type' 	 => 'post', 
        'posts_per_page' => -1,
        'offset' => 1,
        'cat' => 34,
        'post--not_in'   => array(get_the_ID())
    );
    $video_posts = new WP_Query($video_args);
?>


<section class="section section--900">
    <h3 class="section__title">Project TEACH/COVID-19: Short Topics</h3>
    <p class="section__text">
        Vestibulum ullamcorper diam id ante egestas bibendum. Lorem ipsum dolor sit amet,
        consectetur adipiscing elit. Cras tempus congue ipsum, a imperdiet sapien consectetur nec. Nulla convallis
        fringilla egestas. Morbi vestibulum sapien quis lobortis suscipit. Lorem ipsum dolor sit amet, consectetur
        adipiscing elit.
    </p>
    <?php if($video_posts->have_posts()) : ?>
    <!-- Featured Slider -->
    <div class="slider slider--primary splide" id="primary-slider">
        <div class="splide__track">
            <ul class="splide__list">
                <?php while($video_posts->have_posts()) : $video_posts->the_post();
                        // Video Variables
                        $post_video = get_field('video'); 
                        $excerpt = get_the_excerpt();
                        $title = get_the_title();
                        $page_link = get_the_permalink();?>
                <!-- Slide -->
                <li class="splide__slide">
                    <!-- Title -->
                    <h4 class="slider__title"><?php echo $title; ?></h4>
                    <!-- Video -->
                    <div class='video'>
                        <iframe src='<?php echo $post_video;?>' frameborder='0' allowfullscreen></iframe>
                    </div>
                    <!-- Authors Info -->
                    <?php if (have_rows('authors')): ?>
                    <?php $author_count = count(get_field('authors')); ?>
                    <div class="author__list">
                        <?php while (have_rows('authors')): the_row();
                                        // Author 1 Post Object
                                        $author_post_object = get_sub_field('author'); 
					                    $post = $author_post_object;
					                    setup_postdata( $post );
                                        // Author 1 Variables
					                    $author_image = get_field('image');
					                    $author_blurb = get_field('blurb');
					                    $size = 'thumbnail';
					                    $author = get_field('name');
					                    $author_content = get_the_content();
                                        $author_link = get_permalink();
                                        // Author 1
                                        if($author) : ?>
                        <a class="author author--list" href="<?php echo $author_link; ?>">
                            <img src="<?php echo $author_image['url']; ?>" alt="<?php echo $author_image['alt']; ?>"
                                class="author__image author__image--featured" />
                            <p class="author__name author__name--featured"><?php echo $author; ?></p>
                        </a>
                        <?php endif;
                                        // if called from 'single.php' - running wp_reset_postdata() on this line will revert the postdata to
                                        // the original post resulting in conflicts in authors when listing. If you are positive this will not 
                                        // be used on the 'single.php' you can delete the below if statement
                                        if ($author_count === 2) : the_row();
                                            // Author 2 Post Object
					                        $author_post_object = get_sub_field('author'); 
					                        $post = $author_post_object;
					                        setup_postdata( $post );
                                            // Author 2 Variables
					                        $author_image = get_field('image');
					                        $author_blurb = get_field('blurb');
					                        $author = get_field('name');
					                        $author_content = get_the_content();
                                            $author_link = get_permalink();
                                            // Author 2
					                        if($author) : ?>
                        <a class="author author--list" href="<?php echo $author_link; ?>">
                            <img src="<?php echo $author_image['url']; ?>" alt="<?php echo $author_image['alt']; ?>"
                                class="author__image author__image--featured" />
                            <p class="author__name author__name--featured"><?php echo $author; ?></p>
                        </a>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endwhile;
                                    // now its cool to do a reset
                                    wp_reset_postdata(); ?>
                    </div>
                    <?php endif;?>
                </li>
                <?php endwhile;?>
            </ul>
        </div>
    </div>
    <?php endif;
    // Better performace to rewind than rerun the same query - Splide kinda sucks this way too
    rewind_posts();
    if($video_posts->have_posts()) : ?>
    <!-- Video Navigation for Featured Video -->
    <div id="secondary-slider" class="slider slider--secondary splide">
        <div class="splide__track">
            <ul id="splide-js" class="splide__list">
                <?php while($video_posts->have_posts()) : $video_posts->the_post();?>
                <li class="splide__slide">
                    <div>
                        <?php
                                    //Checks for and trims the unnecessarily long category prefix on each video title
                                    $prefix = 'Project TEACH/COVID-19: Short Video Topics: ';
                                    $full_title = get_the_title();

                                    if (substr($full_title, 0, strlen($prefix)) == $prefix) {
                                        $display_title = substr($full_title, strlen($prefix));
                                    } else {
                                        $display_title = $full_title;
                                    }
                                ?>
                        <p><?php echo $display_title; ?></p>
                    </div>
                    <img src='<?php the_post_thumbnail_url(); ?>' frameborder='0' allowfullscreen>
                </li>
                <?php endwhile;?>
            </ul>
        </div>
    </div>
    <?php endif;?>
</section>

<?php require_once('footer.php'); ?>