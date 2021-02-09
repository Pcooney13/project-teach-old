<?php
    require_once('header.php');
    /* Breadcrumbs */
    require(dirname(__FILE__) . "/breadcrumbs.php"); 
?>

<!-- <div class="covid-nav">
    <ul class="covid__nav">
        <li class="covid__nav-item nav-item--publication"><a href="#publication"><span>covid-19</span>special topics</a></li>
        <li class="covid__nav-item nav-item--video"><a href="#video"><span>covid-19</span>short video topics</a></li>
        <li class="covid__nav-item nav-item--flyer"><a href="#flyer"><span>covid-19</span>information flyer</a></li>
        <li class="covid__nav-item nav-item--resources"><a href="#resources"><span>covid-19</span>resources</a></li>
    </ul>
</div> -->

<div class="top-section">
    <section class="section-default section-text-image">
        <div class="container">
            <div class="row flex-row">
                <div class="col-md-7">
                    <h2><?php the_field('section_title_1'); ?></h2>
                    <?php the_field('section_text_1'); ?>
                    <?php if (get_field('show_button_1')): ?>
                    <a class="btn btn-blue" href="<?php the_field('section_button_1'); ?>"
                        target="_blank"><?php the_field('section_button_text_1'); ?></a>
                    <?php endif; ?>
                </div>
                <div class="col-md-5 section-col-img md-make-first">
                    <?php 
                $image = get_field('section_image_1');
                if( !empty( $image ) ): ?>
                    <img class="img-responsive" src="<?php echo esc_url($image['url']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section-default section-text-image">
        <div class="container">
            <div class="row flex-row">
                <div class="col-md-5 section-col-img">
                    <?php 
                    $image = get_field('section_image_2');
                    if( !empty( $image ) ): ?>
                    <img class="img-responsive" src="<?php echo esc_url($image['url']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; 
                ?>
                </div>
                <div class="col-md-7">
                    <h2><?php the_field('section_title_2'); ?></h2>
                    <?php the_field('section_text_2'); ?>
                </div>
                <div style="margin:0 auto" class="col-md-8">
                    <ul class="region_list" style="margin:30px 0;">
                        <li class="regio_1">
                            <a href="/regional-providers/region-1/" title="" target="_blank" class="map regio_1"><img
                                    src="/wp-content/uploads/2017/09/map.png" alt="Map"></a>
                            <h6><span title="REGION 1">REGION 1</span></h6>
                            <a href="tel://8552277272" title="Call Us" class="">(855) 227-7272</a>
                        </li>
                        <li class="regio_2">
                            <a href="/regional-providers/region-2/" title="" target="_blank" class="map regio_2"><img
                                    src="/wp-content/uploads/2017/09/map.png" alt="Map"></a>
                            <h6><span title="REGION 2">REGION 2</span></h6>
                            <a href="tel://8448925070" title="Call Us" class="">(844) 892-5070</a>
                        </li>
                        <li class="regio_3">
                            <a href="/regional-providers/region-3/" title="" target="_blank" class="map"><img
                                    src="/wp-content/uploads/2017/09/map.png" alt="Map"></a>
                            <h6><span title="REGION 3">REGION 3</span></h6>
                            <a href="tel://8552277272" title="Call Us" class="">(855) 227-7272</a>
                        </li>
                    </ul>
                    <?php the_field('section_text_two_2'); ?>
                    <?php if (get_field('show_button_2')): ?>
                    <div style="text-align:center;">
                        <a class="btn btn-blue" href="<?php the_field('section_button_2'); ?>"
                            target="_blank"><?php the_field('section_button_text_2'); ?></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="container container-fluid">
    <!-- Featured Publications - Special Topics -->
    <section class="covid-section featured-pub" id="publication">
        <h2 class="covid__title">
            COVID-19: Special Topics
        </h2>
        <div class="block block--gray">
            <?php
    	    //get 1 most recent posts
		    $main_args = array( 
			    'post_type' 	 => 'post', 
                'posts_per_page' => '1',
                'cat' => 30,
			    'post--not_in'   => array(get_the_ID())
		    );
            $main_post = new WP_Query($main_args);
            // Check there is a post
            if($main_post->have_posts()) : ?>
                <?php while($main_post->have_posts()) : $main_post->the_post();
                    $excerpt = get_the_excerpt();
                    $title = get_the_title();
                    $page_link = get_the_permalink(); 
                    $post_image = get_the_post_thumbnail_url(); 
                    $categories = get_the_category();
                    ?>
                    <div class="post__category post__category--list">
                        <?php if ( ! empty( $categories ) ) :
                            foreach( $categories as $category ) :
                                $cat_id = $category->cat_ID;
                                $color = get_field('category_color', 'category_'. $cat_id .'');
                                ?>
                                <a style="color:<?php echo $color; ?>;"
                                    href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <h3 style="text-transform:none; font-weight:900; margin-top:0; margin-bottom:30px; color:#000;" class="banner-title">
                        <?php echo $title; ?>
                    </h3>
                    <div class="row flex-row">
                        <?php if ($post_image) : ?>
                        <div style="background-image:url(<?php echo $post_image ?>);" class="flex-graphic" alt="<?php echo $title?>" id="next-consult-image"></div>
                        <?php endif; ?>
                        <div class=" flex-type">
                            <?php if (have_rows('authors')): ?>
                                <?php $author_count = count(get_field('authors'));?>
                                <div class="author__list">
                                    <?php while (have_rows('authors')): the_row();
					                    // Author Variables
					                    $post_object = get_sub_field('author'); 
					                    $post = $post_object;
					                    setup_postdata( $post );

                                        $author_image = get_field('image');
                                        $author_affliation = get_field('affliation');
					                    $author_blurb = get_field('blurb');
					                    $size = 'thumbnail';
					                    $author = get_field('name');
					                    $author_content = get_the_content();
					                    $author_page = get_permalink();
					                    if($author) : ?>
                                            <a class="author author--list" href="<?php echo $author_page; ?>">
                                                <img class="author__image author__image--featured" src="<?php echo $author_image['url']; ?>" alt="<?php echo $author_image['alt']; ?>" />
                                                <p style="line-height:1;" class="author__name author__name--featured">
                                                    <?php echo $author; ?>
                                                    <?php if($author_affliation):?>
                                                        <br>
                                                        <span style="padding:0; margin-top:-5px; font-weight: 500; line-height:1; font-size: 15px; color: #aaa;" class="mmh-standard">
                                                            <?php echo $author_affliation;?>
                                                        </span>
                                                    <? endif; ?>
                                                </p>
                                            </a>
                                        <?php endif;
					                    if ($author_count === 2) : the_row();
					                        $post_object = get_sub_field('author'); 
					                        $post = $post_object;
					                        setup_postdata( $post );

                                            $author_image = get_field('image');
                                            $author_affliation = get_field('affliation');
					                        $author_blurb = get_field('blurb');
					                        $author = get_field('name');
					                        $author_content = get_the_content();
					                        $author_page = get_permalink();
					                        if($author) : ?>
                                                <a class="author author--list" href="<?php echo $author_page; ?>">
                                                    <img class="author__image author__image--featured" src="<?php echo $author_image['url']; ?>" alt="<?php echo $author_image['alt']; ?>" />
                                                    <p style="line-height:1;" class="author__name author__name--featured">
                                                        <?php echo $author; ?>
                                                        <?php if($author_affliation):?>
                                                            <br>
                                                            <span style="padding:0; margin-top:-5px; font-weight: 500; line-height:1; font-size: 15px; color: #aaa;" class="mmh-standard">
                                                                <?php echo $author_affliation;?>
                                                            </span>
                                                        <? endif; ?>
                                                    </p>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <!-- Resets $post to single post authors fucking everything up -->
                                    <?php endwhile;?>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            <?php endif;?>
                            <p style="padding-bottom:10px; padding-top:15px;" class="mmh-standard">
                                <?php echo $excerpt . "..."; ?>
                            </p>
                            <!-- <p style="font-size:16px; margin-bottom:10px; display:inline; margin-right:45px;">* This article also appears in the NYS AAP July Newsletter</p> -->
                            <a id="join-consult" href="<?php echo $page_link;?>" title="Read More" class="btn btn-green">
                                <strong>Read More</strong>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

            <!-- List of additional special topics -->
            <div class="more-publications">
                <?php
    	        //get 6 most recent posts
		        $more_args = array( 
			        'post_type' 	 => 'post', 
                    'posts_per_page' => '6',
                    'offset' => 1,
                    'cat' => 30,
			        'post--not_in'   => array(get_the_ID())
		        );
    	        $more_posts = new WP_Query($more_args);
		        //Display Recent Posts
                if($more_posts->have_posts()) : ?>
                    <div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <!-- Accordion Titles, click to open accordions -->
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse-zzz" aria-expanded="false">
                                        More COVID-19: Special Topics Publications
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse-zzz" class="panel-collapse collapsed collapse">
                                <ul class="sidebar__list">
                                    <div class="covid-resource panel-body">                                                 
                                        <div class="item">
                                            <div class="link">
                                                <?php while($more_posts->have_posts()) : $more_posts->the_post(); 
                                                    $categories = get_the_category(); ?>
                                                    <div class="sidebar__list-item">
                                                        <p class="post__date post__date--sidebar"><?php the_time('m/j/y'); ?></p>
                                                        <div class="post__category post__category--list">
                                                            <?php if ( ! empty( $categories ) ) :
                                                                foreach( $categories as $category ) :
                                                                    $cat_id = $category->cat_ID;
                                                                    $color = get_field('category_color', 'category_'. $cat_id .'');?>
                                                                    
                                                                    <a style="color:<?php echo $color; ?>;" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
                                                                        <?php echo esc_html( $category->name ); ?>
                                                                    </a>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                        <a class="post__title post__title--sidebar" href="<?php echo the_permalink();?>">
                                                            <?php the_title() ?>
                                                        </a>
                                                        <?php if (have_rows('authors')): ?>
                                                            <div class="author__list">
                                                                <?php while (have_rows('authors')): the_row();
									                                // Author Variables
									                                $post_object = get_sub_field('author'); 
									                                $post = $post_object;
									                                // var_dump($post);
									                                setup_postdata( $post );
										                            $author_image = get_field('image');
										                            $author_blurb = get_field('blurb');
										                            $author = get_field('name');
										                            $author_content = get_the_content();
										                            $author_page = get_permalink();
										                            if($author) : ?>
                                                                        <a class="author author--list" href="<?php echo $author_page; ?>">
                                                                            <img src="<?php echo $author_image['url']; ?>"
                                                                                alt="<?php echo $author_image['alt']; ?>" class="author__image" />
                                                                            <p class="author__name"><?php echo $author; ?></p>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                    <?php wp_reset_postdata(); ?>
                                                                <?php endwhile;?>
                                                            </div>
                                                        <?php endif;?>
                                                    </div>
                                                <?php endwhile; ?>
                                            </div>
                                            <p><?php the_sub_field('resource_description'); ?></p>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; 
                wp_reset_query(); ?>
            </div>
        </div>
    </section>
    <!-- Adapting to COVID-19 -->
    <section class="covid-section" id="video">
        <h2 class="covid__title">
            Using Telehealth for Behavioral Health
        </h2>
        <div class="block block--gray">
            <div class="row flex-row">
                <div class="col-md-4 col-sm-12">
                    <div class='video'>
                        <iframe src='//player.vimeo.com/video/458274250?title=0&amp;byline=0&amp;portrait=0&amp;transparent=0' frameborder='0' allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-8">
                    <h3 style="margin-bottom:15px;" class="video__title">
                        Using Telehealth for Behavioral Health in Pediatric Primary Care: Adapting to COVID-19
                    </h3>
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/PT-Telehealth-Full-Presentation.pptx" style="display:flex; align-items:center; margin-bottom:15px">
                        <span style="font-size: 16px; color: #039fda; font-weight: bold; font-family: sans-serif;">PPT Slides from the webinar are available here</span>
                    	<div style="padding:3px 5px; margin-left:5px; border-radius:5px; background-color:#039fda; font-weight:bold; color:white;">PPT</div>
                    </a>   

                    <a href="<?php echo get_template_directory_uri(); ?>/assets/images/Chat-Box-Telehealth-Webinar.pdf" style="display:flex; align-items:center; margin-bottom:15px">
                        <span style="font-size: 16px; color: #039fda; font-weight: bold; font-family: sans-serif;">Questions posed in the chat box can be downloaded here</span>
                    	<div style="padding:3px 5px; margin-left:5px; border-radius:5px; background-color:#039fda; font-weight:bold; color:white;">PDF</div>
                    </a>
                    <!-- <p>
                        If you would like to post additional questions to the presenters, <a href="https://www.surveymonkey.com/r/QY2MHVB">click here</a>.
                    </p> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Videos - Short Video Topics -->
    <section class="covid-section" id="video">
        <h2 class="covid__title">
            Project TEACH/COVID-19: Short Video
        </h2>
        <div class="block block--gray">
            <div class="row flex-row">
                <div class="col-md-4 col-sm-12">
                    <div class='video'>
                        <iframe src='https://www.youtube.com/embed/LvAO4GlLkG0' frameborder='0' allowfullscreen></iframe>
                    </div>
                </div>
                <?php
    	            //get 1 most recent posts
		            $main_args = array( 
			            'post_type' 	 => 'post', 
                        'posts_per_page' => '1',
                        'cat' => 34,
			            'post--not_in'   => array(get_the_ID())
		            );
                    $main_post = new WP_Query($main_args);
                    // Check there is a post
                    if($main_post->have_posts()) : ?>
                        <?php while($main_post->have_posts()) : $main_post->the_post(); ?>
                            <div class="col-md-8">
                                <div class="post__category post__category--list">
                                    <a style="color:#e09b3d;">Project
                                        PROJECT TEACH/COVID-19: SHORT VIDEO TOPICS
                                    </a>
                                </div>
                                <h3 style="margin-bottom:15px;" class="video__title">
                                    <?php the_title(); ?>
                                </h3>
                                <?php if (have_rows('authors')): ?>
                                <?php $author_count = count(get_field('authors'));?>
                                <div class="author__list">
                                    <?php while (have_rows('authors')): the_row();
					                    // Author Variables
					                    $post_object = get_sub_field('author'); 
					                    $post = $post_object;
					                    setup_postdata( $post );

                                        $author_image = get_field('image');
                                        $author_affliation = get_field('affliation');
					                    $author_blurb = get_field('blurb');
					                    $size = 'thumbnail';
					                    $author = get_field('name');
					                    $author_content = get_the_content();
					                    $author_page = get_permalink();
					                    if($author) : ?>
                                            <a class="author author--list" href="<?php echo $author_page; ?>">
                                                <img class="author__image author__image--featured" src="<?php echo $author_image['url']; ?>" alt="<?php echo $author_image['alt']; ?>" />
                                                <p style="line-height:1;" class="author__name author__name--featured">
                                                    <?php echo $author; ?>
                                                    <?php if($author_affliation):?>
                                                        <br>
                                                        <span style="padding:0; margin-top:-5px; font-weight: 500; line-height:1; font-size: 15px; color: #aaa;" class="mmh-standard">
                                                            <?php echo $author_affliation;?>
                                                        </span>
                                                    <? endif; ?>
                                                </p>
                                            </a>
                                        <?php endif;
					                    if ($author_count === 2) : the_row();
					                        $post_object = get_sub_field('author'); 
					                        $post = $post_object;
					                        setup_postdata( $post );

                                            $author_image = get_field('image');
                                            $author_affliation = get_field('affliation');
					                        $author_blurb = get_field('blurb');
					                        $author = get_field('name');
					                        $author_content = get_the_content();
					                        $author_page = get_permalink();
					                        if($author) : ?>
                                                <a class="author author--list" href="<?php echo $author_page; ?>">
                                                    <img class="author__image author__image--featured" src="<?php echo $author_image['url']; ?>" alt="<?php echo $author_image['alt']; ?>" />
                                                    <p style="line-height:1;" class="author__name author__name--featured">
                                                        <?php echo $author; ?>
                                                        <?php if($author_affliation):?>
                                                            <br>
                                                            <span style="padding:0; margin-top:-5px; font-weight: 500; line-height:1; font-size: 15px; color: #aaa;" class="mmh-standard">
                                                                <?php echo $author_affliation;?>
                                                            </span>
                                                        <? endif; ?>
                                                    </p>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <!-- Resets $post to single post authors fucking everything up -->
                                    <?php endwhile;?>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            <?php endif;?>
                            </div>
                        <?php endwhile;
                    endif;?>
            </div>
        </div>
    </section>
    <!-- Flyers -->
    <section class="covid-section" id="flyer">
        <h2 class="covid__title">
            Project TEACH/COVID-19 Information Flyers
        </h2>
        <div class="block block--gray">
        <div class="row flex-row">
            <div class="col-md-4">
                <a href="<?php echo get_template_directory_uri(); ?>/assets/images/parent-resources-1.pdf" class="video-link">
                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/resource-for-image.jpg">
                </a>
            </div>
            <div class="col-md-8">
                <div class="post__category post__category--list">
                    <a>
                        Project TEACH/COVID-19 Information Flyers
                    </a>
                </div>
                <h3 style="margin-bottom:15px;" class="video__title">
                    Resources for Parents During COVID-19
                </h3>
                <a href="https://project-teach.launchpaddev.com/covid-19-special-topics-the-impact-of-covid-19-a-nine-year-old-boy-with-adhd/" title="Read More" class="btn btn-blue">
                    <strong>Download Print Version
                        <img class="pdf-icon" style="width: 20px; margin-left: 5px; padding:0;" src="https://project-teach.launchpaddev.com/wp-content/themes/project-teach/assets/images/Adobe_PDF_icon.svg">
                    </strong>
                </a>
            </div>
        </div>
        <div class="row flex-row">

            <div class="col-md-4">
                <a href="<?php echo get_template_directory_uri(); ?>/assets/images/dev-disorders-1.pdf" class="video-link">
                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/dev-image.jpg">
                </a>
            </div>
            <div class="col-md-8">
                <div class="post__category post__category--list">
                    <a>
                        Project TEACH/COVID-19 Information Flyers
                    </a>
                </div>
                <h3 style="margin-bottom:15px;" class="video__title">
                    Recommendations for Parents of Children With Developmental Disabilities and/or Mental Health Concerns During COVID-19
                </h3>
                <a href="<?php echo get_template_directory_uri(); ?>/assets/images/dev-disorders-1.pdf" title="Read More" class="btn btn-blue">
                    <strong>Download Print Version
                        <img class="pdf-icon" style="width: 20px; margin-left: 5px; padding:0;" src="https://project-teach.launchpaddev.com/wp-content/themes/project-teach/assets/images/Adobe_PDF_icon.svg">
                    </strong>
                </a>
            </div>
        </div>
    </section>
    <!-- Resources -->
    <section class="covid-section resources" id="resources">
        <h2 class="covid__title">
            <?php the_field('resource_title');?>
        </h2>
        <div class="block block--gray">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <?php if (have_rows('resource_section')) :
                            $counter1 = 1; 
                            while (have_rows('resource_section')) : the_row(); ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <!-- Accordion Titles, click to open accordions -->
                                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion"
                                                style="color:rgb(<?php echo $color ?>)" href="#collapse-1-<?php echo $counter1 ?>"
                                                aria-expanded="false">
                                                <?php the_sub_field('sub_section_title'); ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-1-<?php echo $counter1 ?>" class="panel-collapse collapsed collapse">
                                        <div class="covid-resource panel-body">                                
                                            <?php if (have_rows('resource')) : ?>
                                                <?php while (have_rows('resource')) : the_row();   ?>
                                                    <div class="item">
                                                        <div class="link">
                                                            <a target="_blank" href="<?php the_sub_field('resource_url'); ?>">
                                                                <span><?php the_sub_field('resource_name'); ?></span>
                                                                <svg class="pdf-icon" viewBox="0 0 160.07 160.03">
                                                                    <path
                                                                        d="M99.61,180H40.12c-12.07,0-20-7.73-20.08-19.94-.14-19.66,0-39.32,0-59q0-29.74,0-59.49C20,27.33,27.33,20,41.44,20c13.5,0,27,0,40.49,0,6.34,0,10,2.91,10,7.89S88.35,36,82.11,36c-13,0-26,0-39,0-5.66,0-7.1,1.38-7.1,7.05q0,57,0,114c0,5.58,1.5,7,7.23,7q56.75,0,113.48,0c5.9,0,7.24-1.36,7.26-7.43,0-12.83,0-25.66,0-38.49,0-6.38,2.87-10,7.87-10s8.09,3.59,8.11,9.83c0,13.83.07,27.66,0,41.49-.08,13.1-7.78,20.65-20.89,20.66Z"
                                                                        transform="translate(-19.97 -19.97)"></path>
                                                                    <path
                                                                        d="M164,48.36l-52.9,53c-1.76,1.77-3.46,3.61-5.31,5.28-3.94,3.57-9.14,3.63-12.57.24s-3.48-8.64,0-12.56c1.9-2.09,4-4,6-6q23.85-23.85,47.69-47.7c1.24-1.24,2.39-2.55,4.29-4.6-6.58,0-12.17,0-17.76,0-5.88-.06-9.44-3.11-9.45-8s3.55-8,9.43-8q18.74-.07,37.47,0c5.94,0,9,3,9.05,8.86.09,12.66.07,25.32,0,38,0,5.52-3.14,9-7.82,9.12-4.86.11-8.08-3.49-8.14-9.27C164,61.08,164,55.46,164,48.36Z"
                                                                        transform="translate(-19.97 -19.97)"></path>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <p><?php the_sub_field('resource_description'); ?></p>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                                <?php $counter1++;
                            endwhile;
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Back to School -->
    <section class="covid-section" id="video">
        <h2 class="covid__title">
            <?php the_field('back_to_school_title');?>
        </h2>
        <div class="block block--gray">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <?php if (have_rows('school_resource_section')) :
                            $counter3 = 1; 
                            while (have_rows('school_resource_section')) : the_row(); ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <!-- Accordion Titles, click to open accordions -->
                                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion"
                                                style="color:rgb(<?php echo $color ?>)" href="#collapse-3-<?php echo $counter3 ?>"
                                                aria-expanded="false">
                                                <?php the_sub_field('sub_section_title'); ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-3-<?php echo $counter3 ?>" class="panel-collapse collapsed collapse">
                                        <div class="covid-resource panel-body">                                
                                            <?php if (have_rows('resource')) : ?>
                                                <?php while (have_rows('resource')) : the_row();   ?>
                                                    <div class="item">
                                                        <div class="link">
                                                            <a target="_blank" href="<?php the_sub_field('resource_url'); ?>">
                                                                <span><?php the_sub_field('resource_name'); ?></span>
                                                                <svg class="pdf-icon" viewBox="0 0 160.07 160.03">
                                                                    <path
                                                                        d="M99.61,180H40.12c-12.07,0-20-7.73-20.08-19.94-.14-19.66,0-39.32,0-59q0-29.74,0-59.49C20,27.33,27.33,20,41.44,20c13.5,0,27,0,40.49,0,6.34,0,10,2.91,10,7.89S88.35,36,82.11,36c-13,0-26,0-39,0-5.66,0-7.1,1.38-7.1,7.05q0,57,0,114c0,5.58,1.5,7,7.23,7q56.75,0,113.48,0c5.9,0,7.24-1.36,7.26-7.43,0-12.83,0-25.66,0-38.49,0-6.38,2.87-10,7.87-10s8.09,3.59,8.11,9.83c0,13.83.07,27.66,0,41.49-.08,13.1-7.78,20.65-20.89,20.66Z"
                                                                        transform="translate(-19.97 -19.97)"></path>
                                                                    <path
                                                                        d="M164,48.36l-52.9,53c-1.76,1.77-3.46,3.61-5.31,5.28-3.94,3.57-9.14,3.63-12.57.24s-3.48-8.64,0-12.56c1.9-2.09,4-4,6-6q23.85-23.85,47.69-47.7c1.24-1.24,2.39-2.55,4.29-4.6-6.58,0-12.17,0-17.76,0-5.88-.06-9.44-3.11-9.45-8s3.55-8,9.43-8q18.74-.07,37.47,0c5.94,0,9,3,9.05,8.86.09,12.66.07,25.32,0,38,0,5.52-3.14,9-7.82,9.12-4.86.11-8.08-3.49-8.14-9.27C164,61.08,164,55.46,164,48.36Z"
                                                                        transform="translate(-19.97 -19.97)"></path>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <p><?php the_sub_field('resource_description'); ?></p>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                                <?php $counter3++;
                            endwhile;
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Racism -->
    <section class="covid-section featured-pub" id="publication">
        <h2 class="covid__title">
            <?php the_field('racism_title');?>
        </h2>
        <div class="block block--gray">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <?php if (have_rows('racism_resource_section')) :
                            $counter2 = 1; 
                            while (have_rows('racism_resource_section')) : the_row(); ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <!-- Accordion Titles, click to open accordions -->
                                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion"
                                                style="color:rgb(<?php echo $color ?>)" href="#collapse-2-<?php echo $counter2 ?>"
                                                aria-expanded="false">
                                                <?php the_sub_field('sub_section_title'); ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-2-<?php echo $counter2 ?>" class="panel-collapse collapsed collapse">
                                        <div class="covid-resource panel-body">                                
                                            <?php if (have_rows('resource')) : ?>
                                                <?php while (have_rows('resource')) : the_row();   ?>
                                                    <div class="item">
                                                        <div class="link">
                                                            <a target="_blank" href="<?php the_sub_field('resource_url'); ?>">
                                                                <span><?php the_sub_field('resource_name'); ?></span>
                                                                <svg class="pdf-icon" viewBox="0 0 160.07 160.03">
                                                                    <path
                                                                        d="M99.61,180H40.12c-12.07,0-20-7.73-20.08-19.94-.14-19.66,0-39.32,0-59q0-29.74,0-59.49C20,27.33,27.33,20,41.44,20c13.5,0,27,0,40.49,0,6.34,0,10,2.91,10,7.89S88.35,36,82.11,36c-13,0-26,0-39,0-5.66,0-7.1,1.38-7.1,7.05q0,57,0,114c0,5.58,1.5,7,7.23,7q56.75,0,113.48,0c5.9,0,7.24-1.36,7.26-7.43,0-12.83,0-25.66,0-38.49,0-6.38,2.87-10,7.87-10s8.09,3.59,8.11,9.83c0,13.83.07,27.66,0,41.49-.08,13.1-7.78,20.65-20.89,20.66Z"
                                                                        transform="translate(-19.97 -19.97)"></path>
                                                                    <path
                                                                        d="M164,48.36l-52.9,53c-1.76,1.77-3.46,3.61-5.31,5.28-3.94,3.57-9.14,3.63-12.57.24s-3.48-8.64,0-12.56c1.9-2.09,4-4,6-6q23.85-23.85,47.69-47.7c1.24-1.24,2.39-2.55,4.29-4.6-6.58,0-12.17,0-17.76,0-5.88-.06-9.44-3.11-9.45-8s3.55-8,9.43-8q18.74-.07,37.47,0c5.94,0,9,3,9.05,8.86.09,12.66.07,25.32,0,38,0,5.52-3.14,9-7.82,9.12-4.86.11-8.08-3.49-8.14-9.27C164,61.08,164,55.46,164,48.36Z"
                                                                        transform="translate(-19.97 -19.97)"></path>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <p><?php the_sub_field('resource_description'); ?></p>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                                <?php $counter2++;
                            endwhile;
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php require_once('footer.php'); ?>