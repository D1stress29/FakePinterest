<?php
include "connection.php";
include "login_check.php";



$user_id = $_SESSION['id'];
$id = $_GET['id'];
$_SESSION['pin_id'] = $id;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <img src="Logo-removebg-preview.png" alt="Logo" width="60" height="24" class="d-inline-block align-text-top">
            <a class="navbar-brand" href="#">Picture-esque</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
    </button>
             <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="main_page.php">Home</a>
                    <a class="nav-link" aria-current="page" href="create_pin.php">Create</a>
                    <a class="nav-link" aria-current="page" href="boardi.php" active>Boards</a>
                </div>
            </div>
        </div>
    </nav>
    </header>
<body>
    
</body>
</html>


<?php



$query = "SELECT * FROM pini WHERE id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $url = $row['url'];
    $naslov = $row['naslov'];
    $opis = $row['opis'];

    echo '<span class="naslov">' . $naslov . '</span>';
    echo '<br>';
    echo $opis;
    echo '<br>';
    echo "<img src='$url' alt='Image' class='img-thumbnail'>";
    echo "<br>";
}

$query = "SELECT * FROM boardi WHERE uporabnik_id = $user_id";
$result = mysqli_query($conn, $query);


        ?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="view.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>
<body>
<form method="post" action="board_form.php">
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
     
    <input type="submit" value="Save" <?php if (mysqli_num_rows($result) == 0) echo 'disabled'; ?>
    <br>
</form>
<a href="create_board.html">Create a New Board</a> 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        <?php
    


$query = "SELECT * FROM komentarji WHERE pin_id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    ?>
    <br>
        <label>Write a comment:</label>
            <form action="comment_create.php" method="post">
            
            <input type="text" name ="comment" required>
            <input type="submit" value="Post">
            </form>
            </body>
          </html>
        <?php
    echo '<div class="komentarji">Comments:</div>';
    
    while ($row = mysqli_fetch_assoc($result)) {
        $besedilo = $row['besedilo'];
        $uporabnikov_komentar_id = $row['uporabnik_id'];
        $datum = $row ['datum'];
        echo $datum;
        echo " | ";
        echo $besedilo;
        echo " - ";

        $query = "SELECT * FROM uporabniki WHERE id = $uporabnikov_komentar_id";
        $user_result = mysqli_query($conn, $query);

        if (mysqli_num_rows($user_result) === 1) {
            $row = mysqli_fetch_assoc($user_result);
            echo $row['Ime'];
            echo " ";
            echo $row['priimek'];
            echo "<br>";
        }
    }
}
?>