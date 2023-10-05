<?php
include "connection.php";

$id = $_GET['id'];

$query = "SELECT * FROM pini WHERE id = $id";
$result = mysqli_query($conn, $query);


if(mysqli_num_rows($result) === 1)
{
    $row = mysqli_fetch_assoc($result);
    $url =  $row['url'];
    $naslov = $row['naslov'];
    $opis = $row['opis'];

echo "<img src='$url' alt='Image'>";
echo  $naslov;
echo "<br>";
echo $opis;

}

?>