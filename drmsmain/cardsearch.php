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
            @import url('https://fonts.googleapis.com/css?family=Asap|Questrial');
          body{
               background: #181D27;
               color: #F0EDEE;
               font-family: 'Questrial', sans-serif;
          }
          table{
           color: #181d27;
           background-color: white;
           width: 100%;
           height: 80px;
           font-size: 20px;
          }
          tbody {
              color:#F44336;
              overflow:scroll;
              height:100px;
          }
          #srchb2 {
            width: 25%; height: 40px; background-color: #15a66e; border: none; margin: 10px; color: white; letter-spacing: 3px; font-size: 25px;
          }
          #srchb2:hover {
          background-color:#DA344D;
          }
          </style><body>
          
          <center style=\" color: #181d27; background-color: white; height: 60px; margin-top: 2%; \"><h1 style=\" font-size: 50px; font-weight: 400; letter-spacing: 2px; \">Search Result</h1></center>
          <div class=\"wht\" style=\" width: 50%; margin: 0 auto; margin-top: 5%; background-color: #FEFFFE; color: #181d27; height: 91%;\"><center>
          <img src=\"drmsadmin/$row[12]\" style=\" margin: 25px; \"/></center>
          <div class=\"inner\" style=\" background-color: #181d27; letter-spacing: 2px; width: 98%; margin: 0 auto; \">
            <center style=\" color: white; \"><h3>Head Of Family : $row[2] </h3></center>
            <div>
                     <center style=\" color: white; \"><h3>Monthly Balance</h3></center><center><table>
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
            <center style=\" color: white; \"><h3>Your Ration Shop No is  $row[17] Under the Licensee $row1[1]</h3></center>
                     <center style=\" color: white; \"><h3> Stock In Your Ration Shop ( $row[17] )</h3></center><center><table>
                                        <thead>
                                            <tr>
                                                <th>&nbsp&nbsp  Balance Rice  &nbsp&nbsp</th>
                                                <th>&nbsp&nbsp  Balance Wheat  &nbsp&nbsp</th>
                                                <th>&nbsp&nbsp  Balance Kerosene  &nbsp&nbsp</th>
                                            </tr><tbody>
                                            <tr>
                                                <td><center>$row1[7]</center></td>
                                                <td><center>$row1[8]</center></td>
                                                <td><center>$row1[9]</center></td>
                                            </tr>
                                            </tbody>
                                            </table>
            </div>
            <center><a href=\"index.php\"><input type=\"submit\" name=\"srchb2\" id=\"srchb2\" value=\"Back\"></center>
          </div>
          </div>
    
    ";   
    echo $out;
}
?>