<?php

class CourseData{
	private static $location = DEFAULT_LOCATION;
	private static $address = DEFAULT_ADDRESS;
	private static $city= DEFAULT_CITY;
	private static $state = DEFAULT_STATE;
	private static $zip = DEFAULT_ZIP;
	private static $time = DEFAULT_TIME;
	private static $thumbnail = DEFAULT_THUMBNAIL;
	private static $cmeinformation = DEFAULT_CMEINFORMATION;
	private static $registerurl = DEFAULT_REGISTERURL;
	private static $targetaudience = DEFAULT_TARGETAUDIENCE;
	private static $learningobjectives = DEFAULT_LEARNINGOBJECTIVES;
	private static $accreditationstatememt = DEFAULT_ACCREDITATIONSTATEMEMT;
	private static $amacreditdesignationstatement = DEFAULT_AMACREDITDESIGNATIONSTATEMENT;

	public static function get($id){
		return array(
			'location' => CourseData::$location,
			'address' => CourseData::$address,
			'city' => CourseData::$city,
			'state' => CourseData::$state,
			'zip' => CourseData::$zip,
			'time' => CourseData::$time,
			'default_thumbnail' => CourseData::$thumbnail,
			'default_cmeinformation' => CourseData::$cmeinformation,
			'default_registerurl' => CourseData::$registerurl,
			'default_targetaudience' => CourseData::$targetaudience,
			'default_learningobjectives' => CourseData::$learningobjectives,
			'default_accreditationstatememt' => CourseData::$accreditationstatememt,
			'default_amacreditdesignationstatement' => CourseData::$amacreditdesignationstatement
 		);
	}
}

