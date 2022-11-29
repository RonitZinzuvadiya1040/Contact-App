<!-- PHP CODE -->

<?php

session_start();
if(!isset($_SESSION['email'])){
header("location:/index.php"); 
}
include 'connect.php';
$sql = "SELECT * FROM `crud` WHERE email='$_SESSION[email]'";
$r=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($r);

?>

<!-- HTML CODE -->

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="icon.jpg">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <title>Recent Contact</title>
</head>

<body>
  <?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  require_once("connect.php");
  
  $findresult = mysqli_query($con, "SELECT * FROM addcontact ORDER BY id DESC limit 5 ");
  ?>

  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="color: black;">Contact App</a>
      <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" href="add-contact.php" style="color: black;">Add</a>
          <a class="nav-link" href="recent-contact.php" style="color: black;">Recent Contact</a>
          <a class="nav-link" href="all-contact.php" style="color: black;">All Contacts</a>
          <a class="nav-link" href="profile.php" style="color: black;">Profile</a>
          <a class="nav-link" href="logout.php" style="color: black;">Logout</a>
          <!-- <a class="nav-link" href="dashboard.php">Dashboard</a> -->
        </div>
        <a style="margin-left: 1050px;">Welcome back, <b><?php echo $data['name']; ?></b> !</a>
      </div>
    </div>
  </nav>
  <div>
    <div class="row-sm-4">
      <div class="container">
        <div class=row-sm-4 >
          &nbsp;
          <h2 style="text-align: center; "> Recent 5 Contacts </h2>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Gender</th>
                <th scope="col">Image</th>
              </tr>
            </thead>
            <?php
            while ($res = mysqli_fetch_array($findresult)) {
              ?>
              <tr>
                <td><?php echo $res['id']; ?></td>
                <td><?php echo $res['name']; ?></td>
                <td><?php echo $res['email']; ?></td>
                <td><?php echo $res['mobile']; ?></td>
                <td><?php echo $res['gender']; ?></td>
                <td><?php echo $res['image']; ?></td>
              </tr>

              <?php
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </body>

  </html>