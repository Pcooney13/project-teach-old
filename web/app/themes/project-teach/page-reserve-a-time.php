<?php require_once('header.php'); ?>

<?php get_template_part("templates/hero/content", "hero"); ?>

<div class="privacy-plcy">
    <?php require(dirname(__FILE__) . "/breadcrumbs.php"); ?>
    <div class="privacy-policy-content">
        <div class="container">
            <div class="row">
                <?php echo do_shortcode("[ea_standard]"); ?>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>