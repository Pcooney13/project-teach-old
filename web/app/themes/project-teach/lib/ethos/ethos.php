<?php
	/**
	 * User View
	 *
	 * @author Steven Cano
	 */

	if (!class_exists('Zebra_cURL')) {
		die("Zebra_cURL is not installed/missing.");
	}

	Class Course 
	{
		// Properties
		private $domain = 'lms.projectteachny.org'; //Ethos Domain
		private $userpass = 'restws_lpadmin:5BPFVZfAVAf5RxVB'; //Credentials
		private $mainUrls = []; //Main Course Nodes to be sent
		private $creditUrls = []; //Credit queries
		private $taxUrls = []; //Tax Queries
		private $sendit = [];
		private $rcx;
		private $courses = [];
		private $queryType;
		private $postId;
		private $pages = [];
		private $file;
		private $transcript;

		//Contructor
		function __construct() 
		{
			$this->rcx = new Zebra_cURL(); // Sets up ZebraCurl
			$this->lp_set_multicurls(); //Sets up Zebra Curl Parameters
	    }
	    private function lp_set_multicurls()
	    {
	    	// if making requests over HTTPS we need to load a CA bundle
			// so we don't get CURLE_SSL_CACERT response from cURL
			// you can get this bundle from https://curl.haxx.se/docs/caextract.html
			$this->rcx->ssl(false);
			 
			// cache results in the "cache" folder and for 3600 seconds (one hour)
			$this->rcx->cache(WP_CONTENT_DIR . '/themes/project-teach/lib/zebra-cache', 3600);

			// setting multiple options at once
			$this->rcx->option(array(
			    CURLOPT_HTTPAUTH		=> CURLAUTH_BASIC,
			    CURLOPT_USERPWD			=> $this->userpass,
			    CURLOPT_RETURNTRANSFER	=> TRUE,
			    CURLOPT_HTTPHEADER		=> array("Content-Type: application/json"),
			));
	    }
	    private function lp_set_courseMeta($body, $queryType)
	    {
	    	switch ($queryType) {
	    		case 'course':
		   //  		echo '<pre>';
					// print_r($body);
					// echo '</pre>';
			    	$payload = array(
										'status' 							=> (isset($body['status']) ? $body['status'] : ''),
										'title' 							=> (isset($body['title']) ? $body['title'] : ''),
										'url' 								=> (isset($body['url']) ? $body['url'] : ''),
										'field_target_audience' 			=> (isset($body['field_target_audience']['value']) ? $body['field_target_audience']['value'] : ''),
										'field_program' 					=> (isset($body['field_program']['value']) ? $body['field_program']['value'] : ''),
										'field_course_summary' 				=> (isset($body['field_course_summary']['value']) ? $body['field_course_summary']['value'] : ''),
										'field_learning_objectives' 		=> (isset($body['field_learning_objectives']['value']) ? $body['field_learning_objectives']['value'] : ''),
										'field_accreditation' 				=> (isset($body['field_accreditation']['value']) ? $body['field_accreditation']['value'] : ''),
										'field_course_date_start' 			=> (isset($body['field_course_date']['value']) ? lp_get_date($body['field_course_date']['value'], 'M j, Y') : ''),
										'field_course_date_end' 			=> (isset($body['field_course_date']['value2']) ? lp_get_date($body['field_course_date']['value2'], 'M j, Y') : ''),
										'field_course_live'					=> (isset($body['field_course_live']) ? $body['field_course_live'] : false),
										'field_course_event_date_start' 	=> (isset($body['field_course_event_date']['value']) ? lp_get_date($body['field_course_event_date']['value'], 'M j, Y - h:ia') : ''),
										'field_course_event_date_end' 		=> (isset($body['field_course_event_date']['value2']) ? lp_get_date($body['field_course_event_date']['value2'], 'M j, Y  - h:ia') : ''),
										'price'								=> (isset($body['price']) ? number_format($body['price'], 2) : ''),
										'field_faculty_credentials'			=> (isset($body['field_faculty_credentials']['value']) ? $body['field_faculty_credentials']['value'] : ''),
										'field_course_category'				=> (isset($body['field_course_category']) ? $body['field_course_category'] : ''),
										'field_course_format'				=> (isset($body['field_course_format']) ? $body['field_course_format'] : ''),
										'field_course_image'				=> (isset($body['field_course_image']['file']['id']) ?  $this->get_imgURL($body['field_course_image']['file']['id']) : '')
									);
			    	if(isset($body['nid'])) {
			    		$this->set_single_course($body['nid'], 'course_meta', $payload);
			    	}
	    			break;
	    		case 'credit':
	    			if(isset($body[0]['nid']['id'])) {
	    				$this->set_single_course($body[0]['nid']['id'], 'course_credit', $body);
	    			}
	    			break;
	    		
	    		default:
	    			# code...
	    			break;
	    	}
	    }
	    public function set_courses($ids)
	    {
	    	foreach ($ids as $id) {
				$this->mainUrls[$id] = 'https://' . $this->domain . '/node.json?nid=' . $id;
				$this->creditUrls[$id] = 'https://' . $this->domain . '/course_credit.json?nid=' . $id . '&active=1';
				$this->set_single_course($id, 'creditURL', $this->creditUrls[$id]);
				$this->set_single_course($id, 'url', $this->mainUrls[$id]);
			}
			foreach ($this->mainUrls as $key => $value) {
				$this->sendit[] = $value;
			}
			foreach ($this->creditUrls as $key => $value) {
				$this->sendit[] = $value;
			}
			$this->lp_get_multicurls($this->sendit);


		}
		public function get_courses() 
		{
			return $this->courses;
		}
		public function set_single_course($id, $key, $payload)
		{
			$this->courses[$id][$key] = $payload;
		}
		public function get_single_course($id)
		{
			return $this->courses[$id];
		}
		public function getCourseMeta($id, $type)
		{
			if ( isset($this->courses[$id][$type]) ) {
				return $this->courses[$id][$type];
			} else{
				return '';
			}
		}
		public function get_featuredImage($id){
			$url = '';
			$imgName = 'foo.bar';

			$course = $this->getCourseMeta($id, 'course_meta');
			if($course['field_course_image']):
				$url = $course['field_course_image'];
			else :
				return;
			endif;
			$this->lp_get_multicurls($url);
			if($this->file){
				$url = $this->file;
				$urlInter = str_replace(' ', '%20', $url);
				$path_parts = pathinfo($url);
				$imgName = $path_parts['filename'] . '.' . $path_parts['extension'];
				lp_resize_image($urlInter, $imgName);
			}
			
			unset($this->file);
			if(file_exists(WP_CONTENT_DIR . '/themes/project-teach/lib/ethos/ethos-uploads/' . $imgName)):
				//return WP_CONTENT_URL . '/ethos-uploads/' . $imgName;
				return '/wp-content/themes/project-teach/lib/ethos/ethos-uploads/' . $imgName;
			else: 
				return '';
			endif;

		}
		public function getCredits($credits)
		{
			$output = array();
			if($credits){
				foreach ($credits as $key => $value) {
					$output[] = $value['type']['id'];
				}
			}
			
			return $output;
		}
		public function getCreditsExcerpt($credits)
		{
			$output = '';

			foreach ($credits as $key => $value) {
				$output .= '<span class="ethos-uppercase ethos-block">' . $value['max'] . ' ' . $value['type']['id'] . ' </span>';
			}

			return $output;
		}
		public function getCreditsFull($credits)
		{
			$output = '';
			foreach ($credits as $key => $value) {
				switch ($value['type']['id']) {
					case 'ama':
						$output .= '<div class="mb-4 border-b border-blue"><h4>' . $value['max'] . ' AMA PRA Category 1 Credit™</h4><p>This activity has been planned and implemented in accordance with the accreditation requirements and policies of the Accreditation Council for Continuing Medical Education (ACCME) through the joint providership of McLean Hospital and Massachusetts General Hospital. McLean Hospital is accredited by the ACCME to provide continuing medical education for physicians.</p><p>McLean Hospital designates this live activity for a maximum of <strong>' . $value['max'] . '</strong> AMA PRA Category 1 Credit™. Physicians should only claim credit commensurate with the extent of their participation in the activity.</p></div>';
						break;
					case 'emt':
						$output .= '<div class="mb-4 border-b border-blue"><h4>' . $value['max'] . ' EMT CE Credit</h4><p>This course has been certified and is approved as a Continuing Education course for EMTs. This course contains <strong>' . $value['max'] . '</strong> hours of educational content.</p> ' . ($value['code'] ? '<p>Authorization Number is ' . $value['code'] . '.</p>' : '') . '</div>';
						break;
					case 'lmhc':
						$output .= '<div class="mb-4 border-b border-blue"><h4>' . $value['max'] . ' LMHC</h4><p>MaMHCA, and its agent, MMCEP has been designated by the Board of Allied Mental Health and Human Service Professions to approve sponsors of continuing education for licensed mental health counselors in the Commonwealth of Massachusetts for licensure renewal, in accordance with the requirements of 262 CMR.</p><p>This program has been approved for ed mental health counselors in the Commonwealth of Massachusetts for licensure renewal, in accordance with the requirements of 262 CMR <strong>' . $value['max'] . '</strong> CE credit for Licensed Mental Health Counselors MaMHCA.</p>' . ($value['code'] ? '<p>Authorization Number is ' . $value['code'] . '.</p>' : '') . '</div>';
						break;
					case 'ancc':
						$output .= '<div class="mb-4 border-b border-blue"><h4>' . $value['max'] . ' Nursing Contact Hours</h4><p>Massachusetts General Laws, Chapter 13, sections 13, 14, 14A, 15 and 15D and Chapter 112, sections 74 through 81C authorize the Board of Registration in Nursing to regulate nursing practice and education.</p><p>This program meets the requirements of the Massachusetts Board of Registration in Nursing (244 CMR 5.00) for <strong>' . $value['max'] . '</strong> contact hours of nursing continuing education credit.</p><p><strong>Advance practice nurses, please note:</strong> Educational activities which meet the requirements of the ACCME (such as this activity) count towards 50% of the nursing requirement for ANCC accreditation.</p></div>';
						break;
					case 'participation':
						$output .= '<div class="mb-4 border-b border-blue"><h4>' . $value['max'] . ' Participation</h4><p>This course allows other providers to claim a Participation Certificate upon successful completion of this course.</p></p>Participation Certificates will specify the title, location, type of activity, date of activity, and number of AMA PRA Category 1 Credit™ associated with the activity. Providers should check with their regulatory agencies to determine ways in which AMA PRA Category 1 Credit™ may or may not fulfill continuing education requirements. Providers should also consider saving copies of brochures, agenda, and other supporting documents.</p></div>';
						break;
					case 'pce':
						$output .= '<div class="mb-4 border-b border-blue"><h4>' . $value['max'] . ' Psychologists CE Credit</h4><p>The Massachusetts General Hospital Department of Psychiatry is approved by the American Psychological Association to sponsor continuing education for psychologists.</p><p>The Massachusetts General Hospital Department of Psychiatry maintains responsibility for this program and its content. This offering meets the criteria for <strong>' . $value['max'] . '</strong> Continuing Education (CE) credits per presentation for psychologists.</p></div>';
						break;
					case 'nasw':
						$output .= '<div class="mb-4 border-b border-blue"><h4>' . $value['max'] . ' Social Workers</h4><p>The Collaborative of NASW, Boston College, and Simmons College Schools of Social Work authorizes social work continuing education credits for courses, workshops, and educational programs that meet the criteria outlined in 258 CMR of the Massachusetts Board of Registration of Social Workers</p><p>This program has been approved for <strong>' . $value['max'] . '</strong> Social Work Continuing Education hours for relicensure, in accordance with 258 CMR. </p>' . ($value['code'] ? '<p>Collaborative of NASW and the Boston College and Simmons Schools of Social Work Authorization Number ' . $value['code'] . '.</p>' : '') . '</div>';
						break;
					default:
						$output = '';
						break;
				}
				
			}
			return $output;
		}
		public function lp_get_multicurls($urls)
		{
			 
			// let's fetch the RSS feeds of some popular websites
			// execute the callback function for each request, as soon as it finishes
			$this->rcx->get($urls, function($result) {
			 
			    // everything went well at cURL level
			    if ($result->response[1] == CURLE_OK) {
			 
			        // if server responded with code 200 (meaning that everything went well)
			        // see https://httpstatus.es/ for a list of possible response codes
			        if ($result->info['http_code'] == 200) {

			            $body = lp_jsonp_decode($result->body, TRUE);
			            
			            $counter = 0;

			            if( isset($body['self']) ): $self = $body['self']; else : $self = ''; endif;
			            if( isset($body['first']) ): $first = $body['first']; else : $first = ''; endif;

			            if( isset($body['last']) ): 
			            	$last = $body['last'];
			            	parse_str(parse_url($last, PHP_URL_QUERY), $lastURL);
			            	$lastPage = $lastURL['page'];
			            else: 
			            	$last = ''; 
			            endif;

			            if( isset($body['prev']) ): $prev = $body['prev']; else : $prev = ''; endif;
			            if( isset($body['next']) ): $next = $body['next']; else : $next = ''; endif;

			            if($next): 
			            	while ($counter <= $lastPage) {
			            		$selfFin = lp_add_var($self, 'page', $counter);
			            		$this->pages[] = $selfFin;
			            		$counter++;
			            	}
			            endif;
			            
			            if(isset($body['list'][0]['type']) && $body['list'][0]['type'] == 'course' && !(count($body['list']) > 1)):
			            	$this->lp_set_courseMeta($body['list'][0], 'course');
		            	elseif(isset($body['list'][0]['ccid'])) :
		            		$this->lp_set_courseMeta($body['list'], 'credit');
		            	elseif(isset($body['list'][0]['tid'])) : 
		            		$this->set_courseTax($body['list']);
		            	elseif(isset($body['fid'])) :
		            		$this->file = urldecode($body['url']);
		            	else :
		     //        		echo "<pre>";
		     //        		print_r($body);
							// echo "</pre>";
		     //        		echo "This is not a supported query.";
			            endif;

			        // show the server's response code
			        } //else trigger_error(print_r($result) . 'Server responded with code ' . $result->info['http_code'], E_USER_ERROR);
			 
			    // something went wrong
			    // ($result still contains all data that could be gathered)
			    } //else trigger_error('cURL responded with: ' . $result->response[0], E_USER_ERROR);
			 
			});

		}
		public function get_pages()
		{
			return $this->pages;
		}
		public function set_postId($postId)
		{
			$this->postId = $postId;
		}
		public function get_postId()
		{
			return $this->postId;
		}
		public function set_courseTax($body)
		{
			foreach ($body as $key => $value) {
				$this->taxReturn[] = $value['name'];
			}
		}
		public function get_courseTax($id, $tax)
		{

			$courseTax = $this->getCourseMeta($id, 'course_meta');
			$output = '';

			if ( array_filter($courseTax[$tax])) {

				$courseTax = $courseTax[$tax];


				foreach ($courseTax as $key => $value) {
					$this->taxUrls[] = 'https://' . $this->domain . '/taxonomy_term.json?tid=' . $value['id'];
				}

				$this->lp_get_multicurls($this->taxUrls);

				$output = $this->taxReturn;

				unset($this->taxUrls); 
				unset($this->taxReturn);

			}
			return $output;
		}
		public function get_imgURL($id){

			$url = 'https://' . $this->domain . '/file/' . $id . '.json';

			return $url;
		}
		public function updateWPPost($courseID, $postId)
		{
			$this->set_postId($postId);
			$courseMeta = $this->getCourseMeta($courseID, 'course_meta');

			// Update post
			$payload = array(
			    'ID'           => $this->get_postId(),
			    'post_title'   => $courseMeta['title'], // new title
			);
			// Update the post into the database
			wp_update_post( $payload );
		}
		public function updateACF($courseID, $postId, $fieldId, $payload = '')
		{
			$this->set_postId($postId);
			$courseMeta = $this->getCourseMeta($courseID, 'course_meta');

			update_field( $fieldId, $payload, $postId );
		}
		public function updateWPTax($courseID, $postId, $payload, $taxonomy)
		{
			$this->set_postId($postId);
			$output = array();
			$cat_ids = array();
			if($payload):
				foreach ($payload as $key => $value) {
				$output[] = array(
								'slug' => lp_slugify($value),
								'name' => ucwords($value),
							);
				}
				foreach ($output as $key => $value) {
					$cat_ids[] = $value['slug'];
				}
				$term_taxonomy_ids = wp_set_object_terms( $this->get_postId(), $cat_ids, $taxonomy);

				foreach ($output as $key => $value) {
					$term = get_terms(array( 
							    'taxonomy' => $taxonomy,
							    'slug' => $value['slug'],
							    'hide_empty' => true,
							));
					wp_update_term($term[0]->term_id, $taxonomy, $value);
				}
				
			endif;
		}

	}
	
