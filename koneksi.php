<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "website";

$koneksi = mysqli_connect($server, $username, $password, $database);
	if (mysqli_connect_error()) {
    	die("Database connection failed: " . mysqli_connect_error());
	}
?>
