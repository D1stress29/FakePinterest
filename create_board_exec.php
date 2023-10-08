<?php
include "connection.php";
include "login_check.php";

$ime = $_POST['ime'];
$uporabnik_id = $_SESSION['id'];

if(!empty($ime))
{
$stmt = $conn->prepare("INSERT INTO boardi (uporabnik_id, ime) VALUES (?,?) ");
    $stmt->bind_param("is", $uporabnik_id, $ime);
    $stmt->execute();
    echo "Your board was sucessfully created";
    header("Location: main_page.php");
}
else 
{
    echo "Please try again.";
    header("Location: create_board.php");
}   

?>