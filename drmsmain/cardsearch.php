<?php
require_once('drmsadmin\config.php');
 
if(isset($_GET["cno"]) ){
    $cno=$_GET["cno"];
    if(!(ctype_digit($cno)))
        die(" InValid Entry (Search Again ( Hint : Ration Card Number is a 10 Digit Number ))");
    $chk="select * from rationcard_holder where ration_card_no=$cno";
    $chkres=mysqli_query($dbC,$chk);
    if(mysqli_num_rows($chkres) == 1)
        die("0");
    else
        die(" $cno is not a valid card number. Search Again ( Hint : Ration Card Number is a 10 Digit Number ) ");
    
}

if(isset($_GET["value"])){
    $cardno=$_GET["value"];
    $chk="select * from rationcard_holder where ration_card_no=$cardno";
    $chkres=mysqli_query($dbC,$chk);
    $row=mysqli_fetch_row($chkres);
    $chk1="select * from rationshops where shopno = $row[17]";
    $chkres1=mysqli_query($dbC,$chk1);
    $row1=mysqli_fetch_row($chkres1);
    $out="<style>
          body{
               background: #3d4444;
               color: #00ad15;
          }
          table{
           color:red;
          }
          tbody {
              color:blue;
              overflow:scroll;
              height:100px;
          }
          </style><body><center><h1>Search Result</h1></center><center><img src=\"drmsadmin/$row[12]\" /></center>
          <div>
            <center><h3>Head Of Family : $row[2] </h3></center>
            <div>
                     <center><h3>Monthly Balance</h3></center><center><table>
                                        <thead>
                                            <tr>
                                                <th>&nbsp&nbsp  Balance Rice  &nbsp&nbsp</th>
                                                <th>&nbsp&nbsp  Balance Wheat  &nbsp&nbsp</th>
                                                <th>&nbsp&nbsp  Balance Kerosene  &nbsp&nbsp</th>
                                            </tr><tbody>
                                            <tr>
                                                <td><center>$row[18]</center></td>
                                                <td><center>$row[19]</center></td>
                                                <td><center>$row[20]</center></td>
                                            </tr>
                                            </tbody>
                                            </table>
            </div>
            <div> 
            <center><h3>Your Ration Shop No is  $row[17] Under the Licensee $row1[1]</h3></center>
                     <center><h3> Stock In Your Ration Shop ( $row[17] )</h3></center><center><table>
                                        <thead>
                                            <tr>
                                                <th>&nbsp&nbsp  Balance Rice  &nbsp&nbsp</th>
                                                <th>&nbsp&nbsp  Balance Wheat  &nbsp&nbsp</th>
                                                <th>&nbsp&nbsp  Balance Kerosene  &nbsp&nbsp</th>
                                            </tr><tbody>
                                            <tr>
                                                <td><center>$row[18]</center></td>
                                                <td><center>$row[19]</center></td>
                                                <td><center>$row[20]</center></td>
                                            </tr>
                                            </tbody>
                                            </table>
            </div>
            <center><a href=\"index.php\"><input type=\"submit\" name=\"srchb2\" id=\"srchb2\" value=\"Back\"></center>
          </div>
    
    ";   
    echo $out;
}
?>