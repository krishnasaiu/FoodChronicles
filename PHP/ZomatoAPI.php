<?php
include('location.php');

function get_url_contents($url) {
  $crl = curl_init();
  $api_key = '7a23aa4614aecba1b3d05cb94d89540c';
	$customHeader = array('user-key: '.$api_key, 'Accept: application/json');
  $timeout = 5;

  curl_setopt($crl, CURLOPT_URL, $url);
  curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_HTTPHEADER, $customHeader);
  curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
//  echo curl_getinfo($crl, CURLINFO_EFFECTIVE_URL);
  $ret = curl_exec($crl);
  if( $ret === null || $ret == FALSE || $ret == '' )
  {
    return 'Sorry couldn\'t process your query';
  }
  curl_close($crl);

  return $ret;
}

function getRestaurantsList($keywords, $location, $radius) {
	$coordinates = getCoordinates($location);
	$url = get_url_contents("https://developers.zomato.com/api/v2.1/search?".
                          "q=".str_replace(' ', '%20', $keywords).
                          "&lat=".$coordinates['lat'].
                          "&lon=".$coordinates['lon'].
                          "&radius=".$radius.
                          "&sort=real_distance");
	$response = json_decode($url, true);
	return $response;
}
?>
