<?php
include "connection.php";
session_start();    
$user_id = $_SESSION['id'];
$id = $_GET['id'];

if (!isset($_SESSION['id']))
 {
    header("Location: login.html");
    exit;
 }
 
$query = "SELECT * FROM pini WHERE id = $id";
$result = mysqli_query($conn, $query);


if(mysqli_num_rows($result) === 1)
{
    $row = mysqli_fetch_assoc($result);
    $url =  $row['url'];
    $naslov = $row['naslov'];
    $opis = $row['opis'];

echo "<img src='$url' alt='Image'>";
echo  $naslov;
echo "<br>";
echo $opis;

}

$query = "SELECT * FROM boardi WHERE uporabnik_id = $user_id";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) === 1)
{
$row = mysqli_fetch_assoc($result);
$ime = $row['ime'];
?>
<form method="post" action="board_form.php">
<label for="ime">Select a value:</label>
<select name="ime" id="ime">
    <option value="<?php echo $ime; ?>"><?php echo $ime; ?></option>
</select>
<input type="submit" value="Save">
</form>
<?php
}


else
{
    echo "Ta uporabnik nima ustvarjenih boardov.";
}

?>
 


