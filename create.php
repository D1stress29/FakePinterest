<?php
include "connection.php";

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) 
  {

  } 
  else 
  {
    
    die("File is not an image.");
  }

  if (file_exists($target_file)) {
    die("Sorry, file already exists.");
    
  }

$allowed_filetypes = array('jpg','gif','bmp','png');
$max_filesize = 524288;

if(!in_array($imageFileType, $allowed_filetypes))
{
    echo $imageFileType;
    die('The file you attempted to upload is not allowed.');
}




$naslov = $_POST['Naslov'];
$opis = $_POST['opis'];
$zanr_id = $_POST['zanr'];


$stmt = $conn->prepare = "INSERT INTO pini (url, naslov, opis, zanr_id ) VALUES (?,?,?,?)";
$stmt -> bind_param("sssi", $target_file, $naslov, $opis, $zanr_id);

$stmt->execute();
    echo("Vnos uspešen");
    header("refresh: 2, url=main_page.php");
$result = mysqli_query($conn, $query);

?>