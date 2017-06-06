<?php
include ('config.php');
$s=$_GET["sadmin"];
$optns=$_GET["optns"];
$value=$_GET["value"];
if($s == 1){
    if($optns == "name")
       $ss="select * from admindetails where name like '%".$value."%'";
    else
       $ss="select * from admindetails where username like '%".$value."%'";
     $q=mysqli_query($dbC,$ss);
     
     $out="<style>
          body{
               background: #3d4444;
               color: #00ad15;
          }
          table{
           color:red;
          }    
          tbody {
              color:#3d4444;
              overflow:scroll;
              height:100px;
          }
          </style><body><center><h3>Search Result</h3></center>

                            <center><table>
                                        <thead>
                                            <tr>
                                                <th>&nbsp&nbsp Name &nbsp&nbsp</th>
                                                <th>&nbsp&nbsp Username &nbsp&nbsp</th>
                                                <th>&nbsp&nbsp Taluk &nbsp&nbsp</th>
                                                <th>&nbsp&nbsp Role &nbsp&nbsp</th>
                                            </tr><tbody>";
                                            
                                            
     while ($tabrows=mysqli_fetch_row($q))
     {
         $out.="                   
                                            <tr>
                                                <td><center>&nbsp&nbsp$tabrows[2]&nbsp&nbsp</center></td>
                                                <td><center>&nbsp&nbsp$tabrows[0]&nbsp&nbsp</center></td>
                                                <td><center>&nbsp&nbsp$tabrows[3]&nbsp&nbsp</center></td>
                                                <td><center>&nbsp&nbsp$tabrows[4]&nbsp&nbsp</center></td>

                                            </tr>";
     } 
    $out.="</tbody></table></center>";
    if(mysqli_num_rows($q) == 0)
        $out="<body><center><h3>Search Result</h3>No Data Found.</center>";
    die($out);
   
}
else{
    if($optns == "aadhar")
       $s1="select Aadhar_no,ration_card_no,hofamily,mob_no,taluk,shopno from rationcard_holder where Aadhar_no like '%".$value."%'";
    elseif($optns == "hof")
       $s1="select Aadhar_no,ration_card_no,hofamily,mob_no,taluk,shopno from rationcard_holder where hofamily like '%".$value."%'";
    else
       $s1="select Aadhar_no,ration_card_no,hofamily,mob_no,taluk,shopno from rationcard_holder where mob_no like '%".$value."%'";
     $q1=mysqli_query($dbC,$s1);
     
     $out="<style>
          body{
               background: #3d4444;
               color: #00ad15;
          }
          table{
           color:red;
          }    
          tbody {
              color:#3d4444;
              overflow:scroll;
              height:100px;
          }
          </style><body><center><h3>Search Result</h3></center>

                            <center><table>
                                        <thead>
                                            <tr>
                                                <th>&nbsp&nbsp Aadhar Number &nbsp&nbsp</th>
                                                <th>&nbsp&nbsp CardNumber &nbsp&nbsp</th>
                                                <th>&nbsp&nbsp H.O.Family &nbsp&nbsp</th>
                                                <th>&nbsp&nbsp Mobile Number &nbsp&nbsp</th>
                                                <th>&nbsp&nbsp Taluk &nbsp&nbsp</th>
                                                <th>&nbsp&nbsp Ration Shop Number &nbsp&nbsp</th>
                                            </tr><tbody>";
                                            
                                            
     while ($tabrws=mysqli_fetch_row($q1))
     {
         $out.="                   <tr>
                                                <td><center>&nbsp&nbsp$tabrws[0]&nbsp&nbsp</center></td>
                                                <td><center>&nbsp&nbsp$tabrws[1]&nbsp&nbsp</center></td>
                                                <td><center>&nbsp&nbsp$tabrws[2]&nbsp&nbsp</center></td>
                                                <td><center>&nbsp&nbsp$tabrws[3]&nbsp&nbsp</center></td>
                                                <td><center>&nbsp&nbsp$tabrws[4]&nbsp&nbsp</center></td>
                                                <td><center>&nbsp&nbsp$tabrws[5]&nbsp&nbsp</center></td>

                                            </tr>";
     } 
    $out.="</tbody></table></center>";
        if(mysqli_num_rows($q1) == 0)
        $out="<body><center><h3>Search Result</h3>No Data Found.</center>";
    die($out);
}
?>