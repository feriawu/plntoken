<?php 
	session_start();

	include_once('koneksi.php');

	$id_pelanggan = $_GET['id_pelanggan'];

	$null_pelanggan = isset($_SESSION['null_pelanggan']) ? $_SESSION['null_pelanggan'] : false;

	$query = mysqli_query($koneksi, "SELECT * FROM pelanggan JOIN daya ON pelanggan.daya_id=daya.id WHERE pelanggan.id=$id_pelanggan");
	$row = mysqli_fetch_assoc($query);

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
			<div class="col-md-8 mx-auto my-5 bg-light px-3 py-3">

				<header>
					<h1 class="text-center">Pembelian Listrik Prabayar</h1>
				</header>

				<hr>
				<h5>
					ID Pelanggan : <?php echo $id_pelanggan; ?>
					<br>
					Nomor Meter : <?php echo $row['no_meter']; ?>
					<br>
					Nama : <?php echo $row['nama']; ?>
					<br>
					Daya : <?php echo $row['nama_daya']; ?>
					<br>

				</h5>
				<hr>

				<form class="form" action="action.php" method="POST">

					<input type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>">

					<div class="form-group">
					    <select name="stroom" class="custom-select">
					      <option selected="" value="0">Stroom</option>
					      <?php 
					      	$queryToken=mysqli_query($koneksi, "SELECT * FROM token WHERE status=1 ORDER BY harga ASC");
					      	foreach ($queryToken as $token) {
					      		echo "<option value='$token[id]'>$token[harga] | $token[stroom_token]</option>";
					      	}
					       ?>
					    </select>
					</div>

					<div class="form-group">
					    <select name="materai" class="custom-select">
					      <option selected="" value="0">Materai (Kosongi jika tidak perlu)</option>
					      <option value="6000">Rp, 6,000</option>
					      <option value="12000">Rp, 12,000</option>
					    </select>
					</div>
					<div class="form-group">
						<input class="form-control" type="number" name="angsuran" placeholder="Angsuran (Kosongi jika tidak perlu)">	
					</div>

					<input class="btn btn-primary btn-block" type="submit" name="button" value="Bayar">
				</form>


				
			</div>

		</div>
		
	</div>
</body>
</html>