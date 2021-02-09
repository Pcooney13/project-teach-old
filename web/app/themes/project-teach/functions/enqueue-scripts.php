<?php
function site_scripts() {
    global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    //Dequeue 
    // wp_dequeue_style( 'wp-block-library' );

    // =======================//   
    //      JS - Main Site
    // =======================//   
    
        // Register modernizr
        wp_enqueue_script( 'modernizr-js', get_template_directory_uri() . '/assets/js/modernizr-2.7.1.min.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/js'), true );
        // Register General
        wp_enqueue_script( 'general', get_template_directory_uri() . '/assets/js/general.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/js'), true );
        
        // Register bootstrap
        wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/js'), true );
        // Register Header
        wp_enqueue_script( 'header-js', get_template_directory_uri() . '/assets/js/header.js', array(), filemtime(get_template_directory() . '/assets/js'), true );
        wp_enqueue_style('breadcrumbs', get_template_directory_uri() . '/assets/css/breadcrumbs.css');
        wp_enqueue_style('footer', get_template_directory_uri() . '/assets/css/footer.css');
        wp_enqueue_script( 'cookie-js', '//cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js', array(), null, true);
        //cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js
        // Register match-height
        wp_enqueue_script( 'match-height-js', get_template_directory_uri() . '/assets/js/jquery.matchHeight-min.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/js'), true );
        // Register carousel
        wp_enqueue_script( 'carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/js'), true );

        // Register jQuery UI
        // wp_enqueue_script( 'jquery-ui-js', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/js'), true );
        

    // =======================//    
    //     CSS - Main Site
    // =======================//    

        // Register Bootstrap
        wp_enqueue_style( 'mod-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
        // Register Tailwind CSS
        wp_enqueue_style( 'Tailwind-CSS', get_template_directory_uri() . '/assets/dist/main.css');
        // Register Owl Carousel
        wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css');
        // Register jQuery
        wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.min.css');
        // Register main stylesheet
        wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css');
        // Register responsive styles
        wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css');
        // Register Header styles
        wp_enqueue_style( 'header', get_template_directory_uri() . '/assets/css/header.css');
        // Register Hero Banner styles
        wp_enqueue_style( 'hero', get_template_directory_uri() . '/assets/css/temp/template-hero-content.css');
        // Register Important Notice Banner styles
        wp_enqueue_style( 'important-notice', get_template_directory_uri() . '/assets/css/temp/template-important-notice.css');
        // Add these styles
        wp_enqueue_style( 'Blog', get_template_directory_uri() . '/assets/css/blog.css');

        if ( is_singular( 'courses' ) || is_page_template('courses.php') ):
            // Register main stylesheet
            wp_enqueue_style( 'ethos', get_template_directory_uri() . '/assets/css/ethos.css');
            // Register Bootstrap
            wp_enqueue_style( 'ethos-slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
            wp_enqueue_style( 'ethos-slick-theme-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
            wp_enqueue_script( 'ethos-slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), null, true );
        endif;

        

    // =======================//   
    //     Specific Cases
    // =======================//   

        // MODAL - adds 24hr cookie to display modal. banner cookie conset is under cookie notice plugin
        // =============================================================================================
            if (is_front_page() || is_page(array('consultation', 'referrals', 'get-involved', 'parent-and-family-page')) || is_page_template('page-forum-videos.php')) {
                wp_enqueue_script( 'modal-cookie', get_template_directory_uri() . '/assets/js/cookie.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/js'), true );
            }



        // Front Page
        // ======================
            if (is_front_page()) {
                wp_dequeue_style( 'tribe-reset-style' );
                wp_dequeue_style( 'tribe-common-style' );
                wp_dequeue_style( 'tribe-tooltip-css' );
                wp_dequeue_style( 'tribe-events-admin-menu' );
                wp_dequeue_style( 'wp-block-library' );
                wp_dequeue_style( 'duplicate-post' );
                wp_dequeue_style( 'heateor_sss_frontend_css' );
                wp_dequeue_style( 'heateor_sss_sharing_default_svg' );
                wp_dequeue_style( 'owl-carousel' );
                wp_dequeue_style( 'jquery-ui' );

                wp_dequeue_script( 'tribe-common' );
                wp_dequeue_script( 'tribe-tooltip-js' );
                wp_dequeue_script( 'heateor_sss_sharing_js' );
                wp_dequeue_script( 'modernizr-js' );
                wp_dequeue_script( 'match-height-js' );
                // wp_dequeue_script( 'carousel-js' );
                wp_enqueue_style( 'MMH-styles', get_template_directory_uri() . '/assets/css/mmh.css');
            }
        
        // Blog Pages & Post Pages
        // =======================
            if (is_home() || is_category() || is_single() || is_page('covid')|| is_page('slider')) {
                // Remove these styles
                wp_dequeue_style( 'font-awesome' );
                wp_dequeue_style( 'owl-carousel' );
                wp_dequeue_style( 'jquery-ui' );
                wp_dequeue_style( 'wp-block-library' );
                wp_dequeue_style( 'tribe-reset-style' );
                wp_dequeue_style( 'tribe-common-style' );
                wp_dequeue_style( 'tribe-tooltip-css' );
                wp_dequeue_style( 'tribe-events-admin-menu' );
            }
            
        // Maternal Mental Health Page & Reserve a Time Page
        // =================================================
            if (is_page(array('mmh', 'reserve-a-time'))) {
                wp_enqueue_style( 'MMH-styles', get_template_directory_uri() . '/assets/css/mmh.css');
            }
            
            
            // =============================//   
            //  TEMP STYLES UNTIL ALL MERGED
            // =============================// 
            if (is_front_page()) {
                wp_enqueue_style( 'front-page', get_template_directory_uri() . '/assets/css/temp/front-page.css');
            }
            if (is_page(array('resources', 'prevention-science', 'telehealth', 'parent-and-family-page', 'test-page'))) {
                wp_enqueue_style( 'covid-page', get_template_directory_uri() . '/assets/css/temp/page-covid.css');
            }
            if (is_page(array('covid', 'slider'))) {
                wp_enqueue_style( 'covid-page', get_template_directory_uri() . '/assets/css/temp/page-covid.css');
                wp_enqueue_style( 'splide-css', get_template_directory_uri() . '/assets/css/temp/splide.min.css');
                wp_enqueue_script( 'splide-js', get_template_directory_uri() . '/assets/js/splide.min.js', array(), filemtime(get_template_directory() . '/assets/js'), true );
            }
            if (is_page('rating-scales')) {
                wp_enqueue_style( 'rating-scales', get_template_directory_uri() . '/assets/css/temp/rating-scales.css');
            }
            if (is_page('2020-intensive-trainings')) {
                wp_enqueue_style( '2020-intensive-trainings', get_template_directory_uri() . '/assets/css/temp/page-2020-intensive-trainings.css');
            }
            if (is_page('prevention-science')) {
                wp_enqueue_style( 'prevention-science', get_template_directory_uri() . '/assets/css/temp/page-prevention-science.css');
            }
            if (is_page('stories')) {
                wp_enqueue_style( 'stories', get_template_directory_uri() . '/assets/css/temp/page-stories.css');
            }
            if (is_page('map')) { 
                // CHECKING header, footer, bread crumbs, Hero Image  

                // wp_dequeue_style('style'); -- Footer Styles
                // wp_dequeue_style('cookie-notice-front'); -- Cookie notice plugin
                wp_dequeue_style('mod-bootstrap'); // Nav Functions / Dropdowns
                wp_dequeue_style('Blog'); 
                wp_dequeue_style('owl-carousel');
                wp_dequeue_style('wp-block-library');
                wp_dequeue_style('duplicate-post');
                wp_dequeue_style('heateor_sss_frontend_css');
                wp_dequeue_style('heateor_sss_sharing_default_svg');
                wp_dequeue_style('important-notice');
                wp_dequeue_style('jquery-ui');
                wp_dequeue_style('responsive');
                wp_dequeue_style('style');
                

                wp_enqueue_style('breadcrumbs', get_template_directory_uri() . '/assets/css/breadcrumbs.css');
                wp_enqueue_style('footer', get_template_directory_uri() . '/assets/css/footer.css');
            }
            if (is_page(array('annual-forums-2019-takeaways', 'annual-forum-2018'))) {
                wp_enqueue_style( 'forum-videos', get_template_directory_uri() . '/assets/css/temp/page-forum-videos.css');
            }
            if (is_page_template('template-region-team.php')) {
                wp_enqueue_style( 'region-team', get_template_directory_uri() . '/assets/css/temp/template-region-team.css');
            }
            if (is_page_template('template-follow-up-sessions.php')) {
                wp_enqueue_style( 'follow-up-session', get_template_directory_uri() . '/assets/css/temp/template-follow-up-sessions.css');
            }
            if (is_page_template('page-intensive-training-new.php')) {
                wp_enqueue_style( 'intensive-training-new', get_template_directory_uri() . '/assets/css/temp/page-intensive-training-new.css');
            }
            if (is_page(array('contact-us', 'parent-and-family-page', 'get-involved'))) {
                wp_enqueue_style( 'request-service-form', get_template_directory_uri() . '/assets/css/temp/template-request-service.css');
            }



        // Slider
        if (is_page('slider')) {
            wp_enqueue_style( 'slider', get_template_directory_uri() . '/assets/css/temp/slider.css');
            wp_enqueue_script( 'slider-js', get_template_directory_uri() . '/assets/js/slider.js', array(), filemtime(get_template_directory() . '/assets/js'), true );
        }


        // TEST TO REMOVE CSS
        // ======================
        if (is_page('test-page')) {
            wp_dequeue_style( 'tribe-reset-style' );
            wp_dequeue_style( 'tribe-common-style' );
            wp_dequeue_style( 'tribe-tooltip-css' );
            wp_dequeue_style( 'tribe-events-admin-menu' );
            wp_dequeue_style( 'wp-block-library' );
            wp_dequeue_style( 'duplicate-post' );
            wp_dequeue_style( 'heateor_sss_frontend_css' );
            wp_dequeue_style( 'heateor_sss_sharing_default_svg' );
            wp_dequeue_style( 'owl-carousel' );
            wp_dequeue_style( 'jquery-ui' );
            wp_dequeue_style( 'breadcrumbs' );
            // wp_dequeue_style( 'covid-page' );

            wp_dequeue_script( 'tribe-common' );
            wp_dequeue_script( 'tribe-tooltip-js' );
            wp_dequeue_script( 'heateor_sss_sharing_js' );
            wp_dequeue_script( 'modernizr-js' );
            wp_dequeue_script( 'match-height-js' );
            // wp_dequeue_script( 'carousel-js' );
            // wp_enqueue_style( 'MMH-styles', get_template_directory_uri() . '/assets/css/mmh.css');
        }


}
add_action('wp_enqueue_scripts', 'site_scripts', 999);