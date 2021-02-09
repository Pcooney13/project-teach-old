<?php require_once('header.php'); ?>

<?php get_template_part("templates/blog/content", "top-banner"); ?>

<section class="single-post">
		<div class="wrap">
			<main class="main" role="main">

				<?php if (have_posts()): ?>
					<?php while (have_posts()) : the_post(); ?>
					
						<?php // Author Variables
							$post_object = get_sub_field('author'); 
							$post = $post_object;
							setup_postdata($post);
								$author_image = get_field('image');
								$author_affliation = get_field('affliation');
								$author_id = get_the_ID();
								$author_blurb = get_field('blurb');
								$author = get_field('name');
								$author_content = get_the_content();
								$author_page = get_permalink();
							?>
							<div class="author author--about">
                    			<img src="<?php echo $author_image['url']; ?>" alt="<?php echo $author_image['alt']; ?>"
                    			class="author__image author__image--about">
                    			<div class="author__content">
                        			<p class="author__name author__name--about"><?php echo $author; ?></p> 
									<!-- Add in affliation eventually -->
									<!-- <p style="padding:0 0 20px; font-weight: 500; font-size: 15px; color: #aaa;" class="mmh-standard"><?php echo $author_affliation; ?></p> -->
									<?php if ($author_blurb): ?>
										<div class="author__blurb">
											<?php echo $author_blurb; ?> 
										</div>
									<?php else: ?>
										<div class="author__blurb">
											<?php echo $author_content; ?>
										</div>
									<?php endif; ?>
                        			</p>
                    			</div>
							</div>
							<?php wp_reset_postdata(); ?>
							<div class="post__content--featured">
								<?php the_content();?>
                    		</div>	
					<?php endwhile; ?>
				<?php endif; ?>

				<section id="similar-posts">
					<?php $args = array(
						'numberposts'	=> -1,
						'post_type'		=> 'post',
						'meta_query'	=> array(
							'relation'		=> 'OR',
							array(
								'key'		=> 'authors_$_author',
								'compare'	=> '=',
								'value'		=> get_the_ID(),
								)
								)
							);
							$the_query = new WP_Query( $args ); ?>
					<?php if( $the_query->have_posts() ): ?>
						<h3>Posts By <?php the_title();?></h3>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<? get_template_part("templates/blog/content", "post-list"); ?>
						<?php endwhile; ?>
					<?php endif; ?>
            	</section>

			</main>

			<?php get_sidebar();?>
	
	</div>
</section>

<?php require_once('footer.php'); ?>