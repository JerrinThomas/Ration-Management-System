<?php
if(isset($_POST['Submit'])) {
  $username = $_POST['username']; //Set UserName
  $password = $_POST['password']; //Set Password
  if(isset($username, $password)) {
      ob_start();
      require_once('config.php'); /****Initiate the MySQL connection
          To protect MySQL injection (more detail about MySQL injection) *****/
      $myusername = stripslashes($username);
      $mypassword = stripslashes($password);
      $myusername = mysqli_real_escape_string($dbC, $myusername);
      $mypassword = mysqli_real_escape_string($dbC, $mypassword);
      $sql="SELECT role FROM admindetails WHERE username= '$myusername' and password= '$mypassword'";
      $result=mysqli_query($dbC,$sql);
      $count=mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count==1){
          // Admin Found ! Find who is he superadimin or miniadmin and then redirect accordingly.
        $ob=mysqli_fetch_array($result);
        if($ob[role]==0){
         session_start();
          $_SESSION['name']=$myusername;
          header("location:admin.php");

         }
       }
      else {
          $error = "Username or Password is invalid";
        }

      ob_end_flush();
  }
  else {
      $error="Please enter some username and password";
  }


}
else {
  $error="";
}

?>
