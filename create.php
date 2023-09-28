<?php
include "connection.php";

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) 
  {
    echo "File is an image";
    
  } 
  else 
  {
    
    die("File is not an image.");
  }

  if (file_exists($target_file)) {
    die("Sorry, file already exists.");
    
  }

$allowed_filetypes = array('.jpg','.gif','.bmp','.png');
$max_filesize = 524288;

if(!in_array($imageFileType, $allowed_filetypes))
{
    die('The file you attempted to upload is not allowed.');
}



$fileurl = $POST['fileToUpload'];
$naslov = $POST['Naslov'];
$opis = $POST['opis'];


$query = "INSERT INTO pini (url, naslov, opis, zanr_id ) VALUES (?,?,?,?)";
$result = mysqli_query($conn, $query);

?>