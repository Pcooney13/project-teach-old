<?php /* Template Name: Get Involved */ ?>
<?php require_once('header.php'); ?>
<?php require(dirname(__FILE__) . "/breadcrumbs.php"); ?>
<?php while (have_posts()) : the_post(); ?>


    <section class="forum-takeaways" style="display:none;">
        <h4>Get in Touch with us</h4>
        <button class="btn" data-toggle="modal" data-target="#form">Request a Service</button>
    </section>

    <div id="welcome-modal" class="modal" role="dialog" style="padding-top:15vh;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:#7BBF43;">Request a Service</h4>
                </div>
                <div class="modal-body">
                    <? get_template_part("templates/content", "request-service-form"); ?>
                </div>
            </div>
        </div>
    </div>


    <div class="project-services" style="background-color: #f7f7f7;">
        <div class="container">
            <div class="row">
                <h2>Why Use Project TEACH Services?</h2>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-txt">
                        <div class="one number">1</div>
                        <p>Services are easy to access &mdash; just call!</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-txt">
                        <div class="two number">2</div>
                        <p>All consultations, trainings and referrals are at no cost for pediatric primary care providers and other prescribers who provide ongoing treatment to children.<sup>*</sup></p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-txt">
                        <div class="tree number">3</div>
                        <p>It helps your practice provide the best possible care to the children and families you serve.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-txt">
                        <div class="for number">4</div>
                        <p>It improves the health of children and families in New York State.</p>
                    </div>
                </div>
                <ul class="services-list"></ul>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p class="disclaimer"><small>*Families with insurance may be billed for face-to-face consultations.</small></p>
                </div>
            </div>

        </div>
    </div>
    <!--project-services section ends-->

    <!-- pediatricp-primary section starts here-->
    <div class="pediatricp-primary" style="background-image: url(http://projectteachny.org/wp-content/uploads/2017/09/project-teach-bg.png)">
        <div class="container">
            <div class="row">
                <h2>Pediatric Primary Care Providers</h2>
                <p>If you are a physician or nurse practitioner in a primary care practice, there are several ways to take advantage of Project TEACH services.</p>
                <div class="list-primary cf">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="primary-txt">
                            <figure><img src="http://projectteachny.org/wp-content/uploads/2017/09/phone-block.png" alt="phone" />
                                <figcaption>
                                    <h6>Telephone Consultations</h6>
                                    <p>Speak directly with a child and adolescent psychiatrist who can support your ability to work with children and youth who have mild-to-moderate mental health conditions.</p>
                                </figcaption>
                            </figure>
                            <a href="/consultation/" title="LEARN MORE" class="btn">LEARN MORE</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="primary-txt">
                            <figure><img src="http://projectteachny.org/wp-content/uploads/2017/09/face-to-face-black.png" alt="face to face" />
                                <figcaption>
                                    <h6>Face-to-Face Consultations</h6>
                                    <p>You can request face-to-face consultations with child and adolescent psychiatrists for the children and families in your practice. If your office would like to offer consultations via video conference, our Project TEACH regional provider teams can work with you to make this service available.</p>
                                </figcaption>
                            </figure>
                            <a href="/consultation/" title="LEARN MORE" class="btn">LEARN MORE</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="primary-txt">
                            <figure><img src="http://projectteachny.org/wp-content/uploads/2017/09/link-black.png" alt="link" />
                                <figcaption>
                                    <h6>Referrals and Linkages</h6>
                                    <p>Connect children and their families with the resources, services and professionals they need.</p>
                                </figcaption>
                            </figure>
                            <a href="/referrals/" title="LEARN MORE" class="btn">LEARN MORE</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="primary-txt">
                            <figure><img src="http://projectteachny.org/wp-content/uploads/2017/09/traning-black.png" alt="traning" />
                                <figcaption>
                                    <h6>Training</h6>
                                    <p>Earn CME credits and enhance your skills to assess, treat and manage mild-to-moderate mental health.</p>
                                </figcaption>
                            </figure>
                            <a href="/training/" title="LEARN MORE" class="btn">LEARN MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="consultation-health" style="background-image:url(/wp-content/uploads/2017/09/consulation-improve-health-bg.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 improve-health">
                    <h2>Parents and Family Members</h2>
                    <p>Make sure your child's physician and other staff in the primary care practice know about Project TEACH.</p>
                    <p>Download and print a Project TEACH flyer to give to your physician.</p>
                    <a target="_blank" href="/wp-content/uploads/2019/05/ProjectTEACH_Parent_Flyer_Nov2017.pdf" class="btn" title="VIEW FLYER">
                        VIEW FLYER
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php endwhile; ?>
</div>
<?php require_once('footer.php'); ?>