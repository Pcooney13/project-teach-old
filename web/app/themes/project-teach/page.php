<?php 
	require_once('header.php');
	require(dirname(__FILE__)."/breadcrumbs.php"); 
?>

<div class="container">
	<div class="row">
		<?php 
			// Post Content
			while ( have_posts() ) : the_post();
				the_content();
			endwhile;
			// Flexible Content
			if ( have_rows('content_blocks') ) :
				echo '<div class="content-blocks-bg">';
					while ( have_rows('content_blocks') ) : the_row();
						get_template_part( 'templates/content', 'blocks' );
					endwhile;
				echo '</div>';
			endif;
		?>
	</div>
</div>

<?php require_once('footer.php'); ?>
