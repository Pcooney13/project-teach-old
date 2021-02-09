<?php require_once('header.php'); ?>
<?php require(dirname(__FILE__) . "/breadcrumbs.php"); ?>

<!-- Main -->
<style>
    .intro__block {
        margin:60px 0 75px;
        display:flex;
    }
    .intro__text {
        margin-left:45px;
    }
    .intro__image {
        width:100%;
        max-width:350px;
        background-size: cover;
        background-position:center;
        background-repeat: no-repeat;
    }
    .intro__block h2 {
        padding-bottom:15px;
    }
    .intro__block p {
        padding-bottom:15px;
    }
    .intro__block p:last-child {
        padding-bottom:0;
    }
    /* Repeater */
    .repeater__section {
        display:flex; 
        flex-wrap:wrap; 
        justify-content:space-between;
        padding:15px 0;
    }
    .repeater__block {
        margin-right:3%;
        display:inline-block;
        width:30%; 
        padding:30px; 
        margin-bottom:3%;
        flex-grow:1;
    }
    .repeater__block:nth-child(3),
    .repeater__block:last-child {
        margin-right:0;
    }

    .ace__block {
        display:flex;
    }
    .ace__column {
        width:50%;
    }
    .ace__column h2,
    .ace__column p {
        padding-bottom:15px;
    }
    .ace__column p:last-child {
        padding-bottom:0;
    }
    .ace__column:first-child {
        padding-right:30px;
    }
    .ace__column:last-child {
        padding-left:15px;
    }
    .ace__flexbox {
        display:flex;
    }
    .ace__borderbox {
        width:50%;
        margin-right:30px;
        border:4px solid black;
        padding:15px;
    }
    .ace__borderbox:last-child {
        margin-right:0;
    }
    .ace__citation {
        font-size:11px;
    }
</style>
<!-- Responsive -->
<style>
.video {
    height:unset;
}
    @media (max-width:991px) {
        .intro__block {
            flex-direction:column;
        }
        .intro__image {
            margin-bottom:30px;
            max-width:unset;
            height:425px;
        }
        .intro__text {
            margin-left:0;
        }
    }
    @media (max-width:525px) {
        .intro__image {
            height:300px;
        }
    }
</style>



