<?php
include "connection.php";
include "login_check.php";

$user_id = $_SESSION['id'];
$query = "SELECT * FROM boardi WHERE uporabnik_id = $user_id";
$result = mysqli_query($conn, $query);


?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOARDS</title>
    <link href="view.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <h1>YOUR BOARDS</h1>
<form method="post" action="board_search.php">
    <label for="ime">Select a board:</label>
    <select name="ime" id="ime">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $ime = $row['ime'];
                $board_id = $row['id'];
                echo "<option value='$board_id'>$ime</option>";
               
            }
        } else {
            echo "<option value='' disabled>No boards available</option>";
            
        }
        ?>
    </select>
     
    <input type="submit" value="Select" <?php if (mysqli_num_rows($result) == 0) echo 'disabled'; ?>
    <br>
</form>
