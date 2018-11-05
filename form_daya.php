<?php 
  $id = isset($_GET['id']) ? $_GET['id'] : false;


  $nama_daya =''; 
  $ket =''; 
  $button = 'Add';

  if ($id) {
    $query = mysqli_query($koneksi, "SELECT * FROM daya WHERE id=$id");
    $row = mysqli_fetch_assoc($query);
    $nama_daya = $row['nama_daya']; 
    $ket = $row['ket']; 
    $button = 'Update';
  }

 ?>

<!-- page content -->
        <div class="right_col" role="main">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Daya</h3>
              </div>

            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form data-parsley-validate class="form-horizontal form-label-left" action="action_daya.php" method="post">
                    <input type="hidden" name="id_daya"  value="<?php echo $id; ?>">


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_pelanggan">Nama Daya<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama_daya" class="form-control col-md-7 col-xs-12" placeholder="Nama Daya" value="<?php echo $nama_daya; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Keterangan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="ket" required="required" class="form-control col-md-7 col-xs-12" placeholder="Keterangan" value="<?php echo $ket; ?>">
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