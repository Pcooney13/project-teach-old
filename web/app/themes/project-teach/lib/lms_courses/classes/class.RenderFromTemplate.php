<?php

class renderFromTemplate{
	public static function render($data, $fields, $templateID){
		$config = getHomebaseConfig();
		$templateDir = $config['templateDir'];
		$itemTemplateName = $templateDir.$config[$templateID];
		$html = file_get_contents($itemTemplateName );

		if (isset($data['thumbmnail'])){
			PC::debug("Found thumbnail:" . $data['thumbnail']);
		}
		foreach($fields as $title => $type){

			if ($type == 'date'){
				$dateHtml = '';
				$dataValue = isset($data[$title]) ? $data[$title] : '';
				if (strlen($dataValue)){
					$dateHtml = date("F d, Y", strtotime($dataValue));
					// $d = date_parse ( $dataValue );
					// $dateHtml  = $d['month'] . '/' . 	$d['day'] . '/' . 	$d['year'];
				}
				$html = str_replace('{{' . $title . '}}', $dateHtml, $html );
			}else if ($type == 'text'){
				$dataValue = isset($data[$title]) ? $data[$title] : '';
				$html = str_replace('{{' . $title . '}}', $dataValue, $html );
			}else if ($type == 'array'){
				$dataValue = isset($data[$title]) ? $data[$title] : array();
				$listHtml = '';
				foreach($dataValue as $value){
					$format = "\t\t<li>{{value}}</li>\n";
					$listHtml .= str_replace('{{value}}', $value, $format);
				}
				$html = str_replace('{{' . $title . '}}', $listHtml, $html );
			}
		}
		return $html;
	}

	public static function renderList($data, $fields, $template){
		$html = '';
		for($i = 0; $i < count($data); $i++){
			$item = $data[$i];
			$fields['number'] = $i + 1;
			$html .= renderFromTemplate::render($item, $fields, $template);
		}
		return $html;
	}
}
