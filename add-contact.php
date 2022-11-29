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

<!-- PHP CODE -->

<?php

  include 'connect.php';

  $name="";
  $nameErr ="";

  $email="";
  $emailErr ="";

  $mobile="";
  $mobileErr ="";

  $gender="";
  $genderErr ="";

  $image="";
  $imageErr ="";

$msg ="";


  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $image = $_POST['image'];

  if(empty($name))
  {
    $nameErr ="* Name is required.";
  }else{
    $n="/^[A-Za-z]+$/";
    if(!preg_match($n, $name))
    {
      $nameErr ="* Only alphabets allowed..";
    }
    else{
      $name = $_POST['name'];
    }
  }

  if(empty($email))
  {
    $emailErr ="* Email is required.";
  }else
  {
    $e="/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    if(!preg_match($e, $email)) 
    {
      $emailErr ="* Invalid email address.";
    }
    else{
      $email = $_POST['email'];
    }
  }

  if(empty($mobile))
  {
    $mobileErr ="* Mobile number is required.";
  }else{
    $m="/^\d{10}$/";
    if(!preg_match($m, $mobile))
    {
      $mobileErr ="* Invalid mobile number.";
    }
    else{
      $mobile = $_POST['mobile'];
    }
  }

  if(empty($gender))
  {
    $genderErr ="* Gender is required.";
  }
  if(empty($image))
  {
    $imageErr ="* Image is required.";
  }
if($nameErr != "" OR $emailErr != "" OR $mobileErr !="" OR $genderErr !="" OR $imageErr !="")
{
  $msg= "something is wrong.....";
}else{


    $sql="insert into `addcontact` (name,email,mobile,gender,image) values('$name', '$email', '$mobile', '$gender', '$image')";


    $result=mysqli_query($con,$sql);

    if($result){
      echo '<script type="text/javascript">alert("Data inserted successfully")</script>';
      header('location:recent-contact.php');

    }
    else{
      die(mysqli_error($con));
    }
  }
}
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">


    <title>Add Contact</title>
  </head>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="color: black;">Contact App</a>
      <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <!-- <a class="nav-link" href="#">Registration</a> -->
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
          <!-- <a class="nav-link" href="index.php" style="color: black;">Login</a> -->
        </div>
      </div>
    </div>
  </nav>
  <body>
    <div class="row-sm-4">
      <div class="container">
        <div class=row-sm-4 >
          &nbsp;
    <h1 style="text-align: center; font-size: 35px;">
   Add Contact</h1>
    <div class="container my-4">
      <form method="post" >
        <div class="form-group">
          <label>Name:</label>
          <input type="text" class="form-control" value="<?php echo $name; ?>" placeholder="Enter your name" name="name" autocomplete="off">
          <span style="color: red;"><?php echo $nameErr; ?></span>
        </div>

        <div class="form-group">
          <label>Email:</label>
          <input type="text" class="form-control" value="<?php echo $email; ?>" placeholder="Enter your email" name="email" autocomplete="off">
          <span style="color: red;"><?php echo $emailErr; ?></span>
        </div>

        <div class="form-group">
          <label>Mobile:</label>
          <input type="text" class="form-control" value="<?php echo $mobile; ?>" placeholder="Enter your mobile number" name="mobile" autocomplete="off">
          <span style="color: red;"><?php echo $mobileErr; ?></span>
        </div>

        <div class="form-group">
          <label>Gender:</label><br>
          <div>
            <input type="radio" name="gender" value="male" checked> Male
            <input type="radio" name="gender" value="female" > Female
            <input type="radio" name="gender" value="other" > Other <br>
            <span style="color: red;"><?php echo $genderErr; ?></span>
          </div>
        </div>

       <!--  <div class="form-group">
          <label>Password:</label>
          <input type="password" class="form-control" id="myInput" value="<?php echo $password; ?>" placeholder="Enter your Password" name="password" autocomplete="off">
          <input type="checkbox" onclick="myFunction()">show password
          <script type="text/javascript">
            function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
              x.type = "text";
            } else {
              x.type = "password";
            }
            }
          </script>
          <span style="color: red;"><?php echo $passErr; ?></span>
        </div> -->

        <!-- <div class="form-group">
          <label>Password:</label>
          <input type="text" class="form-control" placeholder="Enter your Password" name="password" autocomplete="off">
        </div> -->

        <div class="form-group">
          <label>Image:</label>
          <input type="file" class="form-control" value="<?php echo $image; ?>" name="image" autocomplete="off">
          <span style="color: red;"><?php echo $imageErr; ?></span>
        </div>

        <center>
        <button type="submit" class="btn btn-primary" name="submit">Add</button>
        </center>

      </form>
    </div>
  </body>
</html>