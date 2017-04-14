<?php
require_once('config.php');

$shopno=$_GET["shno"];
$cardno=$_GET["crdno"];
$qr=$_GET["qr"];
$qw=$_GET["qw"];
$qk=$_GET["qk"];

if($qr == "" )
    $qr=0;
if($qw == "" )
    $qw=0;
if($qk == "" )
    $qk=0;

$test=false; $out=" ";
  $t="select bal_rice-$qr,bal_wheat-$qw,bal_ker-$qk from rationshops where shopno=$shopno"; 
  $q1=mysqli_query($dbC,$t);
  $trw=mysqli_fetch_row($q1);

  if( $trw[0] < 0 ){
    $out=" Maximum Rice Available Is ".($trw[0]+$qr)." kg ";
    $test=true;
  }
  if( $trw[1] < 0 ){
    $out.=" Maximum Wheat Available Is ".($trw[1]+$qw)." kg ";
    $test=true;
  }
  if( $trw[2] < 0 ){
    $out.=" Maximum Kerosene Available Is ".($trw[2]+$qk)." L ";
    $test=true;
  }
  if($test)
     echo $out; 
  else
     echo "0";
?>