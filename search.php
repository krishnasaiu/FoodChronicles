<?php
function get_url_contents($url){
        $crl = curl_init();
	$customHeader = array('user-key: '.'7a23aa4614aecba1b3d05cb94d89540c', 'Accept: application/json');
        $timeout = 5;
        curl_setopt ($crl, CURLOPT_URL,$url);
        curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_HTTPHEADER, $customHeader);
        curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
        $ret = curl_exec($crl);
        curl_close($crl);
        return $ret;
}
$url = get_url_contents("https://developers.zomato.com/api/v2.1/search?q=biryani&lat=17.4399&lon=78.4983&radius=5000&sort=real_distance");
$response = json_decode($url, true);
echo $response['restaurants'][0]['restaurant']['name'];
?>
