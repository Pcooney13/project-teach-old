<?php

// WJF START 7/6/2018 Add Functional Activity type...
// WJF END 7/6/2018 Add Functional Activity type...
class RenderCourseDetailDoc{

// WJF START 7/6/2018 Add Functional Activity type...

	public static function getExtra($data){
		$post = get_page_by_path("live-training/online-courses");
		$post_id = $post->ID;
		$course_id = $data['id'];
		echo "<!-- " . "COURSE LOOKUP $post_id /  $course_id" . "-->\n";
		$course_list = get_field('pt_course_list', $post_id);
		// echo "<!-- " . (print_r($course_list, 1)) . "-->\n";
		foreach($course_list as $course){
			if ($course_id == $course['course_id']){
				echo "<!-- FOUND COURSE:::: " . (print_r($course, 1)) . "-->\n";

				$data['agendaHtml'] = empty($course['agenda']) ? '' : RenderCourseDetailDoc::agenda($course['agenda']);
				$data['locationHtml'] = empty($course['location']) ? '' : RenderCourseDetailDoc::location($course['location']);
				$data['accommodationsHtml'] = empty($course['accommodations']) ? '' : RenderCourseDetailDoc::accommodations($course['accommodations']);
			}
		}
		//PC::debug("data after extras:" . print_r($data,1));
		return $data;
	}

	public static function location($locations){
		$html = "";
		// PC::debug("location all data:" . print_r($locations,1));
		if (!empty($locations[0]['address_1'])){
			$location = $locations[0];
			// PC::debug("location data:" . print_r($location,1));
			$itemAttrs = array(
				"address_1" => "text",
				"address_2" => "text",
				"city" => "text",
				"state" => "text",
				"zip" => "text",
			);
			$html = renderFromTemplate::render($location, $itemAttrs, 'locationTemplate');
		}
		// PC::debug("location html:" . $html);
		return $html;
	}

	public static function agenda($agenda){
		// PC::debug("COURSE Agenda: " . print_r($agenda, 1));
		$html = "";
		$itemAttrs = array(
			"date" => "text",
			"start_time" => "text",
			"end_time" => "text",
			"presenter" => "text",
			"title" => "text",
		);
		if (count($agenda) > 0){
			$agendaItemHtml = '';
			foreach($agenda as $a){
				$agendaItemHtml .= renderFromTemplate::render($a, $itemAttrs, 'agendaItemTemplate');
			}
			$agendaAttrs = array(
				"agendaItems" => "text",
			);
			$agendaData = array('agendaItems' => $agendaItemHtml);
			$html = renderFromTemplate::render($agendaData, $agendaAttrs, 'agendaTemplate');
		}
		// PC::debug("agenda:" . $html);
		return $html;
	}

	public static function accommodations($accommodations){
		// PC::debug("accommodations:" . $accommodations);
		$html = "";
		if (!empty($accommodations)){
			$itemAttrs = array(
				"accommodations" => "text",
			);
			$accommodationsData = array('accommodations' => $accommodations);
			$html = renderFromTemplate::render($accommodationsData, $itemAttrs, 'accommodationsTemplate');
		}
		// PC::debug("accommodations:" . $html);
		return $html;
	}

	public static function accreditation($data){
		$html = "";

		$itemAttrs = array(
			"accreditation-statement" => "text",
			"designation-statement" => "text",
			"credit-type" => "text"
		);

		if (!empty($data['creditTypes'])){
			foreach($data['creditTypes'] as $acc){
				foreach($acc as $name => $value){
					$acc[$name] = str_replace(array("<p>", "</p>"), "", $value);
				}
				$html .= renderFromTemplate::render($acc, $itemAttrs, 'accreditationTemplate');
			}
		}
		return $html;
	}

	public static function selectTemplate($data){
		$templateName = '';
		$data['activityType'] = isset($data['activityType']) ? $data['activityType']  : '';
		switch ($data['activityType']){
			// add values and corresponding template names as required...
			default:
				$templateName = 'featuredDocDetailTemplate';
		}
		return $templateName;
	}
	// WJF END 7/6/2018 Add Functional Activity type...

