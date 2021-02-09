<?php require_once('header.php'); ?>
<?php require(dirname(__FILE__) . "/breadcrumbs.php"); ?>

<!-- Top Blocks -->
<?php $three_blocks = get_field('3_blocks');
if ($three_blocks): ?>    
    <section class="intro-block questions">
        <div class="container-fluid">
            <div style="display:flex; flex-wrap:wrap;" class="row">
                <div class="col-md-4 match-height purple">
                    <div class="inner">
                        <h3><?php echo $three_blocks['title_block_1']; ?></h3>
                        <p><?php echo $three_blocks['text_block_1']; ?></p>
                    </div>
                </div>
                <div class="col-md-4 match-height green">
                    <div class="inner">
                        <h3><?php echo $three_blocks['title_block_2']; ?></h3>
                        <p><?php echo $three_blocks['text_block_2']; ?></p>
                    </div>
                </div>
                <div class="col-md-4 match-height blue">
                    <div class="inner">
                        <h3><?php echo $three_blocks['title_block_3']; ?></h3>
                        <p><?php echo $three_blocks['text_block_3']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Intro Section -->
<section class="component-positive-impacts">
    <div class="container">
        <div class="row">
            <h2><?php the_field('title_intro'); ?></h2>
            <p><?php the_field('text_intro'); ?></p>
            <?php
                if (have_rows('icon_block')):
                    while (have_rows('icon_block')) : the_row(); ?>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-txt">
                                <?php $image = get_sub_field('image');
                                if (!empty($image)): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                                <p><?php the_sub_field('text'); ?></p>
                            </div>
                        </div>
                    <?php endwhile;
                endif;
            ?>
        </div>
    </div>
</section>

<!-- 2 Column Banner - Text/Image -->
<!-- <section class="intro-block prevention-is-important">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 py-5 block-content">
                <h2 class="pb-4"><?php the_field('title_2_col'); ?></h2>
                <div>
                    <?php the_field('text_2_col'); ?>
                </div>                
            </div>
            <div class="col-md-6 py-5 block-image">
                <?php $image = get_field('image_2_col');
                if (!empty($image)): ?>
                    <img class="img-responsive visible-sm visible-xs" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
        </div>
    </div>
</section> -->

<!-- Resource Blocks -->
<? get_template_part("templates/parent-and-family/content", "resources"); ?>

<!-- Resource Dropdowns / Accordions -->
<section class="learn-more-prevention-science">
    <div class="container">
        <h2 style="padding:0; color:#7bbf43"><?php the_field('dropdown_title'); ?></h2>
        <div class="row">
            <div class="col-md-12">
                <div style="margin:15px 0 30px;">
                    <?php the_field('dropdown_text'); ?>
                </div>

                <?php if (have_rows('dropdown_resources')): 
                    $dd_count=1; ?>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <?php while (have_rows('dropdown_resources')) : the_row(); ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a style="color:#7bbf43" data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse_<?php echo $dd_count; ?>" aria-expanded="false">
                                            <?php the_sub_field('sub_section_title');?>
                                        </a>
                                    </h4>
                                </div>
                                <?php if (have_rows('resource')): ?>
                                    <div id="collapse_<?php echo $dd_count; ?>" class="panel-collapse collapsed collapse">
                                        <div class="panel-body">
                                            <?php while (have_rows('resource')) : the_row(); ?>
                                                <div class="item">
                                                    <?php $link = get_sub_field('resource_link');
                                                    if ($link):
                                                        $link_url = $link['url'];
                                                        $link_title = $link['title'];
                                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                                        ?>
                                                        <div class="link">
                                                            <a href="<?php echo esc_url($link_url); ?>"
                                                            target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php the_sub_field('resource_text'); ?>
                                                </div>
                                            <?php endwhile; ?>                                            
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php 
                        $dd_count++;
                        endwhile; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<div class="consultation-health"
    style="background-image:url(/wp-content/uploads/2017/09/consulation-improve-health-bg.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 improve-health">
                <h2>Parents and Family Members</h2>
                <p>Make sure your child's physician and other staff in the primary care practice know about Project
                    TEACH.</p>
                <p>Download and print a Project TEACH flyer to give to your physician.</p>
                <a target="_blank" href="/wp-content/uploads/2019/05/ProjectTEACH_Parent_Flyer_Nov2017.pdf" class="btn"
                    title="DOWNLOAD">
                    DOWNLOAD
                </a>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>