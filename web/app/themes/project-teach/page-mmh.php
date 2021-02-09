<?php
    // Template Name: mmh
    require_once('header.php');

    // Schedule -> templates/content-consultation-schedule.php
    // CSS      -> css/mmh.css

    // Breadcrumbs
    require(dirname(__FILE__) . "/breadcrumbs.php"); 
?>

<!-- Intro Content -->
<section class="mmh__section">
    <div class="container-fluid">
        <div class="row flex-row">
            <div class="col-md-10" style="padding-top:30px; text-align:center;">
                <h2><?php the_field('larger_text');?></h2>
                <p class="text-purple text-lg"><?php the_field('smaller_text');?></p>
            </div>
        </div>
    </div>
</section> 

<!-- Jump Nav -->
<?php if (have_rows('jump_links')): ?>
    <section class="mmh__section">
        <div class="page-nav">
            <ul class="page__nav">
                <?php while (have_rows('jump_links')): the_row(); ?>
                    <li style="background-color:<?php the_sub_field('color');?>" class="page__nav-item">
                        <a href="#<?php the_sub_field('jump_link');?>" class="consultations">
                            <?php $image = get_sub_field('icon');
                            if (!empty($image)): ?>
                            <figure class="icon-viewfield">
                                <div class="icon-slider">
                                    <img src="<?php echo esc_url($image['url']); ?>"
                                        alt="<?php echo esc_attr($image['alt']); ?>" width="78">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/arrow-down.png"
                                        alt="<?php echo esc_attr($image['alt']); ?>">
                                </div>
                            </figure>
                            <?php endif; ?>
                            <div class="text-white">
                                <h3><?php the_sub_field('title');?></h3>
                                <p><?php the_sub_field('text');?></p>
                            </div>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </section>
<?php endif; ?>

