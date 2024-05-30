<?php 
include "koneksi.php";

// Fetch data from the database
$sql = mysqli_query($koneksi, "SELECT * FROM tbfillingmethod");
$data = mysqli_fetch_array($sql);

if ($data) {
    // Get automatic status
    $automatic = $data['automatic'];
    // Get mzanual status
    $manual = $data['manual'];
} else {
    $automatic = 0;
    $manual = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="custom.css" rel="stylesheet">
    
    <title>SMART AQUARIUM</title>

    <script type="text/javascript">
        function ubahstatus(value) {
            let statusValue = value ? 1 : 0;
            document.getElementById('status').innerHTML = value ? "ON" : "OFF";

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    console.log("Response from PHP (automatic): " + xmlhttp.responseText);
                } else if (xmlhttp.readyState == 4) {
                    console.log("Error: " + xmlhttp.status);
                }
            }

            xmlhttp.open("GET", "automatic.php?stat=automatic&value=" + statusValue, true);
            xmlhttp.send();
        }

        function ubahposisi(value) {
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    console.log("Response from PHP (manual): " + xmlhttp.responseText);
                } else if (xmlhttp.readyState == 4) {
                    console.log("Error: " + xmlhttp.status);
                }
            }

            xmlhttp.open("GET", "manual.php?pos=" + value, true);
            xmlhttp.send();
        }

        document.addEventListener('DOMContentLoaded', function () {
            const radioButtons = document.querySelectorAll('input[name="inlineRadioOptions"]');
            const switchInput = document.getElementById('flexSwitchCheckDefault');

            const savedRadioValue = localStorage.getItem('selectedRadio');
            if (savedRadioValue) {
                document.getElementById(savedRadioValue).checked = true;
            }

            const savedSwitchValue = localStorage.getItem('switchStatus');
            if (savedSwitchValue === 'true') {
                switchInput.checked = true;
                ubahstatus(true);
            } else {
                switchInput.checked = false;
                ubahstatus(false);
            }

            radioButtons.forEach(radio => {
                radio.addEventListener('change', function () {
                    if (this.checked) {
                        switchInput.checked = false;
                        ubahstatus(false);
                        ubahposisi(this.value);
                        localStorage.setItem('selectedRadio', this.id);
                        localStorage.setItem('switchStatus', 'false');
                    }
                });
            });

            switchInput.addEventListener('change', function () {
                if (this.checked) {
                    radioButtons.forEach(radio => {
                        radio.checked = false;
                    });
                    localStorage.setItem('selectedRadio', '');
                    localStorage.setItem('switchStatus', 'true');
                } else {
                    localStorage.setItem('switchStatus', 'false');
                }
                ubahstatus(this.checked);
            });
        });

    </script>

</head>

<body>
    <div class="masthead" style="background-image: url('./img/aquarium.png');">
        <div class="color-overlay d-flex justify-content-center align-items-center">
            <div class="container" style="text-align: center; padding-top: 25px;">
                <h1 class="bold-text" align="center" style="color: darkslateblue; font-size: 350%">FEED FILLING <br> METHOD</h1>
                <p class="bold-text" style="text-align: center; padding-top: 2px; font-size: 145%;">This page is to control <br> the fish feeding system.</p>
            </div>
        </div>
        <div class="container" style="display: flex; justify-content: center; padding-top: 85px">
            <!-- Kartu Manual -->
            <div class="card mb-3" style="width: 20rem; color: slateblue;">
                <div class="card-header" style="text-align: center; font-size: 150%; background-color: cornflowerblue; color: darkslateblue;">MANUAL</div>
                <div class="card-body">
                    <!-- Radio Button -->
                    <div class="form-check form-check-inline" style="display: flex; font-size: 20px; margin-left: 10px;">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="SMALL PORTION">
                        <label class="form-check-label" for="inlineRadio1">SMALL PORTION</label>
                    </div>
                    <div class="form-check form-check-inline" style="display: flex; font-size: 20px; margin-left: 10px;">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="MEDIUM PORTION">
                        <label class="form-check-label" for="inlineRadio2">MEDIUM PORTION</label>
                    </div>
                    <div class="form-check form-check-inline" style="display: flex; font-size: 20px; margin-left: 10px;">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="LARGE PORTION">
                        <label class="form-check-label" for="inlineRadio3">LARGE PORTION</label>
                    </div>
                </div>
            </div>

            <!-- Kartu Otomatis -->
            <div class="card mb-3" style="width: 20rem; margin-left: 20px; color: slateblue;">
                <div class="card-header" style="text-align: center; font-size: 150%; background-color: cornflowerblue; color: darkslateblue">AUTOMATIC</div>
                <div class="card-body">
                    <!-- Switch -->
                    <div class="form-check form-switch" style="justify-content: center; font-size: 50px; margin-left: 33px; margin-top: 7px;">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onchange="ubahstatus(this.checked)">
                        <label class="form-check-label" for="flexSwitchCheckDefault"> <span id="status">OFF</span> </label>
                    </div>
                    <!-- Akhir Switch -->
                </div>
            </div>

            <!-- Akhir Kartu Otomatis -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
