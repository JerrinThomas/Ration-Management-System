<?php
require_once('config.php');
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");
ob_start();
if(isset($_GET["field"]) && isset($_GET["query"]))
{
  $f=$_GET["field"];
  $val=$_GET["query"];
  if($f=="erlname"){  
      if($val=="")
          echo "License Name (Fill A Valid Data)";
      elseif(ctype_digit($val))
          echo "Licesee Name Is InValid ";
      else
          echo "Licesee Name Is Valid ";
  }
  elseif($f=="eraddress"){ 
      if($val=="")
          echo "Address (Fill A Valid Data)";
      elseif(ctype_digit($val))
          echo "Address Is InValid ";
      else
          echo "Address Is Valid ";
  }
   elseif($f=="erpass"){
      if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $val) === 0)
          echo "Password ( Invalid )";
      else
          echo "Password (Strong)";
  }
    

}
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
  $pass=test_input($_POST["pass"]);

    $sql="INSERT INTO rationshops(`lname`,`address`,`taluk`,`password`) VALUES('".$lname."' , '".$address."' , '".$taluk."', '".$pass."')";
    $result=mysqli_query($dbC,$sql);
    if(!$result) {
       echo "Error In DataBase row addiction...<br> Please Fill Valid Informations...<br> Try Again By Going Back... :/ <br><a href=\"addshopshome.php\"><input action=\"action\" type=\"button\" value=\"Back\"/></a>";
    }
    else {
      $sq="SELECT shopno FROM rationshops WHERE lname='$lname' AND address='$address' AND taluk='$taluk'";
      $res=mysqli_query($dbC,$sq);
      $r=mysqli_fetch_row($res);
      echo "RationShop Has Been Added With Shopno : ".$r[0]."<br><a href=\"admin.php\"><input action=\"action\" type=\"button\" value=\"Back\"/></a>";

    }
}
    ob_get_contents();
    ob_end_flush();

?>
