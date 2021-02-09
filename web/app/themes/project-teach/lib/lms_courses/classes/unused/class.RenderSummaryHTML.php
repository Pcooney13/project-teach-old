<?php

class RenderSummaryHTML{

	public static function renderItem($data){
		PALOG::log('RenderSummaryHtml:__construct');

		$itemAttrs = array(
			"credits" => 'text',
			"hours" => 'text',
			"id" => 'text',
			"url" => 'text',
			"number" => 'text',
			"href" => 'text',
			"thumb" => 'text',
			"disabled-div" => 'text',
			"disable-register" => 'text',
			"title" => 'text',
			"classes" => 'text'
		);

		ParseJSON::getThumb($data);
		$data['url'] = '/education-training/training-institute/courses-secondary/courses-tertiary?id=' +  $data['id'];

		$data['disabled-div'] = !empty($data['unavailable']) ? "disabled-div" : "";
		$data['disable-register'] = !empty($data['unavailable']) ? "course-disabled" : "";

		$html = renderFromTemplate::render($data, $itemAttrs, 'summaryItemTemplate');
		return $html;
	}

	public static function renderSection($data){
		//PALOG::log('RenderSummaryHtml:renderSection');

		$sectionAttrs = array(
			"SectionNumber" => 'text',
			"SectionTitle" => 'text',
			"CollapseNumber" => 'text',
			"SectionId" => 'text',
			"SectionHTML" => 'text'
		);
		$html = renderFromTemplate::render($data, $sectionAttrs, 'summarySectionTemplate');
		return $html;
	}

	public static function renderBody($data){
		//PALOG::log('RenderSummaryHtml:renderBody');

		$bodyAttrs = array(
			"htmlItems" => 'text'
		);
		$html = renderFromTemplate::render($data, $bodyAttrs, 'summaryDocTemplate');
		return $html;
	}
}
