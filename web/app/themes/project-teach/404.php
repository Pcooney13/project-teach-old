<?php $titleOverride="Page Not Found"; require_once('header.php'); ?>
<div class="privacy-plcy">
<?php require(dirname(__FILE__)."/breadcrumbs.php"); ?>
	<div class="privacy-policy-content">
		<div class="container">
			<div class="row">
			<!-- article -->
			<article id="post-404">
				<h1><?php _e( 'Page not found', 'html5blank' ); ?></h1>
				<h2>
					<a href="<?php echo home_url(); ?>"><?php _e( 'Return home', 'html5blank' ); ?></a>
				</h2>
			</article>
			<!-- /article -->
			</div>
		</div>
	</div>
</div>
<?php require_once('footer.php'); ?>
