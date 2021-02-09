<?php 
	if (get_field('show_hero_banner')) {

		$hero_image = get_field('hero_image');
		$hero_color = get_field('hero_color');
		$hero_title = get_field('hero_title');
		$hero_text = get_field('hero_text');
		//Convert Color to RGBA
		$RGB_color = hex2rgb($hero_color);
		$Final_Rgb_color = implode(", ", $RGB_color);

		if( !empty( $hero_image ) ): ?>

			<div class="hero--wrapper">
				<div class="hero--image" style="background-image: url('<?php echo esc_url($hero_image['url']); ?>')"></div>
				<div class="hero--color" style="opacity:.67; background:<?php echo $hero_color; ?>;"></div>
				<div class="hero--content container">
					<div class="row">
						<div class="col-sm-12">
							<h1 class="hero--title"><?php echo $hero_title;?></h1>
							<div class="hero--text"><?php echo $hero_text;?></div>
						</div>
					</div>
				</div>
			</div>

		<?php endif; 
	}
?>