<?php
include 'config.php';
session_start();
 //Start the current session
          $logname=$_SESSION['name'];
          $log="insert into adminlog values('$logname','Logout',curdate(),curtime())";
          $logres=mysqli_query($dbC,$log);
session_destroy(); //Destroy it! So we are logged out now
header("location: ../index.php");

?>
