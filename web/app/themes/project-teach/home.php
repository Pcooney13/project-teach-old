<?php require_once('header.php'); ?>

<?php get_template_part("templates/blog/content", "top-banner"); ?>

<section class="blog-posts">
	<div class="wrap">
		<main class="main" role="main">

			<?php if ( have_posts() ) : ?>

				<div class="post__list">
					<?php while ( have_posts() ) : the_post(); ?>      
						<? get_template_part("templates/blog/content", "post-list"); ?>
					<?php endwhile; ?>
					<?php the_posts_navigation(); ?>
				</div>

			<?php endif; ?>
			
		</main>
		<?php get_sidebar();?>
	</div>
</section>

<?php require_once('footer.php'); ?>