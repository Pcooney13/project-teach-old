<?php
/* Template Name: mmh */
require_once('header.php');
?>

<style>
    h3.gform_title {
        display:none;
    }
    input {
        border:1px solid #d2d2d2;
        border-radius:5px;
    }
    .gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]) {
        padding:10px;
    }
    form span {
        font-family:'museo-sans', sans-serif;
    }
    .gform_wrapper label.gfield_label {
        font-size:18px;
        font-weight:300;
        
    }
    .gform_wrapper .gform_footer input.button, .gform_wrapper .gform_footer input[type=submit] {
        background:#039fda;
        width:100%;
        border:none;
        font-size:32px;
        padding:20px;
    }
    .gform_wrapper.gf_browser_chrome ul.gform_fields li.gfield select,
    .gform_wrapper textarea.medium {
        padding:10px;
        border:1px solid #d2d2d2;
        border-radius:5px;
    }
    .gform_wrapper.gf_browser_chrome .gfield_checkbox li input, .gform_wrapper.gf_browser_chrome .gfield_checkbox li input[type=checkbox], .gform_wrapper.gf_browser_chrome .gfield_radio li input[type=radio] {
        margin-top:0;
    }
    .gform_wrapper .gfield_checkbox li label {
        font-size:16px;
        font-weight:300;
    }
    .gform_wrapper .gsection.form__subtitle {
        margin:45px 0;
        color:#3a0e79;
    }
    .gform_wrapper .top_label li ul.gfield_checkbox, .gform_wrapper .top_label li ul.gfield_radio {
        padding:15px;
        padding-bottom:7px;
        border-radius:5px;
        border:1px solid #d2d2d2;
        background:white;
    }
    .gform_wrapper .gfield_required {
        color: #eb0000;
    }
</style>


<!-- Breadcrumbs -->
<?php require(dirname(__FILE__) . "/breadcrumbs.php"); ?>
<!-- Intro -->
<section class="mmh__section">
    <div class="container-fluid">
        <div class="row flex-row">
            <div class="col-sm-8" style="padding-top:30px; text-align:center; box-shadow:4px 4px 8px #ededed; background:#f7f7f7;">
                <h2 class="mmh__title" style="color:#3a0e79; text-align:center;">
                    Reserve Time For a Question
                </h2>
                <?php 
                    if ( have_posts() ) : 
                        while ( have_posts() ) : the_post(); 
                            the_content();
                        endwhile; 
                    endif; 
                ?>
            </div>
        </div>
    </div>
</section> 
<?php require_once('footer.php'); ?>