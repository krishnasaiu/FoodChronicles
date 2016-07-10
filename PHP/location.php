<?php
	function getCoordinates($address) {
        	$prepAddr = str_replace(' ','%20',$address);
        	$geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
        	$output= json_decode($geocode);
					$status = "success";
					$latitude = 0;
					$longitude = 0;
					if (strcmp($output->status, 'ZERO_RESULTS') == 0 || count($output->results) == 0){
						$status = "failed";
					} else {
        		$latitude = $output->results[0]->geometry->location->lat;
        		$longitude = $output->results[0]->geometry->location->lng;
					}
		return array('lat' => $latitude, 'lon' => $longitude, 'status' => $status);
	}
?>