<div class="container">
    <!-- Intro Section -->
    <?php
        $show_intro_block = get_field('show_intro_block');
        $intro_image = get_field('intro_image');
        $intro_color = get_field('intro_color');
        $intro_title = get_field('intro_title');
        $intro_text = get_field('intro_text');

        if ($show_intro_block): 
            echo 
                '
                <div class="intro__block">
                    <div class="intro__image" style="background-image:url( ' . esc_url($intro_image['url']) . '); "></div>
                    <div class="intro__text">
                        <h2 style="color:' . $intro_color . '">' . $intro_title . '</h2>
                        '. $intro_text .'
                    </div>
                </div>'
            ;
        endif; 
    ?>

    <!-- COVID (copied from /covid page) -->
    <section class="covid-section featured-pub" id="publication">
        <h2 class="covid__title text-green">
            <?php the_field('section_title'); ?>
        </h2>
        <div class="block block--gray border-green">
            <?php
    	    //get 1 most recent posts
		    $main_args = array( 
			    'post_type' 	 => 'post', 
                'posts_per_page' => '2',
                'cat' => get_field('category'),
			    'post--not_in'   => array(get_the_ID())
		    );
            $main_post = new WP_Query($main_args);
            // Check there is a post
            if($main_post->have_posts()) : ?>
                <?php while($main_post->have_posts()) : $main_post->the_post();
                    $excerpt = get_the_excerpt();
                    $title = get_the_title();
                    $page_link = get_the_permalink(); 
                    $post_image = get_the_post_thumbnail_url(); 
                    $categories = get_the_category();
                    ?>
                    <div class="post__category post__category--list">
                        <?php if ( ! empty( $categories ) ) :
                            foreach( $categories as $category ) :
                                $cat_id = $category->cat_ID;
                                $color = get_field('category_color', 'category_'. $cat_id .'');
                                ?>
                                <a style="color:<?php echo $color; ?>;"
                                    href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <h3 style="text-transform:none; font-weight:900; margin-top:0; margin-bottom:30px; color:#000;" class="banner-title">
                        <?php echo $title; ?>
                    </h3>
                    <div class="row flex-row">
                        <?php if ($post_image) : ?>
                        <div style="background-image:url(<?php echo $post_image ?>);" class="flex-graphic" alt="<?php echo $title?>" id="next-consult-image"></div>
                        <?php endif; ?>
                        <div class=" flex-type">
                            <?php if (have_rows('authors')): ?>
                                <?php $author_count = count(get_field('authors'));?>
                                <div class="author__list">
                                    <?php while (have_rows('authors')): the_row();
					                    // Author Variables
					                    $post_object = get_sub_field('author'); 
					                    $post = $post_object;
					                    setup_postdata( $post );

                                        $author_image = get_field('image');
                                        $author_affliation = get_field('affliation');
					                    $author_blurb = get_field('blurb');
					                    $size = 'thumbnail';
					                    $author = get_field('name');
					                    $author_content = get_the_content();
					                    $author_page = get_permalink();
					                    if($author) : ?>
                                            <a class="author author--list" href="<?php echo $author_page; ?>">
                                                <img class="author__image author__image--featured" src="<?php echo $author_image['url']; ?>" alt="<?php echo $author_image['alt']; ?>" />
                                                <p style="line-height:1;" class="author__name author__name--featured">
                                                    <?php echo $author; ?>
                                                    <?php if($author_affliation):?>
                                                        <br>
                                                        <span style="padding:0; margin-top:-5px; font-weight: 500; line-height:1; font-size: 15px; color: #aaa;" class="mmh-standard">
                                                            <?php echo $author_affliation;?>
                                                        </span>
                                                    <? endif; ?>
                                                </p>
                                            </a>
                                        <?php endif;
					                    if ($author_count === 2) : the_row();
					                        $post_object = get_sub_field('author'); 
					                        $post = $post_object;
					                        setup_postdata( $post );

                                            $author_image = get_field('image');
                                            $author_affliation = get_field('affliation');
					                        $author_blurb = get_field('blurb');
					                        $author = get_field('name');
					                        $author_content = get_the_content();
					                        $author_page = get_permalink();
					                        if($author) : ?>
                                                <a class="author author--list" href="<?php echo $author_page; ?>">
                                                    <img class="author__image author__image--featured" src="<?php echo $author_image['url']; ?>" alt="<?php echo $author_image['alt']; ?>" />
                                                    <p style="line-height:1;" class="author__name author__name--featured">
                                                        <?php echo $author; ?>
                                                        <?php if($author_affliation):?>
                                                            <br>
                                                            <span style="padding:0; margin-top:-5px; font-weight: 500; line-height:1; font-size: 15px; color: #aaa;" class="mmh-standard">
                                                                <?php echo $author_affliation;?>
                                                            </span>
                                                        <? endif; ?>
                                                    </p>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <!-- Resets $post to single post authors fucking everything up -->
                                    <?php endwhile;?>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            <?php endif;?>
                            <p style="padding-bottom:10px; padding-top:15px;" class="mmh-standard">
                                <?php echo $excerpt . "..."; ?>
                            </p>
                            <!-- <p style="font-size:16px; margin-bottom:10px; display:inline; margin-right:45px;">* This article also appears in the NYS AAP July Newsletter</p> -->
                            <a id="join-consult" href="<?php echo $page_link;?>" title="Read More" class="btn btn-green">
                                <strong>Read More</strong>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <!-- Racism (copied from /covid page) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <?php if (have_rows('racism_resource_section', 2131)) :
                            $counter2 = 1; 
                            while (have_rows('racism_resource_section', 2131)) : the_row(); ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading bg-green">
                                        <h4 class="panel-title">
                                            <!-- Accordion Titles, click to open accordions -->
                                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion"
                                                style="color:rgb(<?php echo $color ?>)" href="#collapse-2-<?php echo $counter2 ?>"
                                                aria-expanded="false">
                                                Resources on Racism
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-2-<?php echo $counter2 ?>" class="panel-collapse collapsed collapse">
                                        <div class="covid-resource panel-body">                                
                                            <?php if (have_rows('resource', 2131)) : ?>
                                                <?php while (have_rows('resource', 2131)) : the_row();   ?>
                                                    <div class="item">
                                                        <div class="link">
                                                            <a target="_blank" href="<?php the_sub_field('resource_url'); ?>">
                                                                <span><?php the_sub_field('resource_name', 2131); ?></span>
                                                                <svg class="pdf-icon" viewBox="0 0 160.07 160.03">
                                                                    <path
                                                                        d="M99.61,180H40.12c-12.07,0-20-7.73-20.08-19.94-.14-19.66,0-39.32,0-59q0-29.74,0-59.49C20,27.33,27.33,20,41.44,20c13.5,0,27,0,40.49,0,6.34,0,10,2.91,10,7.89S88.35,36,82.11,36c-13,0-26,0-39,0-5.66,0-7.1,1.38-7.1,7.05q0,57,0,114c0,5.58,1.5,7,7.23,7q56.75,0,113.48,0c5.9,0,7.24-1.36,7.26-7.43,0-12.83,0-25.66,0-38.49,0-6.38,2.87-10,7.87-10s8.09,3.59,8.11,9.83c0,13.83.07,27.66,0,41.49-.08,13.1-7.78,20.65-20.89,20.66Z"
                                                                        transform="translate(-19.97 -19.97)"></path>
                                                                    <path
                                                                        d="M164,48.36l-52.9,53c-1.76,1.77-3.46,3.61-5.31,5.28-3.94,3.57-9.14,3.63-12.57.24s-3.48-8.64,0-12.56c1.9-2.09,4-4,6-6q23.85-23.85,47.69-47.7c1.24-1.24,2.39-2.55,4.29-4.6-6.58,0-12.17,0-17.76,0-5.88-.06-9.44-3.11-9.45-8s3.55-8,9.43-8q18.74-.07,37.47,0c5.94,0,9,3,9.05,8.86.09,12.66.07,25.32,0,38,0,5.52-3.14,9-7.82,9.12-4.86.11-8.08-3.49-8.14-9.27C164,61.08,164,55.46,164,48.36Z"
                                                                        transform="translate(-19.97 -19.97)"></path>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <p><?php the_sub_field('resource_description', 2131); ?></p>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                                <?php $counter2++;
                            endwhile;
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Repeaters - components of prevention science -->
<?php if ( false && have_rows( 'repeater_block' ) ) : ?>
    <div style="padding:60px 0" class="bg-purple">
        <div class="container">
            <h2 class="text-white mb-4">Components of Prevention Science</h2>
            <div class="repeater__section">
                <?php while ( have_rows( 'repeater_block' ) ) : the_row(); ?>
                    <div class="repeater__block bg-white">
                        <h3 class="text-purple" style="opacity:.75;"><strong><?php the_sub_field( 'repeater_title' ); ?></strong></h3>
                        <?php the_sub_field( 'repeater_text' ); ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- ACES -->
