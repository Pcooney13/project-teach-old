<?php 
	if (is_singular('consultants')) { // Consultant Pages  [ single-consultants.php ]

		$terms = get_the_terms( get_the_ID(), 'category');
		// Get consultant banner image if set
		if( !empty($terms) && !empty($banner_image)) {
    		$term = array_pop($terms);
			$banner_image = get_field('banner_image', $term );
		}
		// Get consultant banner info if set
		if (get_field('name')) { $banner_text = '<h1 class="banner__title">' . get_field('name') . '</h1>'; }
		if (get_field('affliation')) { $banner_text .= '<p class="banner__text">' . get_field('affliation') . '</p>'; }

	} elseif(is_page('syllabi')){
		$banner_text = '<h1 class="banner__title">Syllabi</h1>';

	} elseif (is_single()) { // Single Post Pages [ single.php ]

		$category_array = get_the_category();
		$category_name = $category_array[0]->name;
		$parent_category = get_cat_name($category_array[0]->parent);
		$terms = get_the_terms( get_the_ID(), 'category');
		// Get first category banner image if set
		if( !empty($terms) ) {
			$banner_image = get_field('banner_image', $terms[0] );
		}
		// Get first category banner info if set
		if ($parent_category && $parent_category !== $category_name) {
			$banner_text = '<h1 class="banner__title">' . $parent_category . ":<br>" . $category_name . '</h1>';
		} else {
			$banner_text = '<h1 class="banner__title">' . $category_name . '</h1>';
		}

	} else { // Category Pages [ category.php ]

		// Heads up! Category info gets pulled from the most recent post on screen.
		// Category pages need to loop through that posts' categories to  pull
		// the correct data for the current category

		$category_array = get_the_category();

		foreach ($category_array as $cat) {

			if(strpos($_SERVER['REQUEST_URI'], $cat->slug) !== false) {
				$category_name = $cat->name;
				$parent_category = get_cat_name($cat->parent);
				// Get category banner image that matches URL if set
				$terms = get_the_terms( get_the_ID(), 'category');
				if( !empty($terms) ) {
					foreach ($terms as $term) {
						if ($term->slug === $cat->slug) {
							$banner_image = get_field('banner_image', $term );
						}
					}
				}
				// Get category banner info that matches URL if set
				if ($parent_category && $parent_category !== $category_name) {
					$banner_text = '<h1 class="banner__title">' . $parent_category . ":<br>" . $category_name . '</h1>';
				} else {
					$banner_text = '<h1 class="banner__title">' . $category_name . '</h1>';
				}
			}	
		}
	}

	// Backup Banner Image
	if (!isset($banner_image)) {
		$banner_image = get_template_directory_uri() . '/assets/images/publications-bg.jpg';
	}
	// Backup Banner Text
	if (!isset($banner_text)) {
		$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$path = parse_url($url, PHP_URL_PATH);
		$pageName = substr($path, 1, -1);
		// $pattern = "\/(.*?)\/";
		// var_dump(preg_replace($pattern, $path));
		$banner_text = '<h1 class="banner__title">Project TEACH ' . ucfirst($pageName) . '</h1>';
	}
	if (is_category('intensive-training')) {
		$banner_text = '<h1 class="banner__title">2020 Intensive Training</h1>';
	}
?>



<div class="banner banner--blog" style="background-image: linear-gradient(rgba(58, 14, 121, .5), rgba(58, 14, 121, .9)), url('<?php echo $banner_image; ?>')">
	<div class="wrap wrap--banner">
		<?php echo $banner_text;?>
	</div>
</div>