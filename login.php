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
    <script>
      $(document).ready(function(){
        $('.message a').click(function(){
          $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
      });
    </script>
  </head>
	<body>
    <div class="login-page">
      <div class="form">
        <form class="register-form" action="PHP/userRegister.php" method="post">
          <input type="text" name="username" placeholder="Username" autofocus="autofocus" required>
          <input type="password" name="password" placeholder="Password" required>
          <input type="text" name="email" placeholder="E-Mail" required>
          <button id="register">create</button>
          <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>
        <form class="login-form" action="PHP/userLogin.php" method="post">
          <input type="text" name="username" placeholder="Username" autofocus="autofocus" required>
          <input type="password" name="password" placeholder="Password" required>
          <button id="login">login</button>
          <p class="message">Not registered? <a href="#">Create an account</a></p>
        </form>
        <?php echo getError(); ?><br />
      </div>
    </div>
	</body>
</html>
