<?php require_once(dirname(__FILE__).'/header.php'); ?>
<div class="privacy-plcy">
     <div class="home-comman-text">
        <div class="container">
            <div class="row">
                 <ol class="breadcrumb">
                    <li><a href="/home/" title="HOME">HOME</a><p>SEARCH RESULTS</p></li>
                  </ol>
            </div>
        </div>
     </div>
	<div style="padding-top:20px;" class="privacy-policy-content">
		<div class="container">
			<div class="row">
<?php if ( have_posts() ) { ?>
	<?php /* Start the Loop */ ?>
	<?php /* while ( have_posts() ) : the_post(); */ ?>
	<?php if ( have_posts() ) {  ?>
	<?php 		_e("<h2 style='font-weight:bold;color:#000'>Search Results for: ".get_query_var('s')."</h2>");  ?>
	<ul class="search_result_list">
	<?php 	while ( have_posts() ) { ?>
		<li>
			<?php the_post(); ?><a href="<?php the_permalink(); ?>">
				<span style="font-size:20px;" class="search-results">
					<?php the_title(); ?>
				</span></a><p class="search_results"><?php the_excerpt() ?></p></li>
	<?php 	} ?>
	</ul>
<?php 	} ?>
<?php }else{ ?>
        <h2 style='font-weight:20px;font-weight:bold;color:#000'>Nothing Found</h2>
        <div class="alert alert-info">
          <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
        </div>
<?php } ?>
			</div>
		</div>
	</div>
</div>
<div style="padding-bottom:40px;"></div>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
