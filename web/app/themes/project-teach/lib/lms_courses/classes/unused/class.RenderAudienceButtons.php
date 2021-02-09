<?php

class RenderAudienceButtonsHTML{

	public static function renderItem($data){
		PALOG::log('RenderSummaryHtml:__construct');

		$itemAttrs = array(
			"number" => 'text',
			"class" => 'text',
			"id" => 'text',
			"title" => 'text'
		);
		$html = renderFromTemplate::render($data, $itemAttrs, 'audienceButtonTemplate');
		return $html;
	}

	public static function renderBody($data){
		PALOG::log('RenderSummaryHtml:renderBody');

		$bodyAttrs = array("htmlItems" => 'text');
		$html = renderFromTemplate::render($data, $bodyAttrs, 'audienceDocTemplate');
		return $html;
	}
}
