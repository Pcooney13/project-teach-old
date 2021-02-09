<?php

define('ACF_FIELD_NAME', 'pt_course_list');
define('JSON_FILENAME', 'current_data.json');
define('JSON_DIRECTORY', '/cache/');
define('MY_LOCATION', dirname(__FILE__));
define('WP_LOCATION', '../../../../../');
define('WP_HEADER', 'wp-blog-header.php');
define('WP_PAGE_TITLE', 'Online Courses');

$wpHeaderPath = WP_LOCATION . WP_HEADER;
define('WP_USE_THEMES', false);
require_once($wpHeaderPath);

function getJsonFilename(){
	$path =  MY_LOCATION . JSON_DIRECTORY . JSON_FILENAME;
	return $path;
}

function insertIntoACF($values, $post_id){
	//	update_field( ACF_FIELD_NAME, $values, $post_id );
	add_row(ACF_FIELD_NAME, $values, $post_id );
}

function isIncluded($course_id, $currentValues){
	echo "Checking  $course_id\n";
	foreach($currentValues as $c){
		if ($c['course_id'] == $course_id){
			return true;
		}
	}
	return false;
}

$post = get_page_by_title(WP_PAGE_TITLE);
$post_id = $post->ID;

echo "ID:$post_id";
$currentValues = get_field(ACF_FIELD_NAME, $post_id);
echo "currentValues :" . print_r($currentValues, 1) . "<br />\n";
exit;
$values = array();
if (!is_file(getJsonFilename())){
	echo "Cannot Find file<br />";
}else{
	echo "Found file<br />";
	$jsonData = file_get_contents(getJsonFilename());
	if ($jsonData && $courseData = json_decode($jsonData, 1)){
		foreach ($courseData['activityDetaillist'] as $c){
			if (!isIncluded($c['id'],$currentValues)){
				$values = array(
					'course_id' => $c['id'],
					'course_name' => $c['title'],
    				'course_customactivitytype' => $c['CustomActivityType'],
					'course_functionalactivitytype' => $c['FunctionalActivityType'],
				);
				echo "Course: " . print_r($values,1) . "<br />\n";
				insertIntoACF($values, $post_id);
			}
		}
	}
}
