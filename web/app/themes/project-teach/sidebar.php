<!-- Theme sidebar -->
<aside role="complementary">
    <div class="sidebars sidebars__sticky">
		<?php
        //get 6 most recent posts
		$args = array( 
			'post_type' 	 => 'post', 
			'posts_per_page' => '5',
			'post__not_in'   => array(get_the_ID())
		);
        $sidebar_posts = new WP_Query($args);
		//Display Recent Posts
		if($sidebar_posts->have_posts()) : ?>
            <section class="sidebar sidebar__recent">
                <h3 class="sidebar__header">Recent Posts</h3>
                <ul class="sidebar__list">
					<?php while($sidebar_posts->have_posts()) : $sidebar_posts->the_post(); ?>
                        <li class="sidebar__list-item">
                            <p class="post__date post__date--sidebar"><?php the_time('m/j/y'); ?></p>
                            <div class="post__category post__category--sidebar" href="#">
                                <?php 
                                    $categories = get_the_category();
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
                            <a class="post__title post__title--sidebar" href="<?php echo the_permalink();?>"><?php the_title() ?></a>
						</li>
					<?php endwhile; ?>                        			
                </ul>
			</section>
		<?php endif; ?>

        <section class="sidebar sidebar__authors">
            <h3 class="sidebar__header">Posts By Categories</h3>
            <ul class="sidebar__list">
                <?php foreach (get_categories( $args ) as $cat) : ?>
                    <!-- Don't display "Special Topics" -->
                    <?php if ( $cat->slug === 'covid-19' || $cat->slug === 'family-resources' || $cat->slug === 'newsletters' ): ?>
                        <?php $cat_color = get_field('category_color', 'category_'.$cat->term_id); ?>
                        <li class="sidebar__list-item">

                            <?php if (get_category_link($cat->term_id) === "https://projectteachny.org/category/special-topics/covid-19/" || get_category_link($cat->term_id) === "http://project-teach.launchpaddev.com/category/special-topics/covid-19/"):
                                $categoryLink = '/covid';
                            else:
                                $categoryLink = get_category_link($cat->term_id);
                            endif;?>

                            <a class="author" href="<?php echo $categoryLink; ?>">
                                <?php if ($cat_color) : ?>
                                    <div class="category__color" style="background-color:<?php echo $cat_color;?>"></div>
                                <?php endif;?>
                                <p class="author__name"><?php echo $cat->cat_name; ?></p>
                            </a>
                        </li>
                    <?php endif;?>
                <?php endforeach; ?>
            </ul>
        </section>

           

    </div>
</aside>