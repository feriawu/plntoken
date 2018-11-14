<?php 
	session_start();
	include_once('function/helper.php');

	$id_pelanggan = $_POST['id_pelanggan'];

	// session_unset($_SESSION['id_pelanggan']);
	
	$_SESSION["id_pelanggan"] = $id_pelanggan;
	// session_destroy();
	header("location: ".base_url."?page=transaksi_lanjut");
 ?>