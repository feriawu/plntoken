<?php 
  include_once('function/koneksi.php');
  include_once('function/helper.php');

  session_start();
  $id_pelanggan = $_SESSION['id_pelanggan'];

  if ($id_pelanggan) {
      $query = mysqli_query($koneksi, "SELECT pelanggan.*, daya.nama_daya FROM pelanggan JOIN daya ON pelanggan.daya_id=daya.id WHERE id=$id_pelanggan");
      $row = mysqli_fetch_assoc($query);

      $id = $row['id'];
      $no_meter = $row['no_meter'];
      $nama = $row['nama'];
      $alamat = $row['alamat'];
      $daya = $row['nama_daya'];
    }  
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
              <h2>Menu Transaksi</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
              ID Pelanggan : <?php echo $id_pelanggan; ?><br>
              No Meter : <?php echo $no_meter; ?><br>
              Nama : <?php echo $nama; ?><br>
              Alamat : <?php echo $alamat; ?><br>
              Daya : <?php echo $daya; ?><br>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Menu Transaksi</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
              <form data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url."?page=transaksi_lanjut.php"; ?>" method="post">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Cari ID Pelanggan</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="search_pelanggan" name="id_pelanggan" class="form-control">
                        <?php $query = mysqli_query($koneksi, "SELECT id, nama FROM pelanggan"); ?>
                        <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['id'].' | '.$row['nama']; ?></option>
                        <?php endwhile; ?>
                      </select>
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="cari" name="button">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->