<?php
include "connection.php";

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
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

$allowed_filetypes = array('jpg','gif','png','jfif');
$max_filesize = 524288;

if(!in_array($imageFileType, $allowed_filetypes))
{
    echo $imageFileType;
    die('The file you attempted to upload is not allowed.');
}





$naslov = $_POST['Naslov'];
$opis = $_POST['opis'];
$zanr_id = $_POST['zanr'];


$stmt = $conn->prepare("INSERT INTO pini (url, naslov, opis, zanr_id) VALUES (?, ?, ?, ?)");

if (!$stmt) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

// Bind parameters to the prepared statement
if (!$stmt->bind_param("sssi", $target_file, $naslov, $opis, $zanr_id)) {
    die("Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error);
}

// Execute the prepared statement
if (!$stmt->execute()) {
    die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
}
else
{
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}
}
// Close the prepared statement
$stmt->close();

// Redirect to main_page.php
header("refresh: 2; url=main_page.php");
?>