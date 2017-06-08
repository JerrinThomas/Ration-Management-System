<?php 
require_once('config.php');

if(isset($_GET["cardno"],$_GET["shopno"])){
    $cno=$_GET["cardno"];
    $sno=$_GET["shopno"];
    $sq="SELECT hofamily,mob_no,remrice,remwheat,remker FROM rationcard_holder WHERE shopno='$sno' AND ration_card_no='$cno'";
    $res=mysqli_query($dbC,$sq);

    if(mysqli_num_rows($res) == 0)
        die("0");
    else
    {    
        $tap=mysqli_fetch_row($res);
        // card found and belongs to this shop..
        // otp has to be generated and sms blaahh blaaahhh...

        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $otp = '';
        $maxc = 25;
        $maxn = 9;
        for ($i = 0; $i < 4; $i++) {   
            $sel = mt_rand(1,3);
            switch ($sel) 
            {
                case 1:
                    $otp .= $characters[mt_rand(0, $maxc)];
                    break;
                case 2:
                    $otp .= $numbers[mt_rand(0, $maxn)];
                    break;
                case 3:
                    $otp .= $numbers[mt_rand(0, $maxn)];
                    break;
            }
        }
        $starttime=time();
        //Integrate sms api here.....
        //save otp to temp table
        $sql="INSERT INTO tempotp VALUES('".$otp."','".$cno."','".$sno."','".$starttime."')";
        $res1=mysqli_query($dbC,$sql);


/*
        // Account details
        $username = 'rationsystem@gmail.com';
        $hash = '4ceb8e49a486459cacda9f637d4b61843a7e53cd1e9b726b760d5de7090b599b';

        // Message details
        $num=$tap[1];
        $num=910000000000+$num;
        $numbers = array($num);
        $sender = urlencode('TXTLCL');
        $message = rawurlencode('Dear '.$tap[0].' OTP for your transaction is '.$otp.' . Your Monthly Balance Rice : '.$tap[2].' Kg Wheat : '.$tap[3].' Kg Kerosene : '.$tap[4].' L Hurry Up! Get Your Cart Filled. From Team dRMS ');

        $numbers = implode(',', $numbers);

        // Prepare data for POST request
        $data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

        // Send the POST request with cURL
        $ch = curl_init('http://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        // Process your response here
        echo $response;

*/


        // return to called fuction with value 1 indicating otp validation..
        // for time being otp is */
        die("<style>
              .inp {

              color: white;
    border: 3px solid white;
    background-color: #47a3da;
    border-radius: 15px;
    box-sizing: border-box;
    padding: 5px 12px 5px 12px;
    margin-top: 1%;
    text-align: center;

              }

              .inp:focus {
                background-color: white;
                color: #47a3da;
              }


              .sub {
                    background-color: #fff;
    border: none;
    margin-left: 2%;
    padding: 8px 15px 8px 15px;
    letter-spacing: 3px;
    color: #47a3da;
              }

              .sub:hover{
                    background-color: #f33636;

    color: #fff;
              }

              .bk {

                    color: white;
    background-color: #47a3da;
    border: 2px solid white;
    padding: 5px 5px 5px 5px;
    font-size: 30px;
    letter-spacing: 3px;
    border-radius: 10px;
              }

              .bk:hover {
                    background-color: #fff;
                    color: #47a3da;
              }

        </style>
        <center><h3 style=\"font-size: 40px;letter-spacing: 4px; margin-top: 15%;\">Card Holder : $tap[0].</h3></center><div id=\"countdown\"></div><br><p style=\"font-size: 30px;
    letter-spacing: 5px;\">The OTP here :</p> <input class=\"inp\" type=\"text\" placeholder=\"$otp\" value=\"0\" id=\"votp\" onblur=\"otpcheck()\"><input class=\"sub\" type=\"submit\" value=\"Submit\"><br><div id=\"otpcheckresult\"><div><br><center><a href=\"maintab.php\"><input class=\"bk\" type=\"button\" value=\"Back\"></center>");

    }


}

