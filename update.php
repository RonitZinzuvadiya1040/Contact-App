<!-- PHP CODE -->

<?php

  include 'connect.php';

$name="";
$nameErr ="";
$validName ="";

$email="";
$emailErr ="";
$validEmail ="";

$mobile="";
$mobileErr ="";
$validMobile ="";

$gender="";
$genderErr ="";
$validGender ="";

$password="";
$passErr ="";
$validPassword ="";

$image="";
$imageErr ="";
$validImage ="";

  $id=$_GET['updateid'];

  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $image = $_POST['image'];

  $id=$_GET['updateid'];

    $sql="update `addcontact` set name='$name', email='$email', mobile='$mobile', gender='$gender', image='$image' where id='$id'";

    $result=mysqli_query($con,$sql);
    // $row =mysqli_fetch_assoc($result);

    if($result){
      echo "Data Updated Successfully";
      header('location:all-contact.php');

    }
    else{
      die(mysqli_error($con));
    }
  }

      $s="select name,email,mobile,gender,image from `addcontact` where id='$id'";
      $res=mysqli_query($con,$s);
      $row =mysqli_fetch_array($res);
      $g = $row[3];

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

    <title>Update </title>
  </head>
  <body>
    <div class="container my-5">
      <form method="post">
        <h1 style="text-align: center;">Update Data</h1>
        <div class="form-group">
          <label>Name:</label>
          <input type="text" class="form-control" placeholder="Enter your name" value="<?php echo $row['0']; ?>" name="name" autocomplete="off" Required>
        </div>

        <div class="form-group">
          <label>Email:</label>
          <input type="text" class="form-control" placeholder="Enter your email" value="<?php echo $row['1']; ?>" name="email" autocomplete="off" Required>
        </div>

        <div class="form-group">
          <label>Mobile:</label>
          <input type="text" class="form-control" placeholder="Enter your mobile number" value="<?php echo $row['2']; ?>" name="mobile" autocomplete="off" Required>
        </div>

        <div class="form-group">
          <label>Gender:</label><br>
          <div>
            <input type="radio" name="gender" value="male"<?php if ($g == "male") echo "checked"; ?> Required> Male
            <input type="radio" name="gender" value="female" <?php if ($g == "female") echo "checked"; ?> Required> Female
            <input type="radio" name="gender" value="other"  Required> Other
          </div>
        </div>

        <div class="form-group">
          <label>Image:</label>
          <input type="file" class="form-control" value="<?php echo $row['5']; ?>" name="image" autocomplete="off" Required>
        </div>

        <center>
          <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </center>

      </form>
    </div>
    <center><a href="all-contact.php"><button class="btn btn-primary">Go-back</button></a></center>
    
  </body>
</html>