<?php
  	include("config.php");
   	session_start();

   	if ($_SERVER["REQUEST_METHOD"] == "POST") {
      		// username and password sent from form

      		$username = mysqli_real_escape_string($db, $_POST['username']);
      		$password = hash('sha512', mysqli_real_escape_string($db, $_POST['password']));

      		$sql = "SELECT id FROM users WHERE username = '$username' and password = '$password'";
      	  $result = mysqli_query($db, $sql);
      	  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    		  $active = $row['id'];

    		  $count = mysqli_num_rows($result);

    		  if ($count == 1) {
       		  $_SESSION['login_user'] = $username;
       		  header("location: ../welcome.php");
          } else {
         	  $_SESSION["message"] = "Username or Password is invalid!!";
            header("location: ../login.php");
    		  }
   	}
?>