<!-- Featured Consult Calls -->
<?php if (have_rows('featured_consult')): 
    $count = 1;
    $featured_array_dates = []; ?>
    <section class="mmh__section webinars">
        <div class="container-fluid">
            <!-- Title -->
            <h2 class="mmh__title text-center text-orange">
                <?php the_field('fc_title'); ?>
            </h2>
            <!-- Featured Consults -->
            <div class="row flex-row" style="align-items:flex-start;">
                <?php 
                while (have_rows('featured_consult')) : the_row(); 
                
                    if ($count > 2) :
                        //
                    else: ?>
                    <div class="col-sm-10">
                        <article class="hide-date post post--list">
                            <!-- ACF Image with Fallback Image if none selected -->
                            <?php
                                $image = get_sub_field('image');
                                if (!empty($image)): ?>                                    
			                        <div class="post__image post__image--list" style="background-image:url('<?php echo esc_url($image['url']); ?>');">
                                    </div>
                                <?php else: ?>
			                        <div class="post__image post__image--list" style="background-image:url('https://project-teach.launchpaddev.com/wp-content/uploads/2018/10/iStock-872983526.jpg');">
                                    </div>
                                <?php endif; 
                            ?>
                            <!-- Text Content -->
                            <div class="post__content--list">                                
                                <?php
                                    $date_string = get_sub_field('date');
                                    $date = DateTime::createFromFormat('Ymd', $date_string);
                                    array_push($featured_array_dates, $date->format('Ymd'));
                                ?>
                                <!-- Date & Time -->
                                <div class="post__category post__category--list">
			                        <a class="text-orange"><?php echo $date->format('l, F j'); ?> @ <?php the_sub_field('time'); ?></a>
                                </div>
                                <!-- Title -->
				                <h3 class="post__title post__title--list"><?php the_sub_field('title');?></h3>
                                <!-- Consultant -->
                                <?php $featured_posts = get_sub_field('consultant');
                                    if ($featured_posts):
                                        $image = get_field('image', $featured_posts->ID); 
                                        if (!empty($image)) : ?>    			                        
                                            <div class="author__list">
				                                <div class="author author--list">
                                                    <img src="<?php echo $image['url']; ?>" alt="" class="author__image">
                                                    <p class="author__name"><?php the_field('name', $featured_posts->ID);?></p>
		                                        </div>	
		                                    </div>
                                        <?php endif; ?>
                                    <?php endif; 
                                ?>
                                <!-- Register Button -->
                                <div style="display:flex; padding-top:15px; text-align:right; margin-right:60px; align-items:center;">
                                    <p style="font-size:16px; text-align:left; line-height:1.5;">* <?php the_sub_field('asterisks'); ?></p>
                                    <?php
                                        if ($date->format('l') == 'Tuesday') {
                                            $consult_link = 'https://zoom.us/webinar/register/WN_UMYAWVJcQX6YcdpSL2E16Q';
                                        } else {                                        
                                            $consult_link = 'https://zoom.us/webinar/register/WN_bonaTeAeT0-UZD2HRRFctg';
                                        }
                                    ?>
                                    <a style="margin-left:auto;" href="<?php echo $consult_link; ?>" title="Register now" class="btn btn-orange">
                                        <strong>Register Now</strong>
                                    </a>
                                </div>																					
                            </div>
                        </article>
                    </div>
                    <?php endif;?>
                <?php 
                $count++;
                endwhile; ?>            
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Consultation Services -->
<section class="mmh__section expanded-services-block" id="consult-services">
    <div class="container-fluid consultation-container">
        <div style="align-items:center;" class="row flex-row">
            <img class="background-svg background-svg-blue" src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.svg" alt="phone">
            <div class="col-sm-10">
                <h2 class="mmh__title" style="color:#039fda; text-align:center;">
                    Consultation Services
                </h2>
            </div>
            <!-- Schedule -->
            <div class="col-sm-4">
                <div class="expanded-services--content">
                    <div class="schedule-slider">
                        <div>
                            <? get_template_part("templates/mmh/content", "consultation-schedule"); ?>
                        </div>
                    </div>
                    <p style="color:#a4a4a4; text-align:right; font-size: 12px; padding-bottom:0;" class="expanded-services--body-text">
                        *Dates and times subject to change.</p>
                </div>
            </div>
            <!-- Section 1 - Schedule text -->
            <div class="col-sm-6">
                <div class="expanded__text--container">
                    <h1 style="text-transform:uppercase; font-weight:900; margin-top:0; font-size:18px; margin-bottom:10px; color:#333;"
                        class="banner-title"><?php the_field('section_1_headline'); ?></h1>
                    <div class="mmh-standard"><?php the_field('section_1_text'); ?></div>
                    <p style="padding-bottom:0; font-weight:700; color:#039fda;" class="mmh-standard">
                        <?php the_field('section_1_text_emphasized'); ?>
                    </p>
                    <div style="text-align: center; margin-top:30px;">
                        <a href="<?php the_field('section_1_button_1_link'); ?>" title="Translate Page" class="btn btn-blue">
                            <strong><?php the_field('section_1_button_1_text'); ?></strong>
                        </a>
                        
                        <a href="<?php the_field('section_1_button_2_link'); ?>" title="Translate Page" class="btn btn-blue">
                            <strong><?php the_field('section_1_button_2_text'); ?></strong>
                        </a>
                        <button class="view-consultants" data-toggle="modal" data-target="#exampleModal">Click to View Complete List of Featured Consultants</button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <section style="padding-bottom:0;" class="mmh__section consultants">
                                        <div class="team-section">                                        
                                            <h2 class="mmh__title" style="color:#039fda; text-align:center;">
                                                <?php the_field('consultant_title_1'); ?>
                                            </h2>
                                            <div class="team-block-container">
                                                <div class="team-block-wrapper">
                                                    <?php if( have_rows('consultant_mmh') ):
                                                        while( have_rows('consultant_mmh') ) : the_row();
                                                            $featured_post = get_sub_field('consult_object');
                                                            if ($featured_post): ?>                                                                
                                                            <div class="team-block-row">
                                                                <?php
                                                                $image = get_field('image', $featured_post->ID);
                                                                if (!empty($image)): ?>
                                                                    <img class="team-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                                                <?php endif; ?>
                                                                <div class="team-member-info">
                                                                    <p class="team-name team-info"><?php the_field('name', $featured_post->ID);?></p>
                                                                    <p class="team-title team-info"><?php echo $featured_post->post_content; ?></p>
                                                                </div>
                                                            </div> 
                                                            <?php endif; ?>                                                        
                                                        <?php endwhile;
                                                    endif;?>                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button style="text-align: right; margin: 15px; margin-left: auto; display: block;" class="btn btn-blue" type="button" data-dismiss="modal" aria-label="Close">
                                                Close
                                            </button>                            
                                        </div>
                                    </section>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="non-urgent" class="col-md-10">                
                <div class="row flex-row">
                    <div style="background:#d3edf7; padding:20px; border:2px solid #d3edf7; display:flex; flex-direction:column;" class="col-md-8 non-urgent__block">
                        <h2 style="font-weight:900; margin-bottom:12px; color:#252525;"><?php the_field('section_2_headline'); ?></h2>
                        <p style="padding-bottom:15px;" class=" mmh-standard"><?php the_field('section_2_text'); ?></p>
                        <a style="max-width: 300px; border-radius: 999px; margin: 0 auto; margin-top:auto; " target="_blank" href="/mmh-reserve-question" title="non-urgent email" class="btn btn-blue">
                            <strong>reserve a time</strong>
                        </a>
                    </div>
                    <div style="border:2px solid #039fda; padding:20px; display:flex; flex-direction:column;" class="col-md-4 non-urgent__block">
                        <h2 style="font-weight:900; margin-bottom:12px; color:#039fda;"><?php the_field('section_3_headline'); ?></h2>
                        <p style="padding-bottom:15px;" class=" mmh-standard"><?php the_field('section_3_text'); ?></p>
                        <a style="max-width: 300px; border-radius: 999px; margin: 0 auto; margin-top:auto; " target="_blank" href="<?php the_field('section_3_button_link'); ?>" title="non-urgent email" class="btn btn-blue">
                            <strong><?php the_field('section_3_button_text'); ?></strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Linkage & Referrals -->
