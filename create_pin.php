<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="create.php" method="post">
<input type="file" name="fileToUpload"><br>
<input type="text" name="Naslov" placeholder="Add your title"><br>
<input type="text" name="opis" placeholder="Write a description"><br>
GANGRE: 
<select name="zanr" id="zanr_id">

    <?php

    include "connection.php";

    $sql = "SELECT zanr FROM zanr_pinov";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
        while ($row = $result->fetch_assoc()) 
        {
            echo '<option value="' . $row['id'] . '">'.$row['zanr'] .'</option>';
        }
    }
    ?>
</select><br>
<input type="submit" name="submit" value="Save">

    </form>
</body>
</html>