<?php

$base_dir = dirname(__FILE__).'/';
define('BASE_DIR', $base_dir);
define('CONFIG_FILE', BASE_DIR . 'config.php');

require_once(CONFIG_FILE);
require_once(CLASS_DIR."class.RenderTest.php");
require_once(CLASS_DIR."class.CourseData.php");
require_once(CLASS_DIR."class.HomebaseCourseInfo.php");
require_once(CLASS_DIR."class.CourseInfoSave.php");
require_once(CLASS_DIR."class.PsychAcademyReadData.php");
require_once(CLASS_DIR."class.RenderFeaturedHTML.php");
require_once(CLASS_DIR."class.RenderCourseDetailDoc.php");
require_once(CLASS_DIR."class.ParseJSON.php");
require_once(CLASS_DIR."class.RenderFromTemplate.php");
require_once(CLASS_DIR."class.PALog.php");
require_once(CLASS_DIR."class.InitialCourseInfo.php");

require_once(VENDOR_DIR."unirest/src/Unirest.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

$hbConfig = initConfig();

function getHomebaseConfig(){
	global $hbConfig ;

	return $hbConfig ;
}


function homebaseGetList(){
	// PALog::log("renderHTML: homebaseGetList called");

	$html = ParseJSON::featured();
	$html .= ParseJSON::summary();

 	return $html;
}

function hblog($str){
	$fd = fopen(LOGFILE, 'a');
	fwrite($fd, "$str\n");
	fclose($fd);
}

function homebaseGetDetail($id=null){
	// PALog::log("renderHTML: homebaseGetDetail called id:$id");

	if ($id === null){
		$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
	}
	$html = ParseJSON::detail($id);
    return $html;
}

function homebaseGetFeatureCourseDetails($number){
	$html = ParseJSON::featuredCourse($number);
    return $html;
}

function homebaseGetFeatures(){
	//// PALog::log("renderHTML: homebaseGetFeatures called");

	$html = ParseJSON::featured();
    return $html;
}

function homebaseGetCourseTitle($id){
	// PALog::log("renderHTML: homebaseGetCourseTitle called");


	$title = ParseJSON::title($id);
    return $title;
}

function homebaseGetAudiences(){
	// PALog::log("renderHTML: homebaseGetAudiences called");


	$audiences = ParseJSON::audience();
    return $audiences;
}

function homebaseGetAdminUI(){
	// PALog::log("renderHTML: homebaseGetAdminUI called");


	$adminUI = ParseJSON::adminUI();
    return $adminUI;
}

function homebaseGetArray($id=null){
	// PALog::log("renderHTML: homebaseGetArray called");

	$array = ParseJSON::getArray($id);
    return $array;
}

function homebase_course_save($post_id){
	CourseInfoSave::save($post_id);
}

function homebase_acf_prepare_field_hpcourse_id( $field ){
	$field['disabled'] = true;
	return $field;
}

//////////////////////////////////////////////////////////////////
// Render our field to stop non roles from editing
//////////////////////////////////////////////////////////////////
add_filter('acf/prepare_field/name=hpcourse_id', 'homebase_acf_prepare_field_hpcourse_id');

// register the callback for post update via acf AFTER is has been saved via ACF
add_action('acf/save_post', 'homebase_course_save', 20);

// enable creation of additional thumbnail sizes
add_theme_support( 'post-thumbnails' );

// create homebase 350x350 thumbnail size
add_image_size( '	', 250, 250, true);