//echo $otp;echo "<br>$starttime";
//time() returns current time in sec...can used to expire otp
elseif(isset($_GET["otp"],$_GET["spno"]))
{
    $cno=$_GET["cdno"];
    $sno=$_GET["spno"];
    $ootp=$_GET["otp"];

    $sql="SELECT starttime FROM tempotp WHERE shopno='$sno' AND ration_card_no='$cno' AND otp = '$ootp'";
    $res1=mysqli_query($dbC,$sql);
    if(mysqli_num_rows($res1) != 0)
    {
        $t=mysqli_fetch_row($res1);
        if( (time()-$t[0]) <= 180 )
        {
            $s="select no_of_mem,category,remrice,remwheat,remker,elect from rationcard_holder where ration_card_no='$cno'";
            $q=mysqli_query($dbC,$s);
            $t=mysqli_fetch_row($q);
            $no_of_mem=$t[0]; $cat=$t[1]; $remrice=$t[2]; $remwheat=$t[3]; $remker=$t[4]; $e=$t[5];

            $s1="select price,pwheat,pker from price where cat_no='$cat'";
            $q1=mysqli_query($dbC,$s1);
            $t1=mysqli_fetch_row($q1);
            $r=$t1[0]; $w=$t1[1]; $k=$t1[2];

            $qq="SELECT hofamily FROM rationcard_holder WHERE shopno='$sno' AND ration_card_no='$cno'";
            $qres=mysqli_query($dbC,$qq);
            $qr=mysqli_fetch_row($qres);
            echo "<style>
.card-container1.card1 {

    width: 1050px;
    height: 650px;
    margin-top: 8%;
}

th {
    text-align: center;
}

h2{

    font-size: 80px;
    letter-spacing: 8px;
}

tbody{
    background-color: white;
    color: #47a3da;
}

tr input {
    border: 2px solid #47a3da;
}

tr input:focus {
    background-color: #47a3da;
    color: white;
    border: 5px solid white;
}

#srchb1 {
    width: 40%;
    height: 100%;
    display: inline;
    position: relative;
    top: 12%;
    box-sizing: border-box;
    border: 2px solid white;
    border-radius: 10px;
    font-size: 20px;
    color: #ffffff;
    background-color: transparent;
    margin-left: 5%;
}
#srchb1:hover {
    background-color: #ffffff; /* white */
    color: #47a3da;
}

.lst td {
    background-color: #47a3da;
    height: 60px;
}

.ttl td {
    background-color: #47a3da;
    height: 60px;
    color: white;
    margin-top: 10px;
    border: 2px solid white;
}

#srchb2 {
    width: 100%;
    height: 100%;
    display: inline;
    position: relative;
    top: 12%;
    box-sizing: border-box;
    border: 2px solid white;
    border-radius: 10px;
    font-size: 20px;
    color: #ffffff;
    background-color: transparent;
    margin-left: 5%;
}
#srchb2:hover {
    background-color: #ffffff; /* white */
    color: #47a3da;
}
</style><h2>CART</h2>RationCard Holder : $qr[0]
                                    <table class=\"table \">
                                        <thead>
                                            <tr>
                                                <th>Items</th>
                                                <th>Price</th>
                                                <th>Remaining Quantity</th>
                                                <th>Quantity Purchased</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                            </tr>
                                            <tr>
                                                <td>Rice</td>
                                                <td id=\"price\">$r</td>
                                                <td id=\"qr\">$remrice Kg</td>
                                                <td>
                                                    <input type=\"text\" value=\"0\" id=\"valr\" onkeyup=\"total()\" max=\"$remrice\">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                            </tr>
                                            <tr>
                                                <td>wheat</td>
                                                <td id=\"pwheat\">$w</td>
                                                <td id=\"qw\">$remwheat Kg</td>
                                                <td>
                                                    <input type=\"text\" value=\"0\" id=\"valw\" onkeyup=\"total()\" max=\"$remwheat\">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                            </tr>
                                            <tr>
                                                <td>kerosene</td>
                                                <td id=\"pker\">$k</td>
                                                <td id=\"qk\">$remker L</td>
                                                <td>
                                                    <input type=\"text\" value=\"0\" id=\"valk\" onkeyup=\"total()\" max=\"$remker\">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                            </tr>
                                            <tr style=\"background-color: #47a3da;\">
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                            </tr>
                                            <tr class=\"ttl\">
                                                <td> </td>
                                                <td> </td>
                                                <td style=\"font-size: 40px;letter-spacing: 5px;\">Total Amount </td>
                                                <td>
                                                    <input type=\"text\" style=\"
                                                                              border: 2px solid white;
                                                                              background-color: #47a3da;
                                                                              height: 100%;
                                                                              width: 60%;
                                                                              border-radius: 25px;
                                                                              text-align: center;
                                                                              font-size: 35px;
                                                                              \" readonly=\"readonly\" id=\"totamt\">
                                                </td>
                                            </tr>
                                            <tr class=\"lst\">
                                                <td><a href=\"maintab.php\"><input type=\"submit\" name=\"srchb2\" id=\"srchb2\" value=\"Back\"> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td>
                                                    <input type=\"submit\" name=\"srchb1\" id=\"srchb1\" value=\"Submit\"        onclick=\"transaction()\">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>";
            $sql1="DELETE FROM tempotp where ration_card_no='$cno'";
            $res2=mysqli_query($dbC,$sql1);
        }
        else
        {
            $sql1="DELETE FROM tempotp where ration_card_no='$cno'";
            $res2=mysqli_query($dbC,$sql1);
            die("0");
        }
    }
    else
    {
        $sql1="DELETE FROM tempotp where ration_card_no='$cno'";
        $res2=mysqli_query($dbC,$sql1);
        die ("0");
    }   
}

