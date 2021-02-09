<?php

class RenderFeaturedHTML{

	public static function item($data){
		$url = "/course-detail?number=";

		$remaps = array(
				"startDate" => "start-date",
				"endDate" => "end-date",
		);
		foreach($remaps as $name => $value){
			if (isset($data[$name])){
				$data[$value] = $data[$name];
			}
		}


		$data["start-date"] = date(" M d, Y", strtotime($data['start-date']));
		$data["end-date"] = date(" M d, Y", strtotime($data['end-date']));
		$data['detail-url'] = $url . $data['number'];
		$data['type'] = "Online training";
		$data['thumbnail'] = str_replace("http://", "https://", $data['thumbnail']);
		$data['number-of-credits'] = "1";
		$data['plural'] = $data['number-of-credits'] == 1 ? '' : 's';
		$data['slug'] = sanitize_title($data['title']);
		
		// WJF START 8/20/2018 Add Functional Activity type...
		if (!empty ($data['CustomActivityType']) &&
				!empty ($data['FunctionalActivityType'])){
			if ($data['CustomActivityType'] == "Live Event" &&
					$data['FunctionalActivityType'] == 'LIVEEVENT'){
				$data['type'] = 'Live Event';
			}
		}

		if (	$data['type'] == "Live Event" ||
				$data['CustomActivityType'] == "Live Event" ||
				$data['FunctionalActivityType'] == "LIVEEVENT"){
			return '';
		}

		echo "<!-- DEBUG -->\n";
		echo "<!-- ZZZ Slug: " . $data['slug'] . "-->\n";
		echo "<!-- ZZZ Title: " . $data['title'] . "-->\n";
		echo "<!-- ZZZ Number: " . $data['number'] . "-->\n";
		echo "<!-- ZZZ id: " . $data['id'] . "-->\n";
		echo "<!-- ZZZ Type: " . $data['type'] . "-->\n";
		echo "<!-- ZZZ FunctionalActivityType: " . $data['FunctionalActivityType'] . "-->\n";
		echo "<!-- ZZZ CustomActivityType:" . $data['CustomActivityType'] . "-->\n\n";
		echo "<!-- DEBUG -->\n";
		// WJF END 8/20/2018 Add Functional Activity type...
		// PC::debug(print_r($data,1));

		if (empty($data['id'])){
			return '';
		}else{
			$itemAttrs = array(
				"type" => "text",
				"number" => "text",
				"plural" => "text",
				"thumbnail" => "text",
				"title" => "text",
				"slug" => "text",
				"start-date" => "text",
				"end-date" => "text",
				"number-of-credits" => "text",
				"detail-url" => "text"
			);
			$html = renderFromTemplate::render($data, $itemAttrs, 'featuredItemTemplate');
			return $html;
		}
	}

	public static function body($data){
		$bodyAttrs = array(
			"htmlItems" => 'text'
		);
		$html = renderFromTemplate::render($data, $bodyAttrs, 'featuredDocTemplate');

		return $html;
	}
}
