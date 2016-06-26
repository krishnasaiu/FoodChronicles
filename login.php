<?php
session_start();
function getError() {
  if (isset($_SESSION["message"])) {
    $error = sprintf('<p class="error">%s</p>', $_SESSION["message"]);
    unset($_SESSION["message"]);
    return $error;
  }
}
?>

<html lang = "en">
  <head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="JS/jquery-2.2.3.js"> </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.message a').click(function(){
          $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
      });
    </script>
    <?php
    if (isset($_SESSION["toggle"]) && $_SESSION["toggle"] === true) {
      $_SESSION["toggle"] = false;
      echo "<script>
            function toggle() {
              $('form').animate({height: \"toggle\", opacity: \"toggle\"}, \"slow\");
            }
            </script>";
    }
    ?>
  </head>
	<body onload="toggle()">
    <div class="login-page">
      <div class="form">
        <form class="register-form" action="PHP/userRegister.php" method="post">
          <input type="text" name="username" placeholder="Username" autofocus="autofocus" >
          <input type="text" name="email" placeholder="E-Mail" >
          <input type="password" name="password" placeholder="Password" >
          <input type="password" name="cpassword" placeholder="Confirm Password" >
          <button id="register">create</button>
          <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>
        <form class="login-form" action="PHP/userLogin.php" method="post">
          <input type="text" name="username" placeholder="Username" autofocus="autofocus">
          <input type="password" name="password" placeholder="Password" >
          <button id="login">login</button>
          <p class="message">Not registered? <a href="#">Create an account</a></p>
        </form>
        <?php echo getError(); ?><br />
      </div>
    </div>
	</body>
</html>
