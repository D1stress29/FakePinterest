<?php 
include "connection.php";
session_start();

$board_id = $_POST['ime'];
$pin_id = $_SESSION['pin_id'];

$stmt = $conn->prepare("INSERT INTO boardi_pini (board_id, pin_id) VALUES (?,?)");
$stmt->bind_param("ii", $board_id, $pin_id);

$stmt->execute();
    echo("Slika je bila dodana v board.");
    header("refresh: 2, url='main_page.php'");
 
?>