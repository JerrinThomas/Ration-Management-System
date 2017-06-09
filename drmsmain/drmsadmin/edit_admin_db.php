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
    echo "<style>.rmb{background-color:white; color:#2980b9; text-decoration:none; padding:10px; font-size:23px; border-radius:25px; letter-spacing:2px; border:2px solid;} .rmb:hover{background-color:#2980b9; color:white;}</style><center><h3  style=\" color:#2980b9; margin-top:300px; font-size:40px; \"> Admin $uname Has Been Modified....<center></h3><a href=\"admin.php\" class=\"rmb\">Go Back</a></center>";
          session_start();
          $logname=$_SESSION['name'];
          $log="insert into adminlog values('$logname','Modified Admin : $uname ',curdate(),curtime())";
          $logres=mysqli_query($dbC,$log);
   } catch (Exception $e) {
    echo '<center style=" color:white; margin-top:300px; font-size:30px;">Caught exception: ',  $e->getMessage(), "\n  ";
    echo " <style>
      body{
        background : red;
        }
      .rd {
        width:100px;
        height:30px;
        margin-top:20px;
        background-color:red;
        color:white;
        border: 2px solid white;
        font-size:20px;
        border-radius:20px;
      }
      .rd:hover {
        background-color:white;
        color:red;
        font-size:23px;
      }
 </style>
 <center><input class=\"rd\" action=\"action\" type=\"button\" value=\"Back\" onclick=\"history.go(-1);\"/>";

   }
   }
   ob_get_contents();
   ob_end_flush();
   ?>
