
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
  $lname=test_input($_POST["lname"]);
  $address=test_input($_POST["address"]);
  $taluk=test_input($_POST["taluk"]);
  $shopno=test_input($_POST["shopno"]);
  $pass=test_input($_POST["pass"]);
    
if($lname == "" || $address == "" || $taluk == "" || $pass == "" || ($pass != "" && preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $pass) === 0))
{
    if($pass != "" && preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $pass) === 0)
        $message ="ERROR IN PASSWORD...";
    else
        $message = "Missing Input Exception....";
    die (" <style>
      body{
        background : red;
      }
 </style>
 <center> $message <br><a href=\"addshopshome.php\"><input action=\"action\" type=\"button\" value=\"Back\"/></a>");
}

    $sql="UPDATE rationshops SET lname ='".$lname."' , address='".$address."' , taluk='".$taluk."' , password='".$pass."' WHERE shopno=$shopno";
    $result=mysqli_query($dbC,$sql);
    if(!$result) {
       echo " <style>
        body{
          background : red;
         }
        </style>
        <center>Error In DataBase row addiction...<br> Please Fill Valid Informations...<br> Try Again By Going Back... :/ <br><a href=\"addshopshome.php\"><input action=\"action\" type=\"button\" value=\"Back\"/></a>";
    }
    else {
      echo "
       <style>
         body{
            background : #2980b9;
         }
       </style>
      <center>
           RationShop With Shopno : ".$shopno." Has Been Modified..<br><a href=\"edit_shop_home.php\"><input action=\"action\" type=\"button\" value=\"Back\"/></a>";
          session_start();
          $logname=$_SESSION['name'];
          $log="insert into adminlog values('$logname','Modified Shop : $shopno ',curdate(),curtime())";
          $logres=mysqli_query($dbC,$log);

    }
}
    ob_get_contents();
    ob_end_flush();

?>
