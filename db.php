<?php 
$server   = "localhost";  // Change this to correspond with your database port
$username   = "muniru";      // Change if use webhost online
$password   = "";
$DB     = "qlda";      // database name

$connection = mysqli_connect($server, $username, $password, $DB);

if(!$connection) {
	die("Database conection failed!");
}
?>