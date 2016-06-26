<?php
  	include("config.php");
   	session_start();

   	if ($_SERVER["REQUEST_METHOD"] == "POST") {

      		$username = mysqli_real_escape_string($db, $_POST['username']);
          $pass = mysqli_real_escape_string($db, $_POST['password']);
          $email = filter_var(mysqli_real_escape_string($db, $_POST['email']), FILTER_SANITIZE_EMAIL);

          $reg = '/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,}$/';

          $_SESSION["toggle"] = true;

          if (strlen($username) === 0) {
            $_SESSION["message"] = "Username invalid";
          } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION["message"] = "Email invalid";
          } else if (preg_match($reg, $pass) === 0) {
            $_SESSION["message"] = "Password must"
                                    ."<br>* be atleast 8 characters long"
                                    ."<br>* contain a capital letter"
                                    ."<br>* contain a number"
                                    ."<br>* conatain special character";
          } else if ($pass != $_POST['cpassword']) {
            $_SESSION["message"] = "Passwords didn't match";
          } else {
          $_SESSION["toggle"] = false;
      		$sql = "SELECT id FROM users WHERE username = '$username'";
      		$result = mysqli_query($db, $sql);
      		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      		$active = $row['id'];

      		$count = mysqli_num_rows($result);

      		if ($count == 0) {
         		$password = hash('sha512', $pass);

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
          }
          header("location: ../login.php");
   	}
?>
