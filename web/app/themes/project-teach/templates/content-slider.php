<!--<div class="row">
	<div class="col-lg-1 col-md-2 col-2 flexed-drop">
		<div class="slick-arrows courses"></div>
		<div class="slider-view-all">
			<a href="/education" title=""><i></i></a>
		</div>
	</div>
	<div class="col-lg-11 col-md-10 col-10">
		<div class="slick-slider courses">
		<?php 
		$time = current_time( 'timestamp' );
		$counter = 0;
		// args
		$args = array(
			'post_type'			=> 'education',
			'posts_per_page' 	=> 12,
			'post_status'       => 'publish',
			'meta_key' 		    => 'course_start_dates',
			'meta_value'    	=> $time, 
			'meta_compare'      => '>=', 
		    'orderby'			=> 'meta_value',
		    'order' 			=> 'DESC',
			);


		// query
		$the_query = new WP_Query( $args );

		if( $the_query->have_posts() ): while( $the_query->have_posts() ) : $the_query->the_post();
			$thumb_id = get_post_thumbnail_id();
			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
			$thumb_url = $thumb_url_array[0];
			$link = get_field('course_link');

		?>
			<div class="slick-slide">
				<a href="<?php echo $link; ?>">
					<div class="slick-img" style="background-image:url('<?php echo $thumb_url; ?>');"></div>
					<div class="slick-slider-text">
						<h3 data-toggle='tooltip' data-placement='bottom' title='<?php echo get_the_title(); ?>'><?php echo get_short_title('60'); ?></h3>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-right-icon.png');">
					</div>
				</a>
			</div>
	    <?php $counter++; endwhile; endif; wp_reset_postdata(); ?>
		</div>
		<div class="slick-bar courses"></div>
	</div>
</div>-->
<?php 
	$featured_posts = get_field('course_featured_selector');
	$posts = get_field('course_selector');
?>
<div class="row">
	<div class="col-lg-1 col-md-2 col-2 flexed-drop">
		<div class="slick-arrows courses"></div>
		<!--<div class="slider-view-all">
			<a href="/education" title=""><i></i></a>
		</div> -->
	</div>
	<div class="col-lg-11 col-md-10 col-10">
		<div class="slick-slider courses">
		<?php if( $featured_posts ): foreach( $featured_posts as $p ):
			$count = 60;
	        $title = get_the_title( $p->ID );
	        if($title && (strlen($title) > $count)){
                $title = strip_tags($title);
                $title = substr($title, 0, $count);
                $title = substr($title, 0, strripos($title, " "));
                $title = $title.'...';
            }
			$thumb_id = get_post_thumbnail_id($p->ID);
			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
			$thumb_url = $thumb_url_array[0];
			$link = get_field('course_link', $p->ID );

		?>
			<div class="slick-slide featured">
				<a href="<?php echo $link; ?>" target="_blank" >
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/blue-star.png" class="star">
					<div class="slick-img" style="background-image:url('<?php echo $thumb_url; ?>');"></div>
					<div class="slick-slider-text ">
						<h3 data-toggle='tooltip' data-placement='bottom' title='<?php echo get_the_title( $p->ID ); ?>'><?php echo $title; ?></h3>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-right-icon.png');">
					</div>
				</a>
			</div>
		<?php endforeach; endif; ?>
		<?php if( $posts ): foreach( $posts as $p ):
			$count = 60;
	        $title = get_the_title( $p->ID );
	        if($title && (strlen($title) > $count)){
                $title = strip_tags($title);
                $title = substr($title, 0, $count);
                $title = substr($title, 0, strripos($title, " "));
                $title = $title.'...';
            }
			$thumb_id = get_post_thumbnail_id($p->ID);
			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
			$thumb_url = $thumb_url_array[0];
			$link = get_field('course_link', $p->ID);

		?>
			<div class="slick-slide">
				<a href="<?php echo $link; ?>" target="_blank">
					<div class="slick-img" style="background-image:url('<?php echo $thumb_url; ?>');"></div>
					<div class="slick-slider-text">
						<h3 data-toggle='tooltip' data-placement='bottom' title='<?php echo get_the_title( $p->ID ); ?>'><?php echo $title; ?></h3>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-right-icon.png');">
					</div>
				</a>
			</div>
		<?php endforeach; endif; ?>
		</div>
		<div class="slick-bar courses"></div>
	</div>
</div>