<?php
	session_start();  
	include_once('function/helper.php');
	include_once('function/koneksi.php');
	

	$button = $_POST['button'];

	$id_pelanggan = $_POST['id_pelanggan'];
	$token_id = $_POST['token_id'];
	$materai = isset($_POST['materai']) ? $_POST['materai'] : 0;

	if ($token_id == 0) {
		$_SESSION['null_token'] = "Token Tidak Boleh Kosong";
		header("location: ".base_url."?page=transaksi_lanjut");
	}

	
	$query = mysqli_query($koneksi, "SELECT * FROM token WHERE id = $token_id");
	$row = mysqli_fetch_assoc($query);
	if ($row['harga'] == 20000) {
		$admin_bank = 2000;
		$ppn = 0;
		$ppj = 500;
	}elseif ($row['harga'] == 50000) {
		$admin_bank = 3000;
		$ppn = 500;
		$ppj = 500;
	}elseif ($row['harga'] == 100000) {
		$admin_bank = 3500;
		$ppn = 1000;
		$ppj = 500;
	}

	$total_harga = $row['harga'] + $admin_bank + $ppn + $ppj + $materai;

	$kode_token[0] = rand(1000, 9999);
	$kode_token[1] = rand(1000, 9999);
	$kode_token[2] = rand(1000, 9999);
	$kode_token[3] = rand(1000, 9999);

	$kode = implode(" ", $kode_token);

	mysqli_query($koneksi, "INSERT INTO transaksi (pelanggan_id, token_id, kode_token, admin_bank, materai, ppn, ppj, total_harga) VALUES ('".$id_pelanggan."', '".$token_id."', '".$kode."', '".$admin_bank."', '".$materai."', '".$ppn."', '".$ppj."', '".$total_harga."')");

	$max = mysqli_query($koneksi, "SELECT max(no_ref) FROM transaksi");
	$row = mysqli_fetch_assoc($max);
	$transaksi_id = $row['max(no_ref)'];

	header("location: ".base_url."?page=transaksi_sukses&transaksi_id=$transaksi_id");


?>