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

  $password="";
  $passErr ="";

  $image="";
  $imageErr ="";

$msg ="";


  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
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

  if(empty($password))
  {
    $passErr ="* Password is required.";
  }

  if(empty($image))
  {
    $imageErr ="* Image is required.";
  }

if($nameErr != "" OR $emailErr != "" OR $mobileErr !="" OR $genderErr !="" OR $passErr !="" OR $imageErr !="")
{
  $msg= "something is wrong.....";
}else{


    $sql="insert into `crud` (name,email,mobile,gender,password,image) values('$name', '$email', '$mobile', '$gender', '$password','$image')";


    $result=mysqli_query($con,$sql);

    if($result){
      echo '<script type="text/javascript">alert("Data inserted successfully")</script>';
      header('location:dashboard.php');

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

    <title>Crud Operation</title>
  </head>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="color: black;">Contact App</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <!-- <a class="nav-link" href="#">Registration</a> -->
          <a class="nav-link" href="index.php" style="color: black;">Login</a>
        </div>
      </div>
    </div>
  </nav>
  <body>
    <div class="container my-5">
      <form method="post" >

        <h1 style="text-align: center;">Registration Form</h1>
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
            <input type="radio" name="gender" value="male" > Male
            <input type="radio" name="gender" value="female" > Female
            <input type="radio" name="gender" value="other" > Other
            <span style="color: red;"><?php echo $genderErr; ?></span>
          </div>
        </div>

        <div class="form-group">
          <label>Password:</label>
          <input type="text" class="form-control" value="<?php echo $password; ?>" placeholder="Enter your Password" name="password" autocomplete="off">
          <span style="color: red;"><?php echo $passErr; ?></span>
        </div>

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
          <button type="submit" class="btn btn-primary" name="submit">Register</button>
        </center>

      </form>
    </div>
  </body>
  </html> 