<?php get_header(); ?>

    <div class="better_health-block">
        <div class="banner" style="background-image:url(https://projectteachny.org/wp-content/uploads/2017/09/better-health-bg.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="banner-text col-md-8 col-sm-12 col-xs-12">
                        <h1>Better Health.<br> Brighter Future.</h1>
                        <p class="standard">Good mental health lets young people live their best lives.
                            <br> Let us help you care for the kids in your practice.</p>
                        <a href="/get-involved" class="btn" title="GET INVOLVED">GET INVOLVED</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-nav">
            <ul class="page__nav">
                <li class="page__nav-item nav-item--publication">
                    <div class="consultations">
                        <figure class="icon-viewfield">
                            <img src="https://projectteachny.org/wp-content/uploads/2017/09/consulation-img.png" alt="CONSULTATIONS" width="78" />
                        </figure>
                        <h3>CONSULTATIONS</h3>
                        <p class="home-box">Speak to a child and adolescent psychiatrist or get face-to-face consultations for your patients.</p>
                        <a href="/consultation/" class="btn" title="CALL NOW">CALL NOW</a>
                    </div>
                </li>
                <li class="page__nav-item nav-item--video">
                    <div class="consultations referrals">
                        <figure class="icon-viewfield">
                            <img src="https://projectteachny.org/wp-content/uploads/2017/09/referrals-img.png" alt="CONSULTATIONS" />
                        </figure>
                        <h3>REFERRALS</h3>
                        <p class="home-box">Link your patients to the resources they need in their communities.</p>
                        <a href="/referrals/" class="btn" title="LEARN MORE">LEARN MORE</a>
                    </div>
                </li>
                <li class="page__nav-item nav-item--flyer">
                    <div class="consultations referrals">
                        <figure class="icon-viewfield">
                            <img style="max-height:100%;" src="https://projectteachny.org/wp-content/uploads/2017/09/traning-img.png" alt="CONSULTATIONS" />
                        </figure>
                        <h3>TRAINING</h3>
                        <p class="home-box">Find training and education on topics relevant to mental health in primary care.</p>
                        <a href="/live-training/" class="btn" title="Live Training">SEE DETAILS</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="get-involved">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 involved_text">
                        <h2>Get Involved</h2>
                        <span class="standard">It is easy to use Project TEACH services.</span>
                        <p class="standard">You can talk to a child and adolescent psychiatrist within four hours.
                            Simply find your county on the map. Then call the number in your region.</p>
                        <?php get_template_part('templates/content', 'map-labels'); ?>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 involved_map">
                        <?php get_template_part('templates/content', 'map-no-labels'); ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="cordination-region" style="background-color:#3a0e79; background-image:url('https://project-teach.launchpaddev.com/wp-content/uploads/2018/12/doctor-bg-home.png');">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="cordination-txt">
                            <h2 style="margin-bottom:8px;">Need training and CME?</h2>
                            <p class="standard"> We can come to you.</p>
                            <p class="standard">Project TEACH offers training in several different formats for pediatric primary care providers (PCPs). These programs support your ability to assess, treat and manage mild-to-moderate mental health concerns in your practice.
                            </p>
                            <p class="standard"><span style="font-weight:600; display:block;">Core Trainings</span>The core trainings are led by our regional provider teams on-site at your practice or at a nearby location. Core trainings can be provided through a series of 2-3 hour sessions, one longer program, or an alternative format, depending on your needs. Our regional provider teams cover assessment and management of the important mental health issues that children and adolescents face.
                            </p>
                            <div class="cta">
                                <a class="btn" title="LEARN MORE" href="/contact-us">Request for Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once(dirname(__FILE__) . '/homeSearch.php'); ?>

        <div class="consultation-health" style="background-image:url(https://project-teach.launchpaddev.com/wp-content/themes/project-teach/assets/images/home-bg-downloads.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 cordination-txt">
                        <h2>Download Project TEACH Materials</h2>
                        <p>
                        Project TEACH’s mission is to strengthen and support pediatric primary care providers (PCPs) and maternal health providers in their care of children and families who experience mild-to-moderate mental health concerns.
                        <br>
                        Visit the “quick guides” below to learn more about our specific initiatives.
                        </p>
                        <div class="row pt-material-row">
                            <div class="col-sm-12 col-md-4 col-lg-3">
                                <div class="pt-material-box blue">
                                    <div class="image-container">
                                        <!-- <a style="background-image:url(https://project-teach.launchpaddev.com/wp-content/themes/project-teach/assets/images/downloadable-2.png); background-size:cover; background-repeat:no-repeat;" target="_blank" class="link image-link" href="https://projectteachny.org/wp-content/uploads/2019/10/ProjectTEACH_Handout_Nov2017.pdf"> -->
                                        <a target="_blank" class="link image-link" href="https://projectteachny.org/wp-content/uploads/2019/10/ProjectTEACH_Handout_Nov2017.pdf">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/white-logo.png">
                                        </a>
                                    </div>  
                                    <div class="text-container">
                                        <div class="link text-link">
                                            <h4>Project TEACH Flyer</h4>
                                        </div>
                                        <p class="description">Project TEACH provides ongoing support to PCPs and OBGYNs to better the mental health status of children and mothers.</p>
                                        <div class="btn-cover">
                                        <!-- <p style="margin-top:20px; margin-bottom:8px;" class="description">to learn about all the benefits of Project TEACH</p> -->
                                            <a style="margin-top:0;" href="https://projectteachny.org/wp-content/uploads/2019/10/ProjectTEACH_Handout_Nov2017.pdf" title="View Event Details" class="btn">Learn More</a>
                                        </div>
                                        <!-- <p class="description description-link"><a class="text-link" href="https://projectteachny.org/wp-content/uploads/2019/10/ProjectTEACH_Handout_Nov2017.pdf" target="_blank">Click here to learn about all the benefits of Project TEACH</a></p> -->
                                    </div>                                  
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-3">
                                <div class="pt-material-box purple">
                                    <div class="image-container">
                                        <!-- <a style="background-image:url(https://project-teach.launchpaddev.com/wp-content/themes/project-teach/assets/images/downloadable-1.png); background-size:cover; background-repeat:no-repeat;" target="_blank" class="link image-link" href="https://projectteachny.org/wp-content/uploads/2019/10/110119-Maternal-Depression-handout.pdf"> -->
                                        <a target="_blank" class="link image-link" href="https://projectteachny.org/wp-content/uploads/2019/10/110119-Maternal-Depression-handout.pdf">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/white-logo.png">
                                        </a>
                                    </div>
                                    <div class="text-container">
                                        <div class="link text-link">
                                            <h4>Maternal Mental Health Flyer</h4>
                                        </div>
                                        <p class="description">Mental Health Resources to support Pregnant and Postpartum Women. Free consultations, videos, referrals and more.</p>
                                        <div class="btn-cover">
                                            <a href="https://projectteachny.org/wp-content/uploads/2019/10/110119-Maternal-Depression-handout.pdf" title="View Event Details" class="btn">Learn More</a>
                                        </div>
                                        <!-- <p class="description description-link"><a class="text-link" href="https://projectteachny.org/wp-content/uploads/2019/10/110119-Maternal-Depression-handout.pdf" target="_blank">Click here to learn more</a></p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-3">
                                <div class="pt-material-box green">
                                    <div class="image-container">
                                        <!-- <a style="background-image:url(https://project-teach.launchpaddev.com/wp-content/themes/project-teach/assets/images/downloadable-3.png); background-size:cover; background-repeat:no-repeat;" target="_blank" class="link image-link" href="https://projectteachny.org/wp-content/uploads/2019/11/ProjectTEACH_Parent_Flyer_Nov20171.pdf"> -->
                                        <a target="_blank" class="link image-link" href="https://projectteachny.org/wp-content/uploads/2019/11/ProjectTEACH_Parent_Flyer_Nov20171.pdf">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/white-logo.png">
                                        </a>
                                    </div>
                                    <div class="text-container">
                                        <div class="link text-link">
                                            <h4>Parent & Family Member Education Card</h4>
                                        </div>
                                        <p class="description">Information for parents to share with their child’s health providers in order to receive the benefits of Project TEACH’s free resources.</p>
                                        <div class="btn-cover">
                                            <a href="https://projectteachny.org/wp-content/uploads/2019/11/ProjectTEACH_Parent_Flyer_Nov20171.pdf" title="View Event Details" class="btn">Learn More</a>
                                        </div>
                                        <!-- <p class="description description-link"><a class="text-link" href="https://projectteachny.org/wp-content/uploads/2019/11/ProjectTEACH_Parent_Flyer_Nov20171.pdf" target="_blank">Click here to learn more</a></p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <h5>Help children and adolescents find good health.</h5> -->
                        <!-- <p class="standard">Call for a consultation today. Speak directly to a child and adolescent
                            psychiatrist. Enhance the care you provide to kids with mild-to-moderate mental health concerns.
                            Or set up face-to-face consultations for patients to meet directly with experts.</p> -->
                        <!-- <a href="/consultation" class="btn" title="CONNECT NOW">CONNECT NOW</a> -->
                    </div>
                </div>
            </div>
        </div>
<?php get_footer(); ?>