<?php

class WordpressConnect{

	public static function addCourse($my_post){
		define('WP_USE_THEMES', true);

		/** Loads the WordPress Environment and Template */
		require ('../../../../../wp-blog-header.php');

		// Insert the post into the database.
		wp_insert_post( $my_post );

		$post_id = wp_insert_post( $post, $wp_error);
		return $post_id;
	}
}

$courses = ParseJSON::getJson();
foreach($courses as $id => $data){

	$my_post = array(
		'ID'    => $id,
		'post_type' 	=> 'courses',
		'post_title'    => $data['title'],
		'post_content'  => 'This is my post.',
		'post_status'   => 'published',
		'post_author'   => 1,
	};

	$wpId = WordpressConnect::addCourse($myPost);
	echo "wordpress ID: $wpId<br />\n";
}

