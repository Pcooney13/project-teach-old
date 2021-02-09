<?
/*
Template Name: Forum videos
*/
require_once('header.php'); ?>


<div class="banner" style="background-image: url(<? echo get_template_directory_uri(); ?>/images/faculty-banner-edit.png); background-color: #3a0e79;">
    <div class="container">
        <div class="row">
            <div class="banner-text col-md-8 col-sm-12 col-xs-12" style="padding-top:5%;padding-bottom:5%;">
                <h1 class="banner-title">
                    <? the_field('header_title'); ?>
                </h1>
                <!-- <p class="banner-caption">In 2018, New York State launched a broad effort to combat maternal depression. Maternal depression and related mood and anxiety disorders are prevalent. If you can identify and treat these conditions early, it leads to better health outcomes for
                    mothers and children.</p>
                <p><strong>Project TEACH is a part of this cross-systems effort.</strong></p> -->
            </div>
        </div>
    </div>
</div>


<? require(dirname(__FILE__) . "/breadcrumbs.php"); ?>

<div class="container takeaways">
    <div class="row">
        <!-- <img src="http://project-teach.launchpaddev.com/wp-content/uploads/2019/02/149844-OTYRVM-379.jpg" /> -->
        <div class="col-sm-5 col-xs-6 image"></div>
        <div class="col-sm-6 col-xs-6 text" style="padding-left:50px;">
            <h2>Takeaways from the Annual Forum</h2>
            <p style="font-size: 24px;">The Annual Forum was held on September 14, 2018. Its purpose was to incubate strategies
                and solutions for moving prevention science from policy to practice in New York State.
                Click below to view some key takeaways from three of the presentations.</p>
            <a class="btn" href="/wp-content/uploads/2019/05/annual-forum-takeaways_5-8-19.pdf">View Takeaways</a>
        </div>
    </div>
</div>

<div class="container-fluid video-present">
    <h2>Video Presentations</h2>
    <div class="row">
        <? while (have_posts()) : the_post(); ?>
            <? the_content(); ?>
            <? if (have_rows('video')) : ?>
                <? while (have_rows('video')) : the_row(); ?>
                    <div class="video-wrapper">
                        <? if (!get_sub_field('video_url')) : ?>
                            <img class="iframe" src="https://via.placeholder.com/500x300/FFFFFF/3A0E79/?text=Coming%20Soon" style="padding:13px 20px;">
                        <? else : ?>
                            <iframe class="iframe" src="https://player.vimeo.com/video/<? the_sub_field('video_url'); ?>" frameborder="1" webkitallowfullscreen mozallowfullscreen allowfullscreen>
                            </iframe>
                        <? endif; ?>
                        <div class="video-text">
                            <p class="present-title">
                                <? the_sub_field('video_title'); ?>
                            </p>
                            <p class="present-subtitle">
                                <? the_sub_field('video_subtitle'); ?>
                            </p>
                            <p class="presenter">Presenter:
                                <strong>
                                    <? the_sub_field('video_presenter'); ?>
                                </strong>
                            </p>
                        </div>
                    </div>
                <? endwhile; ?>
            <? endif; ?>
        <? endwhile; ?>
    </div>
</div>

<? require_once('footer.php'); ?>