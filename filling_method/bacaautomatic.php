<?php
// include koneksi
include "koneksi.php";

// cek koneksi
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// jalankan query
$sql = mysqli_query($koneksi, "SELECT * FROM tbfillingmethod");
if (!$sql) {
    die("Query gagal dijalankan: " . mysqli_error($koneksi));
}

$data = mysqli_fetch_array($sql);
$automatic = $data['automatic'];

// respon balik ke nodemcu
echo $automatic; // nilai hanya bernilai 1 atau 0
?>