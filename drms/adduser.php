
<?php

require_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
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
  $name=$_POST["name"];
  $age=$_POST["age"];
  $adhar_no2=$_POST["adhar_no2"];
  for($i=0;$i<count($name);$i++)
  {
       if($name[$i]!="" && $age[$i]!="" && $adhar_no2[$i]!="")
        {
           $name[$i]=test_input($name[$i]);
           $age[$i]=test_input($age[$i]);
           $adhar_no2[$i]=test_input($adhar_no2[$i]);
        }
 }


}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
try {
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    if(!isset($_FILES["fileToUpload"]["tmp_name"])) {
       throw new Exception("No Image Found..... \n Try Again.... ");
    }
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        throw new Exception("\n Please Go Back....");

    } else {
        throw new Exception(" Sorry File is not an Image...\n Upload jpg or jpeg file...\n Try Again \n !.THANK YU.! ");
    }
}
// Check if file already exists
/*
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
} */
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    throw new Exception("Sorry, your file is too large. Go Back...");
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "jpeg" ) {
    throw new Exception("Sorry, only JPG, JPEG...Go Back... ");
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
  $sql="INSERT INTO rationcard_holder(`adhar_no`,`hofamily`,`add1`,`add2`,`add3`,`pan_mun_cor`,`pincode`,`wardno`,`house_no`,`monthly_in`,`no_of_mem`,`hof_img`,`hof_img_type`,`mob_no`,`taluk`) VALUES('".$adhar_no."' , '".$hofamily."' , '".$add1."','".$add2."'
  ,'".$add3."','".$pan_mun_cor."','".$pincode."','".$wardno."','".$house_no."','".$monthly_in."','".$no_of_mem."','".$target_file."','".$imageFileType."','".$mob_no."','".$taluk."')";

  $result=mysqli_query($dbC,$sql);
  if(!$result) {
     throw new Exception("Error In DataBase row addiction...\n Please Fill Valid Informations...\n Try Again By Going Back...");
  }
  $sq="SELECT ration_card_no FROM rationcard_holder WHERE adhar_no='$adhar_no'";
  $res=mysqli_query($dbC,$sq);
  $rw=mysqli_fetch_row($res);
  for($i=0;$i<count($name);$i++)
  {
       $ql="INSERT INTO cardholder_and_mem VALUES( ".$adhar_no2[$i].",".$rw[0].",'".$name[$i]."',".$age[$i].")";
        $qlout=mysqli_query($dbC,$ql);
        if(!$qlout) {
          throw new Exception("Error In DataBase.MemberDetails row ".$i." addiction...\n Please Fill Valid Informations...\n Try Again By Going Back...");
       }

 }
  echo "<img src=\"".$target_file."\"><br>The allotted ration card No : ".$rw[0]."<br>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>Head Of Family : ".$hofamily;
} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n  ";
}




?>
