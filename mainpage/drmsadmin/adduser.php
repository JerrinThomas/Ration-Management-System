
<?php
require_once('config.php');
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");
if(isset($_GET["query"])&&isset($_GET["field"])){
  $val=$_GET["query"];
  $f=$_GET["field"];
  if($f == "errAadhar")
  {
      if((strlen($_GET["query"]) != 12) || !(ctype_digit($val)))
        echo "Aadhar Number Invalid(12 Digits)";
      else {
            $chk="SELECT Aadhar_no,ration_card_no,mem_name FROM cardholder_and_mem WHERE Aadhar_no='$val'";
            $checkmem=mysqli_query($dbC,$chk);

            if(mysqli_num_rows($checkmem) != 0){
              $checkrow=mysqli_fetch_row($checkmem);
              echo "The ".$checkrow[2]." with Aadhar no : ".$val." is a member of Ration Card : ".$checkrow[1]." ";
            }
           else {
             $chk1="SELECT ration_card_no FROM rationcard_holder WHERE Aadhar_no='$val'";
             $check=mysqli_query($dbC,$chk1);
             if(mysqli_num_rows($check) != 0){
               $checkrow=mysqli_fetch_row($check);
               echo "Aadhar No( The Aadhar Holder Is H.O.F of ration_card_no : ".$checkrow[0]." )";
             }
             else
                 echo "Aadhar Number Valid ";
           }
      }
 }
 elseif ($f == "errmob") {
      if((strlen($val) != 10) || !(ctype_digit($val)))
          echo "Mobile Number(InValid)";
      else {
        $chk="SELECT ration_card_no FROM rationcard_holder WHERE mob_no='$val'";
        $checkmob=mysqli_query($dbC,$chk);
        $row2=mysqli_fetch_row($checkmob);
        if(mysqli_num_rows($checkmob) != 0 )
              echo " Mobile No.( ".$val." Is Already Allocated To Card : ".$row2[0]." )";
        else
              echo "Mobile Number Valid";
       }
 }
 elseif($f == "check")
 {
     if((strlen($_GET["query"]) != 12) || !(ctype_digit($val)))
       echo "Aadhar Number Invalid(12 Digits)";
     else {
           $chk="SELECT Aadhar_no,ration_card_no,mem_name FROM cardholder_and_mem WHERE Aadhar_no='$val'";
           $checkmem=mysqli_query($dbC,$chk);

           if(mysqli_num_rows($checkmem) != 0){
             $checkrow=mysqli_fetch_row($checkmem);
             echo "The ".$checkrow[2]." with Aadhar no : ".$val." is a member of Ration Card : ".$checkrow[1]." ";
           }
          else {
            $chk1="SELECT ration_card_no FROM rationcard_holder WHERE Aadhar_no='$val'";
            $check=mysqli_query($dbC,$chk1);
            if(mysqli_num_rows($check) != 0){
              $checkrow=mysqli_fetch_row($check);
              echo "Aadhar No( The Aadhar Holder Is H.O.F of ration_card_no : ".$checkrow[0]." )";
            }
            else
              //echo "Aadhar Number ".$val." Is Valid"; 
                die("0");
          }
     }
 }
 elseif($f == "errshopno")
 {
     if((strlen($_GET["query"]) != 6) || !(ctype_digit($val)))
       echo "Ration Shop Number Invalid(6 Digits)";
     else {
           $chk="SELECT shopno FROM rationshops where shopno='$val'";
           $checkmem=mysqli_query($dbC,$chk);

           if(mysqli_num_rows($checkmem) != 0){
             $checkrow=mysqli_fetch_row($checkmem);
             echo "Ration Shop Number ( Valid )";
           }
          else {
              echo "Ration Shop Number (InValid)";
          }
     }
 }
}
else{
ob_start();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $hofamily=test_input($_POST["hofamily"]);
  $Aadhar_no=test_input($_POST["Aadhar_no"]);
  $add1=test_input($_POST["add1"]);
  $add2=test_input($_POST["add2"]);
  $add3=test_input($_POST["add3"]);
  $pan_mun_cor=test_input($_POST["pan_mun_cor"]);
  $pincode=test_input($_POST["pincode"]);
  $wardno=test_input($_POST["wardno"]);
  $house_no=test_input($_POST["house_no"]);
  $monthly_in=test_input($_POST["monthly_in"]);
  $mob_no=test_input($_POST["mob_no"]);
  $taluk=test_input($_POST["taluk"]);
  $cat=test_input($_POST["cat"]);
  $shopno=test_input($_POST["shopno"]);

  $no_of_mem=test_input($_POST["no_of_mem"]);
  if($no_of_mem!=0){
  $name=$_POST["name"];
  $age=$_POST["age"];
  $Aadhar_no2=$_POST["Aadhar_no2"];
  for($i=0;$i<count($name);$i++)
  {
       $Ydetails=true;
       if($name[$i]!="" && $age[$i]!="" && $Aadhar_no2[$i]!="")
        {
           $name[$i]=test_input($name[$i]);
           $age[$i]=test_input($age[$i]);
           $Aadhar_no2[$i]=test_input($Aadhar_no2[$i]);
        }
 }
 }
 else {
   $Ydetails=false;
 }
}


