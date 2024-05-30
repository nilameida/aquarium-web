<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Data</title>
</head>
<body>

<?php
    include('koneksi.php');

    date_default_timezone_set('Asia/Jakarta');
    $waktu = date("H:i:s");
    $tanggal = date("d F Y"); // Mengubah $kondisi menjadi $tanggal
    $suhu = isset($_GET['suhu']) ? $_GET['suhu'] : null; // Memeriksa apakah suhu diset sebelum mengaksesnya

    // Inisialisasi variabel kontrol
    $kontrol = 0; // Mengatur nilai default menjadi 0 (OFF)

    if ($suhu !== null) {
        if ($suhu < 26) {
            $kondisi = "SUHU AIR RENDAH";
        } else if ($suhu >= 30) {
            $kondisi = "SUHU AIR TINGGI";
            // Mengaktifkan switch otomatis
            $kontrol = 1; // Mengatur nilai menjadi 1 (ON)
        } else {
            $kondisi = "SUHU AIR NORMAL";
            // Menonaktifkan switch otomatis, tetap 0 (OFF)
        }

        $kirim = mysqli_query($koneksi, "INSERT INTO tbwaterstatus (waktu, tanggal, suhu, kondisi, kontrol) VALUES ('$waktu','$tanggal','$suhu','$kondisi','$kontrol')");

        if ($kirim) {
            echo "Data berhasil diinputkan!";
        } else {
            echo "Data gagal diinputkan!";
        }
    } else {
        echo "Parameter suhu tidak diset.";
    }

?>
</body>
</html>
