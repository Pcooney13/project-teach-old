<?php

class PsychAcademyReadData{

	public static function read(){

		// PC__debug("PsychAcademyReadData::__construct: called");
		return PsychAcademyReadData::getByCategory();
		// PC__debug("PsychAcademyReadData::__construct: complete");
	}

	public static function getToken(){
		$config = getHomebaseConfig();
		// PC__debug("PsychAcademyReadData::getToken: called");

		$token = '';
		if ($config['username'] && $config['password']){
			// PC__debug("PsychAcademyReadData::getToken:calling formatJson");
			$jsonData = array(USERNAME => $config['username'] , PASSWORD => $config['password'] );
			// PC__debug(print_r($jsonData, 1), "PsychAcademyReadData::getToken:calling request");
			$url = $config['baseUrl'].$config['authenticateUrl'];
			// PC__debug("PsychAcademyReadData::getToken: url:".$url);

				$returnValues = PsychAcademyReadData::request($jsonData, $url, true);
			$token = isset($returnValues['token']) ? $returnValues['token'] : '';
			// PC__debug("PsychAcademyReadData::getToken: token:".$token);
		}
		// PC__debug("PsychAcademyReadData::getToken: complete:".$token);
		return $token;
	}

	public static function getByCategory(){
		$config = getHomebaseConfig();

		// PC__debug("PsychAcademyReadData::getByCategory: called");

		$response = '';
		$token = PsychAcademyReadData::getToken();
		$returnValues = array();
		if  ($token){
			// PC__debug("PsychAcademyReadData::getToken:calling formatJson");
			$jsonData = array(TOKEN => $token, CATEGORYNAME => $config['category']);
			// PC__debug(print_r($jsonData, 1), "PsychAcademyReadData::getToken:calling request");
			$url = $config['baseUrl'].$config['getByCategoryUrl'];
			// PC__debug("PsychAcademyReadData::getToken: url:".$url);

			$returnValues = PsychAcademyReadData::request($jsonData, $url);
			// PC__debug(print_r($returnValues, 1), "PsychAcademyReadData::getByCategory: returnValues");
		}else{
			// PC__debug("PsychAcademyReadData::getByCategory: invalid token:".$token);
		}
		// PC__debug("PsychAcademyReadData::getByCategory: complete");
		return $returnValues;
	}

	public static function json_minify($json) {
		$tokenizer = "/\"|(\/\*)|(\*\/)|(\/\/)|\n|\r/";
		$in_string = false;
		$in_multiline_comment = false;
		$in_singleline_comment = false;
		$new_str = array();
		$from = 0;
		$lastIndex = 0;

		while (preg_match($tokenizer,$json,$tmp,PREG_OFFSET_CAPTURE,$lastIndex)) {
			$tmp = $tmp[0];
			$lastIndex = $tmp[1] + strlen($tmp[0]);
			$lc = substr($json,0,$lastIndex - strlen($tmp[0]));
			$rc = substr($json,$lastIndex);
			if (!$in_multiline_comment && !$in_singleline_comment) {
				$tmp2 = substr($lc,$from);
				if (!$in_string) {
					$tmp2 = preg_replace("/(\n|\r|\s)*/","",$tmp2);
				}
				$new_str[] = $tmp2;
			}
			$from = $lastIndex;

			if ($tmp[0] == "\"" && !$in_multiline_comment && !$in_singleline_comment) {
				preg_match("/(\\\\)*$/",$lc,$tmp2);
				if (!$in_string || !$tmp2 || (strlen($tmp2[0]) % 2) == 0) {	// start of string with ", or unescaped " character found to end string
					$in_string = !$in_string;
				}
				$from--; // include " character in next catch
				$rc = substr($json,$from);
			}
			else if ($tmp[0] == "/*" && !$in_string && !$in_multiline_comment && !$in_singleline_comment) {
				$in_multiline_comment = true;
			}
			else if ($tmp[0] == "*/" && !$in_string && $in_multiline_comment && !$in_singleline_comment) {
				$in_multiline_comment = false;
			}
			else if ($tmp[0] == "//" && !$in_string && !$in_multiline_comment && !$in_singleline_comment) {
				$in_singleline_comment = true;
			}
			else if (($tmp[0] == "\n" || $tmp[0] == "\r") && !$in_string && !$in_multiline_comment && $in_singleline_comment) {
				$in_singleline_comment = false;
			}
			else if (!$in_multiline_comment && !$in_singleline_comment && !(preg_match("/\n|\r|\s/",$tmp[0]))) {
				$new_str[] = $tmp[0];
			}
		}
		$new_str[] = $rc;
		return implode("",$new_str);
	}

	public static function decodeJson($json){
		$json = PsychAcademyReadData::json_minify($json);
		$json = str_replace(',]', ']', $json);
		if (0 === strpos(bin2hex($json), 'efbbbf')) {
		   $json = substr($json, 3);
		}
		$p = json_decode( $json,1 );
		return $p;
	}

	public static function request($data, $url, $cook=false){
		// PC__debug("PsychAcademyReadData:request:called");
		// PC__debug("PsychAcademyReadData:request:called:".print_r($data,1).":".$url);

		$headers = array('Accept' => 'application/json');
		// Unirest\Request::verifyPeer(false);
		$body = Unirest\Request\Body::json($data);
		// PC__debug("PsychAcademyReadData:body:$body ");

		$response = Unirest\Request::post($url, $headers, $body);
		$returnValues = PsychAcademyReadData::decodeJson($response->body);
		// PC__debug("PsychAcademyReadData::request: returnValues:".print_r($returnValues));
		if (!$returnValues['success']){
			$lastError = isset($returnValues['error']) ? $returnValues['error'] : "Unknown error";
			// PC__debug("PsychAcademyReadData::request: error:".$lastError);
		}
		return $returnValues;
	}
}
