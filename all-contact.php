<?php
include 'connect.php';
?>

<!-- PHP CODE -->

<?php

session_start();
if(!isset($_SESSION['email'])){
  echo '<script>alert("Please Login Again!!")</script>';
header("location:index.php"); 
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
    <title>All Contacts</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

  </head>
  <body>
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
      </div>
      <a style="margin-left: 1050px;">Welcome back, <b><?php echo $data['name']; ?></b> !</a>
    </div>
  </nav>
  <div class="container">
    &nbsp;
    <h2 style="text-align: center;"> All Contacts </h2>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
            <th scope="col">Gender</th>
            <th scope="col">Image</th>
            <th scope="col">&nbsp; &nbsp; &nbsp; Operations</th>
          </tr>
        </thead>
        <tbody>
          
         <!--  // $sql="select * from `addcontact`";
          // $result=mysqli_query($con,$sql);

          // if (!isset ($_GET['page']) ) {  
          //   $page = 1;  
          // } else {  
          //   $page = $_GET['page'];  
          // }  

          // if($result){
          //   while($row=mysqli_fetch_assoc($result)){
          //     $id=$row['id'];
          //     $name=$row['name'];
          //     $email=$row['email'];
          //     $mobile=$row['mobile'];
          //     $gender=$row['gender'];
          //     $image=$row['image'];
          //     echo '<tr>
          //     <th scope="row">'.$id.'</th>
          //     <td>'.$name.'</td>
          //     <td>'.$email.'</td>
          //     <td>'.$mobile.'</td>
          //     <td>'.$gender.'</td>
          //     <td>'.$image.'</td>
          //     <td>
          //     <a href="update.php?updateid='.$id.'" >
          //     <button class="btn btn-success">Update</button>
          //     </a>  

          //     <a href="delete.php?deleteid='.$id.'" >
          //     <button class="btn btn-danger">Delete</button>
          //     </a>
          //     </td>
          //     </tr>';
          //   }
          // } -->

<!-- PHP CODE -->

      <?php 
            $id = $_GET['pageid'];
            $results_per_page = 5;
            $sql = "select * from addcontact";
            $result = mysqli_query($con, $sql);
            $number_of_results = mysqli_num_rows($result);
            $number_of_pages = ceil($number_of_results / $results_per_page);


            if ($_GET['pageid'] <= 0) {
              $_GET['pageid'] = 1;
            }

            if ($id <= $number_of_pages && $id >= 0) {
                if (!isset($_GET['pageid'])) {
                    $page = 1;
                } else {
                    $page = $_GET['pageid'];
                }

                $this_page_first_result = ($page - 1) * $results_per_page;

                $sql = "select * from addcontact LIMIT " . $this_page_first_result . ',' . $results_per_page;
                $result = mysqli_query($con, $sql);

                while ($rows = $result->fetch_assoc()) {
      ?>
                    <tr>
                      <td><?php echo $rows['id'] ?></td>
                      <td><?php echo $rows['name'] ?></td>
                      <td><?php echo $rows['email'] ?></td>
                      <td><?php echo $rows['mobile'] ?></td>
                      <td><?php echo $rows['gender'] ?></td>
                      <td><?php echo $rows['image'] ?></td>
                      <td>
                        <a href="update.php?updateid=<?php echo $rows['id'] ?>" style="color: black;"><button class="btn btn-success" style="margin-right: 0px;">Update</button></a>
                        <a href="delete.php?deleteid=<?php echo $rows['id'] ?>" style="color: black;"><button class="btn btn-danger" onclick ='return deleteConfirm()' style="margin-right: 0px;">Delete</button></a>
                      </td>
                    </tr>
                <?php
                }
                ?>
         </tbody> 
      </table>
    <center>
        <?php
          for ($page = 1; $page <= $number_of_pages; $page++) {
        ?>
          <div class="pagination justify-content-center"><div style="float: left;">
          <button class="btn btn-primary m-1" >
            <?php echo '<a class="text-white" href="all-contact.php?pageid=' . $page . '">' . $page . '</a> '; ?>
          </button>
          </div>
        <?php
                }
        ?>
    </center>
        <?php
            } else {
        ?>
    <script>
        alert("Page on ID not Found");
        window.location.href = "all-contact.php";
    </script>
    
<?php
  }
?>
        </tbody> 
      </table>  
    </div>
   </body>
  <script type="text/javascript">
    function deleteConfirm(){
    return confirm('are you sure you want to delete this?');
   }
  </script>
  </html>