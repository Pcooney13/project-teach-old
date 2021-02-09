<?php
	// import the Intervention Image Manager Class
	use Intervention\Image\ImageManagerStatic as Image;

	// configure with favored image driver (gd by default)
	Image::configure();

	function lp_resize_image($src, $imgname)
	{	
		// and you are ready to go ...
		$image = Image::make(file_get_contents($src));

		$image->resize(800, 800, function ($constraint) {
		    $constraint->aspectRatio();
		    $constraint->upsize();
		});

		$image->save(WP_CONTENT_DIR . '/themes/project-teach/lib/ethos/ethos-uploads/' . $imgname, 60);

		$image->destroy();
	}
	function lp_deleteImg($src)
	{
		if (is_file($src))
		{
			unlink($src);
		}
	}