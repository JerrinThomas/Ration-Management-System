<?php
require_once('config.php');
if(isset($_GET["stockr"]) || isset($_GET["stockw"]) || isset($_GET["stockk"]))
{
    
   $stockr=$_GET["stockr"];
   $stockk=$_GET["stockk"];
   $stockw=$_GET["stockw"];

       $spno="select count(shopno) from rationshops";
       $spnores=mysqli_query($dbC,$spno);
       $spnorow=mysqli_fetch_row($spnores);
       $no_of_shops=$spnorow[0];
   //select shopno,sum(max_rice)-bal_rice,sum(max_wheat)-bal_wheat,sum(max_ker)-bal_ker from rationshops GROUP by shopno;
   $sql="create or replace view `shop_wise_sum` as select shopno,max_rice-bal_rice reqrice,max_wheat-bal_wheat reqwheat,max_ker-bal_ker reqker from rationshops GROUP by shopno";
   $sqlr=mysqli_query($dbC,$sql);
   $sql1="select sum(reqrice),sum(reqwheat),sum(reqker) from shop_wise_sum";
   $sqlr1=mysqli_query($dbC,$sql1);
   $srows=mysqli_fetch_row($sqlr1);    
          
          $maxr=$srows[0];
          $maxw=$srows[1];
          $maxk=$srows[2];
    
   if($stockr != 0 || $stockr != "" ) { 
        if( $stockr == $maxr ){
             $s1="update rationshops,shop_wise_sum set bal_rice=bal_rice+reqrice where rationshops.shopno=shop_wise_sum.shopno";
             $sr1=mysqli_query($dbC,$s1);
        }
       elseif( $stockr > $maxr ){
             $s2="update rationshops,shop_wise_sum set bal_rice=bal_rice+reqrice where rationshops.shopno=shop_wise_sum.shopno";
             $sr2=mysqli_query($dbC,$s2);
             $stockr=$stockr-$maxr;
             $stockr=$stockr/$no_of_shops;
             $s3="update rationshops set bal_rice=bal_rice+".$stockr."";
             $sr3=mysqli_query($dbC,$s3); 
       }
       else{
             $stockr=$stockr/$no_of_shops;
             $s4="update rationshops set bal_rice=bal_rice+".$stockr."";
             $sr4=mysqli_query($dbC,$s4);
       }
       
   }
   if($stockw != 0 || $stockw != "" ) { 
        if( $stockw == $maxw ){
             $s5="update rationshops,shop_wise_sum set bal_wheat=bal_wheat+reqwheat where rationshops.shopno=shop_wise_sum.shopno";
             $sr5=mysqli_query($dbC,$s5);
        }
       elseif( $stockw > $maxw ){
             $s6="update rationshops,shop_wise_sum set bal_wheat=bal_wheat+reqwheat where rationshops.shopno=shop_wise_sum.shopno";
             $sr6=mysqli_query($dbC,$s6);
             $stockw=$stockw-$maxw;
             $stockw=$stockw/$no_of_shops;
             $s7="update rationshops set bal_wheat=bal_wheat+".$stockw."";
             $sr7=mysqli_query($dbC,$s7);
       }
       else{
             $stockw=$stockw/$no_of_shops;
             $s8="update rationshops set bal_wheat=bal_wheat+".$stockw."";
             $sr8=mysqli_query($dbC,$s8);
       }
   }
   if($stockk != 0 || $stockk != "" ) { 
        if( $stockk == $maxk ){
             $s9="update rationshops,shop_wise_sum set bal_ker=bal_ker+reqker where rationshops.shopno=shop_wise_sum.shopno";
             $sr9=mysqli_query($dbC,$s9);
        }
       elseif( $stockk > $maxk ){
             $s10="update rationshops,shop_wise_sum set bal_ker=bal_ker+reqker where rationshops.shopno=shop_wise_sum.shopno";
             $sr10=mysqli_query($dbC,$s10);
             $stockk=$stockk-$maxk;
             $stockk=$stockk/$no_of_shops;
             $s11="update rationshops set bal_ker=bal_ker+".$stockk."";
             $sr11=mysqli_query($dbC,$s11);
       }
       else{
             $stockk=$stockk/$no_of_shops;
             $s12="update rationshops set bal_ker=bal_ker+".$stockk."";
             $sr12=mysqli_query($dbC,$s12);
       }
       
   }
$tq="select shopno,bal_rice,bal_wheat,bal_ker from rationshops";
$restq=mysqli_query($dbC,$tq);
$output=" 
<style>
table{
 color:red;
}
tbody {
    color:blue;
    overflow:scroll;
    height:100px;
    }
</style>
    <center><h3>Stock Allocation</h3></center><center><table>
                                        <thead>
                                            <tr>
                                                <th>&nbsp&nbsp  RationShop Number  &nbsp&nbsp</th>
                                                <th>&nbsp&nbsp  Supplied Rice  &nbsp&nbsp</th>
                                                <th>&nbsp&nbsp  Supplied Wheat  &nbsp&nbsp</th>
                                                <th>&nbsp&nbsp  Supplied Kerosene  &nbsp&nbsp</th>
                                            </tr><tbody>";
     while ($tabrows=mysqli_fetch_row($restq))
     {
         $output.="                   <tr>
                                                <td><center>$tabrows[0]</center></td>
                                                <td><center>$tabrows[1]</center></td>
                                                <td><center>$tabrows[2]</center></td>
                                                <td><center>$tabrows[3]</center></td>
                                            </tr>";
     } 
    $output.="</tbody></table></center>";
    echo $output;
    
}
