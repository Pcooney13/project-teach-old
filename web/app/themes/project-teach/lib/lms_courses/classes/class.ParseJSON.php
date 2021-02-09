<?php

class ParseJSON{

	public static function getJson(){
		$config = getHomebaseConfig();

		$courses=array();
		$finalCourses=array();

		$cacheDir = BASE_DIR.'cache/';
		$cachePath = $cacheDir.$config['cacheFile'];
		if (file_exists($cachePath) &&
				filemtime($cachePath) > (time() - 60 * $config['cacheMinutes'])) {
			$json = file_get_contents($cachePath);
			$response = json_decode($json, 1);
		} else {
			$response = PsychAcademyReadData::read();
			file_put_contents($cachePath, json_encode($response, 1), LOCK_EX);
		}
		$courses = $response['activityDetaillist'];
		foreach($courses as $id => $course){
			$finalCourses[$id] = array_merge($courses[$id], CourseData::get($id));
		}
		// PC::debug(print_r($finalCourses,1));

		asort($finalCourses);

		$i = 1;
		foreach($finalCourses as $id => $course){
			$finalCourses[$id]['number'] = $i++;
		}

		// PC::debug(print_r($finalCourses,1));

		return $finalCourses;
	}

	public static function reloadJson(){
		$config = getHomebaseConfig();
		$cacheDir = BASE_DIR.'cache/';
		$cachePath = $cacheDir.$config['cacheFile'];

		$courses = PsychAcademyReadData::read();
		file_put_contents($cachePath, json_encode($courses, 1), LOCK_EX);
	}

	public static function show_keys($sections){
		$out = array();
		foreach ($sections as $s){
			$out[] = $s['order_within_category'];
		}
		return $out;
	}

	public static function featuredCourse($number){
		$courses = ParseJSON::getJson();
		$html = "";

		foreach($courses as $id => $courseInfo){
			if ($courseInfo['number'] == $number){
				$html = RenderCourseDetailDoc::item($courseInfo);
			}
		}
		return $html;
	}

	public static function featured(){
		$courses = ParseJSON::getJson();
		$body = array('htmlItems' => '');

		foreach($courses as $id => $courseInfo){
			$body['htmlItems'] .= RenderFeaturedHTML::item($courseInfo);
		}
		$html = RenderFeaturedHTML::body($body);
		return $html;
	}

	public static function detail($id){
		return '';
		// PC::debug($id, "id");
		$courses = ParseJSON::getJson();
		$courseInfo = $courses[$id];
		// PC::debug(print_r($courseInfo, 1), "id");
		$courseInfo['id'] = $id;
		$combinedCourseInfo = array_merge($courseInfo, $courses[$id]);
		return RenderDetailHTML::render($combinedCourseInfo);
	}

