<?php
	//include koneksi
	include "koneksi.php";

	//tangkap parameter stat yang dikirim dari ajax
	$stat = $_GET['stat'];
	if($stat=="ON")
	{
		//ubah field relay menjadi 1
		mysqli_query($konek, "UPDATE tbwaterstatus SET kontrol=1");

		//berikan respon
		echo "ON";
	}
	else
	{
		//ubah field relay menjadi 1
		mysqli_query($konek, "UPDATE tbwaterstatus SET kontrol=0");

		//berikan respon
		echo "OFF";		
	}
?>