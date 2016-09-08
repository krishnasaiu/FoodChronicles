<?php
  session_start();
  $resname = $_GET["name"];
  foreach ($_SESSION["data"]['restaurants'] as $value) {
    if (strcmp($value['restaurant']['name'], $resname) == 0){
      echo "<html>";
      echo '<body>';
      echo "<div style=\"
      justify-content: center;
      align-items: center;
      padding: 1em 1em 1em 1em;
      position: absolute;
      top: 40%;
      left: 40%;
      width: 300px;
      white-space: pre-wrap;
      white-space: -moz-pre-wrap;
      white-space: -pre-wrap;
      white-space: -o-pre-wrap;
      word-wrap: break-word;
      background: url('images/white-background.jpg');
      background: rgba(255, 255, 255, 1);\">";
      echo "<center><img src=\"".$value['restaurant']['featured_image']."\" alt=\"".$resname."\" height=\"100\" width=\"100\" align=\"middle\"></center>";
      echo "<h3>".$resname."</h3>";
      $rating = intval(round($value['restaurant']['user_rating']['aggregate_rating'], 0, PHP_ROUND_HALF_UP));
      for ($x = 1; $x <= 5; $x++) {
        if ($x <= $rating) {
          echo "<span>★</span>";
        } else {
          echo "<span>☆</span>";
        }
      }
      echo "<hr>";
      echo $value['restaurant']['location']['address'];
      echo "<br><a href=".$value['restaurant']['url']." target=\"_blank\"> Click to know more </a>";
      echo "</div>";
      echo "</body>";
      echo "</html>";
      break;
    }
  }
?>
