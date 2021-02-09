<?php

class RenderFeaturedData{

	public static function jsonData($courses, $selector){
		$itemAttrs = array(
			"jsonCourseData" => 'json',
			"jsonCourseDataSelector => 'text'
		);
		$data['jsonCourseData'] = $courses;
		$data['jsonCourseDataSelector'] =  $selector;
		$html = renderFromTemplate::render($data, $itemAttrs, 'featuredDataTemplate');
		return $html;
	}
}
