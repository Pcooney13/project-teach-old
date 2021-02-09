<?php
    // Template Name: mmh
    require_once('header.php');

    // Schedule -> templates/content-consultation-schedule.php
    // CSS      -> css/mmh.css

    // Breadcrumbs
    require(dirname(__FILE__) . "/breadcrumbs.php");
?>

<?php if (have_rows('topic_resource')):
    $count = 1; ?>
    <div class="container">
        <!-- Page Title -->
        <h1><strong><?php the_field('title'); ?></strong></h1>
        <p><?php the_field('text'); ?></p>
        </div>  

        <?php while (have_rows('topic_resource')) : the_row(); ?>                
            <section class="py-8" <?php if ($count % 2 == 0) {
                echo ' style="background-color:#f2f2f2;"';
            } ?> >
            <div class="container">
    
                <!-- Topic Title -->           
                <h2><?php the_sub_field('topic_title'); ?></h2>
                <!-- Topic Text -->
                <?php if (get_sub_field('topic_text')) : ?>
                    <p class="pb-4"><?php the_sub_field('topic_text'); ?></p>
                <?php endif; ?>
                <!-- Syllabus Link -->
                <?php if ($count > 1) : ?>
                    <p class="pb-4"><a href="/syllabi/virtual-statewide-intensive-training-childrens-mental-health-for-primary-care-providers/#topic-<?php echo $count - 1;?>"><?php the_sub_field('topic_title'); ?> Syllabus</a></p>
                <?php endif; ?>
                <!-- Blocks -->
                <div class="py-4 row pf-resources-video-row">
                    <?php if (get_sub_field('resources')) :
                        $inner_count = 1;
                        while (have_rows('resources')) : the_row();
                            $module = get_sub_field('module');
                            $title = get_sub_field('title');
                            $presenter = get_sub_field('presenter');
                            $video = get_sub_field('video');
                            $image = get_sub_field('image');
                            $size = 'full';
                            ?>
                            <!-- Block -->                            
                            <div style="display:flex; flex-direction:column; margin-bottom:30px;" class="col-sm-6 col-md-4">
                                <!-- Image - add class for video if necessary -->
                                <a href="#" 
                                    class="<?php if (get_sub_field('video')) echo 'video-link'; ?>" 
                                    data-toggle="modal" 
                                    data-target="#featured_topic_video_<?php echo $count . '_' . $inner_count; ?>"
                                >
                                    <img class="img-responsive" src="<?php echo $image; ?>">
                                </a>
                                <!-- Title -->
                                <div style="flex-direction:column;" class="resource-title-box text-center">
                                    <p style="text-decoration:underline" class="text-white text-sm"><strong><?php echo $module;?></strong></p>
                                    <p style="line-height:1.25;" class="text-white text-xl"><strong><?php echo $title; ?></strong></p>
                                    <p class="text-white text-sm"><?php echo $presenter;?></p>
                                </div>                     
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
        <?php endwhile; ?>
<?php endif; ?>

<?php require_once('footer.php'); ?>
