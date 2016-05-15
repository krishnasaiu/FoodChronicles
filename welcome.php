<?php
  include('session.php');
	include('search.php');

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $keywords = $_POST['keywords'];
    $costForTwo = (int) $_POST['costForTwo'];
		$location = $_POST['location'];
    $radius = ((int) $_POST['radius']) * 1000;

		$result = getRestaurantsList($keywords, $location, $radius);

		echo $keywords, $costForTwo, $location, $radius;
		echo $result[0]['restaurant']['name'];
	}
?>
<html>

  <head>
    <title>Welcome</title>
	</head>

  <body>
    <h1>Welcome <?php echo $login_session; ?>!!</h1>
    <h2><a href="logout.php">Sign Out</a></h2>

		<div>
		    <form action="" method="post">
          <label>Keywords:</label></br>
			    <input type="text" name="keywords" style="width: 50%"/> <br /> <br />
			    <label>Cost for two:</label>
          <select name="costForTwo">
            <option value="" disabled="disabled" selected="selected">-- select --</option>
  				  <option value="500">500</option>
            <option value="1000">1000</option>
				    <option value="2000">2000</option>
				    <option value="-1">∞</option>
			    </select><br /> <br />
			    <label>Location:</label> <br />
          <input type="text" name="location" style="width: 50%"/> <br /> <br />
          <label>How far are you willing to go?</label> <br />
          <input type="text" name="radius" placeholder="inKM"/> <br />
    	    <input type="submit" value="Submit "/><br />
		    </form>
		</div>
	</body>

</html>
