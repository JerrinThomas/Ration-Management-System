
<?php
// database connection
$dbHost = 'localhost';
$dbUser = 'rmsadmin';
$dbPass = 'rmsadmin';
$dbName = 'drms';
$dbC = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName)
        or die('Error Connecting to MySQL DataBase');
?>

echo $_POST["name"];
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $name=test_input($_POST["name"]);
  $address1=test_input($_POST["address1"]);
  $address2=test_input($_POST["address2"]);
  $address3=test_input($_POST["address3"]);
  $panchayat=test_input($_POST["panchayat"]);
  $pin=test_input($_POST["pin"]);
  $ward=test_input($_POST["ward"]);
  $houseno=test_input($_POST["houseno"]);
  $income=test_input($_POST["income"]);
  $memberno=test_input($_POST["memberno"]);

  
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"]))
{
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false)
    {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    }
    else
    {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists

//if (file_exists($target_file))
//{
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 200000)
{
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" )
{
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0)
{
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
}
else
{
  $imagename=$_FILES["fileToUpload"]["name"];

  //Get the content of the image and then add slashes to it
  $imagetmp=addslashes (file_get_contents($_FILES['fileToUpload']['name']));

  //Insert the image name and image content in image_table
  $insert_image="INSERT INTO users VALUES('$imagetmp','$imagename') WHERE ra";

  mysql_query($insert_image);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
    {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else
    {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
