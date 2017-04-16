<?php
include('drmsadmin/config.php');
$s="select ration_card_no,category,elect,no_of_mem from rationcard_holder";
$u=mysqli_query($dbC,$s);
while($r=mysqli_fetch_row($u)){
    $elect=$r[2];
    $cat=$r[1];
    $cno=$r[0];
    $no_of_mem=$r[3];
    if($elect == 1)
        $query="select riceq,wheatq,ekerq,permember from category where cat_no='$cat'";
    else
        $query="select riceq,wheatq,nekerq,permember from category where cat_no='$cat'";
    $q=mysqli_query($dbC,$query);
    $t=mysqli_fetch_row($q);
    $riceq=$t[0]; $wheatq=$t[1]; $kerq=$t[2]; $p=$t[3];
    
    if($cat == 1 || $cat == 4){
        $up="update rationcard_holder set remrice='".$riceq."',remwheat='".$wheatq."',remker='".$kerq."' where ration_card_no = '".$cno."'";
    }
    else if($cat == 2 || $cat == 3){
        $up="update rationcard_holder set remrice='".$riceq*($no_of_mem+1)."',remwheat='".$wheatq*($no_of_mem+1)."',remker='".$kerq."' where ration_card_no = '".$cno."'";
    }
    $update=mysqli_query($dbC,$up);
    if(!$update)
        echo "<br>Bad";
}


?>