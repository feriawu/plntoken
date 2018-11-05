<?php 
  $id = isset($_GET['id']) ? $_GET['id'] : false;


  $jumlah_kwh =''; 
  $harga =''; 
  $button = 'Add';

  if ($id) {
    $query = mysqli_query($koneksi, "SELECT * FROM token WHERE id=$id");
    $row = mysqli_fetch_assoc($query);
    $jumlah_kwh = $row['jumlah_kwh']; 
    $harga = $row['harga']; 
    $button = 'Update';
  }

 ?>

<!-- page content -->
        <div class="right_col" role="main">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Pelanggan</h3>
              </div>

            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form data-parsley-validate class="form-horizontal form-label-left" action="action_token.php" method="post">
                    <input type="hidden" name="id_token"  value="<?php echo $id; ?>">


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_pelanggan">Jumlah kWh<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="jumlah_kwh" class="form-control col-md-7 col-xs-12" placeholder="Jumlah kWh" value="<?php echo $jumlah_kwh; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Harga<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="harga" required="required" class="form-control col-md-7 col-xs-12" placeholder="Harga" value="<?php echo $harga; ?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input class="btn btn-lg btn-primary btn-block" type="submit" value="<?php echo $button; ?>" name="button">
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>