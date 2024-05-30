<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link href="custom.css" rel="stylesheet">
    <!-- Nama Halaman Website -->
    <title>SMART AQUARIUM</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    function ubahstatus(value) {
        if(value==true) value="ON";
        else value= "OFF";
        document.getElementById('status').innerHTML = value;

        //ajax untuk mengubah status relay
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function()
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
            {
                //ambil respon dari web setelah berhasil mengubah nilai
                document.getElementById('status').innerHTML = xmlhttp.responseText;
            }
        }
        //eksekusi file PHP untuk mengubah nilai di database
        xmlhttp.open("GET", "relay.php?stat=" + value, true);
        //kirim data
        xmlhttp.send();
    }
</script>

<!-- baca status terakhir relay -->
<?php  
    //include koneksi
    include "koneksi.php";

    $sql = mysqli_query($koneksi, "SELECT * FROM tbwaterstatus LIMIT 1");
    while ($data = mysqli_fetch_array($sql)){

    //ambil status relay
    $kontrol = $data['kontrol'];
?>

<body>
    <div class="masthead" style="background-image: url('./img/aquarium.png');">
        <div class="color-overlay d-flex justify-content-center align-items-center">
            <!-- Judul -->
            <div class="container" style="text-align: center; padding-top: 25px;">
                <h1 class="bold-text" align="center" style="color: darkslateblue; font-size: 350%">WATER QUALITY <br> STATUS</h1>
                <!-- Keterangan -->
                <p class="bold-text" style="text-align: center; padding-top: 2px; font-size: 145%;">This page is for monitoring <br> aquarium water temperature.</p>
            </div>
        </div>

        <!-- Tampilan Kartu -->
        <div class="container" style="display: flex; justify-content: center; padding-top: 85px">

            <!-- Kartu Suhu -->
            <div class="card mb-3" style="width: 12rem; color: slateblue; text-align: center;">
                <div class="card-header" style="text-align: center; font-size: 150%; background-color: cornflowerblue; color: darkslateblue;">SUHU AIR</div>
                <div class="card-body">
                    <div class="nilai1" style="font-size: 45px;">
                        <?php
                            include "koneksi.php";

                            $query = mysqli_query($koneksi, "SELECT * FROM tbwaterstatus ORDER BY id DESC LIMIT 1");
                            if ($data = mysqli_fetch_array($query)) {
                                $suhu = floatval($data['suhu']); // Konversi suhu ke float
                                echo $suhu . '<font size="50px">°C</font>';
                            } else {
                                echo "N/A";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Akhir Kartu Suhu -->

            <!-- Kartu Kondisi Air-->
            <div class="card mb-3" style="width: 30rem; margin-left: 20px; color: slateblue; text-align: center;">
                <div class="card-header" style="background-color: cornflowerblue; color: darkslateblue; font-size: 150%;">KONDISI AIR</div>
                <div class="card-body" style="text-align:center;">
                    <div class="nilai2" style="font-size:240%; color: slateblue; padding-top:5px">
                        <?php
                            include "koneksi.php";

                            $query = mysqli_query($koneksi, "SELECT * FROM tbwaterstatus ORDER BY id DESC LIMIT 1");
                            if ($data) {
                                echo $data['kondisi'];
                            } else {
                                echo "N/A";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Akhir Kartu Kondisi Air -->

            <!-- Kartu Otomatis-->
            <div class="card mb-3" style="width: 17rem; margin-left: 20px; color: slateblue">
                <div class="card-header" style="text-align: center; font-size: 150%; background-color: cornflowerblue; color: darkslateblue">AUTOMATIC</div>
                <div class="card-body">
                    <!-- Switch -->
                    <div class="form-check form-switch" style="font-size: 50px; margin-left: 10px">
                        <input class="form-check-input form-check-switch" type="checkbox" id="flexSwitchCheckDefault" onchange="ubahstatus(this.checked)" <?php if($kontrol==1) echo "checked"; ?><?php echo ($data['suhu'] >= 30) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="flexSwitchCheckDefault">
                            <span id="status">
                                <?php
                                    include "koneksi.php";

                                    $query = mysqli_query($koneksi, "SELECT * FROM tbwaterstatus ORDER BY id DESC LIMIT 1");
                                    if ($data['suhu'] >= 30) {
                                        echo "ON";
                                        echo '<style> #switch-led {background-color: blue;}</style>';
                                    } else {
                                        echo "OFF";
                                        echo '<style> #switch-led {background-color: grey;}</style>';
                                    }
                                ?>
                            </span>
                        </label>
                    </div>
                    <!-- Akhir Switch -->
                </div>
            </div>
            <!-- Akhir Kartu Otomatis -->
        </div>
        <!-- Akhir Tampilan Kartu -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<body>
    <center>
        <div id="konten"></div>
    </center>
<?php } ?>
</body>
</html>
