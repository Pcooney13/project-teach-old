<?php

class RenderDetailHtml{

	public static function getUrl($id){
		$config = getHomebaseConfig();
		$url = $config['registerUrlPrefix'] . $id;;
		return $url;
	}

	public static function render($data){
		$config = getHomebaseConfig();

		$headAttrs = array(
			"id" => 'text',
			"targetAudience" => 'text',
			"learningObjectives" => 'text',
			"accreditationStatement" => 'text',
			"AMACreditDesignationStatement" => 'text',
			"image" => 'text',
			"format" => 'text',
			"instructors" => 'array',
			"targetaudience" => 'text',
			"blue_box_text" => 'text',
			"video_embed_link" => 'text',
			"disable-register" => 'text',
			"htmlBlueboxtext" => 'text',
			"time" => 'text',
			"title" => 'text',
			"credits" => 'text',
			"pagename" => 'text',
			"debug" => 'text',
			"url" => 'text'
		);

		$data['pagename'] = "Course Information";
		$data['accreditations']  = isset($data['accreditations']) ? $data['accreditations'] : array();
		$data['url'] = RenderDetailHtml::getUrl($data['id']);
		$data['disable-register'] = (!empty($data['disabled'])) ?"course-disabled" : "";
		ParseJSON::getImage($data);

		$html = renderFromTemplate::render ($data, $headAttrs,'detailDocTemplate');

		$html = do_shortcode($html, true);

		return $html;
	}
}
