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

<!doctype html>
  <html lang="en">
  <head>
  <link rel="icon" href="icon.jpg">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#" style="color: black;">Contact App</a>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" href="add-contact.php" style="color: black;">Add</a>
            <a class="nav-link" href="recent-contact.php" style="color: black;">Recent Contact</a>
            <a class="nav-link" href="all-contact.php" style="color: black;">All Contacts</a>
            <a class="nav-link" href="profile.php" style="color: black;">Profile</a>
            <a class="nav-link" href="logout.php" style="color: black;">Logout</a>     
          </div>
          <a style="margin-left: 1050px;">Welcome back, <b><?php echo $data['name']; ?></b> !</a>
        </div>
      </div>
    </nav>
    <div class="container">
      &nbsp;
      <h2 style="text-align: center;"> My Details </h2>
      <section>
        <table class="table">

          <thead class="thead-dark">
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Gender</th>
              <!-- <th>password</th> -->
            </tr>
          </thead>

          <tr>
            <td>
              <?php echo $data['name'] . "<br>"; ?>
            </td>
            <td>
              <?php echo $data['email'] . "<br>";?>
            </td>
            <td>
              <?php echo $data['mobile'] . "<br>";?>
            </td>           
            <td>
              <?php echo $data['gender'] . "<br>";?>
            </td>
          </tr>

        </table>
      </section>
      <!-- <a href="registration.php" class="text-light">
        <button class="btn btn-primary my-5">
          <a class="nav-link" href="add-user.php" style="color: white;">Add Contact</a>
        </button>
      </a> -->
      
    </div>
  </body>
  </html>