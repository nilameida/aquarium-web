<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "website";

$koneksi = mysqli_connect($server, $username, $password, $database);

if (mysqli_connect_error()) {
    die("Database gagal terhubung: " . mysqli_connect_error());
}

date_default_timezone_set('Asia/Jakarta');
?>
