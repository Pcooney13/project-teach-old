<?php /* Template Name: Faqs */ ?>
<?php require_once('header.php'); ?>

<style>
.panel-default>.panel-heading {
    background:#039fda;
}
</style>

<div>

    <?php require(dirname(__FILE__)."/breadcrumbs.php"); ?>

    <div style="background: white;" class="project_txt">
        <div class="container">
            <div class="row">
                 <p style="font-family: 'museo-sans', sans-serif; font-size:18px; line-height:30px; font-weight:400;" class="standard">Welcome to the Project TEACH FAQ section. Below are most frequently asked questions and answers. Our goal is to be a strong resource for pediatric primary care providers in all aspects of mild-to-moderate mental health concerns for children, adolescents, and young adults. If you do not see your question here, please <a href="http://project-teach.launchpaddev.com/contact-us/">contact us</a>.</p>
            </div>
        </div>
     </div>

	<div class="faq-content">
		<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <?php if (have_rows('sub_section')) :
                            $counter = 1; 
                            while (have_rows('sub_section')) : the_row(); ?>
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <!-- Accordion Titles, click to open accordions -->
                                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse-<?php echo $counter ?>" aria-expanded="false">
                                                <?php the_sub_field('sub_section_title'); ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-<?php echo $counter ?>" class="panel-collapse collapsed collapse">
                                        <div class="panel-body">

                                            <!-- if info box has been filled out it will go above the link options-->
                                            <?php if (get_sub_field('info_box')) : ?>
                                                <div class="item item_info-box">
                                                    <p style="padding-bottom:0;"><?php the_sub_field('info_box'); ?></p>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>

                                <?php $counter++;
                            endwhile;
                        endif; ?>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>

<?php require_once('footer.php'); ?>