<?php
require_once('config.php');
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");
ob_start();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  $uname=test_input($_POST["uname"]);
  $pass=test_input($_POST["pass"]);
  $taluk=test_input($_POST["taluk"]);
  $name=test_input($_POST["name"]);

try {
  if($uname==""||$name==""||$pass==""||$taluk==""){
     throw new Exception("Missing Input ");
  }
  if($uname=="")
     throw new Exception("Missing Input : Username");
  if($name=="")
     throw new Exception("Missing Input : Name");
 if($pass=="")
    throw new Exception("Missing Input : Password");
 if($taluk=="")
    throw new Exception("Missing Input : Taluk");
    if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["pass"]) === 0)
       throw new Exception("Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit");
     $add="UPDATE admindetails SET name='".$name."', password='".$pass."' ,taluk='".$taluk."' WHERE username='".$uname."'";

     $result=mysqli_query($dbC,$add);
     if(!$result)
       throw new Exception("Error In DataBase....");
     echo " Admin Has Been Modified....<a href=\"admin.php\">Go Back</a>";
   } catch (Exception $e) {
     echo 'Caught exception: ',  $e->getMessage(), "\n  ";
     echo "<input action=\"action\" type=\"button\" value=\"Back\" onclick=\"history.go(-1);\"/>";

   }
   }
   ob_get_contents();
   ob_end_flush();
   ?>
