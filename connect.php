<!-- PHP CODE -->

<?php

$con= new mysqli('localhost','admin','Admin@123', 'crudoperation');

if(!$con){
	die(mysqli_error($con));
}

?>