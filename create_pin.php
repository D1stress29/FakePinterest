<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>
<body>
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
    <form action="create.php" method="post" enctype="multipart/form-data">

    <div class="input-group">
  <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="fileToUpload">
</div><br>
<label for="formGroupExampleInput" class="form-label">Title:</label>
<input type="text" name="Naslov"><br>
<label for="formGroupExampleInput" class="form-label">Description:</label>
<input type="text" name="opis"><br>
<select name="zanr" id="zanr_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
<option selected>Open this select menu</option>
    <?php

    include "connection.php";
    include "login_check.php";

    $sql = "SELECT * FROM zanr_pinov";
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
<input class="btn btn-primary" type="submit" name="submit" value="Save">

    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>