<?php
require_once('config.php');
if(isset($_GET["stock"]))
{
    $stock=$_GET["stock"];
    $sel="select cat,elect from rationcard_holder";
    $selres=mysqli_query($dbC,$sel);
    if($selres)
    while($srow=mysqli_fetch_row($selres))
    {
     if($srow[1]==1)
              $query="select riceq,wheatq,ekerq,permember from category where cat_no='$srow[0]'";
      else
              $query="select riceq,wheatq,nekerq,permember from category where cat_no='$srow[0]'";
      $q=mysqli_query($dbC,$query);
      $t=mysqli_fetch_row($q);
      $riceq=$t[0]; $wheatq=$t[1]; $kerq=$t[2]; $p=$t[3];
    
      if($cat == 1 || $cat == 4){
           $up="update rationcard_holder set remrice='".$riceq."',remwheat='".$wheatq."',remker='".$kerq."' where ration_card_no = '".$cardno."'";
           
      }  
      else if($cat == 2 || $cat == 3)
          $up="update rationcard_holder set remrice='".$riceq*($no_of_mem+1)."',remwheat='".$wheatq*($no_of_mem+1)."',remker='".$kerq."' where ration_card_no = '".$cardno."'";
      $update=mysqli_query($dbC,$up);
    }
}
