<?php
session_start();
include('ZomatoAPI.php');

if($_POST)
{
 $keywords = $_POST['keywords'];
 $location = $_POST['location'];
 $radius = (!empty($_POST['radius']) && $_POST['radius'] != 0 ? $_POST['radius'] : 5) * 1000; // KM to M

 $result = getRestaurantsList($keywords, $location, $radius);
 $_SESSION["data"] = $result;
 echo "
  <link rel=\"stylesheet\" href=\"magnific-popup/magnific-popup.css\">

  <script src=\"js/jquery-2.2.3.js\"></script>

  <script src=\"magnific-popup/jquery.magnific-popup.js\"></script>";
 echo "<script>
      $('.ajax-popup-link').magnificPopup({
        type: 'ajax',
        removalDelay: 300,
        mainClass: 'mfp-fade'
      });
      </script>";
 echo "<div><ul>";
 foreach ($result['restaurants'] as $value) {
   echo "<li><a href=\"php\\restaurantInfo.php?name="
   .$value['restaurant']['name']
   ."\" class=\"ajax-popup-link\">"
   .$value['restaurant']['name']
   .", "
   .$value['restaurant']['location']['locality']
   ."</a></li>";
 }
 echo "</ul></div>";

}
?>
