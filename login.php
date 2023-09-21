<?php
require_once "connection.php";

if(isset($_POST['Pošlji']))
{


    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        die("vnesti morate veljaven e-naslov");
    }

    if(strlen($_POST['geslo']) < 5)
    {
die("geslo mora vsebovati vsaj 4 črke/znake ");
    }

    $email = $_POST['email'];
    $geslo = $_POST['geslo'];
    $query = "SELECT * FROM uporabniki WHERE email = '$email' AND geslo = '$geslo'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) === 1)
    {
        echo "Logged in!";
        header('Location: main_page.html');
    
    }
    else
    {
        echo ("ta uporabnik ne obstaja");
        header('refresh:2; url=login_page.php');
    } 

}
?>