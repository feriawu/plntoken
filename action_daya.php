<?php 
	include_once('function/koneksi.php');
	include_once('function/helper.php');

	$delete = isset($_GET['delete']) ? $_GET['delete'] : false;

	if ($delete !== false) {
		mysqli_query($koneksi, "DELETE FROM daya WHERE id='$delete'");
	}
		
	$id_daya = $_POST['id_daya'];
	$nama_daya = $_POST['nama_daya'];
	$ket = $_POST['ket'];
	$button = $_POST['button'];

	if ($button == 'Add') {
		$query = mysqli_query($koneksi, "INSERT INTO daya (nama_daya, ket) VALUES('".$nama_daya."', '".$ket."')");
	}elseif ($button == 'Update') {
		$id_token = $_POST['id_token'];
		mysqli_query($koneksi, "UPDATE daya SET nama_daya='$nama_daya', ket='$ket' WHERE id=$id_daya");
	}
		
	header("location: ".base_url."?page=data_daya");
 ?>