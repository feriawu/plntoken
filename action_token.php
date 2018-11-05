<?php 
	include_once('function/koneksi.php');
	include_once('function/helper.php');

	$delete = isset($_GET['delete']) ? $_GET['delete'] : false;
	$soft_delete = isset($_GET['soft_delete']) ? $_GET['soft_delete'] : false;

	if ($delete !== false) {
		mysqli_query($koneksi, "DELETE FROM token WHERE id='$delete'");
	}elseif($soft_delete !== false){
		$id = $_GET['id'];
		mysqli_query($koneksi, "UPDATE token SET status=$soft_delete WHERE id='$id'");
	}
		
	$id_token = $_POST['id_token'];
	$jumlah_kwh = $_POST['jumlah_kwh'];
	$harga = $_POST['harga'];
	$button = $_POST['button'];

	if ($button == 'Add') {
		$query = mysqli_query($koneksi, "INSERT INTO token (jumlah_kwh, harga, status) VALUES('".$jumlah_kwh."', '".$harga."', 1)");
	}elseif ($button == 'Update') {
		$id_token = $_POST['id_token'];
		mysqli_query($koneksi, "UPDATE token SET jumlah_kwh='$jumlah_kwh', harga='$harga' WHERE id=$id_token");
	}
		
	header("location: ".base_url."?page=data_token");
 ?>