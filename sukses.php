<?php 
	
	include_once('koneksi.php');

	$transaksi_id = $_GET['transaksi_id'];

	$query = mysqli_query($koneksi, "SELECT transaksi.*, pelanggan.*, token.*, daya.nama_daya FROM transaksi JOIN pelanggan ON pelanggan.id=transaksi.pelanggan_id JOIN token ON token.id=transaksi.token_id JOIN daya ON pelanggan.daya_id=daya.id WHERE transaksi.no_ref=$transaksi_id");
	$row = mysqli_fetch_assoc($query);

	$no_ref = $row['no_ref'];
	$nama = $row['nama'];
	$no_meter = $row['no_meter'];
	$pelanggan_id = $row['pelanggan_id'];
	$daya = $row['nama_daya'];
	$total_harga = $row['total_harga'];
	$token = $row['stroom_token'];
	$tgl_pembelian = $row['tgl_pembelian'];
	$admin_bank = $row['admin_bank'];
	$materai = $row['materai'];
	$ppn = $row['ppn'];
	$ppj = $row['ppj'];
	$stroom = $row['harga'];
	$angsuran = $row['angsuran'];
	$jumlah_kwh = $row['jumlah_kwh'];


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Pembelian Listrik Prabayar</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<style type="text/css">
		body{
			font-family: arial;
			font-size: 17px;
		}
	</style>
</head>
<body class="bg-dark">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 mx-auto my-5 bg-light px-3 py-3">

				<header>
					<h1 class="text-center">Struk Pembelian Listrik Prabayar</h1>
				</header>

				<table>
					<tr>
						<td>Nomor Meter </td>
						<td>: <?php echo $no_meter; ?></td>
					</tr>

					<tr>
						<td>ID Pelanggan </td>
						<td>: <?php echo $pelanggan_id; ?></td>
					</tr>

					<tr>
						<td>Nama </td>
						<td>: <?php echo $nama; ?></td>
					</tr>

					<tr>
						<td>Tarif/Daya </td>
						<td>: <?php echo $daya; ?></td>
					</tr>

					<tr>
						<td>No. Ref </td>
						<td>: <?php echo md5($no_ref); ?></td>
					</tr>

				</table>
				<hr>

				<table>
					<tr>
						<td>Tanggal Pembelian </td>
						<td>: <?php echo $tgl_pembelian; ?></td>
					</tr>

					<tr>
						<td>Admin Bank </td>
						<td>: <?php echo $admin_bank; ?></td>
					</tr>

					<tr>
						<td>Materai </td>
						<td>: <?php echo $materai; ?></td>
					</tr>

					<tr>
						<td>PPN </td>
						<td>: <?php echo $ppn; ?></td>
					</tr>

					<tr>
						<td>PPJ </td>
						<td>: <?php echo $ppj; ?></td>
					</tr>

					<tr>
						<td>Angsuran </td>
						<td>: <?php echo $angsuran; ?></td>
					</tr>

					<tr>
						<td>Stroom </td>
						<td>: <?php echo $stroom; ?></td>
					</tr>

					<tr>
						<td>Jumlah KWH </td>
						<td>: <?php echo $jumlah_kwh; ?></td>
					</tr>

					<tr>
						<td>Token </td>
						<td>: <?php echo $token; ?></td>
					</tr>

					<tr>
						<td><b>RP Bayar </b></td>
						<td><b>: <?php echo $total_harga; ?></b></td>
					</tr>
				</table>
				<a class="btn btn-block btn-primary" href="index.php">Kembali ke Menu Awal</a>
			</div>

		</div>
		
	</div>
</body>
</html>