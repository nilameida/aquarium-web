<?php
    //include koneksi
    include "koneksi.php";

    $sql = mysqli_query($koneksi, "SELECT * FROM tbfillingmethod");
    $data = mysqli_fetch_array($sql);
    $manual = $data['manual'];

    //respon balik ke nodemcu
    echo $manual; //nilai hanya bernilai 1 atau 0
?>