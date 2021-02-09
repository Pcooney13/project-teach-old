<?php /* Template Name: Courses Template */

  require_once('header.php');
  require_once('lib/ethos/ethos-functions.php'); 

?>

<div style="clear: both;"></div>
<?php require(dirname(__FILE__)."/breadcrumbs.php"); ?>
<section class="up-event-wrap">
    <div class="container-fluid container">
      <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 slide-cover">
        <h2 style="font-size: 48px;color: #000;font-weight: 900;letter-spacing: 1px;line-height: 3rem;margin: 0 0 28px 0;">
        	Live and Online Trainings
        </h2>
        <p> Project TEACH offers training in several different formats for pediatric primary care providers (PCPs). These programs support your ability to assess, treat and manage mild-to-moderate mental health concerns in your practice. Scroll through our online courses below, or access our Course Catalog by clicking <a href="https://lms.projectteachny.org/">here</a>.</p>
        <a style="margin-bottom:30px;margin-top:16px;" title="My CME" href="https://lms.projectteachny.org/" class="btn btn-green">Sign up for CME</a>
        <?php 
          echo getEthosSlider();
        ?>
      </div>
      </div>
    </div>
  </section>
</div>
<?php require_once('footer.php'); ?>
