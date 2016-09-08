<?php
  include('php/session.php');
  $query = "UPDATE userDetails SET isActive = ".$_GET['isActive']." WHERE id = ".$_GET['id'];
  $db->query($query);
  header("location: admin.php");
 ?>
