<?php 
	require_once('header.php');
	$content_agenda = get_field('content_agenda');
	$title_agenda = get_field('title_agenda');
	$content_faculty = get_field('content_faculty');
	$title_faculty = get_field('title_faculty');
	$content_resources = get_field('content_resources');
	
	$additional_repeater = get_field('additional_resources');

	$title_resources = get_field('title_resources');
	$content_downloadables = get_field('content_downloadables');
	$title_downloadables = get_field('title_downloadables');
	$additional_files_agenda = get_field('additional_files_agenda');
	$additional_files_faculty = get_field('additional_files_faculty');
	$additional_files_downloadables = get_field('additional_files_downloadables');
	$maindesc = get_field('main_description');
	$icon = get_template_directory_uri() . '/assets/images/icons/pdf.svg';

	$faculty = get_field('faculty_picker');
?>

<section class="single-post">
		<div class="wrap">
			<main class="main" role="main">
				<?php if (have_posts()): ?>
					<?php while (have_posts()) : the_post(); ?>
            			<section class="syllabus-section">
            				<div class="syllabus-intro">
            					<h3 class="post__title post__title--featured"><?php echo get_the_title(); ?></h3>
            					<?php if($maindesc): echo $maindesc; endif; ?>
            				</div>            				
            				<?php 
	            				if($content_agenda || $additional_files_agenda):
	            					echo '<div class="syllabus-wrapper" id="agenda">';
            						echo '<h4>' . $title_agenda . '</h4>';
            						if($content_agenda):
            							echo $content_agenda;
            						endif;
	            				endif;

	            				if($content_faculty || $additional_files_faculty['additional_files_agenda']):
	            					echo '<div class="syllabus-wrapper" id="faculty">';
            						echo '<h4>' . $title_faculty . '</h4>';
            						if($content_faculty):
            							echo $content_faculty;
            						endif;
            						if($additional_files_faculty['additional_files_agenda']):
            							echo '<div class="syllabus-resource-wrapper">';
										foreach($additional_files_faculty['additional_files_agenda'] as $file):
											echo '<a href="' . $file['file'] . '" target="_blank">';
											echo '<div><h6>' . $file['file_title'] . '</h6>';
											echo '<span>' . $file['file_description'] . '</span></div>';
											echo '</a>';
										endforeach;
										echo '</div>';
									endif;
            						echo '</div>';
	            				endif;

	            				// if($content_resources || $additional_repeater):
	            				// 	echo '<div class="syllabus-wrapper" id="additional-information">';
            					// 	echo '<h4>' . $title_resources . '</h4>';
									
								// 	if ($additional_repeater):
								// 		echo '<ul class="slides">';
								// 		foreach ($additional_repeater as $repeater) :
								// 			$add_title = $repeater['additional_title'];
								// 			$add_files = $repeater['additional_files_agenda'];

								// 			if($add_title && $add_files):
								// 				echo '<h5>' . $add_title . '</h5>';
								// 			endif;
								// 			if($add_files):
            					// 				echo '<div class="syllabus-resource-wrapper">';
								// 				foreach($add_files as $file):
								// 					echo '<a href="' . $file['file'] . '" target="_blank">';
								// 					echo '<div><h6>' . $file['file_title'] . '</h6>';
								// 					echo '<span>' . $file['file_description'] . '</span></div>';
								// 					echo '</a>';
								// 				endforeach;
								// 				echo '</div>';
								// 			endif;
								// 		endforeach;
    							// 		echo '</ul>';
								// 	endif;
            					// 	echo '</div>';
								// endif;

								if($content_resources || $additional_repeater):
	            					echo '<div class="syllabus-wrapper" id="additional-information">';
            						echo '<h4>' . $title_resources . '</h4>';
									
									if ($additional_repeater):
										echo '<ul class="slides">';
										foreach ($additional_repeater as $repeater) :
											// Resource Titles
											$add_title = $repeater['additional_title'];

											if($add_title):
												echo '<h5>' . $add_title . '</h5>';
											endif;
											if ($repeater['additional_files_2']) :	
												echo '<div class="syllabus-resource-wrapper">';
													foreach($repeater['additional_files_2'] as $file):
														echo '<a href="' . $file['file'] . '" target="_blank">';
														echo '<div><h6>' . $file['file_title'] . '</h6>';
														echo '<span>' . $file['file_description'] . '</span></div>';
														echo '</a>';
														if ($file['supplemental_files']) :
															echo '<div style="margin-left: 1rem;" class="syllabus-resource-wrapper">';
																foreach($file['supplemental_files'] as $file):
																	echo '<a href="' . $file['file'] . '" target="_blank">';
																	echo '<div><h6>' . $file['file_title'] . '</h6>';
																	echo '<span>' . $file['file_description'] . '</span></div>';
																	echo '</a>';

																endforeach;
															echo '</div>';
														endif;
													endforeach;
												echo '</div>';
											endif;
										endforeach;
    									echo '</ul>';
									endif;
            						echo '</div>';
								endif;

	            				if($content_downloadables || $additional_files_downloadables['additional_files_agenda']):
	            					echo '<div class="syllabus-wrapper" id="downloadables">';
            						echo '<h4>' . $title_downloadables . '</h4>';
            						if($content_downloadables):
            							echo $content_downloadables;
            						endif;
            						if($additional_files_downloadables['additional_files_agenda']):
            							echo '<div class="syllabus-resource-wrapper">';
										foreach($additional_files_downloadables['additional_files_agenda'] as $file):
											echo '<a href="' . $file['file'] . '" target="_blank">';
											echo '<div><h6>' . $file['file_title'] . '</h6>';
											echo '<span>' . $file['file_description'] . '</span></div>';
											echo '</a>';
										endforeach;
										echo '</div>';
									endif;
            						echo '</div>';
	            				endif;
            				?>
            				
            				<!-- Share Buttons -->
							<div class="share">									
								<div class="share__content" style="margin-left:auto;">
									<span class="share__text">SHARE</span>
									<?php echo do_shortcode('[Sassy_Social_Share]'); ?>
								</div>
							</div>
            			</section>
					<?php endwhile; ?>
				<?php endif; ?>							
			</main>
			<aside role="complementary">
    			<div class="sidebars sidebars__sticky">
    				<div class="lp-quicklinks-wrapper">
    					<div class="lp-quicklinks-inner">
    						<h4>Quick Links</h4>
    						<ul>
    							<?php 
		            				if($content_agenda || $additional_files_agenda):
		            					echo '<li>';
	            						echo '<a href="#agenda">' . $title_agenda . '</a>';
	            						echo '</li>';
		            				endif;

		            				if($content_faculty || $additional_files_faculty['additional_files_agenda']):
		            					echo '<li>';
	            						echo '<a href="#faculty">' . $title_faculty . '</a>';
	            						echo '</li>';
		            				endif;

		            				if($content_resources || $additional_repeater):
		            					echo '<li>';
	            						echo '<a href="#additional-information">' . $title_resources . '</a>';
	            						echo '</li>';
		            				endif;

		            				if($content_downloadables || $additional_files_downloadables['additional_files_agenda']):
		            					echo '<li>';
	            						echo '<a href="#downloadables">' . $title_downloadables . '</a>';
	            						echo '</li>';
									endif;
									echo '<li>';
                                    echo '<a href="/intensive-training-2020-videos/">Intensive Training Videos</a>';
                                    echo '</li>';
	            				?>
    						</ul>
    					</div>
    				</div>
    			</div>
    		</aside>
			
	
		</div>
</section>

<?php require_once('footer.php'); ?>