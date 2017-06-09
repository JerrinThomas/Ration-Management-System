<?php
require_once('config.php');
if(isset($_POST["sno"]))
{
    $sno=$_POST["sno"];
      $sql="SELECT lname FROM rationshops WHERE shopno= '$sno'";
      $result=mysqli_query($dbC,$sql);
      $count=mysqli_num_rows($result);
      $tal=mysqli_fetch_row($result);
      if($count != 0)
          echo "...Welcome ".$tal[0]."...";
      else
          echo "...Sorry We Can't Find You...";
    
}
elseif(isset($_POST["shopno"]) && isset($_POST["pword"]))
{
  $shopno = $_POST['shopno']; //Set shopno
  $pword = $_POST['pword']; //Set pword

      ob_start();
     /****Initiate the SQL connection
          To protect SQL injection (more detail about SQL injection) ****/
      $shopno = stripslashes($shopno);
      $pword = stripslashes($pword);
      $shopno = mysqli_real_escape_string($dbC, $shopno);
      $pword = mysqli_real_escape_string($dbC, $pword);
      $sql="SELECT lname FROM rationshops WHERE shopno= '$shopno' and password= '$pword'";
      $result=mysqli_query($dbC,$sql);
      $count=mysqli_num_rows($result);
      $tal=mysqli_fetch_row($result);
      // If result matched $shopno and $pword, table row must be 1 row
      if($count==1){
          // shop Found ! and redirect to maintab page...
         session_start();
          $_SESSION['shopno']=$shopno;
          $_SESSION['lname']=$tal[0];
          header("location:maintab.php");
       }
      else {
          header("location:../index.php?msg=Incorrect Password");
        }

      ob_end_flush();  
  }
  else {
      header("location:../index.php?msg=Error Encountered");
  }

?>