	public static function itemParse($rawCourse, $number){
		// PC::debug("CALLED", "ITEMPARSE:CALLED");
		$course = array();
		$course['id'] = '';
		$course['url'] = '';
		$course['credits'] = '';
		$course['time'] = '';
		$course['hours'] = '';
		$course['thumbnail'] = '';
		$course['photo'] = '';
		$course['intro'] = '';
		$course['targetaudience'] = '';

		$course['instructors'] = array();
		$course['objectives'] = array();
		$course['accreditations'] = array();

		$course['number'] = trim($number);

		$course['id'] = isset($rawCourse['id'])? trim($rawCourse['id']) : '';

		$course['classes'] = implode(" ",  HomebaseCourseInfo::getCourseAudiences($course['id']));

		$course['title'] = isset($rawCourse['title'])? trim($rawCourse['title']) : '';
		$course['slug'] = isset($rawCourse['title'])? sanitize_title($data['title']) : '';
		$course['format'] = isset($rawCourse['CustomActivityType'])? trim($rawCourse['CustomActivityType']) : '';
		$course['CustomActivityType'] = $course['format'];
		$course['FunctionalActivityType'] = isset($rawCourse['FunctionalActivityType'])? trim($rawCourse['FunctionalActivityType']) : '';

		$course['format'] = ($course['format'] == "Virtual Grand Round Series") ?
				"Webinar" :
				$course['format'];
		$course['title'] = ($course['format'] == "CBT Online Course (Parent)") ?
				"Multi Week Course " . $course['title']  :
				$course['title'];

		if (isset($rawCourse['facultylists'])){
			foreach($rawCourse['facultylists'] as $facutlyMember){
				$course['instructors'][] = trim($facutlyMember['name']);
			}
		}

		if (isset($rawCourse['overviewcontent'])){
			foreach($rawCourse['overviewcontent'] as $overview){

				PALog::log("ParseJSON::parse: overview-key: overview:".$overview['key']);
				switch($overview['key']){

					case 'LearningObjectivesJSON':
						$course['intro'] = $overview['value']['intro'];
						$objectives = $overview['value']['learningObjectives'];
						if (!is_array($objectives[0]['learningObjective'])){
							// text: no modules.

							foreach($objectives as $o){
								$course['objectives'][] = trim($o['learningObjective']);
							}
						}else{
							foreach($objectives as $m){
								$module = $m['learningObjective'];
								$mdata = array();
								$mdata['intro'] = $module['moduleIntro'];
								foreach($module['moduleLearningObjectives'] as $m){
									$mdata['objectives'][] = trim($m['moduleLearningObjective']);
								}
								$course['modules'][] = $mdata;
							}
						}
						break;
					case 'TargetAudienceJSON':
						if (isset($overview['value']['targetAudiences'])){
							$targetAudience = array();
							foreach($overview['value']['targetAudiences'] as $targetAudience){
								$targetaudience[] = trim($targetAudience['targetAudience']);
							}
							$course['targetaudience'] = implode(", ", $targetaudience);
						}
						break;
				}
			}
		}

		if (isset($rawCourse['cmeinfocontent'])){
			// PC::debug(print_r($rawCourse['cmeinfocontent'],1));
			foreach($rawCourse['cmeinfocontent'] as $cmeinfo){
				switch($cmeinfo['key']){
					case 'CMEInfoJSON':
						if (isset($cmeinfo['value']['availableCreditTypes'])){
							foreach($cmeinfo['value']['availableCreditTypes'] as $cme){
								$course['accreditations'][] = $cme;
							}
							$course['credits'] = isset($course['accreditations'][0]['credits']) ?
								$course['accreditations'][0]['credits'] : '';
							$course['time'] = $course['credits'];
							$course['hours'] = $course['credits'];
							break;
					}
				}
			}
		}
		return $course;
	}

	
	public static function title($id){
		$courses = ParseJSON::getJson();
		$title = $courses[$id]['title'];
		return $title;
	}
	
	public static function createSlug($title){
		$slug = sanitize_title($title);
		return $slug;
	} 

	public static function getThumb(&$course){
		$config = getHomebaseConfig();
		$type = 'thumb';
		$id = $course['id'];

//		if ($config['useStaticImages'] || empty($course[$type])){
//			$image = str_replace('{{COURSEID}}', $id, $config['thumbTemplate']);
//			$course[$type] = $config['imageDir'] . $image;
//		}
	}



	public static function getImage(&$course){
		// PC::debug($course, "Course");
		$config = getHomebaseConfig();
		$type = 'image';
		$id = $course['id'];

		if ($config['useStaticImages'] || empty($course[$type])){
			$image = str_replace("{{COURSEID}}", $id, $config['imageTemplate']);
			$course[$type] = $config['imageDir'] . $image;
		}
	}

	public static function getArray($id=null){
		$courses = ParseJSON::getJson();
		if ($id !== null){
			return isset($courses[$id]) ? $courses[$id] : null;
		}
		return $courses;
	}

	public static function array_collapse($array, $attr){
		$return = array();
		foreach($array as $a){
			if (isset($a[$attr])){
				$return[] = $a[$attr];
			}
		}
		return $return;
	}

	public static function adminUI(){
		$courses = ParseJSON::getJson();
		PALog::log("ParseJSON::parse: complete:");
		return $courses;
	}
}
