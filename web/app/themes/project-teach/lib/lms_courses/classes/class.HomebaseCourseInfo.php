<?php

class HomebaseCourseInfo{

	private static function getFull($index){
		$info = HomebaseCourseInfo::load();
		$data = isset($info[$index]) ? $info[$index] : array();
		return $data;
	}

	private static function get($index, $id){
		$info = HomebaseCourseInfo::load();
		return isset($info[$index][$id]) ? $info[$index][$id] : array();
	}

	public static function getAllCourses(){
		$allCourses = HomebaseCourseInfo::getFull('allCourses');
		return $allCourses;
	}

	public static function getCoursesBySection($sectionId){
		return HomebaseCourseInfo::get('sections', $sectionId);
	}

	public static function courseInSection($sectionId, $courseId){
		return count(HomebaseCourseInfo::get('sections', $sectionId)) ? true : false;
	}

	public static function getCourseAudiences($courseId){
		$audiences = HomebaseCourseInfo::get('audiences', $courseId);
		return $audiences;
	}

	public static function getCourseInfo($courseId){
		return HomebaseCourseInfo::get('allCourses', $courseId);
	}

	public static function getSectionInfo($sectionId){
		$config = getHomebaseConfig();

		return $config['sectionInfo'][$sectionId];
	}

	public static function getAllSections(){
		$config = getHomebaseConfig();

		return $config['sectionInfo'];
	}

	public static function getFeaturedCourses(){
		$featuredCourses = HomebaseCourseInfo::getAllCourses();
		return $featuredCourses;
	}

	public static function getAudienceInfo(){
		$config = getHomebaseConfig();

		return $config['audienceInfo'];
	}

	public static function load(){
		$jsonInputData = file_get_contents(HOMEBASE_COURSE_DATA_FILE);

		$info = json_decode($jsonInputData, 1);
		return $info;
	}

	public static function save($info){
		$jsonOutputData  = json_encode($info, 1);

		file_put_contents(HOMEBASE_COURSE_DATA_FILE, $jsonOutputData);
	}

	public static function rebuildCourseInfo($courseInfo){
		$config = getHomebaseConfig();

		$hbi = array();

		$sectionInfo = HomebaseCourseInfo::getAllSections();
		$courseMetadata = $config['courseMetadata'];
		foreach($courseInfo as $id => $c){
			if(!isset($c['sections'])){
				$c['sections'] = array();
			}
			if(!isset($c['audiences'])){
				$c['audiences'] = array();
			}

			// set up section info
			foreach($c['sections'] as $csi){
				foreach($sectionInfo as $name => $hbcsi){
					if ($csi == $name){
						$hbi['sections'][$name][] = $id;
					}
				}
			}

			// set up course info
			foreach($courseMetadata  as $mdField){
				$hbi['allCourses'][$id][$mdField] = isset($c[$mdField]) ? $c[$mdField] : '';
			}

			// set up audience info
			$hbi['audiences'][$id] = $c['audiences'];
		}
		HomebaseCourseInfo::save($hbi);
	}
}

//add_action( 'wp_loaded', 'hb_init' );
