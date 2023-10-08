<?php
include "connection.php";
include "login_check.php";

$besedilo = $_POST['comment'];
$pin_id = $_SESSION['pin_id'];
$uporabnik_id = $_SESSION['id'];
if(!empty($besedilo))
{
$stmt = $conn->prepare("INSERT INTO komentarji (besedilo, uporabnik_id, pin_id ) VALUES (?,?,?) ");
    $stmt->bind_param("sii",$besedilo, $uporabnik_id, $pin_id);
    $stmt->execute();
    echo "Your comment was sucessfully created";
    header("Location: main_page.php");
}
else 
{
    echo "Please try again.";
    header("Location: create_board.php");
}
?>
