<?php
include('ZomatoAPI.php');

if($_POST)
{
 $keywords = $_POST['keywords'];
 $location = $_POST['location'];
 $radius = (!empty($_POST['radius']) && $_POST['radius'] != 0 ? $_POST['radius'] : 5) * 1000; // KM to M

 $result = getRestaurantsList($keywords, $location, $radius);

 echo "<div><ul>";
 foreach ($result['restaurants'] as $value) {
   echo "<li><a href=\"#\">".$value['restaurant']['name'].", ".$value['restaurant']['location']['locality']."</a></li>";
 }
 echo "</ul></div>";
}
?>
