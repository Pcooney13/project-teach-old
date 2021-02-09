<?php /* Template Name: Intensive Training New */ ?>

<?php require_once('header.php'); ?>
<?php while (have_posts()) : the_post(); ?>
    <!--training-block section starts-->
    <div class="event-block">
        <!--banner section starts-->
        <div class="banner" style="background-image: url(<?php the_field('top_banner_image'); ?>)">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="banner-text">
                            <?php the_field('event_header_text'); ?>
                            <div class="social-media"> <span>Share this event:</span>
                                <ul>
                                    <?php if (get_field('twitter_share')) : ?><li class="tw"><a href="<?php the_field('twitter_share'); ?>" title="Twitter" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> </a></li><?php endif; ?>
                                    <?php if (get_field('facebook_share')) : ?><li class="fb"><a href="<?php the_field('facebook_share'); ?>" title="Facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> </a></li><?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="event-schedule">
                <div class="time-table"> <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/time-icon.svg" alt=""></i>
                    <p><?php the_field('event_date'); ?><br>
                        <?php the_field('event_time'); ?></p>
                </div>
                <div class="address-schedule"> <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/map.svg" alt=""></i>
                    <p><?php the_field('event_location'); ?></p>
                </div>
                <a 
                  class="btn register <?php if (is_page('554')) {echo 'grey';} ?>" 
                  href="<?php the_field('event_signup_link'); ?>" 
                  title="REGISTER NOW" 
                  target="_blank">
                    <?php the_field('event_signup_text'); ?>
                </a>
                <?php if (get_field('event_schedule')) : ?>
                    <a 
                      href="<?php the_field('event_schedule'); ?>" 
                      class="btn" 
                      title="EVENT SCHEDULE" 
                      target="_blank">
                        EVENT SCHEDULE
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <!--banner section ends-->

        <!--breadcrumb trail-->
        <?php require(dirname(__FILE__) . "/breadcrumbs.php"); ?>

    </div>
    <!--training-block section end -->

    <!-- event-overview section codes starts here-->
    <div class="event-overview" style="padding-bottom:0;">
        <div class="container">
            <div class="row">
                <h2>Event Overview</h2>
                <p class="standard"><?php the_field('event_overview_top'); ?></p>
                <div class="overview-info cf" style="padding-top:60px">
                    <div class="col-md-3 col-sm-6 col-xs-12"> <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/physio.svg" alt=""></i>
                        <div style="font-size:18px; padding: 20px;" class="standard"><?php the_field('event_overview_blurb1'); ?></div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12"> <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/agenda.svg" alt=""></i>
                        <div style="font-size:18px; padding: 20px;" class="standard"><?php the_field('event_overview_blurb2'); ?></div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12"> <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/faculty.svg" alt=""></i>
                        <div style="font-size:18px; padding: 20px;" class="standard"><?php the_field('event_overview_blurb3'); ?></div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12"> <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/ask-question.svg" alt=""></i>
                        <div style="font-size:18px; padding: 20px;" class="standard"><?php the_field('event_overview_blurb4'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- event-overview section codes end here-->
    <?php if (is_page('annual-forum')) : ?>
        <section class="forum-takeaways">
            <h4>View 2018 Annual Forum Videos and Takeaways</h4>
            <a class="btn" href="/annual-forum-2018">View Videos and Takeaways</a>
        </section>
    <?php endif; ?>

    <!-- event-overview section codes end here-->
    <?php if (is_page('annual-forum-2019')) : ?>
        <section class="forum-takeaways">
            <h4>View 2019 Annual Forum Videos and Takeaways</h4>
            <a class="btn" href="/annual-forums-2019-takeaways">View Videos and Takeaways</a>
        </section>
    <?php endif; ?>

    <!-- Featured Faculty section codes start here-->
    <?php if (get_field('faculty_list')) : ?>
        <div class="featured-faculty" id="faculty">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 nopadding box-height">
                        <div class="faculty-info">
                            <div class="faculty-info-inner">
                                <h2>Featured
                                    Faculty</h2>
                                <a href="<?php the_field('event_signup_link'); ?>" title="REGISTER NOW" class="btn register <?php if (is_page('554')) {
                                                                                                                                echo 'grey';
                                                                                                                            } ?>" target="_blank"><?php the_field('event_signup_text'); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 nopadding box-height">
                        <div class="our-team cf">
                            <ul>

                                <?php $i = 1;
                                while (have_rows('faculty_list')) : the_row(); ?>
                                    <li><img src="<?php the_sub_field('image'); ?>" alt="">
                                        <div class="info-bio">
                                            <div class="bio-info-innner">
                                                <h3><?php the_sub_field('name'); ?></h3>
                                                <p><?php the_sub_field('titles'); ?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <?php $i++;
                                endwhile; ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Featured Faculty section codes end here-->

    <!--time line section start here-->
    <?php if (get_field('timeline_description')) : ?>
        <section class="timeline-wrap" id="agenda" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/images/ed_images/timeline-bg.png);">
            <div class="sec-title">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h2>Event Agenda</h2>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 addcover"> <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/map.svg" alt=""></i> <span><?php the_field('timeline_location'); ?></span> </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 timecover"> <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/time-icon.svg" alt=""></i> <span><?php the_field('timeline_time'); ?></span> </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <?php if (get_field('timeline_internal')) {
                    the_field('timeline_internal');
                } ?>
                <?php if (get_field('timeline_description')) : ?><div class="full-agenda-description"><?php the_field('timeline_description'); ?></div><?php endif; ?>
                <?php if (get_field('timeline_agenda')) : ?><div class="btn-cover"> <a href="<?php the_field('timeline_agenda'); ?>" title="View Full Agenda" class="btn" target="_blank">View Full Agenda</a> </div><?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
    <!--time line section end here-->
    <!--map section start here-->
    <section class="map-wrap">
        <div class="locatio-map" id="map" style="width: 100%; height: 683px;"> </div>
        <div class="map-directions">
            <a id="map-link" href="<?php the_field('google_map_location'); ?>" title="GET DIRECTIONS ON GOOGLE MAPS" class="btn" target="_blank">GET DIRECTIONS ON GOOGLE MAPS</a>
        </div>
    </section>
    <!--map section end here-->
    <div class="featured-faculty cme-info" id="cme-info">
        <div style="padding: 0;" class="container-fluid">
            <div class="row row-flex">
                <div class="col-lg-3 col-md-4 col-sm-12 nopadding box-height1">
                    <div class="faculty-info">
                        <div class="faculty-info-inner">
                            <h2><?php the_field('cme_title'); ?></h2>
                            <a 
                              href="<?php the_field('event_signup_link'); ?>" 
                              title="REGISTER NOW" 
                              class="btn register <?php if (is_page('554')) { echo 'grey'; } ?>" 
                              target="_blank">
                                <?php the_field('event_signup_text'); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 nopadding box-height1">
                    <div class="cme-info-inner cf">
                        <div class="cme-info-block">
                            <h2>Learning<br>Objectives</h2>
                            <?php the_field('learning_objectives'); ?>
                        </div>
                        <div class="cme-info-block" <?php if (get_field('accreditation_statement') == '') {
                            echo 'style="width: 100%"';
                        } ?>>
                            <h2>Target<br>Audience</h2>
                            <?php the_field('target_audience'); ?>
                        </div>
                        
                        <?php if (get_field('accreditation_statement')) : ?>
                            <div class="cme-info-block">
                                <h2>Accreditation<br>Statement</h2>
                                <?php the_field('accreditation_statement'); ?>
                            </div>
                            <div class="cme-info-block">
                                <h2>AMA Credit<br>Designation Statement</h2>
                                <?php the_field('ama_credit_designation_statement'); ?>
                            </div>
                            <div class="cme-info-block">
                                <?php the_field('other_accreditations'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cme Information section codes end here-->
    <section class="up-event-wrap" style="display: none!important;">
        <div class="container-fluid">
            <div class="col-md-12 col-sm-12 col-xs-12 slide-cover">
                <h2>Upcoming Events</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel pretium nulla. In ut <br /> tellus eget arcu consectetur imperdiet. Ut faucibus suscipit ante, eu ullamcorper.</p>
                <div class="slider-event">
                    <div class="item">
                        <div class="cover-event">
                            <h3>An Upcoming Event Title <br />Would Go Here</h3>
                            <div class="time-detail">
                                <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/time-icon.svg" alt="" class="svg"></i>
                                <span>Saturday, December 9, 2017 <br />8:00am - 7:00pm</span>
                            </div>
                            <div class="place-detail">
                                <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/address-icon.svg" alt="" class="svg"></i>
                                <span>Ramada Conference Center<br /> 542 Route 9<br /> Fishkill, NY 12524</span>
                            </div>
                            <div class="btn-cover">
                                <a href="#" title="View Event Details" class="btn">View Event Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="cover-event">
                            <h3>An Upcoming Event Title <br />Would Go Here</h3>
                            <div class="time-detail">
                                <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/time-icon.svg" alt="" class="svg"></i>
                                <span>Saturday, December 9, 2017 <br />8:00am - 7:00pm</span>
                            </div>
                            <div class="place-detail">
                                <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/address-icon.svg" alt="" class="svg"></i>
                                <span>Ramada Conference Center<br /> 542 Route 9<br /> Fishkill, NY 12524</span>
                            </div>
                            <div class="btn-cover">
                                <a href="#" title="View Event Details" class="btn">View Event Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="cover-event">
                            <h3>An Upcoming Event Title <br />Would Go Here</h3>
                            <div class="time-detail">
                                <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/time-icon.svg" alt="" class="svg"></i>
                                <span>Saturday, December 9, 2017 <br />8:00am - 7:00pm</span>
                            </div>
                            <div class="place-detail">
                                <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/address-icon.svg" alt="" class="svg"></i>
                                <span>Ramada Conference Center<br /> 542 Route 9<br /> Fishkill, NY 12524</span>
                            </div>
                            <div class="btn-cover">
                                <a href="#" title="View Event Details" class="btn">View Event Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="cover-event">
                            <h3>An Upcoming Event Title <br />Would Go Here</h3>
                            <div class="time-detail">
                                <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/time-icon.svg" alt="" class="svg"></i>
                                <span>Saturday, December 9, 2017 <br />8:00am - 7:00pm</span>
                            </div>
                            <div class="place-detail">
                                <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/address-icon.svg" alt="" class="svg"></i>
                                <span>Ramada Conference Center<br /> 542 Route 9<br /> Fishkill, NY 12524</span>
                            </div>
                            <div class="btn-cover">
                                <a href="#" title="View Event Details" class="btn">View Event Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="cover-event">
                            <h3>An Upcoming Event Title <br />Would Go Here</h3>
                            <div class="time-detail">
                                <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/time-icon.svg" alt="" class="svg"></i>
                                <span>Saturday, December 9, 2017 <br />8:00am - 7:00pm</span>
                            </div>
                            <div class="place-detail">
                                <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/address-icon.svg" alt="" class="svg"></i>
                                <span>Ramada Conference Center<br /> 542 Route 9<br /> Fishkill, NY 12524</span>
                            </div>
                            <div class="btn-cover">
                                <a href="#" title="View Event Details" class="btn">View Event Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="cover-event">
                            <h3>An Upcoming Event Title <br />Would Go Here</h3>
                            <div class="time-detail">
                                <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/time-icon.svg" alt="" class="svg"></i>
                                <span>Saturday, December 9, 2017 <br />8:00am - 7:00pm</span>
                            </div>
                            <div class="place-detail">
                                <i><img src="<?php bloginfo('template_url'); ?>/assets/images/ed_images/address-icon.svg" alt="" class="svg"></i>
                                <span>Ramada Conference Center<br /> 542 Route 9<br /> Fishkill, NY 12524</span>
                            </div>
                            <div class="btn-cover">
                                <a href="#" title="View Event Details" class="btn">View Event Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; ?>
<?php require_once('footer.php'); ?>