<?php

define('CLASS_DIR', 'classes/');
define('VENDOR_DIR', 'vendor/');
define('SUMMARY', 'SUMMARY');
define('DETAIL', 'DETAIL');

define("USERNAME", "username");
define("PASSWORD", "password");
define("TOKEN", "Token");
define("CATEGORYNAME", "CategoryName");

define('TEMPLATEDIR', 'templateDir');

define('JSON_COURSE_DATA_FILE' , BASE_DIR . 'cache/course_data.json');
define('JSON_COURSE_DATA_TEST_FILE' , BASE_DIR . 'cache/course_test_data.json');

define('HOMEBASE_COURSE_DATA_FILE' , BASE_DIR . 'cache/homebase_info.json');
define('HOMEBASE_COURSE_DATA_TEST_FILE' , BASE_DIR . 'cache/homebase_info.test.json');

define('LOGFILE' , BASE_DIR . 'log/hbcourses.log');

define('DEFAULT_THUMBNAIL', "/assets/images/courses/default_thumb.jpg");
define('DEFAULT_LOCATION', "Ramada Conference Center");
define('DEFAULT_ADDRESS', "542 Route 9");
define('DEFAULT_CITY', "Fishkill");
define('DEFAULT_STATE', "NY");
define('DEFAULT_ZIP', "12542");
define('DEFAULT_TIME', "2:00 PM - 5:00 PM");
define('DEFAULT_CMEINFORMATION', "cmeinformation_1");
define('DEFAULT_REGISTERURL', "registerurl_1");
define('DEFAULT_TARGETAUDIENCE', "targetaudience_1");
define('DEFAULT_LEARNINGOBJECTIVES', "learningobjectives_1");
define('DEFAULT_ACCREDITATIONSTATEMEMT', "accreditationstatememt_1");
define('DEFAULT_AMACREDITDESIGNATIONSTATEMENT', "amacreditdesignationstatement_1");

function initConfig(){
	$config = array(
		'productionBaseUrl' => 	'https://lms.projectteachny.org/netscoreapi/RestAPIService.svc/',
		'qcBaseUrl' => 			'https://lms.projectteachny.org/netscoreapi/RestAPIService.svc/',
		'registerUrlPrefix' => 	'https://lms.projectteachny.org/netscoreapi/RestAPIService.svc/',
		'baseUrl' => 			'https://lms.projectteachny.org/netscoreapi/RestAPIService.svc/',

		//'productionBaseUrl' => 	'https://lms-project-teach-qc.astutetech.com/netscoreapi/RestAPIService.svc/',
		//'qcBaseUrl' => 			'https://lms-project-teach-qc.astutetech.com/netscoreapi/RestAPIService.svc/',
		//'registerUrlPrefix' => 	'https://lms-project-teach-qc.astutetech.com/netscoreapi/RestAPIService.svc/',
		//'baseUrl' => 			'https://lms-project-teach-qc.astutetech.com/netscoreapi/RestAPIService.svc/',

		'getByCategoryUrl' => 	'GetAvailableActivitiesByCategoryNew',
		'authenticateUrl' => 	'Authenticate',
		'username' => 			'api-lpcms',
		'password' => 			'l@nChpA!',
		'category' => 			'MGHProjectTeach',

		'templateDir' => BASE_DIR."templates/",

		'summaryDocTemplate' => 'summary.doc.template.html',
		'summaryItemTemplate' => 'summary.item.template.html',
		'summarySectionTemplate' => 'summary.section.template.html',
		'summaryCategoryTemplate' => 'summary.category.template.html',

		'featuredItemTemplate' => 'featured.item.template.html',
		'featuredDocTemplate' => 'featured.doc.template.html',
		'featuredDocDetailTemplate' => 'detail.doc.template.html',

		'csvItemTemplate' => 'csv.item.template.html',
		'csvDocTemplate' => 'csv.doc.template.html',
		'csvAccreditationTemplate' => 'csv.accreditation.template.html',

		'audienceItemTemplate' => 'audience.item.template.html',
		'audienceDocTemplate' => 'audience.doc.template.html',

		'detailDocTemplate' => 'detail.doc.template.html',
		'accreditationTemplate' => 'accreditation.template.html',
		'locationTemplate' => 'location.template.html',
		'videoTemplate' => 'video.template.html',
		'blueboxTextTemplate' => 'blueboxtext.template.html',

		'cacheDir' => BASE_DIR."cache/",
		'cacheFile' => 'current_data.json',
		'cacheMinutes' => 60,
		'imageBaseUrl' => BASE_DIR."courses/",

		'debug' => true,
		'test' => true,

		'video-width' => 320,
		'video-height' => 240,
		'video-class' => '',

		'blue-box-text-class' => '',

		'useStaticImages' => true,
		'imageDir' => '/media/courses/',
		'thumbTemplate' => "HPC_{{COURSEID}}_thumb.png",
		'imageTemplate' => "HPC_{{COURSEID}}_full.png",

		'audienceCatSlug' => 'audience-info',
		'displayCatSlug' => 'section-info',
		'featuredCatSlug' => 'featured-course',

		// START new definitions for alternate course types
		'detailOnlineDocTemplate' => 'detail.online.template.html',
		'accommodationsTemplate' => 'accommodations.template.html',
		'accommodationsItemTemplate' => 'accommodations.item.template.html',
		'agendaTemplate' => 'agenda.template.html',
		'agendaItemTemplate' => 'agenda.item.template.html',
		// END new definitions for alternate course types

		'sectionInfo' => array(
			"Collapse0"  => array('title'=>"Military Culture and Intro Courses",  'id'=>"military-culture"),
			"Collapse1"  => array('title'=>"PTSD Courses",  'id'=>"ptsd-courses"),
			"Collapse2"  => array('title'=>"TBI Courses",  'id'=>"tbi-courses"),
			"Collapse3"  => array('title'=>"Substance Use Courses",  'id'=>"substance-use"),
			"Collapse4"  => array('title'=>"Additional Trauma and Treatment Courses",  'id'=>"additional-trauma"),
			"Collapse5"  => array('title'=>"Military Family Courses",  'id'=>"military-family")
		),
		'audienceInfo' => array(
			'Professionals' => 	array('slug' => "healthcare-professionals", 'class' => "professionals", 'id' => "Professionals", 'title' => "Healthcare Professionals"),
			'Responders' => 	array('slug' => "first-responders", 		'class' => "responders", 'id' => "Responders", 'title' => "First Responders"),
			'Families' => 		array('slug' => "military-families", 		'class' => "families", 'id' => "Families", 'title' => "Military Families"),
			'Community' => 		array('slug' => "community-members", 		'class' => "community", 'id' => "Community", 'title' => "Community Members")
		),
		'courseMetadata' => array(
			'order_within_category',
			'blue_box_text',
			'disabled',
			'changed',
			'video_embed_link',
			'hpcourse_id',
			'featured',
			'image',
			'thumb'
		)
	);
	return $config;
}
