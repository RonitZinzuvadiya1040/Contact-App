<?php
include 'connect.php';
?>

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

<html>
<head>
<link rel="icon" href="icon.jpg">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        <a style="margin-left: 850px;">Welcome back, <?php echo $data['name']; ?> !</a>
      </div>
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
            <th scope="col">Operations</th>
          </tr>
        </thead>
        <tbody>
            <?php 
            $id = $_GET['pageid'];
            $results_per_page = 5;
            $sql = "select * from addcontact";
            $result = mysqli_query($con, $sql);
            $number_of_results = mysqli_num_rows($result);
            $number_of_pages = ceil($number_of_results / $results_per_page);



            if ($id <= $number_of_pages) {
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
                            <button class="btn btn-success" style="margin-right: 0px;"><a href="update.php?updateid=<?php echo $rows['id'] ?>">Update</a></button>
                            <button class="btn btn-danger" style="margin-right: 0px;"><a href="delete.php?deleteid=<?php echo $rows['id'] ?>">Delete</a></button>
                        </td>
                    </tr>
                <?php
                }
                ?>
        </table>
    </section>
    <br>
    <center>
        <?php
                for ($page = 1; $page <= $number_of_pages; $page++) {
        ?>
            <div class="pagination">
                <?php echo '<a href="paging.php?pageid=' . $page . '">' . $page . '</a> '; ?>
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
        window.location.href = "Dashboard.php";
    </script>
<?php
            }
?>
</body>
</html>