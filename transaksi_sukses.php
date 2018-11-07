<?php 
	
	include_once('function/helper.php');
	include_once('function/koneksi.php');

	isset($_SESSION['id_pelanggan']) ? session_unset($_SESSION['id_pelanggan']) : false;

	$transaksi_id = $_GET['transaksi_id'];

	$query = mysqli_query($koneksi, "SELECT transaksi.*, pelanggan.*, token.harga, token.jumlah_kwh, daya.nama_daya FROM transaksi JOIN token ON transaksi.token_id=token.id JOIN pelanggan ON pelanggan.id=transaksi.pelanggan_id JOIN daya ON pelanggan.daya_id=daya.id WHERE transaksi.no_ref=$transaksi_id");
	$row = mysqli_fetch_assoc($query);

	// $no_ref = $row['no_ref'];
	// $nama = $row['nama'];
	// $no_meter = $row['no_meter'];
	// $pelanggan_id = $row['pelanggan_id'];
	// $daya = $row['nama_daya'];
	// $total_harga = $row['total_harga'];
	// $tgl_pembelian = $row['tgl_pembelian'];
	// $admin_bank = $row['admin_bank'];
	// $materai = $row['materai'];
	// $ppn = $row['ppn'];
	// $ppj = $row['ppj'];
	// $harga_token = $row['harga'];
	// $jumlah_kwh = $row['jumlah_kwh'];
 ?>

 <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Transaksi</h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Kwitansi Transaksi</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-2">
                <h4>
                  No Ref<br>
                  ID Pelanggan<br>
                  No Meter<br>
                  Nama<br>
                  Alamat<br>
                  Daya<br>
                  Jumlah kWh
               </h4>
              </div>
              <div class="col-md-4">
                <h4>
                 : <?php echo md5($row['no_ref']); ?><br>
                 : <?php echo $row['pelanggan_id']; ?><br>
                 : <?php echo $row['no_meter']; ?><br>
                 : <?php echo $row['nama']; ?><br>
                 : <?php echo $row['alamat']; ?><br>
                 : <?php echo $row['nama_daya']; ?><br>
                 : <?php echo $row['jumlah_kwh']; ?><br>
                </h3>
              </div>

              <div class="col-md-2">
                <h4>
                  Tanggal Beli<br>
                  Token<br>
                  Admin Bank<br>
                  Materai<br>
                  PPN<br>
                  PPJ<br>
                  Total Bayar<br>
               </h4>
              </div>
              <div class="col-md-4">
                <h4>
                 : <?php echo $row['tgl_pembelian']; ?><br>
                 : <?php echo rupiah($row['harga']); ?><br>
                 : <?php echo rupiah($row['admin_bank']); ?><br>
                 : <?php echo rupiah($row['materai']); ?><br>
                 : <?php echo rupiah($row['ppn']); ?><br>
                 : <?php echo rupiah($row['ppj']); ?><br>
                 : <?php echo rupiah($row['total_harga']); ?><br>
                </h4>
              </div>
              <div class="col-12">
              	<h1><strong><?php echo "STROOM TOKEN : ".$row['kode_token']; ?><strong></h1>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->