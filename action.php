<?php  

	include_once('koneksi.php');
	
	session_start();

	$button = $_POST['button'];

	$id_pelanggan = $_POST['id_pelanggan'];
	$token_id = $_POST['stroom'];
	$materai = $_POST['materai'];
	$angsuran = $_POST['angsuran'];

	if ($button == "Search") {
		$query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id=$id_pelanggan");
		if ($id_pelanggan==null) {
			header("location: "."http://localhost/pweb_to3/index.php");
			$_SESSION['null_input'] = "Input Tidak Boleh Kosong";
		}elseif (mysqli_num_rows($query)==null) {
			header("location: "."http://localhost/pweb_to3/index.php");
			$_SESSION['null_pelanggan'] = "Pelanggan ID Tidak Ditemukan";

		}else{
			header("location: "."http://localhost/pweb_to3/menu.php?id_pelanggan=$id_pelanggan");
		}
	}else{
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

		if ($angsuran > 0) {
			$total_harga -=$angsuran;
		}

		mysqli_query($koneksi, "INSERT INTO transaksi (pelanggan_id, token_id, admin_bank, materai, ppn, ppj, angsuran, total_harga) VALUES ('".$id_pelanggan."', '".$token_id."', '".$admin_bank."', '".$materai."', '".$ppn."', '".$ppj."', '".$angsuran."', '".$total_harga."')");

		mysqli_query($koneksi, "UPDATE token SET status = 0 WHERE id=$token_id");

		$max = mysqli_query($koneksi, "SELECT max(no_ref) FROM transaksi");
		$row = mysqli_fetch_assoc($max);
		$transaksi_id = $row['max(no_ref)'];

		header("location: "."http://localhost/pweb_to3/sukses.php?transaksi_id=$transaksi_id");

	}

?>