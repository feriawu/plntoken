<?php 
  include_once('function/koneksi.php');
  include_once('function/helper.php');

  $null_token = isset($_SESSION['null_token']) ? $_SESSION['null_token'] : false;

  $id_pelanggan = isset($_SESSION['id_pelanggan']) ? $_SESSION['id_pelanggan'] : false;

  if ($id_pelanggan) {
      $query = mysqli_query($koneksi, "SELECT pelanggan.*, daya.nama_daya FROM pelanggan JOIN daya ON pelanggan.daya_id=daya.id WHERE pelanggan.id='$id_pelanggan'");
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
              <h2>Data Pelanggan</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-2">
                <h3>
                  ID Pelanggan<br>
                  No Meter<br>
                  Nama<br>
                  Alamat<br>
                  Daya<br>
               </h3>
              </div>
              <div class="col-md-10">
                <h3>
                 : <?php echo $id_pelanggan; ?><br>
                 : <?php echo $no_meter; ?><br>
                 : <?php echo $nama; ?><br>
                 : <?php echo $alamat; ?><br>
                 : <?php echo $daya; ?><br>
                </h3>
              </div>
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
              <form data-parsley-validate class="form-horizontal form-label-left" action="action_transaksi.php" method="post">
                <input type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="token">Token *</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                  <?php if ($null_token): ?>
                    <p><?php echo $null_token; ?></p>
                    <?php session_unset($_SESSION['null_token']); ?>
                  <?php endif ?>
                  
                    <select id="token_id" name="token_id" class="form-control">
                      <option value=0>Pilih Token</option>
                        <?php $query = mysqli_query($koneksi, "SELECT id, harga FROM token"); ?>
                        <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo rupiah($row['harga']); ?></option>
                        <?php endwhile; ?>
                      </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="materai">Materai</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="materai" name="materai" class="form-control">
                        <option value=0>Materai (optional)</option>
                        <option value=3000><?php echo rupiah(3000); ?></option>
                        <option value=6000><?php echo rupiah(6000); ?></option>
                      </select>
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a class="btn btn-lg btn-default" href="<?php echo base_url."?page=transaksi"; ?>">Cancel</a>
                    <input class="btn btn-lg btn-primary" type="submit" value="Bayar" name="button">
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