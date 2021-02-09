<?php require_once('header.php'); ?>

<?php get_template_part("templates/blog/content", "top-banner"); ?>

<section>
	<div class="wrap">
		<main class="main" role="main">

			<?php 
				$args = array(
					'post_type' => 'syllabus',
					'post_per_page' => -1,
					'post_status' => 'publish',
					'orderby' => 'title',
					'order' => 'ASC'
				);
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) {
					echo '<div class="syllabus-archive-wrapper">';
				    while ( $the_query->have_posts() ) {
				        $the_query->the_post();
				        echo '<a href="' . get_the_permalink() . '" class="syllabus-post-wrapper">' . get_the_title() . '</a>';
				    }
				    echo '</div>';
				} else {
				    // no posts found
				}
				/* Restore original Post Data */
				wp_reset_postdata();
			?>
			
		</main>
	</div>
</section>

<?php require_once('footer.php'); ?>