<?php
include "koneksi.php";

// Tangkap parameter 'stat' dan 'value' dari AJAX
$stat = $_GET['stat'];
$value = $_GET['value'];
$waktu = date("H:i:s");
$tanggal = date("Y-m-d");

// Ambil status terakhir dari database
$sql = mysqli_query($koneksi, "SELECT * FROM tbfillingmethod ORDER BY id DESC LIMIT 1");
$data = mysqli_fetch_assoc($sql);
$lastAutomatic = $data['automatic'];
$lastManual = $data['manual'];

// Hanya masukkan entri baru jika status otomatis berubah
if ($value != $lastAutomatic) {
    // Jika otomatis diaktifkan, atur kolom otomatis dan reset manual
    if ($value == 1) {
        $automatic = 1;
        $manual = "-";
    } else {
        $automatic = 0;
        $manual = "-"; // Tetap atur manual ke "-"
    }

    // Masukkan baris baru ke dalam database
    $query = "INSERT INTO tbfillingmethod (waktu, tanggal, manual, automatic) VALUES ('$waktu', '$tanggal', '$manual', '$automatic')";
    if(mysqli_query($koneksi, $query)) {
        echo "Data berhasil diinputkan!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "Tidak ada perubahan status automatic.";
}
?>
