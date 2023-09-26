<?php
include "connection.php";

$sql = "SELECT url FROM pini";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $url = $row['url'];
        echo "<div class='image'><img src='$url' alt='Image'></div>";
    }
} else {
    echo "No images found.";
}







?>