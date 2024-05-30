<?php
include "koneksi.php";

$waktu = date("H:i:s");
$tanggal = date("d F Y");
$manual = $_POST['manual']; // atau nilai default jika perlu
$automatic = $_POST['automatic']; // atau nilai default jika perlu

$kirim = mysqli_query($koneksi, "INSERT INTO tbfillingmethod (waktu, tanggal, manual, automatic) VALUES ('$waktu', '$tanggal', '$manual', '$automatic')");

if ($kirim) {
    echo "Data berhasil diinputkan!";
} else {
    echo "Data gagal diinputkan!";
}
?>
