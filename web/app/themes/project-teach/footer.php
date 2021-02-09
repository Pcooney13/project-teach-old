<footer>
    <!-- main footer + links -->
    <div class="container-fluid">
        <div class="row footer-row">
            <div class="mission-statement">
                <div class="top-footer-section">
                    <div>
                        <img class="footer-logos" src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-logo.png" alt="mental health" />
                        <span>A Project Funded by</span>
                        <a target="_blank" href="https://www.omh.ny.gov/">
                            <img style="padding-top:0;" class="footer-logos" src="<?php echo get_template_directory_uri(); ?>/assets/images/mental-health-logo.png" alt="Office of Mental Health New York Logo" />
                        </a>
                    </div>
                </div>
                <h6>ABOUT PROJECT TEACH</h6>
                <p>Our mission is to strengthen and support the ability of New York's pediatric primary care providers (PCPs) to deliver care to children and families who experience mild-to-moderate mental health concerns.</p>
            </div>
            <div class="footer-column footer-column-first">
                <h6>ABOUT</h6>
                <ul class="link-list">
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/regional-providers">Regional Providers</a></li>
                    <li><a href="/faqs">FAQs</a></li>
                </ul>
                <h6 style="margin-top:45px;">SERVICES</h6>
                <ul class="link-list">
                    <li><a href="/cons/consultation">Consultations</a></li>
                    <li><a href="/referrals">Referrals</a></li>
                    <li><a href="/mmh/">Maternal Mental Health</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h6>EDUCATION</h6>
                <ul class="link-list">
                    <li><a href="/live-training/">Live Training</a></li>
                    <li><a href="/live-training/online-courses/">Online Courses</a></li>
                    <li><a href="/events/">Upcoming Events</a></li>
                </ul>
                <h6 style="margin-top:45px;">RESOURCES</h6>
                <ul class="link-list">
                    <li><a href="/rating-scales/">Rating Scales</a></li>
                    <li><a href="/resources/">Provider Resources</a></li>
                    <li><a href="/parent-and-family-page/">Parent & Family Resources</a></li>
                    <li><a href="/covid/">COVID-19</a></li>
                    <li><a href="/blog/">Newsletters</a></li>
                </ul>
            </div>
            <div class="footer-column footer-column-contact">
                <h6>CONTACT US</h6>
                <ul class="link-list">
                    <li>
                        <span>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone-icoon.png" alt="phone" />
                        </span>
                        <a href="tel:8777091771" title="Call Us">
                            (877) 709-1771
                        </a>
                    </li>
                    <li>
                        <span>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/massege-icon.png" alt="massege" />
                        </span>
                        <a href="mailto:info@nyprojectteach.com" title="Mail Us">
                            info@projectteachny.org
                        </a>
                    </li>
                    <li class="no-hover">
                        <span>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/watch-icon.png" alt="watchicon" />
                        </span>
                        9:30 AM to 4:30 PM
                    </li>
                </ul>
                <h6 class="second-heading">FOLLOW US</h6>
                <ul class="link-list link-list-desktop">
                    <li>
                        <span>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fb-logo.png" alt="watchicon" />
                        </span>
                        <a target="_blank" href="https://www.facebook.com/ProjectTEACHNY/" title="follow Project Teach on facebook">/ProjectTEACHNY</a>
                    </li>
                     <li>
                        <span>
                            <svg style="width:18px; height:18px; fill:white; margin-right:15px;" viewBox="0 0 216 216">
                    <path class="fill-current" d="M52.1,30.1c0,13.1-10,23.7-26.2,23.7h-0.3C10,53.8,0,43.3,0,30.1C0,16.7,10.4,6.4,26.2,6.4C42,6.4,51.8,16.7,52.1,30.1z
                    	M2.7,209.6H49v-137H2.7V209.6z M162.7,69.3c-24.6,0-35.6,13.3-41.7,22.6v0.4h-0.3c0.1-0.1,0.2-0.3,0.3-0.4V72.5H74.6
                    	c0.6,12.8,0,137,0,137H121V133c0-4.1,0.3-8.2,1.5-11.1c3.4-8.2,11-16.7,23.7-16.7c16.8,0,23.5,12.6,23.5,31v73.3H216V131
                    	C216,88.9,193.1,69.3,162.7,69.3z">
                    /&gt;
                </path></svg>
                        </span>
                        <a target="_blank" href="https://www.linkedin.com/company/project-teach-new-york/ title="follow Project Teach on facebook">Project TEACH</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 legals-bottom">
                <span class="copyright"><strong>Project Teach</strong> Copyright &copy; <?php echo date("Y"); ?>. All Rights Reserved.</span>
                <ul style="display:inline-block;" class="disclaimer-links">
                    <li><a href="/accessibility"); ?>" title="ACCESSIBILITY">ACCESSIBILITY</a></li>
                    <li><a href="/disclaimer"); ?>" title="DISCLAIMER">DISCLAIMER</a></li>
                    <li><a href="/privacy-policy"); ?>" title="PRIVACY">PRIVACY</a></li>
                    <li><a href="/site-map"); ?>" title="SITE MAP">SITE MAP</a></li>
                </ul>
            <div>
        </div>
    </div>
</footer>

<!-- image preloads starts here-->
<div class="preloader"></div>
<!-- image preloads ends here-->

<?php
    if (is_page('intensive-training') || is_page('annual-forum') || is_page('annual-forum-2019')) {
        include('assets/google-map/google-map.php');
    } 
?>
<!--scripts starts here-->
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script>
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


<?php wp_footer(); ?>

</body>

</html>