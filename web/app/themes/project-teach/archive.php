<?php require_once(dirname(__FILE__).'/header.php'); ?>
<div class="regional-provider">
<div class="banner" style="background-image: url(<?php echo get_pt_attachment_url('2017/09/get-involved-bg.png'); ?>)">
  <div class="container">
    <div class="row">
      <div class="banner-text col-md-8 col-sm-12 col-xs-12">
        <h1>Articles by <?php the_author_meta('display_name'); ?></h1>
        <p>Helpful articles, resources and links related to children's mental health..</p>
      </div>
    </div>
  </div>
</div>
<?php require(dirname(__FILE__)."/breadcrumbs.php"); ?>
<section class="blog-posts">
	<div class="container-fluid container">
		<div class="row">
			<main class="main cf" role="main">
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					<article id="blog-<?php the_ID(); ?>" <?php post_class(); ?>>
					  	<div class="header">
					    	<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					  	</div>
					  	<section>
					  		<div class="entry-summary">
					  			<div class="row">
						            <?php $image_url = get_attachment_image($post->ID, 'thumbnail', 'DESC'); ?>
                                    <?php if($image_url != ''): ?>
			    		                <div class="col-sm-3 image">
			        	                    <img class="img-responsive" src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>" />
			                            </div>
			                            <div class="col-sm-9 info">
			                 	            <?php html5wp_excerpt('40'); ?>
			                                <div class="read-more">
			                                    <div class="meta">
			                                    <time class="updated"><?php the_time('F j, Y'); ?></time> <p class="byline author vcard"><?php _e( 'By', 'html5blank' ); ?> <?php the_author_posts_link(); ?></p>
			                                    </div>  
			                                    <a class="btn btn-primary" href="<?php the_permalink(); ?>">Read More</a>
			                                </div>
			                            </div>
					                <?php else: ?>
					  	                <div class="col-sm-12 info">
					                        <?php html5wp_excerpt('40'); ?>
					                        <div class="read-more">
					                            <div class="meta">
					                            <time class="updated"><?php the_time('F j, Y'); ?></time> <p class="byline author vcard"><?php _e( 'By', 'html5blank' ); ?> <?php the_author_posts_link(); ?></p>
					                            </div>
					                            <a class="btn btn-primary" href="<?php the_permalink(); ?>">Read More</a>
					                        </div>
					  	                </div>
					                <?php endif; ?>
					  		    </div>
					  	    </div>
						</section>
					</article>
				<?php endwhile;
					the_posts_navigation(); ?>
				<?php else: ?>
					<article>
						<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
					</article>
				<?php endif; ?>
			</main>
			<aside class="sidebar" role="complementary">
				<?php dynamic_sidebar('primary'); ?>
			</aside>
		</div>
	</div>
</section>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>