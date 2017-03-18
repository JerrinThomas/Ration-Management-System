
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
  $lname=test_input($_POST["lname"]);
  $address=test_input($_POST["address"]);
  $taluk=test_input($_POST["taluk"]);

    $sql="INSERT INTO rationshops(`lname`,`address`,`taluk`) VALUES('".$lname."' , '".$address."' , '".$taluk."')";
    $result=mysqli_query($dbC,$sql);
    if(!$result) {
       echo "Error In DataBase row addiction...<br> Please Fill Valid Informations...<br> Try Again By Going Back... :/ <br><a href=\"addshopshome.php\"><input action=\"action\" type=\"button\" value=\"Back\"/></a>";
    }
    else {
      $sq="SELECT shopno FROM rationshops WHERE lname='$lname' AND address='$address' AND taluk='$taluk'";
      $res=mysqli_query($dbC,$sq);
      $r=mysqli_fetch_row($res);
      echo "RationShop Has Been Added With Shopno : ".$r[0]."<br><a href=\"addshopshome.php\"><input action=\"action\" type=\"button\" value=\"Back\"/></a>";

    }
}
    ob_get_contents();
    ob_end_flush();

?>
