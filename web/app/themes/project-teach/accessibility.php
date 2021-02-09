<?php /* Template Name: Accessiblty Template */ ?>
<?php require_once('header.php'); ?>
<div class="accessablty">
<?php require(dirname(__FILE__)."/breadcrumbs.php"); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php 	the_content(); ?>
<?php endwhile; ?>
</div>
<?php require_once('footer.php'); ?>
