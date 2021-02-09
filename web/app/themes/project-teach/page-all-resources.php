<?php /* Template Name: Resources All */ ?>
<?php require_once('header.php'); ?>
<?php require(dirname(__FILE__)."/breadcrumbs.php"); ?>
<!--Start of Media Center Section-->
<section class="mainContent">
	<!-- Delete Later -->
	<style>
		body.resources .panel-body h4 {
			font-size: 22px;
    		font-weight: 600;
			color: #3a0e79;
			margin-bottom:10px;
		}
		.mainContent {
			background:#f2f2f2;
		}
		.link .mvideo-box {
			padding:15px 0;
		}
		.video {
			height:unset;
		}
		.intro-content {
			padding:60px 0;
		}
		.intro-content p {
			font-size: 24px;
			font-family: "Helvetica", sans-serif;
			line-height:2.4rem;
		}
		.bg-purple {
			background-color:#3a0e79;		
		}
		.text-purple {
			color:#3a0e79;		
		}
		.subpage-nav {
			height:100px;
			color:white;
		}
		.subpage-link {
			display:flex;
			justify-content:center;
			align-items:center;
		}
		.subpage-link a {
			color:white;
			font-size:21px;
			font-weight:bold;
		}
		.flex-row {
			height:100%;
		}
		#videos .mvideo-box {
 	   	padding: 15px;
    		margin: 0 auto;
		}
		.container__text {
			margin-bottom:15px;
		}
	</style>

	<div class="container container-fluid">
		<!-- Block 1 -->
		<div class="covid-section featured-pub">
			<h2 class="text-purple covid__title">
            	<?php the_field('video_title');?>
        	</h2>
			<div style="border-color:#3a0e79;" class="block block--gray">
				<!--Start of Tab 1-->
            	<div id="tabs-1">
            		<div class="tab-pane active" id="videos">
              			<div class="mediacenter-content">
							<?php
								$above_slider = get_field('above_slider');
							?>
							<?php $i = 1; while (have_rows('videos')) : the_row(); ?>
											
                					<?php
                  						if (get_sub_field('video_type') == 'vimeo'):
                    						$url = get_sub_field('vimeo');
                    						$url = str_replace("http:", "", $url);
                    						$url = str_replace("https:", "", $url);
                    						$url = str_replace("www.", "", $url);
                    						$url = str_replace("vimeo.com", "", $url);
                    						$url = str_replace("/", "", $url);
                    						$videoURL = '//player.vimeo.com/video/' . $url . '?title=0&amp;byline=0&amp;portrait=0&amp;transparent=0';
                  						else:
                    						$url = get_sub_field('youtube');
                    						$url = str_replace("http:", "", $url);
                    						$url = str_replace("https:", "", $url);
                    						$url = str_replace("www.", "", $url);
                    						$url = str_replace("watch?v=", "", $url);
                    						$url = str_replace("youtube.com", "", $url);
                    						$url = str_replace("youtu.be", "", $url);
                    						$url = str_replace("embed", "", $url);
                    						$url = str_replace("/", "", $url);
                    						$videoURL = '//www.youtube.com/embed/' . $url;
											endif;
											$image_backup = get_sub_field('video_resources');
                					?>
								<?php if ($i < $above_slider + 1) : ?>

                					<div class="mvideo-box clearfix video video-<?php echo $i; ?>">												  
										<?php if ('//www.youtube.com/embed/' == $videoURL && $image_backup): ?>
										<div class="col-sm-5">														
                    						<div class="embed-responsive embed-responsive-16by9">
												<div style="height:100%; position:absolute; width:100%; background-image:url('<?php echo $image_backup; ?>'); background-size:cover; background-position:center;"></div>
                    						</div>
                  						</div>
										<?php else: ?>
                  						<div class="col-sm-5">
                    						<div class="embed-responsive embed-responsive-16by9">
                      							<iframe src="<?php echo str_replace(array('https:','http:'), '', $videoURL); ?>" allowfullscreen></iframe>
                    						</div>
                  						</div>
										<?php endif; ?>
												  
                  						<div class="col-sm-7">
                        					<h4><?php the_sub_field('video_title'); ?></h4>
											<?php if (get_sub_field('attachment_link')): ?>
												<a href="<?php the_sub_field('attachment_link'); ?>" target="_blank" style="display:flex; align-items:center; margin-bottom:15px">
                                                    <div style="padding:3px 5px; margin-right:5px; border-radius:5px; background-color:#039fda; font-weight:bold; color:white;">PDF</div>
                                                    <span style="font-size: 16px; color: #039fda; font-weight: bold; font-family: sans-serif;"><?php the_sub_field('link_text'); ?></span>
                                                </a>                        								
                    						<?php endif; ?>
											<?php if (get_sub_field('video_description')): ?>
                        						<?php the_sub_field('video_description'); ?>
                    						<?php endif; ?>                    									
                  						</div>
									</div>

								<?php endif; ?>
												
                			<?php $i++; endwhile; ?>										

              			</div>
            		</div>
				</div>
				<!-- Start -->
				<div style="margin-top:30px" class="row flex-row">
					<div class="col-md-12">										
						<div class="more-publications">
                            <div style="padding:0 15px;">
                        		<div class="panel panel-default">
                            		<div style="background:#3a0e79;" class="panel-heading">
                            			<h4 class="panel-title">
                            				<!-- Accordion Titles, click to open accordions -->
                            				<a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse-xxx" aria-expanded="false">
                            					Video Archive
                            				</a>
                            			</h4>
                            		</div>
                            		<div id="collapse-xxx" class="panel-collapse collapsed collapse">
                            			<ul class="sidebar__list">
                            				<div class="covid-resource panel-body">                                                 
                            					<div class="item">
                                					<div class="link">
														<div class="mediacenter-content">
														<?php $i = 1; while (have_rows('videos')) : the_row(); ?>
															<?php if ($i >= $above_slider + 1) : ?>
																<?php
                                              						if (get_sub_field('video_type') == 'vimeo'):
                                                						$url = get_sub_field('vimeo');
                                                						$url = str_replace("http:", "", $url);
                                                						$url = str_replace("https:", "", $url);
                                                						$url = str_replace("www.", "", $url);
                                                						$url = str_replace("vimeo.com", "", $url);
                                                						$url = str_replace("/", "", $url);
								                                        $videoURL = '//player.vimeo.com/video/' . $url . '?title=0&amp;byline=0&amp;portrait=0&amp;transparent=0';
                                              						else:
                                                						$url = get_sub_field('youtube');
                                                						$url = str_replace("http:", "", $url);
                                                						$url = str_replace("https:", "", $url);
                                                						$url = str_replace("www.", "", $url);
                                                						$url = str_replace("watch?v=", "", $url);
                                                						$url = str_replace("youtube.com", "", $url);
                                                						$url = str_replace("youtu.be", "", $url);
                                                						$url = str_replace("embed", "", $url);
                                                						$url = str_replace("/", "", $url);
                                                						$videoURL = '//www.youtube.com/embed/' . $url;
																		endif;
																		$image_backup = get_sub_field('video_resources');

                                        						?>
                												<div class="mvideo-box clearfix video-<?php echo $i; ?>">
																	<?php if ('//www.youtube.com/embed/' == $videoURL && $image_backup): ?>
																		<div class="col-sm-5">														
                    														<div class="embed-responsive embed-responsive-16by9">
																				<div style="height:100%; position:absolute; width:100%; background-image:url('<?php echo $image_backup; ?>'); background-size:cover; background-position:center;"></div>
                    														</div>
                  														</div>
																	<?php else: ?>
                  														<div class="col-sm-5">
                    														<div class="embed-responsive embed-responsive-16by9">
                      															<iframe src="<?php echo str_replace(array('https:','http:'), '', $videoURL); ?>" allowfullscreen></iframe>
                    														</div>
                  														</div>
																	<?php endif; ?>
                  													<div class="col-sm-7">
                        												<h3 class="post__title text-purple post__title--list"><?php the_sub_field('video_title'); ?></h3>  
																		<?php if (get_sub_field('attachment_link')): ?>
																			<a href="<?php the_sub_field('attachment_link'); ?>" target="_blank" style="display:flex; align-items:center; margin-bottom:15px">
                                                        						<div style="padding:3px 5px; margin-right:5px; border-radius:5px; background-color:#039fda; font-weight:bold; color:white;">PDF</div>
                                                        						<span style="text-decoration:none; font-size: 16px; color: #039fda; font-weight: bold; font-family: sans-serif;"><?php the_sub_field('link_text'); ?></span>
                                                        					</a>                        								
                    													<?php endif; ?>
                    													<?php if (get_sub_field('video_description')): ?>
                        													<?php the_sub_field('video_description'); ?>
                    													<?php endif; ?>
                  													</div>
                												</div>
															<?php endif; ?>		
                										<?php $i++; endwhile; ?>	
														</div>           
													</div>           
                            					</div>
                            				</div>
                            			</ul>
                            		</div>
                        		</div>
                    		</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Block 2 -->
		<div class="covid-section featured-pub">
			<h2 class="text-green covid__title">
            	<?php the_field('follow_up_title');?>
        	</h2>
			<div class="container__text">
            	<?php the_field('follow_up_text');?>
			</div>
			<div style="border-color:#7bbf43;" class="block block--gray">
				<!--Start of Tab 1-->
            	<div id="tabs-1">
            		<div class="tab-pane active" id="videos">
              			<div class="mediacenter-content">
							<?php
								$above_slider = get_field('fu_above_slider');
							?>
							<?php $i = 1; while (have_rows('fu_videos')) : the_row(); ?>
											
                					<?php
                  						if (get_sub_field('video_type') == 'vimeo'):
                    						$url = get_sub_field('vimeo');
                    						$url = str_replace("http:", "", $url);
                    						$url = str_replace("https:", "", $url);
                    						$url = str_replace("www.", "", $url);
                    						$url = str_replace("vimeo.com", "", $url);
                    						$url = str_replace("/", "", $url);
                    						$videoURL = '//player.vimeo.com/video/' . $url . '?title=0&amp;byline=0&amp;portrait=0&amp;transparent=0';
                  						else:
                    						$url = get_sub_field('youtube');
                    						$url = str_replace("http:", "", $url);
                    						$url = str_replace("https:", "", $url);
                    						$url = str_replace("www.", "", $url);
                    						$url = str_replace("watch?v=", "", $url);
                    						$url = str_replace("youtube.com", "", $url);
                    						$url = str_replace("youtu.be", "", $url);
                    						$url = str_replace("embed", "", $url);
                    						$url = str_replace("/", "", $url);
                    						$videoURL = '//www.youtube.com/embed/' . $url;
											endif;
											$image_backup = get_sub_field('video_resources');
                					?>
								<?php if ($i < $above_slider + 1) : ?>

                					<div class="mvideo-box clearfix video video-<?php echo $i; ?>">												  
										<?php if ('//www.youtube.com/embed/' == $videoURL && $image_backup): ?>
										<div class="col-sm-5">														
                    						<div class="embed-responsive embed-responsive-16by9">
												<div style="height:100%; position:absolute; width:100%; background-image:url('<?php echo $image_backup; ?>'); background-size:cover; background-position:center;"></div>
                    						</div>
                  						</div>
										<?php else: ?>
                  						<div class="col-sm-5">
                    						<div class="embed-responsive embed-responsive-16by9">
                      							<iframe src="<?php echo str_replace(array('https:','http:'), '', $videoURL); ?>" allowfullscreen></iframe>
                    						</div>
                  						</div>
										<?php endif; ?>
												  
                  						<div class="col-sm-7">
                        					<h4><?php the_sub_field('video_title'); ?></h4>
											<?php if (get_sub_field('attachment_link')): ?>
												<a href="<?php the_sub_field('attachment_link'); ?>" target="_blank" style="display:flex; align-items:center; margin-bottom:15px">
                                                    <div style="padding:3px 5px; margin-right:5px; border-radius:5px; background-color:#039fda; font-weight:bold; color:white;">PDF</div>
                                                    <span style="font-size: 16px; color: #039fda; font-weight: bold; font-family: sans-serif;"><?php the_sub_field('link_text'); ?></span>
                                                </a>                        								
                    						<?php endif; ?>
											<?php if (get_sub_field('video_description')): ?>
                        						<?php the_sub_field('video_description'); ?>
                    						<?php endif; ?>                    									
                  						</div>
									</div>

								<?php endif; ?>
												
                			<?php $i++; endwhile; ?>										

              			</div>
            		</div>
				</div>
				<!-- Start -->
				<div style="margin-top:30px" class="row flex-row">
					<div class="col-md-12">										
						<div class="more-publications">
                            <div style="padding:0 15px;">
                        		<div class="panel panel-default">
                            		<div style="background:#7bbf43;" class="panel-heading">
                            			<h4 class="panel-title">
                            				<!-- Accordion Titles, click to open accordions -->
                            				<a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse-zzz" aria-expanded="false">
                            					More Resources
                            				</a>
                            			</h4>
                            		</div>
                            		<div id="collapse-zzz" class="panel-collapse collapsed collapse">
                            			<ul class="sidebar__list">
                            				<div class="covid-resource panel-body">                                                 
                            					<div class="item">
                                					<div class="link">
														<div class="mediacenter-content">
														<?php $i = 1; while (have_rows('fu_videos')) : the_row(); ?>
															<?php if ($i >= $above_slider + 1) : ?>
																<?php
                                              						if (get_sub_field('video_type') == 'vimeo'):
                                                						$url = get_sub_field('vimeo');
                                                						$url = str_replace("http:", "", $url);
                                                						$url = str_replace("https:", "", $url);
                                                						$url = str_replace("www.", "", $url);
                                                						$url = str_replace("vimeo.com", "", $url);
                                                						$url = str_replace("/", "", $url);
								                                        $videoURL = '//player.vimeo.com/video/' . $url . '?title=0&amp;byline=0&amp;portrait=0&amp;transparent=0';
                                              						else:
                                                						$url = get_sub_field('youtube');
                                                						$url = str_replace("http:", "", $url);
                                                						$url = str_replace("https:", "", $url);
                                                						$url = str_replace("www.", "", $url);
                                                						$url = str_replace("watch?v=", "", $url);
                                                						$url = str_replace("youtube.com", "", $url);
                                                						$url = str_replace("youtu.be", "", $url);
                                                						$url = str_replace("embed", "", $url);
                                                						$url = str_replace("/", "", $url);
                                                						$videoURL = '//www.youtube.com/embed/' . $url;
																		endif;
																		$image_backup = get_sub_field('video_resources');

                                        						?>
                												<div class="mvideo-box clearfix video-<?php echo $i; ?>">
																	<?php if ('//www.youtube.com/embed/' == $videoURL && $image_backup): ?>
																		<div class="col-sm-5">														
                    														<div class="embed-responsive embed-responsive-16by9">
																				<div style="height:100%; position:absolute; width:100%; background-image:url('<?php echo $image_backup; ?>'); background-size:cover; background-position:center;"></div>
                    														</div>
                  														</div>
																	<?php else: ?>
                  														<div class="col-sm-5">
                    														<div class="embed-responsive embed-responsive-16by9">
                      															<iframe src="<?php echo str_replace(array('https:','http:'), '', $videoURL); ?>" allowfullscreen></iframe>
                    														</div>
                  														</div>
																	<?php endif; ?>
                  													<div class="col-sm-7">
                        												<h3 class="post__title text-purple post__title--list"><?php the_sub_field('video_title'); ?></h3>  
																		<?php if (get_sub_field('attachment_link')): ?>
																			<a href="<?php the_sub_field('attachment_link'); ?>" target="_blank" style="display:flex; align-items:center; margin-bottom:15px">
                                                        						<div style="padding:3px 5px; margin-right:5px; border-radius:5px; background-color:#039fda; font-weight:bold; color:white;">PDF</div>
                                                        						<span style="text-decoration:none; font-size: 16px; color: #039fda; font-weight: bold; font-family: sans-serif;"><?php the_sub_field('link_text'); ?></span>
                                                        					</a>                        								
                    													<?php endif; ?>
                    													<?php if (get_sub_field('video_description')): ?>
                        													<?php the_sub_field('video_description'); ?>
                    													<?php endif; ?>
                  													</div>
                												</div>
															<?php endif; ?>		
                										<?php $i++; endwhile; ?>	
														</div>           
													</div>           
                            					</div>
                            				</div>
                            			</ul>
                            		</div>
                        		</div>
                    		</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Block 3 -->
		<div class="covid-section featured-pub">
			<h2 class="text-blue covid__title">
            	Additional Resources
        	</h2>
			<div style="border-color:#039fda;" class="block block--gray">
				
				<div class="row flex-row">
					<div class="col-md-12">
									<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
										<?php if (have_rows('links')) :
											$i = 1; 
											while (have_rows('links')) : the_row(); ?>
                  								<div class="panel panel-default">
                    								<div style="background:#039fda;" class="panel-heading">
                      									<h4 class="panel-title">
                        									<a data-toggle="collapse" class="collapsed" data-parent="#accordion" data-target="#link<?php echo $i; ?>" aria-expanded="false"><?php the_sub_field('section_title'); ?></a>
                      									</h4>
                    								</div>
                    								<div id="link<?php echo $i; ?>" class="panel-collapse collapsed collapse">
                      									<div class="panel-body">
                        									<?php $k = 0; while (have_rows('links_list', 421)) : the_row(); ?>
                        										<div class="item item-<?php echo $k; ?>">
                          											<div class="link">
                            											<a href="<?php the_sub_field('link'); ?>" target="_blank"><?php the_sub_field('title'); ?></a>
                          											</div>
                          											<p class="standard"><?php the_sub_field('text'); ?></p></p>
                        										</div>
                        									<?php $k++; endwhile; ?>
                      									</div>
                    								</div>
                  								</div>
										  		<?php $i++; 
											endwhile; 
										endif; ?>
                					</div>
								</div>
							</div>					
			</div>
		</div>
	</div>
</section>

 <?php require_once('footer.php'); ?>