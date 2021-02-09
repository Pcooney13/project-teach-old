<?php


class CourseInfoSave{

	public static function save($post_id){
		hblog("homebase_course_save:$post_id");

		$config = getHomebaseConfig();
		$taxonomy_names = get_post_taxonomies($post_id);

		$postTerms = wp_get_post_terms($post_id,  'display-type', array("fields" => "all"));

		// additonal terms to be included
		$parents = array();
		$termLists = array();

		// only save parent terms
		foreach($postTerms as $f){
			if (!$f->parent) {
				$parents[$f->term_id] = $f->slug;
				$termLists[$f->slug] = array();
			}
		}

		// only save child terms
		foreach($postTerms as $f){
			if ($f->parent && isset($parents[$f->parent])){
				$termLists[$parents[$f->parent]][] = $f->slug;
			}
		}

		// retrive the Homebase course metadata set via wordpress admin
		$courseMetadata = $config['courseMetadata'];
		$fields = array();
		foreach($courseMetadata as $name){
			$v = get_post_meta($post_id, $name, true);
			$fields[$name] = trim($v);
		}

		// set the other info in the list of fields.
		$fields['image'] = CourseInfoSave::get_image_url($post_id);
		$fields['thumb'] = CourseInfoSave::get_thumb_url($post_id);
		$fields['sections'] = isset($termLists['section-info']) ?
				CourseInfoSave::renameSectionInfo($termLists['section-info']) : array();
		$fields['audiences'] = isset($termLists['audience-info']) ?
				CourseInfoSave::renameAudienceSlugs($termLists['audience-info']) : array();

		// get the course id: used as write index
		$courseId = $fields['hpcourse_id'];

		// PC::debug("fields:" . print_r($fields, 1));

		// save the course
		CourseInfoSave::save_course_to_model($courseId, $fields);
	}

	public static function save_course_to_model($courseId, $fields){
		// save the new values including this post/course

		// read model
		$jsonInputData = file_get_contents(JSON_COURSE_DATA_FILE);

		// decode content of current course data model
		$allCourses = json_decode($jsonInputData, 1);
		// $allCourses = CourseInfoSave::resetTerms($allCourses);

		// update model for this course
		$allCourses[$courseId] = $fields;

		// re-encode the data
		$jsonOutputData = json_encode($allCourses, 1);

		// save the data model to file
		hblog("save_course_to_model file:" . JSON_COURSE_DATA_FILE);
		file_put_contents(JSON_COURSE_DATA_FILE, $jsonOutputData);

		hblog("save_course_to_model:" . print_r($allCourses,1));
		HomebaseCourseInfo::rebuildCourseInfo($allCourses);

		// cause the file to reload
		ParseJSON::reloadJson();
	}

	public static function resetTerms($courses){
		foreach($courses  as $id => $c){
			$courses[$id]['audiences'] = HomebaseCourseInfo::getCourseAudiences($id);
			$courses[$id]['sections'] = array();
		}

		$sections = HomebaseCourseInfo::getAllSections();
		foreach($sections as $number => $section){
			$sectionIds = HomebaseCourseInfo::getCoursesBySection($number);
			$tempSections = array();
			foreach($sectionIds as $id){
				$courses[$id]['sections'][] = $number;
			}
		}
		return $courses;
	}

	public static function renameAudienceSlugs($slugs){

		$oSlugs = array();
		$ai = HomebaseCourseInfo::getAudienceInfo();
		foreach($slugs as $slug){
			$aName = '';
			foreach($ai as $id => $a){
				if ($a['slug'] == $slug){
					$aName = $id;
				}
			}
			$oSlugs[] = $aName;
		}
		return $oSlugs;
	}

	public static function renameSectionInfo($slugs){

		$oSlugs = array();
		$ai = HomebaseCourseInfo::getAllSections();
		foreach($slugs as $slug){
			$aName = '';
			foreach($ai as $id => $a){
				if ($a['id'] == $slug){
					$aName = $id;
				}
			}
			$oSlugs[] = $aName;
		}
		return $oSlugs;
	}

	public static function renameSectionInfo1($slug){
		$oSections = array();
		$sections = HomebaseCourseInfo::getAllSections();
		foreach($sections as $id => $section){
			if ($section['id'] == $slug){
				$oSections[] = $id;
			}
		}
		return $oSections;
	}

	public static function get_image_url( $post_id ) {
		$imageUrl = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id) );
		$imageUrl = $imageUrl[0];
		// PC::debug("get_thumb_url:$imageUrl");
		$attachments = get_attached_media( '',  $post_id);
		// PC::debug("get_image_url:count=".count($attachments));
		if (count($attachments)){
			$avalues = array_values($attachments);
			$image = wp_get_attachment_image_src($avalues[0]->ID);
			$imageUrl = $image[0];
			// PC::debug("get_image_url:". $imageUrl);
		}
		return $imageUrl;
	}

	public static function get_thumb_url( $post_id ) {
		$thumbInfo = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ) );
		$thumbUrl = $thumbInfo[0];
		// PC::debug("get_thumb_url:$thumbUrl");
		$attachments = get_attached_media( '',  $post_id);
		// PC::debug("get_thumb_url:count=".count($attachments));
		if (count($attachments)){
			$avalues = array_values($attachments);
			$thumb = wp_get_attachment_image_src($avalues[0]->ID);
			$thumbUrl = $thumb[0];
			// PC::debug("get_thumb_url:". $thumbUrl);
		}
		return $thumbUrl;
	}

}
