<?php

define('WP_USE_THEMES', false);

class ManageImages{

	public static function init(){
		require ('../../../../../../wp-load.php');
	}

	public static function getAll(){
		$args = array(
				'post_type' => 'attachment',
				'post_status' => 'published',
				'numberposts' => -1
		);
		$attachments = get_posts($args);
		$urls = array();

		if ($attachments) {
			$post_count = count ($attachments);
		    foreach ($attachments as $attachment) {
				$urls[$attachment->ID] = get_attachment_link($attachment->ID);
			}
		}
		return $urls;
	}

	public static function listAll(){
		$urls = ManageImages::getAll();
		echo count($urls) . "\n";
		foreach ($urls as $id => $value) {
			echo "$id,$value\n";
		}
	}
}

ManageImages::init();
ManageImages::listAll();