<section class="adverse-childhood-experiences">
    <div class="container">
        <h2 style="margin-bottom:30px">Special Topics: Adverse Childhood Experiences</h2>
        <div class="row">
            <div class="col-md-6">
                <h3 style="margin-top:0;">Adverse Childhood Experiences (ACES)</h3>
                <p>There is a growing body of research on the profound impact that conditions like abuse, neglect, danger, and loss have on children. Especially those from underserved or at-risk families. Research shows a strong link between ACES and a wide range of physical and mental health problems across the life span.</p>
                <p>Current and emerging research helps us understand the effects of ACEs and toxic stress on the body. This can increase risk for health problems, including chronic disease, mental illness, and obesity. ACES include poor education, abuse/neglect, unemployment and job insecurity, poverty, food insecurity, housing instability, adverse environmental conditions, and limited access to health care.</p>
            </div>
            <div class="info-blocks col-md-6">
                <div style="margin-left:-15px; margin-right:-15px;" class="row flex-row">
                    <div class="info-block col-sm-6 match-height">
                        <div class="info-block-inner">
                            <h3>Prevalence</h3>
                            <div>
                                <h3>59%</h3>
                                <p>Percent of U.S. children experience at least one ACE (CDC)</p>
                            </div>
                            <div>
                                <h3>24%</h3>
                                <p>Percent of U.S. children experience three or more ACES (CDC)</p>
                            </div>
                            <div>
                                <h3>32%</h3>
                                <p>Percent of low income families experience at least one food insecurity – one in six US children (USDA)</p>
                            </div>
                        </div>
                    </div>
                    <div class="info-block col-sm-6 match-height">
                        <div class="info-block-inner">
                            <h3>Impact</h3>
                            <div>
                                <h3>40+ Diseases</h3>
                                <p>Dose-response relationship confirmed between ACES and more than forty medical conditions (CDC)</p>
                            </div>
                            <div>
                                <h3>80%</h3>
                                <p>Percent of abused/neglected children will develop a psychiatric disorder (CDC)</p>
                            </div>
                            <div>
                                <h3>80%</h3>
                                <p>Increase in risk of overall psychiatric impairment in children from food insecure families*</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p><small>*Murphy, et al 1998, Relationship between hunger and psychosocial functioning in low income American children</small></p>
            </div>
        </div>
    </div>
