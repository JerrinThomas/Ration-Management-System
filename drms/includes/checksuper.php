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
