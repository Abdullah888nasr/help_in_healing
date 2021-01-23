<?php
$conn=mysqli_connect("localhost", "root", "", "help_in_healing");
if(!$conn){
	die("not connected : " . mysqli_connect_error($conn));
}
require_once "functions/functions.php";