<?php
require_once('config.php');
if(isset($_POST["Submit"])) {
  $cardno = $_POST["cardno"];
}
else {
  $cardno="";
}
session_start();
$sql="SELECT ration_card_no,taluk from rationcard_holder where ration_card_no='$cardno'";
$re=mysqli_query($dbC,$sql);
$count=mysqli_num_rows($re);
$tuple=mysqli_fetch_row($re);
if($count==0)
header("location:rm_user_home.php?msg=Invalid RationCard Number");
elseif (strcasecmp($_SESSION['taluk'],$tuple[1]) != 0) {
 header("location:rm_user_home.php?msg=Ration Card ".$cardno." Is Not Under Your Taluk");
}
else {
    $qq="select category,elect,no_of_mem,shopno from rationcard_holder where ration_card_no=$cardno";
    $qqres=mysqli_query($dbC,$qq);
    $q=mysqli_fetch_row($qqres);
            if($q[1]==1)
                 $query="select riceq,wheatq,ekerq,permember from category where cat_no='$q[0]'";
            else
                 $query="select riceq,wheatq,nekerq,permember from category where cat_no='$q[0]'";
            $qdbc=mysqli_query($dbC,$query);
            $t=mysqli_fetch_row($qdbc);
            $riceq=$t[0]; $wheatq=$t[1]; $kerq=$t[2]; $p=$t[3];
            if($q[0] == 1 || $q[0] == 4)
                   $upshp1="update rationshops set max_rice=max_rice-".$riceq.", max_wheat=max_wheat-".$wheatq.", max_ker=max_ker-".$kerq." where shopno=".$q[3]."";
            else if($q[0] == 2 || $q[0] == 3)
                   $upshp1="update rationshops set max_rice=max_rice-".$riceq*($q[2]+1).", max_wheat=max_wheat-".$wheatq*($q[2]+1).", max_ker=max_ker-".$kerq." where shopno=".$q[3]."";
            $updates1=mysqli_query($dbC,$upshp1); 
 if(!$updates1)
    die($upshp1." for debugg purposess check the code... ");
  $sql1="DELETE FROM cardholder_and_mem WHERE ration_card_no='$cardno'";
  $res=mysqli_query($dbC,$sql1);
  $sql2="DELETE FROM rationcard_holder WHERE ration_card_no='$cardno'";
  $result=mysqli_query($dbC,$sql2);
  if($res==true && $result==true)
   header("location:rm_user_home.php?msg1=RationCard ".$cardno." Removed.");
  else {
  header("location:rm_user_home.php?msg1=Unsuccessfull.");
  }
}
    
