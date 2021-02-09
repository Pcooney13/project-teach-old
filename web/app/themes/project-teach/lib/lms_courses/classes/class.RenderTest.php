<?php

class RenderTest{

	public static function load(){
		return array(
				'cme-info' => "cme-info",
				'city' => "city",
				'descrtiption' => "descrtiption",
				'endDate' => "endDate",
				'faculty' => "faculty",
				'learning-objectives' => "learning-objectives",
				'location' => "location",
				'number-of-credits' => "number-of-credits",
				'startDate' => "startDate",
				'thumbnail' => "thumbnail",
				'title' => "title",
				'time' => "time",
				'target-audience' => "target-audience",
                'zip' => "zip",
                "slug" => "slug",
		);
	}

	public static function renderSummary(){
		$data = RenderTest::load();
	}

	public static function renderDetail(){
		$data = RenderTest::load();
	}
}


