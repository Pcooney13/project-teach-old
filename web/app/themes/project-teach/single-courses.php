<?php 

	require_once('header.php'); 
	require_once('lib/ethos/ethos-functions.php');

	$postID = get_the_id(); //ID of the WP post
	$courseID = get_field('ethosce_id'); //Ethos Course ID
	$count = '0';
	$courseIDs = array($courseID); //Sets IDs of courses we need
	$CourseOB = new Course(); //Create course object
	$CourseOB->set_courses($courseIDs); //Sets up courses array
	$courseMeta = $CourseOB->getCourseMeta($courseID, 'course_meta');
	$courseCredit = $CourseOB->getCourseMeta($courseID, 'course_credit');

	if($courseCredit):
		$courseCreditFull = $CourseOB->getCreditsFull($courseCredit);
	else:
		$courseCreditFull = '';
	endif;

	//CURL Variables
	$status = $courseMeta['status'];
	$title = $courseMeta['title'];
	$button = $courseMeta['url'];

	$target_audience = $courseMeta['field_target_audience'];
	$program = $courseMeta['field_program'];
	$accreditation = $courseMeta['field_accreditation'];
	$description = $courseMeta['field_course_summary']; //Course description
	$learning = $courseMeta['field_learning_objectives']; //Course learning objectives
	$start_date = $courseMeta['field_course_date_start'];//date("M j, Y",$course['list'][0]['field_course_date']['value']); 
	$end_date = $courseMeta['field_course_date_end'];
	$live = $courseMeta['field_course_live'];
	$event_start_date = $courseMeta['field_course_event_date_start']; 
	$event_end_date = $courseMeta['field_course_event_date_end'];
	$cost = $courseMeta['price']; //cost info
	$faculty = $courseMeta['field_faculty_credentials'];

	$course_topic = $CourseOB->get_courseTax($courseID, 'field_course_category');
	$course_format = $CourseOB->get_courseTax($courseID, 'field_course_format');
	$course_credit = $CourseOB->getCredits($courseCredit);

	if($cost == '0.00'){
		$cost = 'Free';
		$course_cost = array('Free');
	} else {
		$cost = '$' . $cost;
		$course_cost = array('Paid');
	}
	$excerpt = get_the_excerpt();

	$course_meta = array_filter(array($target_audience, $start_date, $end_date, $event_start_date, $event_end_date, $cost, $courseCredit)); //Course meta array (this is just used to check if any of this is filled out)

	$CourseOB->updateWPPost($courseID, $postID);
	$CourseOB->updateWPTax($courseID, $postID, $course_topic, 'course_category');
	$CourseOB->updateWPTax($courseID, $postID, $course_format, 'course_format');
	$CourseOB->updateWPTax($courseID, $postID, $course_credit, 'course_credit');
	$CourseOB->updateWPTax($courseID, $postID, $course_cost, 'course_cost');

	if ($courseMeta['field_course_image']) {
		$thumb_url = $CourseOB->get_featuredImage($courseID);
	}else {
		$thumb_url = '';
	}
	if ($live) {
		$CourseOB->updateACF($courseID, $postID, 'live', 1);
	}
	if ($end_date || $start_date ) {
		$CourseOB->updateACF($courseID, $postID, 'dates', $start_date . ($end_date ? ' - ' . $end_date : ''));
	}
	if ($event_start_date || $event_end_date ) {
		$CourseOB->updateACF($courseID, $postID, 'live_dates', $event_start_date . ($event_end_date ? ' to ' . $event_end_date : ''));
	}
	if ($cost) {
		$CourseOB->updateACF($courseID, $postID, 'cost', $cost);
	}
	if ((get_field('featured_image') != $thumb_url) && $thumb_url ) {
		$CourseOB->updateACF($courseID, $postID, 'featured_image', $thumb_url);
	}elseif(!$thumb_url){
		$CourseOB->updateACF($courseID, $postID, 'featured_image', '');
	}else{
		$thumb_url = get_field('featured_image');
	}
?>



<section class="single-post">
		<div class="wrap">
			<main class="main" role="main">

				<?php if (have_posts()): ?>
					<?php while (have_posts()) : the_post(); ?>
					
						<section id="post__featured">
							<article id="post-<?php the_ID(); ?>" class="post post--featured">
								<!-- Image Background -->
								<?php
									if($thumb_url):
										echo '<div class="ethos-background" style="background-image: url(\'' . $thumb_url . '\')"></div>';
									endif;
								?>
								<div class="ethos-intro">
									<div class="ethos-return">
										<a href="/live-training/online-courses/" title="retun to courses">Return To Courses</a>
									</div>
									<h3 class="post__title post__title--featured"><?php the_title(); ?></h3>
									<?php
										if($excerpt):
											echo '<p>' . $excerpt . '</p>';
										endif;
									?>
									<div class="ethos-register">
										<a href="<?php echo $button; ?>" target="_blank">Register For This Course</a>
									</div>
									<!-- Share Buttons -->
									<div class="share">									
										<div class="share__content" style="margin-left:auto;">
											<span class="share__text">SHARE</span>
											<?php echo do_shortcode('[Sassy_Social_Share]'); ?>
										</div>
									</div>
								</div>
                			</article>
            			</section>
            			<section class="ethos-section">
            				<?php if($description): ?>
								<div class="ethos-text-section">
            						<h4>Course Overview</h4>
									<?php 
										echo $description;
									?>
								</div>
							<?php endif; ?>
							<?php if($learning): ?>
								<div class="ethos-text-section">
            						<h4>Learning Objectives</h4>
									<?php 
										echo $learning;
									?>
								</div>
							<?php endif; ?>
							<div class="ethos-register">
								<a href="<?php echo $button; ?>" target="_blank">Register For This Course</a>
							</div>
            			</section>
					<?php endwhile; ?>
				<?php endif; ?>							

			</main>
			<aside role="complementary">
    			<div class="sidebars sidebars__sticky">
    				<?php if(!empty($course_meta)): ?>
        				<article class="ethos-summary">
        					<div class="ethos-text-section">
        						<h4 class="ethos-text-header">Course Details</h4>
        						<ul>
        							<?php
										if( $courseCredit ):
											echo '<li><strong>Available Credits: </strong>' . $CourseOB->getCreditsExcerpt($courseCredit) . '</li>';
										endif;
										if( $course_topic ):
											echo '<li><strong>Course Topic:</strong>';
											echo implode(', ', $course_topic);
											echo '</li>';
										endif;
										if( $course_format ):
											echo '<li><strong>Course Format:</strong>';
											echo implode(', ', $course_format);
											echo '</li>';
										endif;
										if( $target_audience ):
											echo '<li><strong>Target Audience:</strong>' . $target_audience . '</li>';
										endif;
										if( $start_date && !$live):
											echo '<li><strong>Course Opens: </strong>' . $start_date . '</li>';
										endif;
										if( $end_date && !$live):
											echo '<li><strong>Course Closes: </strong>' . $end_date . '</li>';
										endif;
										if( $event_start_date && $live ):
											echo '<li><strong>Event Starts: </strong>' . $event_start_date . '</li>';
										endif;
										if( $event_end_date && $live ):
											echo '<li><strong>Event Ends: </strong>' . $event_end_date . '</li>';
										endif;
										if( $cost ):
											echo '<li><strong>Cost: </strong>' . $cost . '</li>';
										endif;
									?>
								</ul>
        					</div>
        				</article>
    				<?php endif; ?>
    			</div>
    		</aside>
			
	
		</div>
</section>

<?php require_once('footer.php'); ?>