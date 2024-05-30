<?php
include "koneksi.php";

// Tangkap variabel 'pos' dari AJAX
$pos = $_GET['pos'];
$waktu = date("H:i:s");
$tanggal = date("Y-m-d");

// Ambil status terakhir dari database
$sql = mysqli_query($koneksi, "SELECT * FROM tbfillingmethod ORDER BY id DESC LIMIT 1");
$data = mysqli_fetch_assoc($sql);
$lastManual = $data['manual'];
$lastAutomatic = $data['automatic'];

// Hanya masukkan entri baru jika posisi manual berubah
if ($pos !== $lastManual) {
    // Jika posisi manual diatur, atur kolom manual dan reset otomatis
    if ($pos !== "") {
        $manual = $pos;
        $automatic = 0;
    } else {
        $manual = "-";
        $automatic = $lastAutomatic; // Retain the current automatic value
    }

    // Masukkan baris baru ke dalam database
    $query = "INSERT INTO tbfillingmethod (waktu, tanggal, manual, automatic) VALUES ('$waktu', '$tanggal', '$manual', '$automatic')";
    if(mysqli_query($koneksi, $query)) {
        echo "Data berhasil diinputkan!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "Tidak ada perubahan status manual.";
}
?>