<section class="mmh__section" id="linkage">
    <div class="container-fluid">
        <div class="row flex-row">
            <div class="col-sm-5">
                <div class="consultation_map">
                    <figure><?php get_template_part('templates/content', 'map-no-labels'); ?></figure>
                </div>
            </div>
            <div class="col-sm-5">
                <h2 class="mmh__title" style="color:<?php the_field('right_side_button_color') ?>;">
                    <?php the_field('right_side_title'); ?>
                </h2>
                <p><?php the_field('right_side_body_text'); ?></p>
                <a style="margin-top:30px;" class="btn btn-purple" href="https://project-teach.launchpaddev.com/regional-providers/" title="View Event Details">
                    <?php the_field('right_side_button_text'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- MMH Webinars -->
<div class="container">
    <div style="margin:45px 0 0;" class="row flex-row">
        <div class="top col-md-12">
            <h2 class="mmh__title" style="color:#039fda; text-align:center;">
                <?php the_field('webinar_section_title'); ?>
            </h2>
        </div>   
        <?php if (have_rows('webinar')):
            $counter = 1;
            while (have_rows('webinar')) : the_row(); ?>

                <?php $image = get_sub_field('webinar_image_still'); ?>   

                <div style="display:flex; flex-direction:column; margin-bottom:2rem;" class="col-sm-6 col-md-5">
                    <?php if (!empty($image)): ?>
                        <a href="#" class="video-link" data-toggle="modal" data-target="#featured_video_<?php echo $counter;?>">
                            <img class="img-responsive" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </a>
                    <?php endif; ?>
                    <div class="resource-title-box">
                        <p class="resource-title"><?php the_sub_field('title');?></p>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal" id="featured_video_<?php echo $counter;?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="vertical-alignment-helper">
                        <div class="modal-dialog vertical-align-center">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <h3 class="modal-title" id="myModalLabel"><?php the_sub_field('title');?></h3>
                                </div>
                                <div class="modal-body">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe width="560" height="315" src="<?php the_sub_field('webinar_url') ?>" frameborder="0" allow="encrypted-media" mozallowfullscreen webkitallowfullscreen allowfullscreen></iframe>                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $counter++;    
            endwhile;
        endif; ?>                       
    </div>
</div>

<!-- COVID-19 -->
<section id="covid" class="mmh__section covid">
    <div class="container-fluid">
        <div class="row flex-row">
            <div class="col-sm-10">
                <?php if (get_field('resource_title')) : ?>
                    <h2 class="mmh__title" style="color:#7bbf43;"><?php the_field('resource_title');?></h2>
                <?php endif; ?>
                <?php if (get_field('resource_title')) : ?>
                    <?php the_field('resource_text');?>
                <?php endif; ?>
                <?php if (have_rows('resource_section')) : ?>
                    <div style="margin-top:15px;" class="panel panel-default">
                        <?php while (have_rows('resource_section')) : the_row(); ?>
                            <div style="background:#7bbf43!important" class="panel-heading">
                                <h4 class="panel-title">
                                    <!-- Accordion Titles, click to open accordions -->
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse-covid" aria-expanded="false">
                                        <?php the_sub_field('sub_section_title'); ?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse-covid" class="panel-collapse collapsed collapse">
                                <ul class="sidebar__list">
                                    <div class="panel-body">
                                        <?php if (have_rows('resource')) : ?>
                                            <?php while (have_rows('resource')) : the_row(); ?>
                                                <div class="item">
                                                    <div class="link">                                                
                                                        <a href="<?php the_sub_field('resource_url'); ?>">
                                                            <?php the_sub_field('resource_name'); ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </ul>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Resources -->
<section style="padding-bottom:60px;" class="mmh__section" id="resources">
    <div class="container-fluid">
        <div class="row flex-row">
            <div class="col-sm-10">
                <h2 class="mmh__title" style="color:#7bbf43;">
                    <?php the_field('title');?>
                </h2>
                <?php if (have_rows('section')) :
                    //counter gives unique id's to accordion
                    $counter = 10;
                    while (have_rows('section')) : the_row();
                        //inline css to provide specific color NOTE: colors listed for acf as RGB numbers NOT BY hexcode
                        $color = get_sub_field('color'); ?>
                <!-- Title of Sections, sits above Accordion Titles -->
                <?php if (get_sub_field('section_title')) :?>
                <h3 class="learn-more__title learn-more__title--providers" style="color:<?php echo $color; ?>;">
                    <?php the_sub_field('section_title'); ?>
                </h3>
                <?php endif; ?>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php if (have_rows('sub_section')) :
                                while (have_rows('sub_section')) : the_row();
                                    $counter++; ?>
                    <div class="panel panel-default">

                        <!-- Accordion Titles, click to open accordions -->
                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse-<?php echo $counter ?>" aria-expanded="false">
                            <div class="panel-heading">
                                <h4 style="color:<?php echo $color ?>" class="panel-title">
                                    <?php the_sub_field('sub_section_title'); ?>
                                </h4>
                            </div>
                        </a>
                        <div id="collapse-<?php echo $counter ?>" class="panel-collapse collapsed collapse">
                            <div class="panel-body">

                                <!-- if info box has been filled out it will go above the link options-->
                                <?php if (get_sub_field('info_box')) : ?>
                                <div class="item item_info-box"
                                    style="border:2px dashed <?php echo $color ?>; background-color:<?php echo hex_to_rgba($color, 0.25); ?>; padding:1rem;">
                                    <p style="padding-bottom:0;"><?php the_sub_field('info_box'); ?></p>
                                </div>
                                <?php endif; ?>

                                <!-- Add flex section depending on if another title needs to be used -->
                                <?php if (have_rows('flex_content')) :
                                                    while (have_rows('flex_content')) : the_row();
                                                        // if links need to be further categorized by another title it will use the following snippet
                                                        if (get_sub_field('title')) : ?>
                                <h3 style="color:<?php echo $color ?>;" class="screening-section">
                                    <?php the_sub_field('title'); ?></h3>
                                <?php if (have_rows('resource')) :
                                                                while (have_rows('resource')) : the_row();   ?>
                                <div class="item screening-item">
                                    <div class="link">
                                        <a href="<?php the_sub_field('resource_url'); ?>"
                                            target="_blank"><?php the_sub_field('resource_name'); ?></a>
                                    </div>
                                    <p><?php the_sub_field('resource_description'); ?></p>
                                </div>
                                <?php endwhile;
                                                        endif;
                                                    // otherwise it will run this snippet
                                                    elseif (get_sub_field('resource')) : ?>
                                <?php if (have_rows('resource')) :
                                                                while (have_rows('resource')) : the_row();   ?>
                                <div class="item">
                                    <div class="link">
                                        <a href="<?php the_sub_field('resource_url'); ?>"
                                            target="_blank"><?php the_sub_field('resource_name'); ?></a>
                                    </div>
                                    <p><?php the_sub_field('resource_description'); ?></p>
                                </div>
                                <?php endwhile;
                                                        endif;
                                                    endif;
                                                endwhile;
                                            endif;
                                            ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;
                        endif;
                        ?>
                </div>
                <?php endwhile;
            endif;
            ?>
            </div>
        </div>
    </div>
</section>


<?php require_once('footer.php'); ?>
