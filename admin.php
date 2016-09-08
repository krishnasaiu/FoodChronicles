<?php
  include('php/session.php')
?>
<html>
  <head>
    <title>Admin</title>
    <script src="js/jquery-2.2.3.js"> </script>
    <link rel="stylesheet" type="text/css" href="css/welcome.css">
    <script type="text/javascript">
      function change( button_id )
      {
        if (document.getElementById(button_id).className === 'disabled_button')  {
          document.getElementById(button_id).className = 'enabled_button'
        } else {
          document.getElementById(button_id).className = 'disabled_button'
        }
      }
    </script>
  </head>

  <body>
    <!-- <img src="images/food-chronicles.png" style="float: left;"/> -->
    <div class="content">
      <div class="username">
        <p><b>Welcome <?php echo $login_session; ?>!!&nbsp&nbsp|&nbsp&nbsp<a href="logout.php">SIGN OUT</a></b></p>
      </div>
      <div  class="div_center">
      <?php
        $sql = "SELECT       `keywords`,
                COUNT(`keywords`) AS `value_occurrence`
                FROM     `queries`
                WHERE DATE(dateSearchedOn)=DATE(now())
                GROUP BY `keywords`
                ORDER BY `value_occurrence` DESC
                LIMIT    1;";
        $result = mysqli_query($db, $sql)->fetch_assoc();
        echo "<center><h2>Most searched word of the day</h2><h1>".strtoupper($result['keywords'])." [".$result['value_occurrence']." times]</h1></center>";
      ?>
     </div>
        <div  class="div_center_low">
          <h3>Disable Users</h3>
          <?php
          $sql = "SELECT * FROM users";

            $result = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              // printf ("%s (%s)\n", $row["id"], $row["username"]);
              $query = "SELECT isActive FROM userDetails WHERE id = \"".$row['id']."\"";
              $result2 = mysqli_query($db, $query);
              $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
              if ($row2['isActive'] !== "1") {
                echo "<button type=\"button\" id=".$row['id']." class=\"disabled_button\" onclick=\"return change(".$row['id'].");\">".$row["username"]."</button>";
              } else {
                echo "<button type=\"button\" id=".$row['id']." class=\"enabled_button\" onclick=\"return change(".$row['id'].");\">".$row["username"]."</button>";
              }
              echo "<br>";
            }
            $result->free();

          ?>
        </div>
    </div>
	</body>
</html>
