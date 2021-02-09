<!-- DEV SITE -->
<style>
    .text-blue {color:#039fda!important;}
    .text-green {color:#54b900!important;}
    .text-purple {color:#4806a6!important;}
    .text-orange {color:#e09b3d!important;}
    .bg-blue {background-color:#039fda!important;}
    .bg-green {background-color:#54b900!important;}
    .bg-purple {background-color:#4806a6!important;}
    .bg-orange {background-color:#e09b3d!important;}
    .border-color-blue {border: 2px solid #039fda!important;}
    .border-color-green {border: 2px solid #54b900!important;}
    .border-color-purple {border: 2px solid #4806a6!important;}
    .border-color-orange {border: 2px solid #e09b3d!important;}

    .event-creds p {
        font-size:14px; 
        margin-bottom:16px; 
        line-height:1.5; 
        padding:0 15px;
    }
    main {
        display:flex;
        flex-direction:column;
    }
    .follow-up-list p {
        display:inline;
        font-size:16px;
        font-family:sans-serif;
        font-weight:500;
    }
    .follow-up-list strong {
        min-width:116px;
    }
    .event__presenters p {margin-bottom:20px; line-height:1.25;}
    .events__background-color {
        background-color: #f2f2f2;
    }

    .wrap__events .sidebar {
        background-color:#fff;
        box-shadow:0px 10px 20px rgba(0,0,0,0.25);
    }
    .event__card-wrap {
        margin-bottom:30px;
        position:relative;
    }
    .event__card-wrap:last-child {
        /* margin-bottom:0; */
    }
    .event__card-wrap.passed {
        /* order:2; */
    }
    .event__card-wrap.featured {
        order:-1!important;
    }
    .event__card-wrap.featured .event__card {
        border: 3px solid #FFC107;
        background: linear-gradient(270deg, #ffeb3b61 0%, white 50%);
    }
    .event__card-wrap.passed:last-child {
        /* margin-bottom:0; */
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
        max-height:220px;
        margin-left:auto;
        position:relative;
        margin-left:5%;
    }
    .event__image-overlay {
        height:100%;
        width:100%;
        background-color:rgba(0,0,0,0.25);
        transition:all .5s ease-in-out;
        position:absolute;
    }
    /* .event__image-overlay:hover {
        background-color:rgba(0,0,0,0);
    } */
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
        /* color:#4806a6; */
    }
    .event__date {
        margin:.75rem 0;
        text-transform: uppercase;
        color:#999;
        font-family:sans-serif;
    }
    .event__location,
    .event__credits {
        margin:.25rem 0;
        padding-left:15px;
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
    .presenters {
        padding-left:20px;
        margin-bottom:20px;
    }
    .presenters p {
        font-size:14px;
        line-height:1.5;
    }
    @media (max-width:600px) {
        .event__card {
            flex-direction:column;
        }
        .event__image {
            background-position:bottom;
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

<style>
    .btn-white-blue {
        color:#039fda;
        border: 2px solid #039fda;
    }
    .btn-white-blue:hover {
        background:#039fda;
    }
    .bg-lightpurple {
        background:rgba(58, 14, 121, 0.1);
    }
    .event__wp-content {
        padding:15px; width:100%;
    }
    .event__wp-content h3 {
        width:100%;
        margin-bottom:15px;
        line-height:1.5;
        margin-top:0;
        font-weight: bold;
        font-size: 24px;
    }
    .event__wp-content h3:not(:first-child) {
        margin-top:30px;
    }
    .event__wp-content p {
        width:100%;
        padding-bottom: 15px;
    }
    .event__wp-content ul {
        width:100%;
        margin-left: 15px;
    }
    .event__wp-content li {
        font-size: 18px;
        font-family: "Helvetica", sans-serif;
        line-height: 30px;
        font-weight: 300;
        padding: 0;
    }
</style>
<?php 
$fu_text = get_field('follow_up_text');
$fu_link = get_field('follow_up_link');
$event_creds =  get_field('accreditation');
?>


<section class="blog-posts">
	        <div class="events__background-color">                
                <div style="display:block;" class="wrap wrap__events">
			        <main style="margin:0 auto; max-width:unset;" class="main cf" role="main">
                        <h2 style="font-size: 48px; text-align:center; color: #000;font-weight: 900;letter-spacing: 1px;">
	                        <?php the_title();?>
                        </h2>
                    <div style="width:100%; padding:20px; background:#3a0e79; display:flex; align-items:center;">
                        <ul style="list-style:none; font-size:20px; color:white;">
                            <li style="margin-bottom:8px;"><strong style="color:#039fda;">Step 1: </strong>Register and attend the Intensive Training</li>
                            <li style="margin-bottom:8px;"><strong style="color:#039fda;">Step 2: </strong>Learn how to implement what you've learned into your daily practice</li>
                            <li style="margin-bottom:8px;"><strong style="color:#039fda;">Step 3: </strong>Increase your application knowledge and earned credits through follow-up sessions</li>
                        </ul>
                    </div>
                        <?php                     
                        // Find event Regions for colors
                        $regions = get_field('regions'); 
                        if ($regions) : 
                            if (esc_attr( $regions['region_1'] ) && esc_attr( $regions['region_2'] ) || esc_attr( $regions['region_1'] ) && esc_attr( $regions['region_3'] ) || esc_attr( $regions['region_2'] ) && esc_attr( $regions['region_3'] )) :
                                $currentRegion = "orange";
						    elseif (esc_attr( $regions['region_1'] )):
							    $currentRegion = "blue";
						    elseif (esc_attr( $regions['region_2'] )):
                        	    $currentRegion = "purple";
						    elseif (esc_attr( $regions['region_3'] )):
                        	    $currentRegion = "green";
						    endif;
                        endif; ?>                        
                        <!-- Start Events -->                        
            	        <div class="event__card-wrap <?php if(get_field('featured')) { echo ' featured';} ?>">                
                	        <div style="flex-wrap:wrap;" class="card event__card">
                    	        <div style="display:flex;" class="event__content">
                                    <!-- Credits -->
                                    <?php if(false && get_field('credits')):?>
                            		    <div class="bg-<?php echo $currentRegion; ?>" style="height:72px; min-width:72px; margin-right:15px; width:60px; border-radius:50%; flex-direction:column; color:white; font-weight:900; display:flex; justify-content:center; align-items:center; text-align:center;">
                                	        <span style="margin:0; line-height:1;"><strong style="font-size:21px;"><?php the_field('credits'); ?></strong></span>
                                            <span style="margin:0; line-height:1;">credits</span>
									    </div>     
                                    <?php endif; ?> 
                        	        <div class="event__wrap">
                                        <!-- Regions -->
                                        <?php $regions = get_field('regions'); ?>
									    <?php if ($regions) : ?>
                                		    <div style="float:right; padding-left:15px;" class="event__regions">
											    <span>Regions</span>
											    <?php if (esc_attr( $regions['region_1'] )):?>
												    <a class="region__link region__link-1" href="#">1</a>
											    <?php endif; ?>
											    <?php if (esc_attr( $regions['region_2'] )):?>
                                    			    <a class="region__link region__link-2" href="#">2</a>
											    <?php endif; ?>
											    <?php if (esc_attr( $regions['region_3'] )):?>
                                    			    <a class="region__link region__link-3" href="#">3</a>
											    <?php endif; ?>
										    </div>
									    <?php endif; ?>
                                        <!-- Title -->
                            	        <a href="<?php the_field("registration_link"); ?>">
                                	        <h3 style="margin-top:0; max-width:550px; font-weight: bold; font-size: 24px;" class="event__title"><?php the_field('it_title'); ?></h3>
								        </a>
                                        <!-- Date & Time Variable-->
                                        <?php 
                                            $start_date = NULL;
                                            $end_date = NULL;
									        $start_date_string = get_field('start_date');
									        $end_date_string = get_field('end_date');
                                            if ($start_date_string) {
                                                $start_date = DateTime::createFromFormat('Ymd', $start_date_string);
                                            }
                                            if ($end_date_string) {
                                                $end_date = DateTime::createFromFormat('Ymd', $end_date_string);
                                            }
								        ?>
                                        <!-- Date & Time -->
								        <div style="padding-bottom:5px;" class="event__date">
                                            <!-- Day 1 Date & Time -->
                                            <?php if ($start_date) { echo $start_date->format('M j, Y'); } ?>
                                            <?php if (get_field('start_time')) { ?> @ <?php the_field('start_time'); } ?>
                                            <?php if (get_field('end_time'))  { ?> - <?php the_field('end_time'); } ?>
                                            <!-- Day 2 Date & Time -->
                                            <?php if ($end_date) { echo "<br>" . $end_date->format('M j, Y'); } ?>
                                            <?php if (get_field('start_time_2')) { ?> @ <?php the_field('start_time_2'); } ?>
                                            <?php if (get_field('end_time_2'))  { ?> - <?php the_field('end_time_2'); } ?>
                                        </div>
                                        <!-- Presenters -->
                                        <div class="event__presenters"><?php the_field('presenters'); ?></div>

                                        <div style="display:flex;">	
                                            <!-- Online Callout -->
								            <?php if(get_field('online_service')):?>
									            <div class="event__location text-<?php echo $currentRegion;?>">
                                	                <img src="<?php echo get_template_directory_uri();?>/assets/images/map-icon.svg"><?php the_field('online_service');?>
								                </div>
                                            <!-- Location Callout -->
                                            <?php elseif(get_field('location')):
                                                $location = get_field('location'); 
                                                $address = $location["street_number"] . " " . $location["name"] . "<br>" . $location["city"] . ", " . $location["state"] ." " . $location["post_code"];
                                                ?>
									            <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $address;?>" class="event__location text-<?php echo $currentRegion;?>">
                                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/map-icon.svg"><?php echo $address;?>
                                                </a>
								            <?php endif; ?>                                                  
                                        </div>  
                                        <!-- Credits -->
                                        <?php if(false && get_field('credits')):?>
                            		        <div class="event__credits text-<?php echo $currentRegion;?>">
                                		        <img src="<?php echo get_template_directory_uri();?>/assets/images/token.svg"><?php the_field('credits'); ?> credits
									        </div>     
								        <?php endif; ?>
                                        <!-- Consultant (Post Object) -->
									    <?php $featured_posts = get_field('consultant');
									    if( $featured_posts ): ?>
                                		    <p class="event__presenter text-<?php echo $currentRegion;?>">
                                    		    <strong>Presenter: </strong>
                                    		    <?php the_field( 'name', $featured_posts->ID); ?>
										    </p>
										    <?php if (get_field('image', $featured_posts->ID)) {
											    $featured_image = get_field('image', $featured_posts->ID);
										    }
                                        endif; ?>
                        	        </div>
                                </div>
                                <!-- Image -->
                                <?php if(has_post_thumbnail()): ?>                                    
                                    <a href="<?php the_field("registration_link"); ?>" class="event__image-wrap">
                        	            <div class="event__image-overlay">
                                            
							            </div>
								        <div class="event__image" style="background-image:url('<?php the_post_thumbnail_url(); ?>');"></div>
                    	            </a>
                                <!-- Fallback Image -->
						        <?php elseif ($featured_image):?>
                    	            <a href="<?php the_field("registration_link"); ?>" class="event__image-wrap">
								        <div class="event__image" style="background-image:url('<?php echo $featured_image['url']; ?>');"></div>
                    	            </a>
                                <?php endif; ?>

                                <div class="event__wp-content">
                                    <h3 style="color: #3a0e79; text-align: center;">The 2021 Statewide Live Intensive Training Will Include a New Module Focusing on Trauma-Informed Care and The Impact of Trauma on Children’s Mental Health</h3>
                                </div>

                                <!-- Post Content -->
                                <div class="event__wp-content bg-lightpurple">
                                    <?php if (have_rows('text_content')):
                                        while (have_rows('text_content')) : the_row(); ?>
                                            <h3><?php the_sub_field('title'); ?></h3>
                                            <div>
                                                <?php the_sub_field('text');?>
                                            </div>
                                        <?php endwhile;
                                    endif; ?>
                                </div>

                                <!-- Module Topics -->
                                <div style="margin-top:15px; width:100%; padding-left: 20px;">   
                                    <?php if( have_rows('topics') ): 
                                        $numCounter = 1; ?>
                                        <!-- USES REGION TO COLOR CODE!! <p class="text-<?php echo $currentRegion;?>" style="background: white; z-index: 99; position: relative; display: inline-block; padding: 0 5px;"><strong><?php the_field('topics_title');?>:</strong></p> -->
                                        <p class="text-purple" style="background: white; z-index: 99; position: relative; display: inline-block; padding: 0 5px;"><strong><?php the_field('topics_title');?>:</strong></p>
                                        <!-- USES REGION TO COLOR CODE!! <div class="border-color-<?php echo $currentRegion;?>" style="display: flex; align-items:center; text-align:center; padding: 30px 20px; width:calc(100% + 15px); transform: translate(-15px, -15px);"> -->
                                        <div class="border-color-purple" style="display: flex; align-items:center; text-align:center; padding: 30px 20px; width:calc(100% + 15px); transform: translate(-15px, -15px);">
                                            <?php while( have_rows('topics') ) : the_row(); ?>
                                                <div style="margin-right:30px; display:flex; flex-direction:column; width:20%; max-width:200px; padding-bottom: 1rem;">
                                                    <span><strong>Topic <?php echo $numCounter;?></strong></span>
                                                    <?php the_sub_field('topic_name'); ?>
                                                </div>
                                                <?php $numCounter++; ?>
                                            <?php endwhile; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- Register / Print PDF Buttons -->
                                <div style="width:100%; margin:15px 0; text-align:right">
                                    <!-- Register -->
                                    <?php $link = get_field('reg_link');
                                    if ($link):
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                        ?>
                                        <!-- USES REGION TO COLOR CODE!! <a style="margin-right:10px;" class="btn btn-<?php echo $currentRegion;?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a> -->
                                        <a style="margin-right:10px;" class="btn btn-purple" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                    <?php endif; ?>
                                    <!-- Print PDF -->
                                    <?php $file = get_field('pdf_print');
                                    if ($file): ?>
                                        <!-- USES REGION TO COLOR CODE!! <a class="btn btn-orange" href="<?php echo $file['url']; ?>"><?php echo $file['title']; ?></a> -->
                                        <a class="btn btn-purple" href="<?php echo $file['url']; ?>"><?php echo $file['title']; ?></a>
                                    <?php endif; ?>
                                </div>
                                <!-- Event Schedule PDFs -->
                                <?php $day_1_file = get_field('day_1_pdf');
                                if ($day_1_file): ?>
                                    <p style="width:100%;">* View or print the full agenda for <a href="<?php echo $day_1_file['url']; ?>"><?php echo $day_1_file['title']; ?></a>
                                <?php endif; ?>
                                <?php $day_2_file = get_field('day_2_pdf');
                                if ($day_2_file): ?>
                                    and <a href="<?php echo $day_2_file['url']; ?>"><?php echo $day_2_file['title']; ?></a>
                                <?php endif; ?>
                                </p>                                
                                    
                                <?php if(get_field('follow_up_session_call_out')) : ?>
                                    <div style="margin-top:30px; padding:20px; border-left:5px solid #e09b3d;background:#fcf5eb;">
                                        <?php
                                        if (have_rows('follow_ups')):
                                            $fu_array = [];
                                            while (have_rows('follow_ups')) : the_row();
                                                $featured_post = get_sub_field('follow_up');
                                                if ($featured_post):
                                                    array_push($fu_array, $featured_post);?>
                                                <?php endif;
                                            endwhile;
                                        endif;
                                        ?>
                                    <?php
                                            $follow_up_args = array(  
                                                'post_type' => 'events',
                                                'post__in' => $fu_array,
                                                'posts_per_page' => 8,
                                                'meta_key' => 'start_date',
    			                                'orderby' => 'meta_value',
    			                                'order' => 'ASC',
                                            ); 
                                            $follow_up_loop = new WP_Query( $follow_up_args );
                                            $total = $follow_up_loop->found_posts; ?>
                                        <h3 style="width:100%; padding:15px; padding-top:0; padding-bottom:0; margin-bottom:0; line-height:1.5; margin-top:0; font-weight: bold; font-size: 24px;" class="event__title">
                                            <?php the_field('follow_up_title'); ?><br>
                                            <span style="font-size:21px;" class="text-<?php echo $currentRegion; ?>">
                                                <?php $fu_counter = 1;
                                                while ( $follow_up_loop->have_posts() ) : $follow_up_loop->the_post();
                                                $start_date = NULL;
                                                $start_date_string = get_field('start_date');
                                                if ($start_date_string) :
                                                    $start_date = DateTime::createFromFormat('Ymd', $start_date_string);
                                                        echo $start_date->format('F j');
                                                        if ($total != $fu_counter) {
                                                            echo ', ';
                                                        }
                                                    endif;
                                                    $fu_counter++;
                                                endwhile;?>                                                
                                            </span>
                                        </h3>
                                        <div style="padding:15px; padding-bottom:0;"><?php echo $fu_text; ?></div>
                                        <?php
                                        if ($fu_link):
                                            $fu_link_url = $fu_link['url'];
                                            $fu_link_title = $fu_link['title'];
                                            $fu_link_target = $fu_link['target'] ? $fu_link['target'] : '_self';
                                            ?>
                                            <div style="width:100%; text-align:right;">
                                                <a style="margin-top:15px; margin-left:15px;" class="btn btn-<?php echo $currentRegion;?>" href="<?php echo esc_url($fu_link_url); ?>" target="<?php echo esc_attr($fu_link_target); ?>"><?php echo esc_html($fu_link_title); ?></a>
                                            </div>
                                        <?php endif; ?>
                                        <p style="padding:15px;"><strong>One credit will be allotted for each follow-up session:</strong></p>                                        
                                        <ul class="follow-up-list" style="padding-left:40px; font-size:16px; width:100%;">
                                            <?php while ( $follow_up_loop->have_posts() ) : $follow_up_loop->the_post();    ?>
                                                <?php 
                                                    $start_date = NULL;
							                        $start_date_string = get_field('start_date');
                                                    if ($start_date_string) :
                                                        $start_date = DateTime::createFromFormat('Ymd', $start_date_string); ?>
                                                        <li style="margin-bottom:8px;">
                                                            <strong>
                                                                <?php echo $start_date->format('F j'); ?> - 
                                                            </strong>
                                                            <?php the_title();?>
                                                            <?php if (get_field('group_of_presenters')) { ?>
                                                                <?php echo ' | ' . get_field('presenters'); ?>
                                                            <?php } ?>
                                                        </li>
                                                    <?php endif; ?>
                                            <?php endwhile;?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                	        </div>                	        
                        </div>                        
                        <?php $featured_posts = NULL; ?>
                        <?php $featured_image = NULL; ?>    
                        <div class="event-creds">
                            <?php echo $event_creds; ?>
                        </div>                                    
			        </main>
		        </div>
	        </div>
        </section>