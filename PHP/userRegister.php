<?php
  	include("config.php");
   	session_start();

   	if ($_SERVER["REQUEST_METHOD"] == "POST") {
      		// username and password sent from form

      		$username = mysqli_real_escape_string($db, $_POST['username']);

      		$sql = "SELECT id FROM users WHERE username = '$username'";
      		$result = mysqli_query($db, $sql);
      		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      		$active = $row['id'];

      		$count = mysqli_num_rows($result);

      		if ($count == 0) {
         		$password = hash('sha512', mysqli_real_escape_string($db, $_POST['password']));
            $email = mysqli_real_escape_string($db, $_POST['email']);

            $sql = "INSERT INTO users(username, password, email) VALUES('$username', '$password', '$email')";
            $data = mysqli_query($db, $sql);
	          if($data) {
	           $_SESSION["message"] = $username." registered succesfully";
           } else {
             $_SESSION["message"] = "ERROR!!";
           }
      		} else {
         		$_SESSION["message"] = $username." already exists!!";
      		}
          header("location: ../login.php");
   	}
?>