try {
if(!isset($_FILES["fileToUpload"]["tmp_name"])||$hofamily==""||$Aadhar_no==""||$add1==""||$pan_mun_cor==""||$pincode==""||$wardno==""||$house_no==""||$monthly_in==""||$mob_no==""||$taluk=="") {
     throw new Exception(" MISSING INPUT ..... <br> Try Again.... :/ ");
  }
if($Ydetails){
    foreach ($name as $k) {
       if($k=="")
         throw new Exception(" Missing Data In DETAILS OF MEMBERS :- Names Not Found... <br> Try Again :/ ..");
    }
    foreach ($Aadhar_no2 as $k) {
      if($k=="")
        throw new Exception(" Missing Data In DETAILS OF MEMBERS :- Aadhar No Not Found... <br> Try Again :/ ..");
    }
    foreach ($age as $k) {
      if($k=="")
         throw new Exception(" Missing Data In DETAILS OF MEMBERS :- Age No Not Found... <br> Try Again :/ ..");
  }
}
if((strlen((String)$Aadhar_no) !== 12))
     throw new Exception(" Please Enter A Valid 12 Digit Aadhar Number.... :/ <br>GO BACK>>> ");
if((strlen((String)$mob_no) !== 10))
          throw new Exception(" Please Enter A Valid 10 Digit Mobile Number.... :/ <br>GO BACK>>> ");
if($Ydetails){
   if(count($name) < $no_of_mem)
   {
     $c=$no_of_mem-count($name);
     throw new Exception("Please Enter ".$c." More Member(s) :/ ....GO BACK>>> ");
   }
   if(count($name) > $no_of_mem)
   {
     $c=$no_of_mem-count($name);
     throw new Exception("Please Delete ".$c." Member(s).... :/ AND TRY AGAIN>>> ");
   }
    $ar=array();
    $e=1;
   foreach ($Aadhar_no2 as $var) {
       $len=strlen((String)$var);
      if( $len !== 12)
        {
          $e=0;
          array_push($ar,$var);
        }
   }
  if($e==0)
  {   echo "Please Enter A Valid Aadhar No In The Member Details Section <br> The Following Aadhar No.s Are Invalid... :/ ";
    foreach ($ar as $v) {
      echo "<br>$v<br>";
    }
    throw new Exception(" Please Go Back And Try Again ... :) ");
  }
}

// Check if image file is a actual image or fake image
if(empty($_FILES["fileToUpload"]["name"]))
   {
     throw new Exception(" No Image Found...");

   }
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if($check == false) {
    throw new Exception(" Sorry File of ".substr(strrchr($_FILES["fileToUpload"]["name"],'.'),1)." format,not an Image... :/ <br> Upload jpg or jpeg file...<br> Try Again <br> !.THANK YU.! ");
    }
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    throw new Exception("Sorry, your file is too large. Go Back.. :/ .");
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "jpeg" ) {
    throw new Exception("Sorry, only JPG, JPEG...Go Back... :/ ");
}
//move file to uploads/
  $move=move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
  if(!$move) {
      throw new Exception("Error Uploading File...\n Try Again By Going Back....");
  }
  $sql="INSERT INTO rationcard_holder(`Aadhar_no`,`hofamily`,`add1`,`add2`,`add3`,`pan_mun_cor`,`pincode`,`wardno`,`house_no`,`monthly_in`,`no_of_mem`,`hof_img`,`hof_img_type`,`mob_no`,`taluk`,`category`,`shopno`)
  VALUES('".$Aadhar_no."' , '".$hofamily."' , '".$add1."','".$add2."','".$add3."','".$pan_mun_cor."','".$pincode."','".$wardno."','".$house_no."','".$monthly_in."','".$no_of_mem."','".$target_file."','".$imageFileType."',
  '".$mob_no."','".$taluk."','".$cat."','".$shopno."')";

  $result=mysqli_query($dbC,$sql);
  if(!$result) {
     throw new Exception("Error In DataBase row addiction...<br> Please Fill Valid Informations...<br> Try Again By Going Back... :/ ");
  }
  $sq="SELECT ration_card_no FROM rationcard_holder WHERE Aadhar_no='$Aadhar_no'";
  $res=mysqli_query($dbC,$sq);
  $rw=mysqli_fetch_row($res);
  for($i=0;$i<count($name);$i++)
  {
       $ql="INSERT INTO cardholder_and_mem VALUES( ".$Aadhar_no2[$i].",".$rw[0].",'".$name[$i]."',".$age[$i].")";
        $qlout=mysqli_query($dbC,$ql);
        if(!$qlout) {
          throw new Exception("Error In DataBase.MemberDetails row ".$i." addiction...<br> Please Fill Valid Informations... ! <br> Try Again By Going Back... :/ ");
       }

 }
  echo "<img src=\"".$target_file."\"><br>The allotted ration card No : ".$rw[0]."<br><p>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</p><br><p>Head Of Family : ".$hofamily;
  echo "</p><br><a href=\"admin.php\">Go Back</a>";
  echo "</p><br><a href=\"pdf.php?rno=".$rw[0]."\">Print</a>";

} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n  ";
  echo "<input action=\"action\" type=\"button\" value=\"Back\" onclick=\"history.go(-1);\"/>";

}

ob_get_contents();
ob_end_flush();
}
?>
