<?php
    require_once('header.php');
    /* Breadcrumbs */
    require(dirname(__FILE__) . "/breadcrumbs.php"); 
?>

<div class="container container-fluid">
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
</div>


<?php require_once('footer.php'); ?>