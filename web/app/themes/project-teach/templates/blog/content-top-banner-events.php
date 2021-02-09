<?php 
	// Backup Banner Image
	if (!isset($banner_image)) {
		$banner_image = get_template_directory_uri() . '/assets/images/publications-bg.jpg';
	}
?>

<div class="banner banner--blog" style="background-image: linear-gradient(rgba(58, 14, 121, .5), rgba(58, 14, 121, .9)), url('<?php echo $banner_image; ?>')">
	<div class="wrap wrap--banner">
		<h2 style="color:white; font-size:32px; font-weight:bold; text-align:center"><?php the_title(); ?></h2>
		<hr style="width:220px; margin-bottom:40px;">
		<?php 
            $date_string = get_field('start_date');
            $date = DateTime::createFromFormat('Ymd', $date_string);
        ?>
		<h2 style="color:white; text-align:center">
			<?php echo $date->format('M j, Y'); ?>
			<?php the_field('start_time'); ?> - <?php the_field('end_time'); ?>
		</h2>
		<div style="text-align:center">
			<a href="<?php the_permalink(); ?>" class="btn btn-white">Register</a>
		</div>
	</div>
</div>