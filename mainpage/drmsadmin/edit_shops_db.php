
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

    $sql="UPDATE rationshops SET lname ='".$lname."' , address='".$address."' , taluk='".$taluk."' , password='".$pass."' WHERE shopno=$shopno";
    $result=mysqli_query($dbC,$sql);
    if(!$result) {
       echo "Error In DataBase row addiction...<br> Please Fill Valid Informations...<br> Try Again By Going Back... :/ <br><a href=\"edit_shop_home.php\"><input action=\"action\" type=\"button\" value=\"Back\"/></a>";
    }
    else {
      echo "RationShop With Shopno : ".$shopno." Has Been Modified..<br><a href=\"edit_shop_home.php\"><input action=\"action\" type=\"button\" value=\"Back\"/></a>";

    }
}
    ob_get_contents();
    ob_end_flush();

?>
