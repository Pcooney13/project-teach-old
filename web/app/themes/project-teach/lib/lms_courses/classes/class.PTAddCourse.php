<?php

define('ACF_FIELD_NAME', 'course_list');
define('JSON_FILENAME', 'current_data.json');
define('JSON_DIRECTORY', '/../cache/');
define('MY_LOCATION', dirname(__FILE__));
define('WP_LOCATION', '../../../../../../');
define('WP_HEADER', 'wp-blog-header.php');
define('WP_POST_Title', 'Online Courses');
define('WP_HEADER_PATH', WP_LOCATION . WP_HEADER);

course_customactivitytype
class PTAddCourse{
	var $jsonFilePath = '';
	var $currentCourses = array();
	var $jsonCourses = array();
	var $jsonCourseData = '';
	var $post_id = '';

	function __construct(){
		$this->getJsonCourses();
		$this->getCurrentCourses();
	}

	function getPostID(){
		$post = get_page_by_title(WP_PAGE_TITLE);
		$this->post_id = $post->ID;
	}

	function getCurrentCourses(){
		//  retrieve from acf repeater
		$acf_repeater = get_field(ACF_FIELD_NAME, $this->post_id);
		//echo "acf_repeater:" . print_r($acf_repeater, 1) . "\n";

		// extract id for all courses
		$course_ids = array_column($acf_repeater, 'course_id');
		//echo "course_ids:" . print_r($course_ids, 1) . "\n";

		// combine id and course to create indexed array
		$this->currentCourses = array_combine($course_ids, $acf_repeater);
		// echo "currentCourses:" . print_r($currentCourses, 1) . "\n";
	}

	function getJsonCourses(){
		//echo "getJsonCourses" . "" . "\n";
		$this->jsonFilePath =  MY_LOCATION . JSON_DIRECTORY . JSON_FILENAME;
		//echo "jsonFilePath:" . $this->jsonFilePath . "\n";
		if (!is_file($this->jsonFilePath)){
		//	echo "ERROR: jsonFilePath:" . "NOT A FILE" . "\n";
		}else{
			$this->jsonCourseData = file_get_contents($this->jsonFilePath);
			//	echo "jsonCourseData:" . $this->jsonCourseData . "\n";

			if (!empty($this->jsonCourseData)){
				// json decode the updated courses
				$rawCourseData = json_decode($this->jsonCourseData, 1);
				// echo "rawCourseData:" . print_r($rawCourseData, 1) . "\n";

				if (!empty($rawCourseData) && !empty($rawCourseData['activityDetaillist'])){
					// courses are in the 'activityDetaillist' array member
					$courseData = $rawCourseData['activityDetaillist'];
					// echo "courseData:" . print_r($courseData, 1) . "\n";

					if (is_array($courseData)){
						// extract ids for all courses
						$course_ids = array_column($courseData, 'id');
						// echo "course_ids:" . print_r($course_ids, 1) . "\n";

						if (count($course_ids) == count($courseData)){
							// combine id and course to create indexed array
							$this->jsonCourses = array_combine($course_ids, $courseData);
							//echo "JSON courses:" . print_r($this->jsonCourses, 1) . "\n";
						}
					}
				}
			}
		}
	}

	function insertIntoACF($values){
		//	update_field( ACF_FIELD_NAME, $values, $this->post_id);
		//add_row(ACF_FIELD_NAME, $values, $this->post_id);
	}

	function isIncluded($course_id){
		return isset($this->currentCourses[$course_id]) ? true : false;
	}

	function addAll(){
		if (!empty($this->courseData)){
			foreach ($this->jsonCourses as $course_id => $c){
				$this->add($course_id, $c);
			}
		}
	}

	function add($course_id, $c){
		if (!$this->isIncluded($course_id)){
			$values = array(
				'course_id' => $c['id'],
				'course_name' => $c['title'],
			);
			// insert new row into acf.
			$this->insertIntoACF($values);
		}
	}
}
