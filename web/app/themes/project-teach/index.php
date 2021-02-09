<?php require_once('header.php'); ?>

	<div class="privacy-plcy">
	<?php require(dirname(__FILE__)."/breadcrumbs.php"); ?>
		<div class="privacy-policy-content">
			<div class="container">
				<div class="row">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php 	the_content(); ?>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
	
<?php require_once('footer.php'); ?>