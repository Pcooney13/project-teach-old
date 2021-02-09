<?php $categories = get_the_category(); ?>
<article id="post-<?php the_ID(); ?>" class="hide-date post post--list" id="post">
	<?php if(has_post_thumbnail()):?>
		<a class="post__image post__image--list" href="<?php the_permalink(); ?>"
			style="background-image:url('<?php the_post_thumbnail_url(); ?>');">
		</a>
	<?php else: ?>
		<a class="post__image post__image--list post__image--newsletter" href="<?php the_permalink(); ?>"
			style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/images/logo-graphic-head.svg);">										
			<p><?php the_time('M Y'); ?></p>
		</a>											
	<?php endif;?>                    
    <div class="post__content--list">
        <div class="post__category post__category--list">
			<?php 
            if ( ! empty( $categories ) ) :
                foreach( $categories as $category ) :
                    $cat_id = $category->cat_ID;
                    $color = get_field('category_color', 'category_'. $cat_id .'');?>
                        <a style="color:<?php echo $color; ?>;" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
                    <?php 
                // endif; ?>
                <?php endforeach; ?>
            <?php endif; 
        ?>
		</div>
		<?php 
			//concates Title to 50 characters
			$fifty_character_title = get_the_title();
			if (strlen($fifty_character_title) <= 70) {
				$fifty_character_title;
			} else {
				$fifty_character_title = substr($fifty_character_title, 0, 70) . '...';
			}
		?>
		<a href="<?php the_permalink(); ?>">
			<?php if (is_page('rating-scales')) : ?>
				<h3 class="post__title post__title--list"><?php the_title(); ?></h3>
			<?php else: ?>
				<h3 class="post__title post__title--list"><?php echo $fifty_character_title; ?></h3>
			<?php endif;?>
        </a>
		<p class="post__date post__date--list"><?php the_time('m/d/y'); ?></p>
		<?php if(is_page('rating-scales')) :
			if(get_the_excerpt()) {
				$excerpt = get_the_excerpt();
			}
		endif; ?>
		<?php if (have_rows('authors')): ?>
		<?php $author_count = count(get_field('authors'));?>
			<div class="author__list">
				<?php while (have_rows('authors')): the_row();
					// Author Variables
					$sim_post_object = get_sub_field('author'); 
					$post = $sim_post_object;
					setup_postdata( $post );

					$sim_author_image = get_field('image');
					$sim_author_blurb = get_field('blurb');
					$sim_size = 'thumbnail';
					$sim_author = get_field('name');
					$sim_author_content = get_the_content();
					$sim_author_page = get_permalink();
					if($sim_author) : ?>
                        <a class="author author--list" href="<?php echo $sim_author_page; ?>">
                            <img src="<?php echo $sim_author_image['url']; ?>" alt="<?php echo $sim_author_image['alt']; ?>" class="author__image"/>
                            <p class="author__name"><?php echo $sim_author; ?></p>
						</a>
					<?php endif; 
					if ($author_count === 2) :
					the_row();
					$sim_post_object = get_sub_field('author'); 
					$post = $sim_post_object;
					setup_postdata( $post );

					$sim_author_image = get_field('image');
					$sim_author_blurb = get_field('blurb');
					$sim_author = get_field('name');
					$sim_author_content = get_the_content();
					$sim_author_page = get_permalink();
					if($sim_author) : ?>
                        <a class="author author--list" href="<?php echo $sim_author_page; ?>">
                            <img src="<?php echo $sim_author_image['url']; ?>" alt="<?php echo $sim_author_image['alt']; ?>" class="author__image"/>
                            <p class="author__name"><?php echo $sim_author; ?></p>
						</a>
					<?php endif; ?>
					<?php endif; ?>
					<!-- Resets $post to single post authors fucking everything up -->
				<?php endwhile;?>
				<?php wp_reset_postdata(); ?>
				<?php if ($excerpt): ?>
					<p class="excerpt"><?php echo $excerpt; ?></p>
				<?php endif; ?>
											
			</div>
		<?php endif;?>

    </div>
</article>