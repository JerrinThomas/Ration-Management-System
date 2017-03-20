<?php
require_once('config.php');
if(isset($_GET["field"]) && isset($_GET["query"]))
{
  $f=$_GET["field"];
  $val=$_GET["query"];
  if($f=="aduname"){  
      if($val=="")
          echo "Username (Fill A Valid Data)";
      else {
            $chk="SELECT role FROM admindetails WHERE username='$val'";
            $checkmem=mysqli_query($dbC,$chk);
            if(mysqli_num_rows($checkmem) != 0)
                echo "Username ( Already Exist. )";
            else
                echo "Username ( Is Valid )";
        }
      }
  elseif($f=="adname"){ 
      if($val=="")
          echo "Name (Fill A Valid Data)";
      elseif(ctype_digit($val))
          echo "Name Is InValid ";
      else
          echo "Name Is Valid "; 
  }
  elseif($f=="adpass"){
      if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $val) === 0)
          echo "Password ( Invalid )";
      else
          echo "Password (Strong)";
  }
  else{  
      if($val=="")
          echo "Taluk (Fill A Valid Data)";
      else{
        if(ctype_digit($val))
           echo "Taluk Is InValid ";
        else{
# also include code to check where the taluk exist in Taluk Table which is not implemnted yet......
          $VAL=strtolower($val);
          $chk="SELECT role FROM admindetails WHERE taluk='$VAL'";
          $checkmem=mysqli_query($dbC,$chk);
         if(mysqli_num_rows($checkmem) != 0)
                echo "Taluk ( Already An Admin Exists In This Taluk. )";
            else
                echo "Taluk ( Is Valid )";   
        } 
      }
}
}

else {
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
  $taluk=(strtolower($taluk));   

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
}
?>
