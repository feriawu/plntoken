<?php 
	include_once('function/koneksi.php');
	include_once('function/helper.php');

	$delete = isset($_GET['delete']) ? $_GET['delete'] : false;
	$soft_delete = isset($_GET['soft_delete']) ? $_GET['soft_delete'] : false;

	if ($delete !== false) {
		mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id='$delete'");
	}elseif($soft_delete !== false){
		$id = $_GET['id'];
		mysqli_query($koneksi, "UPDATE pelanggan SET status=$soft_delete WHERE id='$id'");
	}
		
	$id_pelanggan = '201830006262'.$_POST['id_pelanggan'];
	$no_meter = '1437303'.$_POST['id_pelanggan'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$daya_id = $_POST['daya_id'];
	$button = $_POST['button'];

	if ($button == 'Add') {
		$query = mysqli_query($koneksi, "INSERT INTO pelanggan VALUES('".$id_pelanggan."', '".$no_meter."', '".$nama."', '".$alamat."', '".$daya_id."', 1)");
	}elseif ($button == 'Update') {
		$id_pelanggan = $_POST['id_pelanggan'];
		mysqli_query($koneksi, "UPDATE pelanggan SET nama='$nama', alamat='$alamat', daya_id='$daya_id' WHERE id='$id_pelanggan'");
	}
		
	header("location: ".base_url."?page=data_pelanggan");
 ?>