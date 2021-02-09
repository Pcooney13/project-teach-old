<?php /* Template Name: Consultion */ ?>
<?php require_once('header.php'); ?>

<?php require(dirname(__FILE__) . "/breadcrumbs.php"); ?>
<div class="consultation_text">
    <div class="container">
        <div class="row">
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="consultation_map">
                        <figure><?php get_template_part('templates/content', 'map-no-labels'); ?></figure>
                        <?php get_template_part('templates/content', 'map-labels'); ?>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="consultation_dif">
                        <ul class="region_list" style="margin-bottom:30px;">
                            <li class="regio_1">
                                <a href="#" title="" target="_blank" class="map regio_1"><img src="/wp-content/uploads/2017/09/map.png" alt="Map"></a>
                                <h6><span title="REGION 1">REGION 1</span></h6>
                                <a href="tel://8552277272" title="Call Us" class="">(855) 227-7272</a>
                            </li>
                            <li class="regio_2">
                                <a href="#" title="" target="_blank" class="map regio_2"><img src="/wp-content/uploads/2017/09/map.png" alt="Map"></a>
                                <h6><span title="REGION 2">REGION 2</span></h6>
                                <a href="tel://8448925070" title="Call Us" class="">(844) 892-5070</a>
                            </li>
                            <li class="regio_3">
                                <a href="#" title="" target="_blank" class="map"><img src="/wp-content/uploads/2017/09/map.png" alt="Map"></a>
                                <h6><span title="REGION 3">REGION 3</span></h6>
                                <a href="tel://8552277272" title="Call Us" class="">(855) 227-7272</a>
                            </li>
                        </ul>
                        <p>Project TEACH is completely FREE for all pediatric primary care providers in New York State and other prescribers who treat children. This includes child and adolescent psychiatrists, general psychiatrists, and psychiatric nurse practitioners.</p>
                        <h3>Telephone Consultations</h3>
                        <p>Project TEACH allows primary care providers to speak on the phone with child and adolescent psychiatrists. Ask questions, discuss cases, or review treatment options. Whatever you need to support your ability to manage your patients.</p>
                        <h3>Face-to-Face Consultations</h3>
                        <p>You can also request face-to-face consultations with child and adolescent psychiatrists for the children and families in your practice.<sup>*</sup></p>
                        <div style="text-align:center;">
                            <a class="btn btn-green" style="padding: 30px; margin: 30px 0 60px; border-radius: 50px; "title="LEARN MORE" href="/contact-us">Click Here To Request Consult</a>
                        </div>
                        <p>If your office would like to offer consultations via <span style="font-weight:bold">videoconference</span>, our Project TEACH regional provider teams can work with you to make this service available. It's an option for families that live more than one hour from the consulting psychiatrist or have limited access to transportation.</p>
                        <p>It is our expectation that face-to-face consultations will occur within two weeks of your requests. All face-to-face consultations are followed by written reports to the referring prescriber(s) within 48 hours.</p>
                        <p>Services are available throughout all of New York State. Simply locate your county on the map. Then use the contact information for your region to request a consultation.</p>
                        <p class="disclaimer"><sup>*</sup><small>Families with insurance may be billed for face-to-face consultations.</small></p>
                    </div>
                </div>


            <?php endwhile; ?>
        </div>
    </div>
</div>
</div>
<?php require_once('footer.php'); ?>