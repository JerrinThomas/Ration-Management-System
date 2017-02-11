<?php
session_start(); //Start the session
if(!$_SESSION['name']){ //If session not registered
header("location:login.php"); // Redirect to login.php page
}
else //Continue to current page
header( 'Content-Type: text/html; charset=utf-8' );
require_once 'config.php';
$username=$_SESSION['name'];
$sql="SELECT role FROM admindetails WHERE username= '$username'";
$result=mysqli_query($dbC,$sql);
$ro=mysqli_fetch_row($result);
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>ADMIN</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="waves.css">
</head>
  <body>
    <p>logged In As : <span style="color:#FF0000;"><?php echo $_SESSION['name'] ?></span></p>
    <ul>
      <li><a href="#">Home</a></li>
      <li class="dropdown"><a href="#" class="dropdown-btn">Ration Shops</a>
          <div class="dropdown-menu">
              <a href="#">Add</a>
              <a href="#">Remove</a>
              <a href="#">Modify</a>
          </div>
      </li>
      <li class="dropdown"><a href="#" class="dropdown-btn">Users</a>
          <div class="dropdown-menu">
              <a href="#">Add</a>
              <a href="#">Remove</a>
              <a href="#">Modify</a>
          </div>
      </li>
      <li><a href="#">Stock</a></li>
      <?php
      // displays only if the admin is Super ! ..
      if($ro[0]==1)
            echo "<li class=\"dropdown\"><a href=\"^\" class=\"dropdown-btn\">Modify Admins</a><div class=\"dropdown-menu\"><a href=\"%\">Add</a><a href=\"%\">Remove</a><a href=\"%\">Modify</a></div></li>";
      ?>
      <a class="anbutton" href="adminlogout.php">Logout</a>
      <script src="waves.js"></script>
      <script type="text/javascript">
          Waves.attach('.anbutton');
          Waves.init();
      </script>
    </ul>
  </body></html>
