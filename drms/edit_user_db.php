
<?php
require_once('config.php');
ob_start();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $cardno=test_input($_POST["cardno"]);
  $hofamily=test_input($_POST["hofamily"]);
  $adhar_no=test_input($_POST["adhar_no"]);
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
  $no_of_mem=test_input($_POST["no_of_mem"]);
  $cat=test_input($_POST["cat"]);
  if($no_of_mem!=0){
  $name=$_POST["name"];
  $age=$_POST["age"];
  $adhar_no2=$_POST["adhar_no2"];
  for($i=0;$i<count($name);$i++)
  {
       $Ydetails=true;
       if($name[$i]!="" && $age[$i]!="" && $adhar_no2[$i]!="")
        {
           $name[$i]=test_input($name[$i]);
           $age[$i]=test_input($age[$i]);
           $adhar_no2[$i]=test_input($adhar_no2[$i]);
        }
 }
 }
 else {
   $Ydetails=false;
 }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

try {
if(!isset($_FILES["fileToUpload"]["tmp_name"])||$hofamily==""||$adhar_no==""||$add1==""||$pan_mun_cor==""||$pincode==""||$wardno==""||$house_no==""||$monthly_in==""||$mob_no==""||$taluk==""||$cat=="") {
     throw new Exception(" MISSING INPUT ..... <br> Try Again.... :/ ");
  }
if($Ydetails){
    foreach ($name as $k) {
       if($k=="")
         throw new Exception(" Missing Data In DETAILS OF MEMBERS :- Names Not Found... <br> Try Again :/ ..");
    }
    foreach ($adhar_no2 as $k) {
      if($k=="")
        throw new Exception(" Missing Data In DETAILS OF MEMBERS :- Adhar No Not Found... <br> Try Again :/ ..");
    }
    foreach ($age as $k) {
      if($k=="")
         throw new Exception(" Missing Data In DETAILS OF MEMBERS :- Age No Not Found... <br> Try Again :/ ..");
  }
  if((strlen((String)$adhar_no) !== 12))
       throw new Exception(" Please Enter A Valid 12 Digit Adhar Number.... :/ <br>GO BACK>>> ");
  if((strlen((String)$mob_no) !== 10))
            throw new Exception(" Please Enter A Valid 10 Digit Mobile Number.... :/ <br>GO BACK>>> ");
}

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
   foreach ($adhar_no2 as $var) {
       $len=strlen((String)$var);
      if( $len !== 12)
        {
          $e=0;
          array_push($ar,$var);
        }
   }
  if($e==0)
  {   echo "Please Enter A Valid Adhar No In The Member Details Section <br> The Following Adhar No.s Are Invalid... :/ ";
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
$chk="SELECT adhar_no,ration_card_no,mem_name FROM cardholder_and_mem WHERE adhar_no='$adhar_no'";
$checkmem=mysqli_query($dbC,$chk);

if(mysqli_num_rows($checkmem) != 0){
  $checkrow=mysqli_fetch_row($checkmem);
  throw new Exception(" The ".$checkrow[2]." with adhar no : ".$adhar_no." is a member of Ration Card : ".$checkrow[1]." ");
}
//move file to uploads/
  $move=move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
  if(!$move) {
      throw new Exception("Error Uploading File...\n Try Again By Going Back....");
  }
  $sql="UPDATE rationcard_holder SET adhar_no=\"$adhar_no\",hofamily=\"$hofamily\",add1=\"$add1\",add2=\"$add2\",add3=\"$add3\",pan_mun_cor=\"$pan_mun_cor\",pincode=\"$pincode\",wardno=\"$wardno\",house_no=\"$house_no\",monthly_in=\"$monthly_in\",no_of_mem=\"$no_of_mem\"
  ,hof_img=\"$target_file\",hof_img_type=\"$imageFileType\",mob_no=\"$mob_no\",taluk=\"$taluk\",category=\"$cat\" WHERE ration_card_no=$cardno";
  $result=mysqli_query($dbC,$sql);
  if(!$result) {
     throw new Exception("Error In DataBase row addiction...<br> Please Fill Valid Informations...<br> Try Again By Going Back... :/ ");
  }
  $sq="DELETE FROM cardholder_and_mem WHERE ration_card_no='$cardno'";
  $res=mysqli_query($dbC,$sq);
  for($i=0;$i<count($name);$i++)
  {
       $ql="INSERT INTO cardholder_and_mem VALUES( ".$adhar_no2[$i].",".$cardno.",'".$name[$i]."',".$age[$i].")";
        $qlout=mysqli_query($dbC,$ql);
        if(!$qlout) {
          throw new Exception("Error In DataBase.MemberDetails row ".$i." addiction...<br> Please Fill Valid Informations... ! <br> Try Again By Going Back... :/ ");
       }

 }

  echo "<img src=\"".$target_file."\"><br>The allotted ration card No : ".$cardno." has been Modified<br>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>Head Of Family : ".$hofamily."<br><input action=\"action\" type=\"button\" value=\"Back\" onclick=\"history.go(-2);\"/>";

} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n  ";
  echo "<input action=\"action\" type=\"button\" value=\"Back\" onclick=\"history.go(-1);\"/>";
}


ob_get_contents();
ob_end_flush();

?>