<!-- PHP CODE -->

<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
	$id=$_GET['deleteid'];

	$sql="delete from `addcontact` where id=$id";
	$result=mysqli_query($con,$sql);

	if($result){
			// echo "Deleted Successfully!!";
		header('location:all-contact.php');
	}else{
		die(mysqli_error($con));
	}
}
?>