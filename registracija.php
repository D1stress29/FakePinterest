<?php

require_once "connection.php";

if(! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
{
die("vnesti morate veljaven e-mail naslov");
}
if (strlen($_POST["geslo"]) < 4) {
    die("geslo mora vsebovati vsaj 4 crke");
}



$ime= $_POST['ime'];
$priimek = $_POST['priimek'];
$email = $_POST['email'];
$geslo = $_POST['geslo'];
$potrdigeslo = $_POST['potrdigeslo'];
$hash_geslo = password_hash( $geslo,  PASSWORD_DEFAULT);


if($geslo == $potrdigeslo)
{
    if(!empty($ime) && !empty($priimek) && !empty($email) && !empty($geslo) )
    {
    $stmt = $conn->prepare("INSERT INTO uporabniki (Ime, priimek, email, geslo) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $ime, $priimek, $email, $hash_geslo);
    $stmt->execute();
    echo("Login successful");
    header("refresh: 2, url=login.html");
    }
else echo ("One of the fields is missing / does not match our parameters");
}
else echo ("The passwords do not match");

    ?>