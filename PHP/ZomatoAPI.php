<?php
include('location.php');

function get_url_contents($url) {
  $crl = curl_init();
	$customHeader = array('user-key: '.'7a23aa4614aecba1b3d05cb94d89540c', 'Accept: application/json');
  $timeout = 5;

  curl_setopt ($crl, CURLOPT_URL, $url);
  curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_HTTPHEADER, $customHeader);
  curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, $timeout);

  $ret = curl_exec($crl);
  curl_close($crl);

  return $ret;
}

function getRestaurantsList($keywords, $location, $radius) {
	$coordinates = getLatLon($location);
	$url = get_url_contents("https://developers.zomato.com/api/v2.1/search?".
                          "q=".$keywords.
                          "&lat=".$coordinates['lat'].
                          "&lon=".$coordinates['lon'].
                          "&radius=".$radius.
                          "&sort=real_distance");
	$response = json_decode($url, true);
	return $response;
}
?>
