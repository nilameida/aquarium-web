<!DOCTYPE html>
<html lang="en">
	<head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	    <link href="custom.css" rel="stylesheet">

	    <!-- Nama Halaman Website -->
		<title>SMART AQUARIUM</title>
	</head>

<body>
    <div
    	class="masthead"
    	style="background-image: url('./img/aquarium.png');"
    >
    <div class="color-overlay d-flex justify-content-center align-items-center">

	<!-- Judul -->
    <div class="container" style="text-align: center; padding-top: 25px;">

    	<h1 class="h1" align="center" style="color: darkslateblue;">SMART AQUARIUM <br> MONITORING WEBSITE</h1>

    <!-- Keterangan -->
	<p class="ket" style="text-align: center; padding-top: 10px; font-size: 20px;">This website is for controlling feeding equipment <br> and monitoring aquarium water temperature.</p>

    </div>
    </div>

	    <!-- Kartu Menu-->
	    <div class="container" style="display: flex; justify-content: center; padding-top: 125px">
			<div class="card bg-info mb-3" style="width: 20rem;">
			  <div class="card-header" style="text-align: center; font-size: 150%; background-color: dodgerblue;">MENU</div>
			  <div class="card-body">

			  <!-- Menu Button 1 -->
			  <div class="btn-group" style="display: flex;">
			  	<button type="button" class="btn btn-primary" onclick="window.open('./filling_method/filling_method.php', '_blank')">FEED FILLING METHOD</button>
			  </div>


			  <!-- Menu Button 2 -->
			  <div class="btn-group" style="display: flex; padding-top:10px">
			  	<button type="button" class="btn btn-primary" onclick="window.open('./water_status/index.php', '_blank')">WATER QUALITY STATUS</button>
			  </div>

			  </div>
			</div>
		</div>
    </div>



    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>