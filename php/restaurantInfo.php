<?php
  session_start();
  echo "<html>";
  echo "<body >";
  echo "<div style=\"
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 0 0 4em;
  position: absolute;
  top: 40%;
  left: 40%;\">";
  echo "<p>".$_GET["name"]."</p>";
  echo "</div>";
  echo "</body>";
  echo "</html>";
?>
