<?php 
	require 'vendor/autoload.php';
	require_once('ethos.php');
	require_once('intervention.php');

/**
 * Returns string as a slug
 *
 *
 * @param    string    $string     string
 * @return   string   		   slug
 */
function lp_slugify($string){
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
}

function lp_getGet($var){
	if (isset($_GET[$var])) {
		return $_GET[$var];
	}else{
		return '';
	}
	
}

function lp_get_date($timestamp, $format){
	$date = date("Y/m/d H:i:s", $timestamp);
	$date = new DateTime($date, new DateTimeZone('UTC'));
	$date->setTimezone(new DateTimeZone('GMT-4'));

	return $date->format($format);
}
function lp_jsonp_decode($jsonp, $assoc = false) { // PHP 5.3 adds depth as third parameter to json_decode
    if($jsonp[0] !== '[' && $jsonp[0] !== '{') { // we have JSONP
       $jsonp = substr($jsonp, strpos($jsonp, '('));
    }
    return json_decode(trim($jsonp,'();'), $assoc);
}
function lp_array_flatten($array) { 
	$output = [];

	if(lp_is_multi_array($array)){
		foreach ((array) $array as $top) {
			foreach ((array) $top as $key => $value) {
				$output[] = $value;
			}
		}
		$output = array_unique(array_filter($output), SORT_REGULAR);
	}else{
		$output = array_filter($array);
	}

	return $output; 
}

function lp_is_multi_array( $array ) { 
    rsort( $array ); 
    return isset( $array[0] ) && is_array( $array[0] ); 
}

function lp_sanitize_tax( $taxes ) { 
	if($taxes) {
		foreach ($taxes as $key => $tax) {
			if($tax->count == 0):
				unset($taxes[$key]);
			endif;
		}
	}

	return $taxes;
}
/**
 * Sort a multi-domensional array of objects by key value
 * Usage: usort($array, arrSortObjsByKey('VALUE_TO_SORT_BY'));
 * Expects an array of objects. 
 *
 * @param String    $key  The name of the parameter to sort by
 * @param String 	$order the sort order
 * @return A function to compare using usort
 */ 
function arrSortObjsByKey($key, $order = 'ASC') {
	return function($a, $b) use ($key, $order) {

		// Swap order if necessary
		if ($order == 'DESC') {
 	   		list($a, $b) = array($b, $a);
 		} 

 		// Check data type
 		if (is_numeric($a->$key)) {
 			return $a->$key - $b->$key; // compare numeric
 		} else {
 			return strnatcasecmp($a->$key, $b->$key); // compare string
 		}
	};
}

function lp_add_var($url, $key, $value) {
	
	$url = preg_replace('/(.*)(?|&)'. $key .'=[^&]+?(&)(.*)/i', '$1$2$4', $url .'&');
	$url = substr($url, 0, -1);
	
	if (strpos($url, '?') === false) {
		return ($url .'?'. $key .'='. $value);
	} else {
		return ($url .'&'. $key .'='. $value);
	}
}
function getEthosSlider(){
	$slides = '';
	$args = array(
		'post_type' => 'courses',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'orderby'			=> 'title',
		'order'				=> 'ASC'
	);
	$the_query = new WP_Query($args);
	
	// The Loop
	if ( $the_query->have_posts() ) {
	    while ( $the_query->have_posts() ) {
	        $the_query->the_post();
	        $link = get_the_permalink();
	        $dates = get_field('dates'); //Course date
            $live_dates = get_field('live_dates'); //Course date
            $cost = get_field('cost');
            $live = get_field('live');
            $thumb_url = get_field('featured_image');
            $credits = get_the_terms( get_the_ID(), 'course_credit' );
			$credits_string = join(', ', wp_list_pluck($credits, 'name'));

            $content = '';

            if($dates){
            	$content .= '<div><strong>Dates:</strong> '.$dates.'</div>';
            }
            if($cost){
            	$content .= '<div><strong>Cost:</strong> '.$cost.'</div>';
            }
            if($live_dates){
            	$content .= '<div><strong>Live Event Dates:</strong> '.$live_dates.'</div>';
            }
            if($credits_string){
            	$content .= '<div><strong>Credits Available:</strong> <span class="ethos-uppercase">'.$credits_string.'</span></div>';
            }
	        $slides .= '<div class="ethos-slider-wrap">
	        				<div class="ethos-slider-inner">
	        					<div class="ethos-slider-bg" style="background-image:url('.$thumb_url.')">
	        						<div class="ethos-slider-bg-filter">' . get_the_title() . '</div>
	        					</div>
	        					<div class="ethos-slider-text">'.$content.'</div>
	        					<div class="ethos-register">
	        						<a href="'.$link.'" title="View Event Details">View Details</a>
	        					</div>
	        				</div>
	        			</div>';
	    }
	}
	wp_reset_postdata();

	$output = '<div class="ethos-slider">'. $slides .'</div><div class="ethos-slider-nav"></div>';
	return $output;
}





