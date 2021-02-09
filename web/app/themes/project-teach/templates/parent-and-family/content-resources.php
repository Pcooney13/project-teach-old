<?php if (have_rows('topic_resource')):
    $count = 1;
    while (have_rows('topic_resource')) : the_row(); ?>                
        <section class="py-8" <?php if($count % 2 == 0) {echo ' style="background-color:#f2f2f2;"';} ?> >
            <div class="container">
                <!-- 1st Section - Add Social Buttons -->
                <?php if ($count == 1) : ?>
                    <div class="flex-text mb-4">
                        <!-- 1st Topic Title -->
                        <h2>
                            <?php the_sub_field('topic_title'); ?>
                        </h2>
                        <!-- 1st Share Buttons -->
				        <div class="share flex-share">									
				        	<div class="share__content" style="margin-left:auto;">
				        		<span class="share__text">SHARE</span>
				        		<?php echo do_shortcode('[Sassy_Social_Share]'); ?>
				        	</div>
                        </div>
                        <!-- 1st Topic Text -->
                        <?php if (get_sub_field('topic_text')) : ?>
                            <p class="py-2">
                                <?php the_sub_field('topic_text'); ?>
                            </p>
                        <?php endif; ?>
                        <!-- Topic Title -->           
                    </div>  
                    <h3>Mental Wellness</h3>
                <?php else: ?>  
                    <!-- Topic Title -->           
                    <h3><?php the_sub_field('topic_title'); ?></h3>
                    <!-- Topic Text -->
                    <?php if (get_sub_field('topic_text')) : ?>
                        <p class="py-4"><?php the_sub_field('topic_text'); ?></p>
                    <?php endif; ?>
                <?php endif; ?>
                <!-- Blocks -->
                <div class="py-4 row pf-resources-video-row">
                    <?php if (get_sub_field('resources')) :
                        $inner_count = 1;
                        while( have_rows('resources') ) : the_row();
                            $title = get_sub_field('title');
                            $video = get_sub_field('video');
                            $image = get_sub_field('image');
                            $size = 'full';
                            ?>
                            <!-- Block -->                            
                            <div style="display:flex; flex-direction:column; margin-bottom:30px;" class="col-sm-6 col-md-4">
                                <!-- Image - add class for video if necessary -->
                                <a href="#" class="<?php if(get_sub_field('video')) { echo 'video-link'; } ?>" data-toggle="modal" data-target="#featured_topic_video_<?php echo $count . '_' . $inner_count; ?>">
                                    <img class="img-responsive" src="<?php echo $image; ?>">
                                </a>
                                <!-- Title -->
                                <div class="resource-title-box">
                                    <a href="#" data-toggle="modal" data-target="#featured_topic_video_<?php echo $count . '_' . $inner_count; ?>">
                                        <p class="resource-title"><?php echo $title; ?></p>
                                    </a>
                                </div>
                                <!-- PDF -(if)- Multiple Languages -->
                                <?php if (have_rows('pdf')): ?>
                                    <div class="pdf">
                                        <div class="pdf-resource cf">
                                            <img class="pdf-icon" src="<?php bloginfo('template_directory'); ?>/assets/images/Adobe_PDF_icon.svg">
                                            <div class="dropdown show">
                                                <a style="color:white;" class="btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Select Language
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <?php while (have_rows('pdf')) : the_row(); ?>
                                                        <a class="dropdown-item" target="_blank" href="<?php the_sub_field('file'); ?>"><?php the_sub_field('language'); ?></a>
                                                    <?php endwhile; ?>
                                                </div>
                                            </div>
                                            <img class="download-icon disabled" src="<?php bloginfo('template_directory'); ?>/assets/images/arrows.svg">
                                        </div>
                                    </div>
                                <!-- PDF -(else)- Single File -->
                                <?php elseif (get_sub_field('single_file')): ?>
                                    <div class="pdf">
                                        <div class="pdf-resource cf">
                                            <img class="pdf-icon" src="<?php bloginfo('template_directory'); ?>/assets/images/Adobe_PDF_icon.svg">
                                            <div class="dropdown show">
                                                <?php $file = get_sub_field('single_file');
                                                if ($file): ?>
                                                    <a style="color:white;" target="_blank" class="btn-secondary dropdown-toggle" href="<?php echo $file['url']; ?>">
                                                        Download PDF
                                                    </a>                                                
                                                <?php endif; ?>
                                            </div>
                                            <img class="download-icon disabled" src="<?php bloginfo('template_directory'); ?>/assets/images/arrows.svg">
                                        </div>
                                    </div>
                                <?php endif; ?>                        
                            </div>
                            <!-- Modal -->
                            <div class="modal" id="featured_topic_video_<?php echo $count . '_' . $inner_count; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="vertical-alignment-helper">
                                    <div class="modal-dialog vertical-align-center">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h3 class="modal-title" id="myModalLabel"><?php echo $title; ?></h3>
                                            </div>
                                            <div class="modal-body">
                                                <?php if ($video) :?>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe width="560" height="315" src="<?php echo $video; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                                </div>               
                                                <?php elseif ($image) : ?>
                                                    <img class="img-responsive" src="<?php echo $image; ?>">
                                                <?php endif; ?>                             
                                                <div class="p-4">                                                                                                      
                                                    <!-- Additional Downloadables -->
                                                    <?php if (get_sub_field('pdf_title')) : ?>
                                                        <p class="py-2">
                                                            <strong>
                                                                <?php the_sub_field('pdf_title');?>
                                                            </strong>
                                                        </p>
                                                    <?php endif;?>                                                    
                                                    <ul class="pl-4">                                            
                                                        <?php
                                                        $file = get_sub_field('single_file');
                                                        if ($file): ?>
                                                            <li>
                                                                <strong>
                                                                    <a class="text-blue" href="<?php echo $file['url']; ?>">
                                                                        <?php echo $file['title']; ?>
                                                                        <div style="display:inline-block; width:38px; padding:3px 5px; margin-left:5px; border-radius:5px; background-color:#039fda; font-weight:bold; color:white;">PDF</div>
                                                                    </a>
                                                                </strong>                                                                    
                                                            </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $inner_count++; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                
                <?php $count++; ?>
            </div>
        </section>
    <?php endwhile;
endif; ?>
