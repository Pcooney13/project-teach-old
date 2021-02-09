<?php
/* Template Name: Follow Up Sessions */
require_once('header.php');
?>

<!-- Banner -->
<div class="banner" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/iStock-996290796-1credit.png); background-color: #039fda; background-position:50% 75%;">
    <div class="container">
        <div class="row">
            <div class="banner-text col-md-8 col-sm-12 col-xs-12" style="padding-top:5%;padding-bottom:5%;">
                <h1 class="banner-title">Intensive Training Follow-Up Sessions</h1>
                <p class="banner-caption">Children’s Mental Health for Primary Care Providers</p>
            </div>
        </div>
    </div>
</div>

<!-- Breadcrumbs -->
<?php require(dirname(__FILE__) . "/breadcrumbs.php"); ?>

<style>
    .event-creds p {
        font-size:14px; 
        margin-bottom:16px; 
        line-height:1.5; 
        padding:0 15px;
    }
    .fu-presenter p {
        font-weight:bold; font-size:16px; margin-bottom:12px;
    }
    .session-speaker p {
        font-size:16px;
        margin-bottom: -8px;
    }
    .session-time-box {
        width:110px;
    }
    .event__wp-content {
        padding:15px; width:100%;
    }
    .event__wp-content h3 {
        width:100%;
        margin-bottom:5px;
        line-height:1.5;
        margin-top:0;
        font-weight: bold;
        font-size: 24px;
    }
    .event__wp-content p {
        width:100%;
        padding-bottom: 15px;
    }
    .event__wp-content ul {
        width:100%;
        margin-left: 15px;
    }
    .schedule-block {
        margin-bottom:30px;
    }
    .event__wp-content li {
        font-size: 18px;
        font-family: "Helvetica", sans-serif;
        line-height: 30px;
        font-weight: 300;
        padding: 0;
    }
    .text-blue {color:#039fda!important;}
    .text-green {color:#54b900!important;}
    .text-purple {color:#4806a6!important;}
    .text-orange {color:#e09b3d!important;}
    .bg-blue {background-color:#039fda!important;}
    .bg-green {background-color:#54b900!important;}
    .bg-purple {background-color:#4806a6!important;}
    .bg-orange {background-color:#e09b3d!important;}
    .border-color-blue {border: 2px solid #039fda!important;}
    .border-color-green {border: 2px solid #54b900!important;}
    .border-color-purple {border: 2px solid #4806a6!important;}
    .border-color-orange {border: 2px solid #e09b3d!important;}
    main {
        display:flex;
        flex-direction:column;
    }
    .event__presenters p {margin-bottom:20px; line-height:1.25;}
    .events__background-color {
        background-color: #f2f2f2;
    }
    .wrap__events .sidebar {
        background-color:#fff;
        box-shadow:0px 10px 20px #ddd;
    }
    .event__card-wrap {
        margin-bottom:30px;
        position:relative;
    }
    .event__card-wrap:last-child {
        /* margin-bottom:0; */
    }
    .event__card-wrap.passed {
        /* order:2; */
    }
    .event__card-wrap.featured {
        order:-1!important;
    }
    .event__card-wrap.featured .event__card {
        border: 3px solid #FFC107;
        background: linear-gradient(270deg, #ffeb3b61 0%, white 50%);
    }
    .event__card-wrap.passed:last-child {
        /* margin-bottom:0; */
    }
    .event__card {
        background-color:#fff;
        padding:3%;
        display:flex;
        font-family: sans-serif;
        justify-content:center;
        box-shadow:0px 10px 20px #ddd;
    }
    .event__card:last-child {
        margin-bottom:0;
    }
    .event__content {
        flex:1;
    }

    .event__image-wrap {
        width:220px;
        max-height:220px;
        margin-left:auto;
        position:relative;
        margin-left:5%;
    }
    .event__image-overlay {
        height:100%;
        width:100%;
        background-color:rgba(0,0,0,0.25);
        transition:all .5s ease-in-out;
        position:absolute;
    }
    /* .event__image-overlay:hover {
        background-color:rgba(0,0,0,0);
    } */
    .event__image {
        background-position:center;
        background-size:cover;
        height:100%;
    }
    .event__header {
        display:flex;
        align-items:center;
    }
    .event__category {
        color: #039fda;
        text-transform: uppercase;
        font-family: sans-serif;
        letter-spacing: 1px;
    }
    .event__regions{
        display: flex;
        align-items: center;
        margin-left:auto;
    }
    .event__regions span {
        color:#333;
        margin-right:8px;
        font-family:sans-serif;
    }
    .region__link {
        margin-right: 10px;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
        border-radius: 50%;
        color: white;
        transition: all .5s ease-in-out;
        border: 2px solid transparent;
    }
    .region__link-1 {
        background-color:#039fda;
    }
    .region__link-1:hover {
        border:2px solid #039fda;
        color:#039fda;
        background-color:transparent
    }
    .region__link-2 {
        background-color:#4806a6;
    }
    .region__link-2:hover {
        border:2px solid #4806a6;
        color:#4806a6;
        background-color:transparent
    }
    .region__link-3 {
        background-color:#54b900;
    }
    .region__link-3:hover {
        border:2px solid #54b900;
        color:#54b900;
        background-color:transparent
    }
    .region__link:last-child {
        margin-right:0;
    }
    .event__title {
        color:#212121;
        margin:.75rem 0;
        font-family:sans-serif;
        transition:all .5s ease-in-out;
    }
    .event__title:hover {
        /* color:#4806a6; */
    }
    .event__date {
        margin:.75rem 0;
        text-transform: uppercase;
        color:#999;
        font-family:sans-serif;
    }
    .event__location,
    .event__credits {
        margin:.25rem 0;
        padding-left:15px;
        display:flex;
        align-items:center;
        font-family:sans-serif;
    }
    .event__location img,
    .event__credits img {
        margin-right:15px;
        width:12px;
    }
    .event__hairline {
        width:50px;
        margin-left:0;
        border-top: 2px solid #420697;
    }
    .event__presenter {
        font-size:16px;
    }
    .event__readmore {
        font-size:14px; 
        text-align:center; 
        color:#039fda; 
        line-height:1;
        border: none;
        background: transparent;
        padding: 0;
        font-weight: 100;
        font-family: sans-serif;
        transform: translateY(5px);
    }
    .event__card-more {
        background-color:#fff;
        transform:translateY(-10px);
        transition:all .5s ease-in-out;
        overflow: hidden;
        max-height: 0;
        opacity: 0;
        padding: 0 3% 0 3%;   
        /* add browser prefixes */
        transition: all 0.5s ease;
    }
    .event__card-more.open {
        max-height: 800px;
        transform:translateY(0);
        opacity: 1;
        padding: 0 3% 3% 3%;
    }
    .presenters {
        padding-left:20px;
        margin-bottom:20px;
    }
    .presenters p {
        font-size:14px;
        line-height:1.5;
    }
    @media (max-width:600px) {
        .event__card {
            flex-direction:column;
        }
        .event__image {
            background-position:bottom;
        }
        .event__image-wrap {
            margin-left:0;
        }
        .event__image-wrap {
            order: -1;
            height: 300px;
            width:100%;
            margin-bottom:3%;
        }
    }
</style>

<?php
$featured_posts = get_field('events');

$args = array(
    'post_type' => array( 'events' ),
    'orderby' => 'ASC',
    'post__in' => $featured_posts,
    'meta_key' => 'start_date',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query' => array(
        array(
          'key' => 'start_date',
          'value' => date('Ymd'),
          'compare' => '>=',
        )
    )
);

// The Query
$the_query = new WP_Query($args);
 
// The Loop
if ($the_query->have_posts()) : 
    $event_creds =  get_field('accreditation');
    ?>

    <section class="blog-posts">
	    <div class="events__background-color">
            <div style="display:block;" class="wrap wrap__events">
			    <main style="margin:0 auto; max-width:unset;" class="main cf" role="main">
                    <h2 style="font-size: 48px; text-align:center; color: #000;font-weight: 900;letter-spacing: 1px;">
	                    Project TEACH 2021 Statewide Live Virtual Intensive Training Follow-Up Sessions
                    </h2>
                    <div class="event__card-wrap">
                        <div style="flex-wrap:wrap;" class="card card-1 event__card">						                                        
                            <p style="font-family:'museo-sans', sans-serif; font-size:18px; padding:10px 0; line-height:1.5;">These are free follow-up conference calls that are taking place as a follow up to the two-day 2021 Statewide Live Virtual Intensive Training. The sessions will enhance your skills to assess, treat and manage common mental health concerns in children and youth. It is presented by Project TEACH, a project funded by the New York State Office of Mental Health.</p>
                            <div class="cmecontent">
                                <div class="title section">
                                    <h2 style="text-align:center; color:rgb(58, 14, 121); font-size:38px; font-weight:900; margin:0; line-height:3rem; letter-spacing:1px;">Schedule</h2>
                                    <h3 style="text-align:center; margin-top:8px;"><strong>All scheduled calls are from 12-1 PM</strong></h3>
                                </div>
                                <div class="schedule-block">
                                    <?php while ($the_query->have_posts()) : ?>
                                        <?php $the_query->the_post(); ?>        
                                        <?php 
                                            $start_date = NULL;
                                            $end_date = NULL;
									        $start_date_string = get_field('start_date');
									        $end_date_string = get_field('end_date');
                                            if ($start_date_string) {
                                                $start_date = DateTime::createFromFormat('Ymd', $start_date_string);
                                            }
                                            if ($end_date_string) {
                                                $end_date = DateTime::createFromFormat('Ymd', $end_date_string);
                                            }
								        ?>
                                        <div>
                                            <div class="session-time-box">
                                                <p class="session-day"><?php echo $start_date->format('l'); ?></p>
                                                <p class="session-date"><strong><?php echo $start_date->format('M j'); ?></strong></p>
                                                <p style="font-size: 16px; margin-top: -10px;" class="session-day">12pm - 1pm</p>
                                            </div>
                                            <div class="session-info-box">
                                                <a href="<?php the_field('registration_link');?>">
                                                    <p class="session-info"><?php the_title(); ?></p>
                                                </a>
                                                <div class="session-speaker"><?php the_field('presenters');?></div>
                                                <p><strong>Learning Objectives</strong></p>
                                                <p><?php the_field('learning_objectives');?></p>
                                            </div>
                                            <div class="btn-wrapper">
                                                <a class="btn" href="<?php the_field('registration_link');?>">Register for <?php echo $start_date->format('M j'); ?></a>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                                <div class="event-creds">
                                    <?php echo $event_creds; ?>
                                </div>  
                </main>
            </div>
        </div>
    </section>
<?php endif;

wp_reset_postdata(); ?> 

<?php require_once('footer.php'); ?>