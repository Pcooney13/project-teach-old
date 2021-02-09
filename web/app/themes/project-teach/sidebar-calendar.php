<!-- Theme sidebar -->

<style>
/* calendar widget */
#wp-calendar {width: 99%; margin:0 auto; }
#wp-calendar caption { text-align: center; color: #333; font-size: 18px; margin-top: 10px; margin-bottom: 15px; }
#wp-calendar thead { font-size: 10px; }
#wp-calendar thead th { padding-bottom: 10px; text-align:center; }
#wp-calendar tbody { color: #aaa; }
#wp-calendar tbody td { background: #f5f5f5; border: 1px solid #fff; text-align: center; padding:8px;}
#wp-calendar tbody td:hover { background: #fff; }
#wp-calendar tbody .pad { background: none; }
#wp-calendar tfoot #next { font-size: 10px; text-transform: uppercase; text-align: right; }
#wp-calendar tfoot #prev { font-size: 10px; text-transform: uppercase; padding-top: 10px; }

.sidebar__text {
    padding:15px;
}
.btn-wrap {
    padding:15px;
}
.rs-btn {
    width:100%;
}
</style>

<aside role="complementary">
    <div class="sidebars sidebars__sticky">

        <section class="sidebar sidebar__authors">
            <h3 class="sidebar__header">Posts By Month</h3>
            <?php get_calendar(); ?>
        </section>

		<?php
        //get 6 most recent posts
		$args = array( 
			'post_type' 	 => 'events', 
			'posts_per_page' => '5',
			'post__not_in'   => array(get_the_ID())
		);
        $sidebar_posts = new WP_Query($args);
		//Display Recent Posts
		if($sidebar_posts->have_posts()) : ?>
            <section class="sidebar sidebar__recent">
                <h3 class="sidebar__header">Recent Added Events</h3>
                <ul class="sidebar__list">
					<?php while($sidebar_posts->have_posts()) : $sidebar_posts->the_post(); ?>
                        <li class="sidebar__list-item">

                            <?php 
                                $date_string = get_field('date');
                                $date = DateTime::createFromFormat('Ymd', $date_string);
                            ?>

                            <p class="post__date post__date--sidebar"><?php echo $date->format('M j, Y'); ?></p>
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
                    <?php if ( $cat->slug === 'mmhi-consultation' || $cat->slug === 'telehealth-webinar' ): ?>
                        <?php $cat_color = get_field('category_color', 'category_'.$cat->term_id); 
                            if (!$cat_color) {$cat_color = '#039fda'; }
                        ?>

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

        <section class="sidebar">
        <h3 class="sidebar__header">Clinical Rating Scales</h3>
        <p class="sidebar__text">evidence-based questionnaires and rating scales in your primary care practice. They are free downloads in PDF format.</p>
        <div class="btn-wrap">
            <a style="background:#039fda;" class="btn btn-blue rs-btn" href="/rating-scales">View Rating scales</a>
        </div>
        </section>



    </div>
</aside>