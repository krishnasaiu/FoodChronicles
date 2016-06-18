<?php
  include('PHP/session.php');
?>
<html>
  <head>
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="css/welcome.css">
    <script src="JS/jquery-2.2.3.js"> </script>
    <script type="text/javascript">
      $(document).on('submit', '#search-form', function() {
        $(".result").html("<div><img src=images/loading.gif /></div>");
        $.post('PHP/searchResults.php', $(this).serialize(), function(data) {
          $(".result").html(data);
        });
        return false;
      });
    </script>
	</head>

  <body>
    <!-- <img src="images/food-chronicles.png" style="float: left;"/> -->
    <div class="content">
      <div class="username">
        <p><b>Welcome <?php echo $login_session; ?>!!&nbsp&nbsp|&nbsp&nbsp<a href="logout.php">SIGN OUT</a></b></p>
      </div>
		  <div class="div_center">
		    <form action="" method="post" id="search-form">
			    <input type="text" name="keywords" placeholder="Search for?" autofocus="autofocus"//>
          <select name="costForTwo" class="styled-select">
  				  <option value="500">₹500</option>
            <option value="1000">₹1000</option>
				    <option value="2000">₹2000</option>
				    <option value="-1">∞</option>
			    </select>
          <input type="text" name="location" placeholder="Location"/>
          <input type="text" name="radius" placeholder="Radius"/>
    	    <input type="submit" value="Search"/><br />
		    </form>
		  </div>
      <div class="result">

      </div>
    </div>
	</body>

</html>
