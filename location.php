<?php
	function getLatLon($address) {		
        	$prepAddr = str_replace(' ','+',$address);
        	$geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
        	$output= json_decode($geocode);
        	$latitude = $output->results[0]->geometry->location->lat;
        	$longitude = $output->results[0]->geometry->location->lng;
		return array('lat' => $latitude, 'lon' => $longitude);
	}
?>
