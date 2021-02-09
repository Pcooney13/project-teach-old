<?php /* Template Name: Contact Us */ ?>
<?php require_once('header.php'); ?>
<?php require(dirname(__FILE__) . "/breadcrumbs.php"); ?>


<?php while (have_posts()) : the_post(); ?>

    <div class="contact">
        <div class="container">
            <div class="row" style="display:flex; flex-wrap:wrap; justify-content:center;">
                <div class="col-sm-12">
                    <div class="consultation_dif">
                        <p style="margin-bottom:30px; text-align:center;" class="standard">Complete the form below to request a telephone consultation, linkage or referral, or on-site core training.</p>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <? get_template_part("templates/content", "request-service-form"); ?>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="consultation_dif">
                        <h1 style="color:#3a0e79;">CONTACT US</h3>
                            <p>Statewide Coordination Center for Project TEACH</p>
                            <p style="font-size: 18px; font-weight: 600; padding-left:24px;">For General Questions</p>
                            <ul class="social_media" style="padding-left:24px;">
                                <li>
                                    <span class="standard">
                                        <img src="https://projectteachny.org/wp-content/uploads/2017/09/contact-phone-icoon.png" alt="phone" />
                                    </span>
                                    <a title="Call Us" href="tel:8777091771">(877) 709-1771</a>
                                </li>
                                <li>
                                    <span class="standard">
                                        <img src="https://projectteachny.org/wp-content/uploads/2017/09/contact-massege-icon.png" alt="message" />
                                    </span>
                                    <a title="Mail Us" href="mailto:info@projectteachny.org">info@projectteachny.org</a>
                                </li>
                                <li>
                                    <span class="standard">
                                        <img src="https://projectteachny.org/wp-content/uploads/2017/09/contact-watch-icon.png" alt="watchicon" />
                                    </span>
                                    Hours: 9:30 AM to 4:30 PM
                                </li>
                            </ul>
                            <p style="margin-top:50px;">Regional Providers</h3>
                                <p style="font-size: 18px; font-weight: 600; padding-left:24px;">For Rapid-Response to Consultation and Linkage and
                                    Referral requests</p>
                                <div class="consultation_map">
                                    <figure><?php get_template_part('templates/content', 'map-no-labels'); ?></figure>
                                    <?php get_template_part('templates/content', 'map-labels'); ?>

                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endwhile; ?>
</div>



<?php require_once('footer.php'); ?>