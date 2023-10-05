<?php
include "connection.php";

$sql = "SELECT * FROM pini";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $url = $row['url'];
        $id = $row['id'];        
        echo "<a href='view.php?id=$id'><img src='$url' alt='Image'  ></a>";
    }
} else {
    echo "No images found.";
}







?>