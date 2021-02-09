<?php require_once('header.php'); ?>

<style>
	.disclaimer__info {
		border:2px solid #7bbf43;
		padding:20px;
		margin:20px 0;
		background-color: rgba(123, 191, 67, .1);
	}
</style>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if (get_the_content()) : ?>
					<div class="disclaimer__info">
						<?php 	the_content(); ?>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
			<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/shell.js"></script>
			<script>
				hbspt.forms.create({
					portalId: "6907681",
					formId: "5ba24d67-b65c-44d3-9ec3-8e0514821a98"
				});
			</script>
		</div>
	</div>
</div>

<?php require_once('footer.php'); ?>