elseif(isset($_GET["totamt"],$_GET["shno"])){
    $totamt=$_GET["totamt"];
    $shopno=$_GET["shno"];
    $cardno=$_GET["crdno"];
    $qk=$_GET["qk"];
    $qanr=$_GET["qr"]; 
    $qw=$_GET["qw"];
    $pk=$_GET["pk"];
    $pr=$_GET["pr"];
    $pw=$_GET["pw"];

    $qs="update rationshops set bal_rice=bal_rice-".$qanr.",bal_wheat=bal_wheat-".$qw.",bal_ker=bal_ker-".$qk.",amt=amt+".$totamt." where shopno= ".$shopno."";
    $qsr=mysqli_query($dbC,$qs);
    if(!$qsr)
        die("<br><br>ERROR<br><br><center><a href=\"maintab.php\"><input style=\" width:20%; \" id=\"srchb2\" type=\"button\" value=\"Back\"></center>");

    $qr="update rationcard_holder set remrice=remrice-$qanr,remwheat=remwheat-$qw,remker=remker-$qk where ration_card_no = $cardno";
    $qrr=mysqli_query($dbC,$qr);

    if(!$qrr){
        $err="update rationshops set bal_rice=bal_rice+".$qanr.",bal_wheat=bal_wheat+".$qw.",bal_ker=bal_ker+".$qk.",amt=amt-".$totamt." where shopno= ".$shopno."";
        $errres=mysqli_query($dbC,$err);
        die("<br><br>ERROR<br><br><center><a href=\"maintab.php\"><input style=\" width:20%; \" id=\"srchb2\" type=\"button\" value=\"Back\"></center>");
    }
    $ssr=$rrc=$ssrk=false;

    if($qw > 0){
        $ss="insert into transdetails (`shopno`,`cardno`,`quantity`,`item`,`dat`,`tim`,`amt`) values(".$shopno.",".$cardno.",".$qw.",'wheat',curdate(),curtime(),".$pw.")";
        $ssr=mysqli_query($dbC,$ss);
    }

    if($qanr > 0){ 
        $qrice="insert into transdetails (`shopno`,`cardno`,`quantity`,`item`,`dat`,`tim`,`amt`) values(".$shopno.",".$cardno.",".$qanr.",'rice',curdate(),curtime(),".$pr.")"; 
        $rrc=mysqli_query($dbC,$qrice);
    }

    if($qk > 0){
        $ssk="insert into transdetails (`shopno`,`cardno`,`quantity`,`item`,`dat`,`tim`,`amt`) values(".$shopno.",".$cardno.",".$qk.",'kerosene',curdate(),curtime(),".$pk.")";
        $ssrk=mysqli_query($dbC,$ssk);
    }
 /*   
    $reply="select hofamily,remrice,remwheat,remker,mob_no from rationcard_holder where ration_card_no=$cardno";
    $replyresult=mysqli_query($dbC,$reply);
    $rep=mysqli_fetch_row($replyresult);
            // Account details
        $username = 'rationsystem@gmail.com';
        $hash = '4ceb8e49a486459cacda9f637d4b61843a7e53cd1e9b726b760d5de7090b599b';

      // Message details
    
        $num=$rep[4];
        $num=910000000000+$num;
        $numbers = array($num);
        $sender = urlencode('TXTLCL');
        $message = rawurlencode('Dear '.$rep[0].' Your New Balance -> Rice : '.$rep[1].' Kg Wheat : '.$rep[2].' Kg Kerosene : '.$rep[3].' Have A Great Day. From Team dRMS ');

        $numbers = implode(',', $numbers);

        // Prepare data for POST request
        $data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

        // Send the POST request with cURL
        $ch = curl_init('http://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
*/
  
    if($ssr || $rrc || $ssrk)
        die("0");

}
elseif(isset($_GET["shno4stock"]))
{
    $sno=$_GET["shno4stock"];
    $sq="select bal_rice,bal_wheat,bal_ker,amt from rationshops where shopno=$sno";
    $sus=mysqli_query($dbC,$sq);
    $sr=mysqli_fetch_row($sus);
    echo "<br><br><br><br><br><br><br><br><br><br><br><center><div style=\" background-color: #47a3da; width: 50%;\"><center><br><br><h3 style=\" font-size:40px; color:white; letter-spacing:2px;\">Remaining Balance</h3></center><br><br><center style=\" background-color:white; width:80%; font-size:20px;\"><br>Rice : $sr[0] Kg<br>Wheat : $sr[1] Kg<br>Kerosene : $sr[2] L<br>Total Sales  : Rs .$sr[3] /-<br><br></center><br><br></div></center>";

}
elseif(isset($_GET["shno4sales"]))
{
    $shopno=$_GET["shno4sales"];
    $tdate=$_GET["tdate"];
    $fdate=$_GET["fdate"];
    $cat=$_GET["cat"];
    $o=$_GET["optns"];
    if($o=="k"){
        $extra=" and item='kerosene' ";
    }
    elseif($o=="w"){
        $extra=" and item='wheat' ";
    }
    elseif($o=="r"){
        $extra=" and item='rice'";
    }
    else
        $extra=" ";
    if($cat=="today")
        $tq="select * from transdetails where shopno=".$shopno." and dat=curdate()".$extra."order by dat desc ";
    elseif($cat=="past"){
        $tq="select * from transdetails where dat>=date_sub(curdate(),interval 1 month)".$extra."";
    }
    else{
        $tq="select * from transdetails where dat>='".$fdate."' and dat<='".$tdate."' and shopno=".$shopno."".$extra."order by dat desc"; 
    }
    $restq=mysqli_query($dbC,$tq);
    //die($tableq);
    //die($cat);
    if(!$restq) die("Fuckedd");
    if(mysqli_num_rows($restq)==0)
        die("<center><h3 style=\"color: white; font-size: 40px; letter-spacing: 2px;\">OOPS! NO DATA FOUND...</h3></center>");
    $output=" 
<style>
tbody {
    color:blue;
    overflow:scroll;
    height:100px;
    }
</style>
    <center><h3 style=\" font-size: 35px; color: white; letter-spacing: 3px; \">HISTORY</h3></center><center><table class=\"table \">
                                        <thead>
                                            <tr style=\" color: white; font-size: 25px; font-family: 'Lato',sans-serif; letter-spacing: 3px;\">
                                                <th>TransactionID</th>
                                                <th>Customer(CardNo.)</th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Amount</th>
                                            </tr><tbody style=\" color: #031a25; font-size: 18px; letter-spacing: 2px;  \">";
    while ($tabrows=mysqli_fetch_row($restq))
    {
        $output.="                   <tr>
                                                <td><center>$tabrows[0]</center></td>
                                                <td><center>$tabrows[2]</center></td>
                                                <td><center>$tabrows[4]</center></td>
                                                <td><center>$tabrows[3]</center></td>
                                                <td><center>$tabrows[5]</center></td>
                                                <td><center>$tabrows[6]</center></td>
                                                <td><center>$tabrows[7]</center></td>
                                            </tr>";
    } 
    $output.="</tbody></table></center>";
    echo $output;

}

?>
