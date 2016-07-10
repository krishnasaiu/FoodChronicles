<?php
session_start();
include('ZomatoAPI.php');

if($_POST)
{
 $keywords = $_POST['keywords'];
 $location = $_POST['location'];
 $radius = (!empty($_POST['radius']) && $_POST['radius'] != 0 ? $_POST['radius'] : 5) * 1000; // KM to M

 $result = getRestaurantsList($keywords, $location, $radius);
 if (is_string($result)) {
   echo "<div style=\"font-family:Arial, Helvetica, sans-serif;
                      font-size:13px;
                      border: 1px solid;
                      margin: 10px 0px;
                      padding:15px 10px 15px 50px;
                      background-repeat: no-repeat;
                      background-position: 10px center;
                      color: #D8000C;
                      background-color: #FFBABA;\">"
                      .$result
                      ."</div>";
 } else {
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
}
?>
