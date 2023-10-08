<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

<?php
include "connection.php";
include "login_check.php";

$board_id = $_POST['ime'];
$id = $_SESSION['id'];

$xx_id = null;

$sql = "SELECT id FROM boardi WHERE id = $board_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
  while ($row = mysqli_fetch_assoc($result)) {
    $xx_id = $row['id'];
}

$pin_id = null;

$sql = "SELECT pin_id FROM boardi_pini WHERE board_id = $xx_id";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) 
{
  $row = mysqli_fetch_assoc($result);
  $pin_id = $row['pin_id'];
} 
else 
  {
  die("No matching pins found for the selected board.");  
  }
 
 

$query = "SELECT * FROM pini WHERE id = $pin_id";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) === 1) {
  $row = mysqli_fetch_assoc($result);
  $url = $row['url'];
  $pin_id = $row['id'];
  echo "<a href='view.php?id=$id'><img src='$url' alt='Image'></a>";
} else {
  echo "No matching pins found.";

}

?>



