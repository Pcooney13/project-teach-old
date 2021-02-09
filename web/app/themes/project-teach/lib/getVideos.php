<?php

define ('WP_LOADFILE_DIR', '../../../../');
define( 'WP_USE_THEMES', false );
require_once( WP_LOADFILE_DIR . 'wp-load.php' );

function getVideos(){
	$ms = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$rs = mysqli_query($ms, "select * from pt_postmeta where post_id=516 AND meta_key like 'videos_%_video_title' ORDER BY meta_id ASC");
	$videos = array();
	$filterColumns = array(
		'video_index',
	);


	if ($rs){
		while ($row = mysqli_fetch_assoc($rs)){
				$pts  = explode('_', $row['meta_key']);
				$id = $pts[1];
				$attr= str_replace("videos_" . $id . "_", "", $row['meta_key']);
				$videos[$id][$attr] = $row['meta_value'];
				$videos[$id]['video_index'] = $id +1;
		}
		//ksort($videos);
		$videoOutput = array();
		foreach($videos as $video){
			$videoOutput[] = $video;
		}
	}
	return array('videos' => $videoOutput);
}

$return = getVideos();
$videos = $return;
echo json_encode($videos, 1);