	public static function item($data){
		$url = "";
		$config = getHomebaseConfig();

		$remaps = array(
				"startDate" => "start-date",
				"endDate" => "end-date",
		);
		foreach($remaps as $name => $value){
			if (isset($data[$name])){
				// PC::debug("Found $name -> $value");
				$data[$value] = $data[$name];
			}else{
				// PC::debug("NOT Found: $name -> $value");
			}
		}

		if (!empty ($data['facultylists'])){
			$facultyList = $data['facultylists'];
			$names = array();
			foreach ($facultyList as $faculty){
				$names[] = "<li>". $faculty['name'] ."</li>";
			}
			$data['faculty-1ist'] = "<ul style=\"list-style-type: none;margin-left:30px\">". implode(", ", $names) . "</ul>";
			// PC::debug($data['faculty-1ist'], 'faculty-list');
		}else{
			$data['facultylists'] = '';
		}

		foreach ($data['overviewcontent'] as $ov){
			if ($ov['key'] == 'LearningObjectivesJSON'){
				$learningObjectivesList = $ov['value'];
				$data['learning-objectives-intro'] =$learningObjectivesList['intro'];
				$objectives = array();
				foreach ($learningObjectivesList['learningObjectives'] as $lo){
					// PC::debug($lo['learningObjective'], "Adding learningObjective");
					$objectives[] = "<li>".$lo['learningObjective']."</li>";
				}
				$data['learning-objective-1ist'] = "<ul style=\"list-style-type: none;margin-left:30px\">". implode("\n\t", $objectives) . "</ul>";
				// PC::debug($data['learning-objective-1ist'], 'objectives-list');
			}else if ($ov['key'] == 'TargetAudienceJSON'){
				// PC::debug("FOUND targetAudience");
				$targetAudienceList = $ov['value'];
				$data['target-audiences-intro'] = $targetAudienceList['intro'];
				$audiences = array();
				foreach ($targetAudienceList['targetAudiences'] as $lo){
					// PC::debug($lo['targetAudience'], "Adding targetAudience");
					$audiences[] = "<li>".$lo['targetAudience']."</li>";
				}
				$data['target-audience-list'] = "<ul style=\"list-style-type: none;margin-left:30px\">".implode("\n\t", $audiences) . "</ul>";
				// PC::debug($data['target-audience-list'], 'target-autdience-1ist');
			}
		}
		foreach ($data['cmeinfocontent'] as $ov){
			if ($ov['key'] == 'CMEInfoJSON'){
				$cmeInfo = $ov['value'];
				$data['releaseDate'] =  date("M d, Y", strtotime($cmeInfo['releaseDate']));
				$data['expirationDate'] = date("M d, Y", strtotime($cmeInfo['expirationDate']));
				$data['reviewDate'] = date("M d, Y", strtotime($cmeInfo['reviewDate']));
				$data['creditTypes'] = array();

				foreach ($cmeInfo['availableCreditTypes'] as $lo){
					$ct = array();

					$ct['credits'] = $lo['credits'];
					$ct['credit-type'] = $lo['creditType'];
					$ct['accreditation-statement'] = $lo['accreditationStatment'];
					$ct['designation-statement'] = $lo['designationStatment'];

					$data['creditTypes'][] = $ct;
				}

				$data['creditTypes'] = array_reverse($data['creditTypes']);

				$data['number-of-credits'] =
						isset($data['creditTypes'][0]['credits']) ?
								$data['creditTypes'][0]['credits'] :
								1;
				$data['accreditation-statement'] =
						isset($data['creditTypes'][0]['accreditation-statement']) ?
								$data['creditTypes'][0]['accreditation-statement'] :
								1;
				$data['designation-statement}'] =
						isset($data['creditTypes'][0]['designation-statement']) ?
								$data['creditTypes'][0]['designation-statement'] :
								1;
				// PC::debug($data['number-of-credits'], 'number-of-credits');
			}
		}
        $data['start-date'] = date("M d, Y", strtotime($data['start-date']));
        $data['thumbnail'] = ($data['thumbnail']);
		$data['end-date'] = date("M d, Y", strtotime($data['end-date']));
		$data['register-url'] = $data['url'];
		$data['course-catalog-url'] = 'live-training/online-courses';
		$data['accreditations'] = RenderCourseDetailDoc::accreditation($data);
		$data['all-data'] = print_r($data,1);

		// PC::debug(print_r($data,1));

		$itemAttrs = array(
			"all-data" => "text",
			"course-catalog-url" => "text",
			"register-url" => "text",
			"description" => "text",
			"thumbnail" => "text",
			"title" => "text",
			"start-date" => "text",
			"end-date" => "text",
			"number-of-credits" => "text",
			"faculty-1ist" => "text",
			"accreditations" => "text",
			"learning-objectives-intro" => "text",
			"learning-objective-1ist" => "text",
			"target-audiences-intro" => "text",
			"target-audience-list" => "text",
			"cme-info-list" => "text",
			"agendaHtml" => "text",
			"accommodationsHtml" => "text",
			"locationHtml" => "text",
		);

		// PC::debug(print_r($data,1));

		// WJF START 7/6/2018 Add Functional Activity type...
		$templateName = 'detailDocTemplate';

		if (!empty ($data['CustomActivityType']) &&
				!empty ($data['FunctionalActivityType'])){
			// PC::debug("Found non-empty cust/functional event");
			if ($data['CustomActivityType'] == "Live Event" &&
					$data['FunctionalActivityType'] == 'LIVEEVENT'){
				$templateName = 'detailOnlineDocTemplate';
				$data = RenderCourseDetailDoc::getExtra($data);
				// PC::debug("Found LIVEEVENT");
				return '';
			}
		}else{
			// PC::debug("Found webinar");
			$templateName = 'featuredDocDetailTemplate';
		}
		// WJF END 7/6/2018 Add Functional Activity type...

		$html = renderFromTemplate::render($data, $itemAttrs, $templateName);
		return $html;
	}
}
