<?php 
	include_once('function/koneksi.php');
	include_once('function/helper.php');

	$id_pelanggan = $_POST['id_pelanggan'];

	session_start();
	$_SESSION["id_pelanggan"] = $id_pelanggan;
	header("location: ".base_url."?page=transaksi_lanjut");
 ?>