</section>

<!-- Subsequent Aces -->
<section>
    <div class="container container-fluid">
        		<!-- Block 1 -->
		<div class="covid-section featured-pub">
			<h2 class="text-purple covid__title">
            	<?php the_field('ace_title_copy');?>
        	</h2>
			<div style="border-color:#3a0e79;" class="block block--gray">
				<!--Start of Tab 1-->
            	<div id="tabs-1">
            		<div class="tab-pane active" id="videos">
              			<div class="mediacenter-content">
							<?php
								$above_slider = get_field('above_slider');
							?>
							<?php $i = 1; while (have_rows('videos_copy')) : the_row(); ?>
											
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
											<?php if (get_sub_field('video_description')): ?>
                        						<div class="mb-4">
                                                    <?php the_sub_field('video_description'); ?>
                                                </div>
                    						<?php endif; ?>  
                                            <?php if (get_sub_field('attachment_link')): ?>
												<a href="<?php the_sub_field('attachment_link'); ?>" target="_blank" class="btn btn-purple">
                                                    <?php the_sub_field('link_text'); ?>
                                                </a>                        								
                    						<?php endif; ?>                  									
                  						</div>
									</div>

								<?php endif; ?>
												
                			<?php $i++; endwhile; ?>										

              			</div>
            		</div>
				</div>
			</div>
		</div>
    </div>
</section>

<!-- More Aces -->
<section>
    <div class="container container-fluid">
        		<!-- Block 1 -->
		<div class="covid-section featured-pub">
			<h2 class="text-purple covid__title">
            	<?php the_field('ace_title');?>
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
											<?php if (get_sub_field('video_description')): ?>
                        						<div class="mb-4">
                                                    <?php the_sub_field('video_description'); ?>
                                                </div>
                    						<?php endif; ?>                    									
											<?php if (get_sub_field('attachment_link')): ?>
												<a href="<?php the_sub_field('attachment_link'); ?>" target="_blank" class="btn btn-purple">
                                                    <?php the_sub_field('link_text'); ?>
                                                </a>                        								
                    						<?php endif; ?>
                  						</div>
									</div>

								<?php endif; ?>
												
                			<?php $i++; endwhile; ?>										

              			</div>
            		</div>
				</div>
			</div>
		</div>
    </div>
</section>


<section class="forum-takeaways">
    <h4>2018 and 2019 Annual Prevention Science Videos and Takeaways</h4>
    <div class="annual-btns">
        <a class="btn" href="/annual-forum-2018" target="_blank">2018 Videos & Takeaways</a>
        <a class="btn" href="/annual-forums-2019-takeaways/" target="_blank">2019 Videos</a>
    </div>
</section>

