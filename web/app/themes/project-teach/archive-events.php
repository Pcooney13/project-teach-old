<?php require_once(dirname(__FILE__).'/header.php'); ?>

<style>
    main {
        display:flex;
        flex-direction:column;
    }
    .events__background-color {
        background-color: #f2f2f2;
    }
    .wrap__events .sidebar {
        background-color:#fff;
        box-shadow:0px 10px 20px #ddd;
    }
    .event__card-wrap {
        margin-bottom:30px;
        position:relative;
    }
    .event__card-wrap.featured {
        order:-1!important;
    }
    .event__card-wrap.featured .event__card {
        border: 3px solid #FFC107;
        background: linear-gradient(270deg, #ffeb3b61 0%, white 50%);
    }
    .event__card-wrap.passed:last-child {
        margin-bottom:0;
    }
    .event__card {
        background-color:#fff;
        padding:3%;
        display:flex;
        font-family: sans-serif;
        justify-content:center;
        box-shadow:0px 10px 20px #ddd;
    }
    .event__card:last-child {
        margin-bottom:0;
    }
    .event__content {
        flex:1;
    }

    .event__image-wrap {
        width:220px;
        min-height:200px;
        margin-left:auto;
        position:relative;
        margin-left:5%;
        max-height: 225px;
    }
    .event__image-overlay {
        height:100%;
        width:100%;
        background-color:rgba(0,0,0,0.25);
        transition:all .5s ease-in-out;
        position:absolute;
    }
    .event__image-overlay:hover {
        background-color:rgba(0,0,0,0);
    }
    .event__image {
        background-position:center;
        background-size:cover;
        height:100%;
    }
    .event__header {
        display:flex;
        align-items:center;
    }
    .event__category {
        color: #039fda;
        text-transform: uppercase;
        font-family: sans-serif;
        letter-spacing: 1px;
    }
    .event__regions{
        display: flex;
        align-items: center;
        margin-left:auto;
    }
    .event__regions span {
        color:#333;
        margin-right:8px;
        font-family:sans-serif;
    }
    .region__link {
        margin-right: 10px;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
        border-radius: 50%;
        color: white;
        transition: all .5s ease-in-out;
        border: 2px solid transparent;
    }
    .region__link-1 {
        background-color:#039fda;
    }
    .region__link-1:hover {
        border:2px solid #039fda;
        color:#039fda;
        background-color:transparent
    }
    .region__link-2 {
        background-color:#4806a6;
    }
    .region__link-2:hover {
        border:2px solid #4806a6;
        color:#4806a6;
        background-color:transparent
    }
    .region__link-3 {
        background-color:#54b900;
    }
    .region__link-3:hover {
        border:2px solid #54b900;
        color:#54b900;
        background-color:transparent
    }
    .region__link:last-child {
        margin-right:0;
    }
    .event__title {
        color:#212121;
        margin:.75rem 0;
        font-family:sans-serif;
        transition:all .5s ease-in-out;
    }
    .event__title:hover {
        color:#4806a6;
    }
    .event__date {
        margin:.75rem 0;
        text-transform: uppercase;
        color:#999;
        font-family:sans-serif;
    }
    .event__location,
    .event__credits {
        margin:.5rem 0;
        padding-left:15px;
        color:#4806a6;
        display:flex;
        align-items:center;
        font-family:sans-serif;
    }
    .event__location img,
    .event__credits img {
        margin-right:15px;
        width:12px;
    }
    .event__hairline {
        width:50px;
        margin-left:0;
        border-top: 2px solid #420697;
    }
    .event__presenter {
        font-size:16px;
    }
    .event__readmore {
        font-size:14px; 
        text-align:center; 
        color:#039fda; 
        line-height:1;
        border: none;
        background: transparent;
        padding: 0;
        font-weight: 100;
        font-family: sans-serif;
        transform: translateY(5px);
    }
    .event__card-more {
        background-color:#fff;
        transform:translateY(-10px);
        transition:all .5s ease-in-out;
        overflow: hidden;
        max-height: 0;
        opacity: 0;
        padding: 0 3% 0 3%;   
        /* add browser prefixes */
        transition: all 0.5s ease;
    }
    .event__card-more.open {
        max-height: 800px;
        transform:translateY(0);
        opacity: 1;
        padding: 0 3% 3% 3%;
    }
    /* past event */
    .event__passed {
        opacity:.75;
    } 
    .event__passed .event__location img, .event__passed .event__credits img{
        filter: grayscale(1);
    }
    .event__passed .event__title,
    .event__passed .event__category,
    .event__passed .event__location,
    .event__passed .event__credits,
    .event__passed .event__readmore {
        color:#666!important;
    }
    .event__passed .event__image-overlay {
        font-size: 24px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: #666;
        background-color: rgba(255,255,255,.25);
    }
    @media (max-width:600px) {
        .event__card {
            flex-direction:column;
        }
        .event__image-wrap {
            margin-left:0;
        }
        .event__image-wrap {
            order: -1;
            height: 300px;
            width:100%;
            margin-bottom:3%;
        }
    }
</style>

<?php get_template_part("templates/blog/content", "top-banner"); ?>

<section class="blog-posts">
	<div class="events__background-color">
        <div class="wrap wrap__events">
			<main class="main cf" role="main">
                <!-- UPCOMING EVENTS -->
                <p id="past-title" style="text-align: center; margin-bottom: 20px; color: #4806a6; font-weight: bold; font-size: 24px;">Upcoming Events</p>
                
                <?php $args = array(
                    "posts_per_page" => -1,
                    "post_type" => 'events',
                    'meta_key' => 'start_date',
                    'orderby' => 'meta_value',
                    'order' => 'ASC',
                    'meta_query' => array(
                    array(
                        'key' => 'start_date',
                        'value' => date('Ymd'),
                        'compare' => '>=',
                    )
                    )
                );

                // the query
                $the_query = new WP_Query($args); ?>
                <?php if ($the_query->have_posts()) : ?>
                    <!-- Upcoming Events -->
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php $counter=1;
                        $oldEvent = false;
                        ?>
                        <!-- Start Events -->
            	        <div class="event__card-wrap <?php if (get_field('featured')) { echo ' featured '; } ?>">                
                	        <div class="card event__card">
                    	        <div class="event__content">
                        	        <div class="event__wrap">
                            	        <div class="event__header">
									        <?php
                                                $categories = get_the_category();
                                                if (! empty($categories)) : ?>
											        <div class="event__category"><?php echo esc_html($categories[0]->name); ?></div>
										        <?php endif;
                                            ?>
									        <?php $regions = get_field('regions'); ?>
									        <?php if ($regions['region_1'] || $regions['region_2'] || $regions['region_3']) : ?>
                                		        <div class="event__regions">
											        <span>Region</span>
											        <?php if (esc_attr($regions['region_1'])):?>
												        <a class="region__link region__link-1" href="#">1</a>
											        <?php endif; ?>
											        <?php if (esc_attr($regions['region_2'])):?>
                                    			        <a class="region__link region__link-2" href="#">2</a>
											        <?php endif; ?>
											        <?php if (esc_attr($regions['region_3'])):?>
                                    			        <a class="region__link region__link-3" href="#">3</a>
											        <?php endif; ?>
										        </div>
									        <?php endif; ?>
                            	        </div>
                            	        <a target="_blank" href="<?php the_field('registration_link'); ?>">
                                	        <h3 class="event__title"><?php the_title(); ?></h3>
								        </a>
                                        <?php
                                            $start_date = null;
                                            $end_date = null;
                                            $start_date_string = get_field('start_date');
                                            $end_date_string = get_field('end_date');
                                            if ($start_date_string) {
                                                $start_date = DateTime::createFromFormat('Ymd', $start_date_string);
                                            }
                                            if ($end_date_string) {
                                                $end_date = DateTime::createFromFormat('Ymd', $end_date_string);
                                            }
                                        ?>
								        <div class="event__date">
                                            <?php if ($start_date) {
                                            echo $start_date->format('M j, Y');
                                        } ?>
                                            <?php if ($end_date) {
                                            echo " - " . $end_date->format('M j, Y');
                                        } ?>
                                            <?php if (get_field('start_time')) { ?> @ <?php the_field('start_time'); } ?>
                                            <?php if (get_field('end_time')) { ?> - <?php the_field('end_time'); } ?>
                                        </div>								
								        <?php if (get_field('online_service') && get_field('online')):?>
									        <span class="event__location">
                                	            <img src="<?php echo get_template_directory_uri();?>/assets/images/map-icon.svg"><?php the_field('online_service');?>
								            </span>
                                        <?php elseif (get_field('location')):
                                            $location = get_field('location');
                                            $address = $location["street_number"] . " " . $location["name"] . "<br>" . $location["city"] . ", " . $location["state"] ." " . $location["post_code"];
                                            ?>
									        <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $address;?>" class="event__location">
                                                <img src="<?php echo get_template_directory_uri();?>/assets/images/map-icon.svg"><?php echo $address;?>
                                            </a>
								        <?php endif; ?>            
								        <?php if (get_field('credits')):?>
                            		        <div class="event__credits">
                                		        <img src="<?php echo get_template_directory_uri();?>/assets/images/token.svg">Credits: <?php the_field('credits'); ?> credits
									        </div>     
								        <?php endif; ?>                                              	        
                                	    <hr class="event__hairline">
									    <?php $featured_posts = get_field('consultant');
                                        if ($featured_posts) : ?>
                                		    <p class="event__presenter">
                                    		    <strong>Presenter: </strong>
                                    		    <?php the_field('name', $featured_posts->ID); ?>
										    </p>
										    <?php if (get_field('image', $featured_posts->ID)) :
                                                $featured_image = get_field('image', $featured_posts->ID);
                                            endif;
                                        endif;
                                        if (get_field('presenters')) : ?>
                                            <p class="event__presenter">
                                    		    <strong>Presenters: </strong>
										    </p>
                                            <div class="presenters">
                                                <?php the_field('presenters'); ?>
                                            </div>
                                        <?php endif; ?>                            	          
                        	        </div>
                                </div>
                                <?php if (has_post_thumbnail()): ?>                                    
                                    <a target="_blank" href="<?php the_field('registration_link'); ?>" class="event__image-wrap">
                        	            <div class="event__image-overlay"></div>
								        <div class="event__image" style="background-image:url('<?php the_post_thumbnail_url(); ?>');"></div>
                    	            </a>
						        <?php elseif ($featured_image):?>
                    	            <div class="event__image-wrap">
                        	            <div class="event__image-overlay"></div>
								        <div class="event__image" style="background-image:url('<?php echo $featured_image['url']; ?>');"></div>
                    	            </div>
						        <?php endif; ?>
                	        </div>
                        </div>
                        <?php $featured_posts = null; ?>
                        <?php $featured_image = null; ?>			   
                    <?php endwhile; ?>
                    <!-- end of the loop -->
                    <?php wp_reset_postdata(); ?>
                    <!-- Past Events -->                                 
                <?php endif; ?>         
                <p id="past-title" style="text-align: center; margin-bottom: 20px; color: #4806a6; font-weight: bold; font-size: 24px;">Past Events</p>

                <!-- PAST EVENTS -->
                <?php
$args = array(
    "posts_per_page" => -1,
    "post_type" => 'events',
    'meta_key' => 'start_date',
    'orderby' => 'meta_value',
    'order' => 'DESC',
    'meta_query' => array(
      array(
        'key' => 'start_date',
        'value' => date('Ymd'),
        'compare' => '<',
      )
    )
);

// the query
$the_query = new WP_Query($args); ?>
 
<?php if ($the_query->have_posts()) : ?>
  
    <!-- Upcoming Events -->
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <?php $counter=1;
                        $oldEvent = false;
                        // Flag Events that have passed
                        if (get_field('start_date') < date('Ymd')) :
                            if (!$pastTitleAdded) : ?>
                                <?php $pastTitleAdded = true;?>
                            <?php endif; ?>
                            <?php $oldEvent = true; ?>
                        <?php endif; ?>
                        <!-- Start Events -->
            	        <div class="event__card-wrap <?php if (get_field('featured')) {
                                echo ' featured ';
                            } if ($oldEvent) {
                                echo 'passed"';
                            }
                            ?>">                
                	        <div class="card card-<?php echo $counter; if ($oldEvent) {
                                echo ' event__passed';
                            } else {
                                echo '';
                            }?> event__card">
                    	        <div class="event__content">
                        	        <div class="event__wrap">
                            	        <div class="event__header">
									        <?php
                                                $categories = get_the_category();
                            
                                                if (! empty($categories)) : ?>
											        <div class="event__category"><?php echo esc_html($categories[0]->name); ?></div>
										        <?php endif;
                                            ?>
									        <?php $regions = get_field('regions'); ?>
									        <?php if ($regions['region_1'] || $regions['region_2'] || $regions['region_3']) : ?>
                                		        <div class="event__regions">
											        <span>Region</span>
											        <?php if (esc_attr($regions['region_1'])):?>
												        <a class="region__link region__link-1" href="#">1</a>
											        <?php endif; ?>
											        <?php if (esc_attr($regions['region_2'])):?>
                                    			        <a class="region__link region__link-2" href="#">2</a>
											        <?php endif; ?>
											        <?php if (esc_attr($regions['region_3'])):?>
                                    			        <a class="region__link region__link-3" href="#">3</a>
											        <?php endif; ?>
										        </div>
									        <?php endif; ?>
                            	        </div>
                            	        <a href="<?php the_field('registration_link'); ?>" target="_blank">
                                	        <h3 class="event__title"><?php the_title(); ?></h3>
								        </a>
                                        <?php
                                            $start_date = null;
                                            $end_date = null;
                                            $start_date_string = get_field('start_date');
                                            $end_date_string = get_field('end_date');
                                            if ($start_date_string) {
                                                $start_date = DateTime::createFromFormat('Ymd', $start_date_string);
                                            }
                                            if ($end_date_string) {
                                                $end_date = DateTime::createFromFormat('Ymd', $end_date_string);
                                            }
                                        ?>
								        <div class="event__date">
                                            <?php if ($start_date) {
                                            echo $start_date->format('M j, Y');
                                        } ?>
                                            <?php if ($end_date) {
                                            echo " - " . $end_date->format('M j, Y');
                                        } ?>
                                            <?php if (get_field('start_time')) { ?> @ <?php the_field('start_time'); } ?>
                                            <?php if (get_field('end_time')) { ?> - <?php the_field('end_time'); } ?>
                                        </div>								
								        <?php if (get_field('online_service')):?>
									        <span class="event__location">
                                	            <img src="<?php echo get_template_directory_uri();?>/assets/images/map-icon.svg"><?php the_field('online_service');?>
								            </span>
                                        <?php elseif (get_field('location')):
                                            $location = get_field('location');
                                            $address = $location["street_number"] . " " . $location["name"] . "<br>" . $location["city"] . ", " . $location["state"] ." " . $location["post_code"];
                                            ?>
									        <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $address;?>" class="event__location">
                                                <img src="<?php echo get_template_directory_uri();?>/assets/images/map-icon.svg"><?php echo $address;?>
                                            </a>
								        <?php endif; ?>            
								        <?php if (get_field('credits')):?>
                            		        <div class="event__credits">
                                		        <img src="<?php echo get_template_directory_uri();?>/assets/images/token.svg">Credits: <?php the_field('credits'); ?> credits
									        </div>     
								        <?php endif; ?>                  
                                	    <hr class="event__hairline">
                                        
                                        <?php $featured_posts = get_field('consultant');
                                            if ($featured_posts) : ?>
                                		        <p class="event__presenter">
                                    		        <strong>Presenter: </strong>
                                    		        <?php the_field('name', $featured_posts->ID); ?>
										        </p>
										        <?php if (get_field('image', $featured_posts->ID)) :
                                                    $featured_image = get_field('image', $featured_posts->ID);
                                                endif;
                                            endif;
                                            if (get_field('presenters')) : ?>
                                                <p class="event__presenter">
                                    		        <strong>Presenters: </strong>
										        </p>
                                                <div class="presenters">
                                                    <?php the_field('presenters'); ?>
                                                </div>
                                            <?php endif; ?>
                        	        </div>
                                </div>
                                <?php if (has_post_thumbnail()): ?>                                    
                                    <a target="_blank" href="<?php the_field('registration_link'); ?>" class="event__image-wrap">
                        	            <div class="event__image-overlay">
							            </div>
								        <div class="event__image" style="background-image:url('<?php the_post_thumbnail_url(); ?>');"></div>
                    	            </a>
						        <?php elseif ($featured_image):?>
                    	            <div class="event__image-wrap">
                        	            <div class="event__image-overlay">
							            </div>
								        <div class="event__image" style="background-image:url('<?php echo $featured_image['url']; ?>');"></div>
                    	            </div>
						        <?php endif; ?>
                	        </div>
                	        <div id="card-more-<?php echo $counter; ?>" class="event__card-more">
                    	        Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque ipsum inventore iste aliquid delectus enim modi debitis deleniti dignissimos tempore voluptatum earum, nobis est voluptate sunt facere odio placeat minus.
                	        </div>
                        </div>
                        <?php $featured_posts = null; ?>
                        <?php $featured_image = null; ?>
                        <?php $counter++;?>				   
    <?php endwhile; ?>
    <!-- end of the loop -->
    <?php wp_reset_postdata(); ?>
    <!-- Past Events -->

<?php endif; ?> 

			</main>
			<aside role="complementary">
                <?php get_sidebar('events');?>
			</aside>
		</div>
	</div>
</section>

<?php require_once(dirname(__FILE__).'/footer.php'); ?>