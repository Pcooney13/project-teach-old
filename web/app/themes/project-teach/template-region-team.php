<?php
/* Template Name: Region Team */
require_once('header.php');
?>

<!-- Breadcrumbs -->
<?php require(dirname(__FILE__) . "/breadcrumbs.php"); ?>

<main id="site-main" class="site-main">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="team-section">
                    <?php  if( have_rows('team_block') ):
                        $count = 1 ?>
                        <?php while ( have_rows('team_block') ) : the_row(); ?>
                            <div class="team-block-container">
                                <?php if (get_sub_field('team_title')) : ?>
                                    <h2><?php the_sub_field('team_title'); ?></h2>
                                <?php endif; ?>
                                <?php  if( have_rows('team_members') ): ?>
                                    <div class="team-block-wrapper">
                                        <?php while ( have_rows('team_members') ) : the_row(); ?>

                                            <div class="team-block-row" <?php if ($count % 2 === 0) echo 'style="background-color:#f7f7f7;"'?>>
                                            <?php if(get_sub_field('image')):
                                                $image = get_sub_field('image'); ?>
                                                <img class="team-image" src="<?php echo wp_get_attachment_image_url( $image, 'full' ); ?>" alt="<?php the_sub_field('name'); ?>" title="<?php the_sub_field('name'); ?>">
                                            <?php else:?>
                                                <img class="team-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.png" alt="<?php the_sub_field('name'); ?>" title="<?php the_sub_field('name'); ?>">
                                            <?php endif;?>                                                                        
                                                <div class="team-member-info">
                                                    <p class="team-title team-core-title team-info"><?php the_sub_field('title'); ?></p>
                                                    <?php if (get_sub_field('bio')) : ?>
                                                        <a href="#" data-toggle="modal" data-target="#<?php echo 'modal-' . $count; ?>" class="team-name team-info"><?php the_sub_field('name'); ?></a>
                                                    <?php else: ?>
                                                        <p class="team-name team-info"><?php the_sub_field('name'); ?></p>
                                                    <?php endif;?>
                                                    <?php if (get_sub_field('core_team_title')) : ?>
                                                        <p class="team-title team-info"><?php the_sub_field('core_team_title'); ?></p>
                                                    <?php endif;?>
                                                </div>
                                                <div class="team-member-contact">
                                                    <p class="team-phone team-info"><?php the_sub_field('phone'); ?></p>
                                                    <a class="team-email team-info" href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a>
                                                </div>
                                            </div>

                                            <?php if (get_sub_field('bio')) : ?>
                                                <div class="modal team-bio" id="<?php echo "modal-" . $count; ?>" role="dialog" aria-labelledby="<?php echo "modal-" . $count; ?> Label">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="<?php echo $slug; ?>Label"><h3><?php the_sub_field('name'); ?></h3></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <?php if(get_sub_field('image')):
                                                                        $image = get_sub_field('image'); ?>
                                                                        <div class="col-sm-3 image">
                                                                            <img class="img-rounded img-responsive" src="<?php echo wp_get_attachment_image_url( $image, 'full' ); ?>" alt="<?php the_sub_field('name'); ?>" title="<?php the_sub_field('name'); ?>">
                                                                        </div>
                                                                        <div class="col-sm-9">
                                                                            <?php the_sub_field('profile'); ?>
                                                                        </div>
                                                                    <?php else: ?>
                                                                        <div class="col-sm-12">
                                                                            <?php the_sub_field('profile'); ?>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif;?>

                                            <?php $count++;?>

                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
</main>

<?php require_once('footer.php'); ?>