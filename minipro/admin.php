<?php
session_start(); //Start the session
if(!$_SESSION['name']){ //If session not registered
header("location:login.php"); // Redirect to login.php page
}
else //Continue to current page
header( 'Content-Type: text/html; charset=utf-8' );
require_once 'config.php';

?>

<!DOCTYPE html>
<htmls>
<head>
    <title>Welcome To Admin Page Demonstration</title>
</head>
<body>
    <h1>Welcome To Admin Page <?php echo $_SESSION['name']; ?></h1>
    <p><a href="adminlogout.php">Logout</a></p> <!-- A link for the logout page -->
    <p>Put Admin Contents</p>
</body>
</html>
