<?php require_once(dirname(__FILE__).'/header.php'); ?>

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
    main {
        display:flex;
        flex-direction:column;
    }
    .event__presenters p {margin-bottom:20px; line-height:1.25;}
    .events__background-color {
        background-color: #f2f2f2;
    }
    .btn {
        text-transform:uppercase;
    }
    .wrap__events .sidebar {
        background-color:#fff;
        box-shadow:0px 10px 20px #ddd;
    }
    .events__background-color li,
    .events__background-color span {
        font-family: museo-sans, sans-serif;
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
        .event__wp-content {
        padding:15px; width:100%;
    }
    .event__wp-content h3 {
        width:100%;
        margin-bottom:5px;
        line-height:1.5;
        margin-top:0;
        font-weight: bold;
        font-size: 24px;
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

<?php get_template_part("templates/blog/content", "top-banner"); ?>

<section class="blog-posts">
	<div class="events__background-color">
        <div style="display:block;" class="wrap wrap__events">
			<main style="margin:0 auto; max-width:unset;" class="main cf" role="main">
                <h2 style="font-size: 48px; text-align:center; color: #000;font-weight: 900;letter-spacing: 1px;">
	                Project TEACH 2020 Statewide Live Virtual Intensive Training
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
            	<div class="event__card-wrap <?php if (get_field('featured')) { echo ' featured'; } ?>">                
                	<div style="flex-wrap:wrap;" class="card event__card">
                    	<div style="display:flex;" class="event__content">
                            <!-- Credits -->
                            <?php if(get_field('credits')):?>
                            	<div class="bg-<?php echo $currentRegion; ?>" style="height:72px; min-width:72px; margin-right:15px; width:60px; border-radius:50%; flex-direction:column; color:white; font-weight:900; display:flex; justify-content:center; align-items:center; text-align:center;">
                                	<span style="margin:0; line-height:1;"><strong style="font-size:21px;"><?php the_field('credits'); ?></strong></span>
                                    <span style="margin:0; line-height:1;">credits</span>
								</div>     
                            <?php endif; ?> 
                            <!-- Text Content -->
                        	<div class="event__wrap">
                                <?php $regions = get_field('regions'); ?>
                                    <!-- Regions -->
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
                                	    <h3 style="margin-top:0; max-width:550px; font-weight: bold; font-size: 24px;" class="event__title"><?php the_title(); ?></h3>
								    </a>
                                    <!-- Date & Time -->
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
								    <div style="padding-bottom:5px;" class="event__date">
                                        NOV 1, 2020 @ 8:30 AM - 1:45 PM<br>NOV 2, 2020 @ 8:30 AM - 2:00 PM
                                        <?php if (1===3 && $start_date) { echo $start_date->format('M j, Y'); } ?>
                                        <?php if (1===3 && $end_date) { echo " - " . $end_date->format('M j, Y'); } ?>
                                        <?php if (1===3 && get_field('start_time')) { ?> @ <?php the_field('start_time'); } ?>
                                        <?php if (1===3 && get_field('end_time'))  { ?> - <?php the_field('end_time'); } ?>
                                    </div>	 
                                    <!-- Presenters -->
                                    <div class="event__presenters"><?php the_field('presenters'); ?></div>
                                    <div style="display:flex;">	
                                        <!-- Online Course Info -->
								        <?php if(get_field('online_service')):?>
									        <div class="event__location text-<?php echo $currentRegion;?>">
                                	            <img src="<?php echo get_template_directory_uri();?>/images/map-icon.svg"><?php the_field('online_service');?>
								            </div>
                                        <!-- Event Location Info -->
                                        <?php elseif(get_field('location')):
                                            $location = get_field('location'); 
                                            $address = $location["street_number"] . " " . $location["name"] . "<br>" . $location["city"] . ", " . $location["state"] ." " . $location["post_code"];
                                            ?>
									        <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $address;?>" class="event__location text-<?php echo $currentRegion;?>">
                                                <img src="<?php echo get_template_directory_uri();?>/images/map-icon.svg"><?php echo $address;?>
                                            </a>
								        <?php endif; ?>                                                  
                                    </div>  		
                                <?php if(get_field('credits')):?>
                            		<div class="event__credits text-<?php echo $currentRegion;?>">
                                		<img src="<?php echo get_template_directory_uri();?>/images/token.svg"><?php the_field('credits'); ?> credits
									</div>     
								<?php endif; ?> 
                                <!-- Featured Presenter (Post Object) -->
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
						<?php elseif ($featured_image):?>
                    	    <a href="<?php the_field("registration_link"); ?>" class="event__image-wrap">
								<div class="event__image" style="background-image:url('<?php echo $featured_image['url']; ?>');"></div>
                    	    </a>
                        <?php endif; ?>
                        <!-- Topics -->
                        <div style="margin-top:15px; width:100%; padding-left: 20px;">   
                            <?php if( have_rows('topics') ) :  $numCounter = 1; ?>
                                <p class="text-<?php echo $currentRegion;?>" style="background: white; z-index: 99; position: relative; display: inline-block; padding: 0 5px;"><strong><?php the_field('topics_title');?>:</strong></p>
                                <div class="border-color-<?php echo $currentRegion;?>" style="display: flex; align-items:center; text-align:center; padding: 30px 20px; width:calc(100% + 15px); transform: translate(-15px, -15px);  flex-wrap: wrap;">
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
                        <div style="width:100%; margin:15px 0; text-align:right">
                            <a style="margin-right:10px;" class="btn btn-<?php echo $currentRegion;?>" href="<?php the_field("registration_link"); ?>">Register Now</a>                					                                             
                            <a class="btn btn-orange" href="<?php echo get_template_directory_uri();?>/images/fupt-2020-it.pdf">Download Print Version</a>
                        </div>
                            <p style="width:100%;">* View or print the full agenda for <a href="<?php echo get_template_directory_uri();?>/assets/images/DAY1.pdf">Day One</a> and <a href="<?php echo get_template_directory_uri();?>/assets/images/DAY2.pdf">Day Two</a></p>                                
                        <div class="event__wp-content">
                            <?php the_content(); ?>
                        </div>
                        <div style="margin-top:30px; padding:20px; border-left:5px solid #e09b3d;background:#fcf5eb;">
                            <h3 style="width:100%; padding:15px; padding-top:0; padding-bottom:0; margin-bottom:0; line-height:1.5; margin-top:0; font-weight: bold; font-size: 24px;" class="event__title">
                                2020 Statewide Live Virtual Intensive Training Follow-Up Session Dates:<br><span style="font-size:21px;" class="text-<?php echo $currentRegion; ?>">November 10, November 17, November 23, December 1, December 8, December 15</span>
                            </h3>
                            <p style="padding:15px; padding-bottom:0;">All attendees are eligible and encouraged to participate at no charge in six follow-up learning sessions with the faculty expert child and adolescent psychiatrists on a Zoom interactive call. You will have the opportunity to present cases, ask questions, and get direct feedback from faculty. </p>
                            <div style="width:100%; text-align:right;">
                                <a style="margin-top:15px; margin-left:15px;" class="btn btn-orange" href="/follow-up-sessions">Register Now</a>
                            </div>
                            <p style="padding:15px;"><strong>One credit will be allotted for each follow-up session:</strong></p>
                            <ul style="padding-left:40px; font-size:16px; width:100%;">
                                <li style="margin-bottom:8px;"><strong>November 10</strong> - ADHD: What to do when one stimulant fails, Carmel Foley, MD, Kristin McGinley, LCSW, Diane Bloomfield, MD</li>
                                <li style="margin-bottom:8px;"><strong>November 17</strong> - Trauma: Screening, Victor Fornari, MD, Leslie Cummins, LCSW, Cori Green, MD</li>
                                <li style="margin-bottom:8px;"><strong>November 23</strong> - Suicidality Simulation, Sarah Klagsbrun, MD, Amy Lyons, LCAT, Cori Green, MD</li>
                                <li style="margin-bottom:8px; display:flex;"><strong style="padding-right:4px;">December 1 - </strong>School Refusal, Wanda Fremont, MD, Maureen Ryan, PsyD,<br> Maureen Montgomery, MD</li>
                                <li style="margin-bottom:8px; display:flex;"><strong style="padding-right:4px;">December 8 - </strong>Unipolar/Bipolar Depression simulation, Rachel Zuckerbrot, MD, Kate Carnicelli, LCSW, Amy Jerum, NP, DNP,<br> Jessica Grant, MD, David Kaye, MD</li>
                                <li style="margin-bottom:8px;"><strong>December 15</strong> - ADHD simulation, Brett Nelson, MD, Leslie Cummins, LCSW</li>
                            </ul>
                        </div>                                
                	</div>                	        
                </div>
                <p style="font-size:14px; margin-bottom:16px; line-height:1.5; padding:0 15px;"><strong>The 2020 Statewide Live Virtual Intensive Training is at no cost to New York State Pediatric Primary Care Providers.</strong></p>                
                <p style="font-size:14px; margin-bottom:16px; line-height:1.5; padding:0 15px;"><strong>Accreditation:</strong> This activity has been planned and implemented in accordance with the Essential Areas and Policies of the Accreditation Council for Continuing Medical Education (ACCME) through the joint providership of McLean Hospital and Massachusetts General Hospital Psychiatry Academy. McLean Hospital is accredited by the ACCME to provide continuing medical education for physicians. </p>
                <p style="font-size:14px; margin-bottom:16px; line-height:1.5; padding:0 15px;">McLean Hospital designates this educational activity for a maximum of 9 <em>AMA PRA Category 1 Credit(s)™</em>.  Physicians should only claim credit commensurate with the extent of their participation in the activity.</p>
                <p style="font-size:14px; margin-bottom:16px; line-height:1.5; padding:0 15px;"><strong>Registration:</strong> All registrants will receive online instructions on how to access the Project TEACH Learning Management System to receive CME credits and complete the evaluation form.</p>
			</main>
		</div>
	</div>
</section>

<?php require_once(dirname(__FILE__).'/footer.php'); ?>