<section class="learn-more-prevention-science">
    <div class="container">
        <h2>Where Can I Learn More About Prevention Science?</h2>
        <div class="row">
            <div class="col-md-6">                
                <div class="item">
                    <div class="link">
                        <a href="https://www.brightfutures.org/tools/" target="_blank">Bright Futures</a>
                    </div>
                    <p>An American Academy of Pediatrics program dedicated to prevention and health promotion through dissemination of guidelines and resources to primary care providers, families, community organizations, and state partners.</p>
                </div>
                <div class="item">
                    <div class="link">
                        <a href="https://developingchild.harvard.edu/" target="_blank">Harvard University Center on the Developing Child</a>
                    </div>
                    <p>A multidisciplinary team committed to driving science-based innovation in policy and practice to achieve breakthrough outcomes for children facing adversity.</p>
                </div>
                <div class="item">
                    <div class="link">
                        <a href="http://www.healthyfamiliesnewyork.org/default.htm" target="_blank">Healthy Families New York</a>
                    </div>
                    <p>A New York State Office of Children and Family Services program, this is an evidence-based voluntary home visiting model that seeks to improve the health and well-being of infants and children.</p>
                </div>
                <div class="item">
                    <div class="link">
                        <a href="http://www.reachoutandread.org/" target="_blank">Reach Out and Read</a>
                    </div>
                    <p>A nonprofit organization that gives young children a foundation for success by incorporating books into pediatric care, and encouraging families to read aloud together.</p>
                </div>
                <div class="item">
                    <div class="link">
                        <a href="https://www.rwjf.org/en/library/research/2014/07/are-the-children-well-.html" target="_blank">Robert Wood Johnson Foundation – “Are the Children Well?”</a>
                    </div>
                    <p>A report that offers a model and recommendations for promoting the mental wellness of young people, through evidence-based strategies and a focus on wellness.</p>
                </div>
                <div class="item">
                    <div class="link">
                        <a href="https://link.springer.com/journal/volumesAndIssues/11121" target="_blank">Prevention Science journal</a>
                    </div>
                    <p>The official journal of prevention science for the Society for Prevention Research.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="item">
                    <div class="link">
                        <a href="https://melissainstitute.org/" target="_blank">The Melissa Institute for Violence Prevention and Treatment</a>
                    </div>
                    <p>A non-profit organization dedicated to the study and prevention of violence through education, community service, research support and consultation.</p>
                </div>
                <div class="item">
                    <div class="link">
                        <a href="http://nationalacademies.org/hmd/Reports/2009/Preventing-Mental-Emotional-and-Behavioral-Disorders-Among-Young-People-Progress-and-Possibilities.aspx" target="_blank">The National Academies of Sciences – Health and Medicine Division: “Preventing Mental, Emotional, and Behavioral Disorders Among Young People: Progress and Possibilities”</a>
                    </div>
                    <p>A report intended to increase interest in prevention practices that can impede the onset or reduce the severity of mental health and substance use disorders among children, youth, and young adults.</p>
                </div>
                <div class="item">
                    <div class="link">
                        <a href="http://www1.nyc.gov/nyc-resources/thrivenyc.page" target="_blank">ThriveNYC</a>
                    </div>
                    <p>A comprehensive mental health plan for New York City, including resources and Mental Health First Aid trainings.</p>
                </div>
                <div class="item">
                    <div class="link">
                        <a href="https://www.aap.org/en-us/advocacy-and-policy/aap-health-initiatives/healthy-foster-care-america/Pages/Trauma-Guide.aspx" target="_blank">Trauma Toolbox for Primary Care</a>
                    </div>
                    <p>A six-part series designed to provide primary care physicians with the tools to address adverse childhood experiences (ACEs) with patients and their families.</p>
                </div>
                <div class="item">
                    <div class="link">
                        <a href="https://youth.gov/youth-topics/youth-mental-health/mental-health-promotion-prevention" target="_blank">Youth.gov – “Promotion and Prevention”</a>
                    </div>
                    <p>A U.S. government website focused on effective youth programs that defines and considers a variety of promotion and prevention interventions for positive youth mental health outcomes.</p>
                </div>
                <div class="item">
                    <div class="link">
                        <a href="http://nyztt.org/" target="_blank">Zero to Three Network</a>
                    </div>
                    <p>Promotes the optimal development of young children, their families, and their communities in the New York metropolitan area.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>