<?
/*
Template Name: Forum videos
*/
require_once('header.php'); ?>


<div class="banner" style="background-image: url(<? echo get_template_directory_uri(); ?>/assets/images/faculty-banner-edit.png); background-color: #3a0e79;">
    <div class="container">
        <div class="row">
            <div class="banner-text col-md-8 col-sm-12 col-xs-12" style="padding-top:5%;padding-bottom:5%;">
                <h1 class="banner-title">
                    <!-- <? echo the_title(); ?> -->
                    Project TEACH Annual Forum: Innovative Practices in Prevention Science 2019
                </h1>
                <!-- <p class="banner-caption">In 2018, New York State launched a broad effort to combat maternal depression. Maternal depression and related mood and anxiety disorders are prevalent. If you can identify and treat these conditions early, it leads to better health outcomes for
                    mothers and children.</p>
                <p><strong>Project TEACH is a part of this cross-systems effort.</strong></p> -->
            </div>
        </div>
    </div>
</div>


<? require(dirname(__FILE__) . "/breadcrumbs.php"); ?>

<div class="container-fluid video-present">
    <h2>Video Presentations</h2>
    <div class="row pf-resources-video-row">
<!-- 
        <div class="video-wrapper">
                <iframe class="iframe"class="iframe" src="https://player.vimeo.com/video/302081226" frameborder="1" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
            <div class="video-text">
                <p class="present-title">Early Identification, Prevention, and Wellness Promotion</p>
                <p class="present-subtitle">How Do We Continue</p>
                <p class="presenter">Presenter:
                    <strong>
                        Rahil Briggs, PsyD                                
                    </strong>
                </p>
            </div>
        </div> -->

        <div class="video-wrapper">
            <iframe class="iframe"src="https://player.vimeo.com/video/354947360" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
            <div class="video-text">
                <p class="present-title">
                    A Panel Discussion About Early Childhood Mental Health: Practice Transformation – Talk 1
                </p>
                <!-- <p class="present-subtitle">
                    How Do We Continue
                </p> -->
                <p class="presenter">Presenter:
                    <strong>
                        Evelyn J. Blanck, LCSW
                    </strong>
                </p>
            </div>
        </div>

        <div class="video-wrapper">
            <iframe class="iframe"src="https://player.vimeo.com/video/354948106" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
            <div class="video-text">
                <p class="present-title">
                    A Panel Discussion About Early Childhood Mental Health: Practice Transformation – Talk 2
                </p>
                <!-- <p class="present-subtitle">
                    How Do We Continue
                </p> -->
                <p class="presenter">Presenter:
                    <strong>
                        Elizabeth A. Isakson, MD, FAAP
                    </strong>
                </p>
            </div>
        </div>

        <div class="video-wrapper">
            <iframe class="iframe"src="https://player.vimeo.com/video/354948613" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
            <div class="video-text">
                <p class="present-title">
                    A Panel Discussion About Early Childhood Mental Health: Practice Transformation – Talk 3
                </p>
                <!-- <p class="present-subtitle">
                    How Do We Continue
                </p> -->
                <p class="presenter">Presenter:
                    <strong>
                        Diane E. Bloomfield, MD
                    </strong>
                </p>
            </div>
        </div>

        <div class="video-wrapper">
            <iframe class="iframe"src="https://player.vimeo.com/video/354948834" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
            <div class="video-text">
                <p class="present-title">
                    Evidence-Based NYS Programs That Address Early Intervention/Identification of Psychosocial Concerns in the 0 to 5 Age Range – Talk 1
                </p>
                <!-- <p class="present-subtitle">
                    How Do We Continue
                </p> -->
                <p class="presenter">Presenter:
                    <strong>
                        Victor M. Fornari, MD and Diane E. Bloomfield, MD
                    </strong>
                </p>
            </div>
        </div>

        <div class="video-wrapper">
            <iframe class="iframe"src="https://player.vimeo.com/video/354949577" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
            <div class="video-text">
                <p class="present-title">
                    Evidence-Based NYS Programs That Address Early Intervention/Identification of Psychosocial Concerns in the 0 to 5 Age Range – Talk 2
                </p>
                <!-- <p class="present-subtitle">
                    How Do We Continue
                </p> -->
                <p class="presenter">Presenter:
                    <strong>
                        Polina L. Umylny, PhD
                    </strong>
                </p>
            </div>
        </div>

    </div>
</div>

<? require_once('footer.php'); ?>