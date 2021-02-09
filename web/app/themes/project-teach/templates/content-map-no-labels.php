<?php 

$image = get_field("map_no_labels", "option");
$size = 'large'; // (thumbnail, medium, large, full or custom size)

if( $image ) {

	echo wp_get_attachment_image( $image, $size, '', array("class" => "pt_map_no_labels") );

}

?>