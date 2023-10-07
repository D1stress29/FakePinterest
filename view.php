<?php
include "connection.php";
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.html");
    exit;
}

$user_id = $_SESSION['id'];
$id = $_GET['id'];
$_SESSION['pin_id'] = $id;

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
    echo "<img src='$url' alt='Image'>";
}

$query = "SELECT * FROM boardi WHERE uporabnik_id = $user_id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $ime = $row['ime'];
        $board_id = $row['id'];
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link href="view.css" rel="stylesheet">
        </head>
        <body>
        <form method="post" action="board_form.php">
            <label for="ime">Select a board:</label>
            <select name="ime" id="ime">
                <option value="<?php echo $board_id; ?>"><?php echo $ime; ?></option>
            </select>
            <input type="submit" value="Save">
        </form>
        </body>
        </html>
        <?php
    }
} else {
    echo "Ta uporabnik nima ustvarjenih boardov.";
}

$query = "SELECT * FROM komentarji WHERE pin_id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="komentarji">Comments:</div>';
    while ($row = mysqli_fetch_assoc($result)) {
        $besedilo = $row['besedilo'];
        $uporabnikov_komentar_id = $row['uporabnik_id'];
        
        echo $besedilo;
        echo " - ";

        $query = "SELECT * FROM uporabniki WHERE id = $uporabnikov_komentar_id";
        $user_result = mysqli_query($conn, $query);

        if (mysqli_num_rows($user_result) === 1) {
            $user_row = mysqli_fetch_assoc($user_result);
            echo $user_row['Ime'];
            echo " ";
            echo $user_row['priimek'];
            echo "<br>";
        }
    }
}
?>