<?php
require_once('config.php');
ob_start();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  $uname=test_input($_POST["adminusername"]);
  $pass=test_input($_POST["password"]);
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
 if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["password"]) === 0)
    throw new Exception("Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit");
  $add="INSERT INTO admindetails VALUES('".$uname."' , '".$pass."', '".$name."', '".$taluk."','0')";
  $result=mysqli_query($dbC,$add);
  if(!$result)
    throw new Exception("Error In DataBase....");
  echo "New Admin Has Been Added....<a href=\"admin.php\">Go Back</a>";
} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n  ";
  echo "<input action=\"action\" type=\"button\" value=\"Back\" onclick=\"history.go(-1);\"/>";

}
}
ob_get_contents();
ob_end_flush();
?>
