<?php 
require_once('config.php');
/*        
if(isset($_GET["cardno"],$_GET["shopno"])){
    $cno=$_GET["cardno"];
    $sno=$_GET["shopno"];
    $sq="SELECT hofamily FROM rationcard_holder WHERE shopno='$sno' AND ration_card_no='$cno'";
    $res=mysqli_query($dbC,$sq);
    
    if(!$res)
        die("0");
    else
    {    
        $tap=mysqli_fetch_row($res);
        // card found and belongs to this shop..
        // otp has to be generated and sms blaahh blaaahhh...
        /*
         $characters = 'abcdefghijklmnopqrstuvwxyz';
         $numbers = '0123456789';
         $otp = '';
         $maxc = 25;
         $maxn = 9;
         for ($i = 0; $i < 6; $i++) {   
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
        
        // return to called fuction with value 1 indicating otp validation..
        // for time being otp is */
/*    die("<center><h3>.$tap[0].</h3></center><br><br>The OTP here : <input type=\"text\" style=\"color: #47a3da;\" placeholder=\"01abc0\" value=\"0\" id=\"votp\" onblur=\"otpcheck()\"><input type=\"submit\" value=\"Submit\"><br><div id=\"otpcheckresult\"><div><br><center><a href=\"maintab.php\"><input type=\"button\" value=\"Back\"></center>");
        
    }
    
    
}

//echo $otp;echo "<br>$starttime";
//time() returns current time in sec...can used to expire otp

*/
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
</style><h2>CART</h2>
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
                                                <td id=\"price\">20.00</td>
                                                <td>100 Kg</td>
                                                <td>
                                                    <input type=\"text\" value=\"0\" id=\"valr\" onkeyup=\"total()\">
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
                                                <td id=\"pwheat\">20.00</td>
                                                <td>100 Kg</td>
                                                <td>
                                                    <input type=\"text\" value=\"0\" id=\"valw\" onkeyup=\"total()\">
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
                                                <td id=\"pker\">20.50</td>
                                                <td>100 L</td>
                                                <td>
                                                    <input type=\"text\" value=\"0\" id=\"valk\" onkeyup=\"total()\">
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
                                                    <input type=\"submit\" name=\"srchb1\" id=\"srchb1\" value=\"Submit\">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>"; 

?>
