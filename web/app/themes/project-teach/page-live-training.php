<?php 
    require_once('header.php'); 
    require(dirname(__FILE__)."/breadcrumbs.php");
?>


<div class="consultation_text">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="consultation_map">
                    <figure>
                        <?php get_template_part('templates/content', 'map-no-labels'); ?>
                    </figure>
                    <p>
                        <?php get_template_part('templates/content', 'map-labels'); ?>
                    </p>
                </div>
            </div>
            <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="consultation_dif">
                    <?php
                        if (have_rows('text_blocks')):
                            while (have_rows('text_blocks')) : the_row();
                                if (get_sub_field('title')) : ?>
                                    <p style="padding-bottom:0;">
                                        <strong>
                                            <?php the_sub_field('title'); ?>
                                        </strong>
                                    </p>
                                <?php endif;
                                if (get_sub_field('text')) : ?>
                                    <div class="standard">
                                        <?php the_sub_field('text'); ?>
                                    </div>
                                <?php endif;
                                if (get_sub_field('button_link')) : ?>
                                    <p>
                                        <a style="margin-left:0; text-transform:uppercase;" class="btn learn levent" title="Education Btn" href="<?php the_sub_field('button_link'); ?>"><?php the_sub_field('button_text'); ?></a>                                                                            
                                    </p>
                                <?php endif;
                            endwhile;
                        endif;
                    ?> 
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>