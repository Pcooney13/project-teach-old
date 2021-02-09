<?php require_once('header.php'); ?>
<div class="privacy-plcy">
<?php require(dirname(__FILE__)."/breadcrumbs.php"); ?>
	<div class="privacy-policy-content">
		<div class="container">
			<div class="row">
				<?php while ( have_posts() ) : the_post(); ?>
				<?php 	//the_content(); ?>
				<a href="#" class="btn signup" data-toggle="modal" data-target="#signup">Signup</a>
				<div class="formContainer"><iframe id="signupformframe" width="100%" height="700" src="/wp-content/themes/project-teach/infusion.html?<?php echo filemtime('/wp-content/themes/project-teach/infusion.html'); ?>" frameborder="0" encrypted-media" allowfullscreen></iframe></div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>
<div class="modal" id="signup" tabindex="-1" role="dialog" aria-labelledby="welcome-modal-Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="xout" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="welcome-modal-label">Get Involved with Project TEACH</h4>
      </div>
      <div class="modal-body">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe id="signupformframe" width="100%" height="700" src="/wp-content/themes/project-teach/infusion.html?<?php echo filemtime('/wp-content/themes/project-teach/infusion.html'); ?>" frameborder="0" encrypted-media" allowfullscreen></iframe>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning xout" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php require_once('footer.php'); ?>