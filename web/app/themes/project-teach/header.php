<?php
/*
 * ===================================================
 * Template for displaying the Header
 * This template displays all of the <head> section
 * ===================================================
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Mobile Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Google Tag Manager -->
        <script>
            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-TJ7S5MK');
        </script>
        <!-- TypeKit - Working on replacing with googlefont -->
        <script>
            (function(d) {
                var config = {
                        kitId: 'hyv7nlq',
                        scriptTimeout: 3000,
                        async: true
                    },
                    h = d.documentElement,
                    t = setTimeout(function() {
                        h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
                    }, config.scriptTimeout),
                    tk = d.createElement("script"),
                    f = false,
                    s = d.getElementsByTagName("script")[0],
                    a;
                h.className += " wf-loading";
                tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
                tk.async = true;
                tk.onload = tk.onreadystatechange = function() {
                    a = this.readyState;
                    if (f || a && a != "complete" && a != "loaded") return;
                    f = true;
                    clearTimeout(t);
                    try {
                        Typekit.load(config)
                    } catch (e) {}
                };
                s.parentNode.insertBefore(tk, s)
            })(document);
        </script>
        <!-- Favicon -->
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon.ico">
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/manifest.json">
        <!-- Meta tags -->
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <meta name="format-detection" content="telephone=no">
        <meta name="keywords" content="">
        <!-- Easy Appt plugin CSS -- Working on removing this plugin cause it has no use. -->
        <link rel='stylesheet' id='ea-frontend-style-css' href='https://easy-appointments.net/wordpress/wp-content/plugins/easy-appointments/css/eafront.css?ver=4.9.8' type='text/css' media='all' />
        <!-- Lastly call wp_head -->
        <?php wp_head(); ?>
    </head>

    <body <?php if(!is_search()) body_class(); ?>>
        <?php 
            get_template_part('templates/site-notices'); 
        ?>

        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TJ7S5MK" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        <!-- <div id="header-wrap" class="header-wrap"> -->
		    <?php 
		    	$show_banner = get_field('show_banner', 'options');
		    	if ($show_banner) get_template_part('templates/important-notice'); 
		    ?>
		    <?php 
		    	$show_modal = get_field('show_modal', 'options');
		    	if (false && $show_banner) get_template_part('templates/modal'); 
		    ?>
            <!--header section starts-->
            <div style="background:white;">
            <header class="header">
                <!-- SEARCH -->
                <button class="search-wrapper">
                    <svg id="search" class="search" viewBox="0 0 50 50">
                        <line id="hamburger-mid" class="svg__hamburger svg__hamburger--mid nav-icon" x1="4" y1="25" x2="46" y2="25" />
                        <line id="hamburger-mid2" class="svg__hamburger svg__hamburger--mid2 nav-icon" x1="4" y1="25" x2="46" y2="25" />
                        <line class="svg__search svg__search--handle st00" x1="34.73" y1="34.73" x2="46" y2="46"/>
                        <circle class="svg__search svg__search--circle st11" cx="22" cy="22" r="18"/>
                    </svg>
                </button>
                <!-- LOGO -->
                <a class="logo__wrapper" href="<?php echo get_link_by_slug("home"); ?>">
                    <?php get_template_part('templates/header/svg', 'logo');?>
                </a>
                <!-- HAMBURGER -->
                <div class="hamburger-wrapper">
                    <div id="hamburger" class="hamburger">
                        <?php get_template_part('templates/header/svg', 'hamburger');?>
                    </div>
                </div>
                <!--Connect With Us-->
                <div class="header__block header__block--social">
                    <span class="header__text">Connect With Us</span>
                    <div class="header__buttons">
                        <!-- Contact Page -->
                        <a class="button button--blue header__button header__button--social" title="Contact Us" href="/contact-us/">
                            <?php get_template_part('templates/header/svg', 'contact-us');?>
                        </a>
                        <!-- Facebook -->
                        <a class="button button--blue header__button header__button--social" title="Facebook" target="_blank" href="https://www.facebook.com/ProjectTEACHNY/">
                            <?php get_template_part('templates/header/svg', 'facebook');?>
                        </a>
                        <!-- LinkedIn -->
                        <a class="button button--blue header__button header__button--social" title="LinkedIn" target="_blank" href="https://www.linkedin.com/company/project-teach-new-york/">
                            <?php get_template_part('templates/header/svg', 'linkedin');?>
                        </a>
                    </div>
                </div>
                <!--Translate Page-->
                <div class="header__block header__block--translate">
                    <span class="header__text">Translate Page</span>
                    <div class="header__svg--translate">
                        <?php get_template_part('templates/header/svg', 'translate');?>
                        <!-- The Translate API uses the below div -->
                        <div id="google_translate_element"></div>
                    </div>
                </div>
                <!--CTA Buttons - Consultation & My CME-->
                <div class="header__block header__block--buttons">
                    <a class="button header__button header__button--text button--blue" title="My CME"  style="margin-right:10px;" href="https://lms.projectteachny.org/" class="btn-blue">My CME</a>
                    <a class="button header__button header__button--text button--purple" title="Request Services" href="/contact-us" class="btn-purple">Request Services</a>
                </div>
            </header>
            </div>

            <!--Navbar links and hamburger toggle || Sticky Nav on scroll-->
            <nav id="myLinks" class="navbar navbar-default" role="navigation">
                    <a id="nav-logo" href="/" class="navbar-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-graphic-head.svg" alt="Project TEACH" title="Project TEACH" />
                    </a>
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location'    => 'primary',
                                'depth'             => 2,
                                'container'         => 'div',
                                'container_class'   => 'collapse navbar-collapse',
                                'menu_class'        => 'nav nav-new navbar-nav',
                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'            => new WP_Bootstrap_Navwalker()
                            )
                        );
                    ?>
                    <button class="search-wrapper search-wrapper--desktop">
                        <svg id="desktop-search" class="search" viewBox="0 0 50 50">                    
                            <line id="hamburger-mid" class="svg__hamburger svg__hamburger--mid nav-icon" x1="4" y1="25" x2="46" y2="25" />
                            <line id="hamburger-mid2" class="svg__hamburger svg__hamburger--mid2 nav-icon" x1="4" y1="25" x2="46" y2="25" />
                            <line class="svg__search svg__search--handle st00" x1="34.73" y1="34.73" x2="46" y2="46"/>
                            <circle class="svg__search svg__search--circle st11" cx="22" cy="22" r="18"/>
                        </svg>
                </button>
            </nav>

            <div id="search-dropdown" class="search-dropdown">
                <form role="search" method="get" action="/" class="contect_search">
                    <input id="searchtextBox_2" class="search" placeholder="Type to search" value="" name="s" type="search" tabindex="3">
                    <button class="search-submit" type="submit" title="Search" tabindex="4"></button>
                </form>
            </div>
        <!-- </div> -->
    </div>
    
<?php get_template_part('templates/hero/content', 'hero'); ?>