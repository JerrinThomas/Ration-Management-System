<?php
require_once('config.php');
if(isset($_POST["Submit"])) {
  $cardno = $_POST["cardno"];
}
else {
  $cardno="";
}
$sql="SELECT ration_card_no,taluk from rationcard_holder where ration_card_no='$cardno'";
$re=mysqli_query($dbC,$sql);
$count=mysqli_num_rows($re);
$tuple=mysqli_fetch_row($re);
if($count==0)
header("location:rm_user_home.php?msg=Invalid RationCard Number");
elseif ($tuple[1]!=$_SESSION['taluk']) {
header("location:rm_user_home.php?msg=RationCard is Not Under Your Taluk");
}
else {
  $sql1="DELETE FROM cardholder_and_mem WHERE ration_card_no='$cardno'";
  $res=mysqli_query($dbC,$sql1);
  $sql2="DELETE FROM rationcard_holder WHERE ration_card_no='$cardno'";
  $result=mysqli_query($dbC,$sql2);
  if($res==true && $result==true)
   header("location:rm_user_home.php?msg1=RationCard Removed.");
  else {
  header("location:rm_user_home.php?msg1=Unsuccessfull.");
  }
}
