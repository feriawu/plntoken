<?php 
  $id = isset($_GET['id']) ? $_GET['id'] : false;


  $nama =''; 
  $alamat =''; 
  $daya_id ='';
  $button = 'Add';

  if ($id) {
    $query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id=$id");
    $row = mysqli_fetch_assoc($query);
    $nama = $row['nama']; 
    $alamat = $row['alamat']; 
    $daya_id = $row['daya_id'];
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
                    <form data-parsley-validate class="form-horizontal form-label-left" action="action_pelanggan.php" method="post">
                    <input type="hidden" name="id_pelanggan"  value="<?php echo $id ?>">


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_pelanggan">ID Pelanggan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php if ($id): ?>
                          <input type="text" name="id_pelanggan" class="form-control col-md-7 col-xs-12" placeholder="Edit ID" value="<?php echo $id ?>" disabled>
                        <?php else: ?>
                          <input type="text" name="prefix" value="201830006262" disabled class="form-control">
                          <input type="text" name="id_pelanggan" required="required" class="form-control col-md-7 col-xs-12" placeholder="4 Digit Angka">
                        <?php endif ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Pelanggan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nama Pelanggan" value="<?php echo $nama ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="alamat" required="required" class="form-control col-md-7 col-xs-12" placeholder="Alamat Pelanggan" value="<?php echo $alamat ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Daya <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="daya_id" class="form-control">
                              <?php $query = mysqli_query($koneksi, "SELECT id, nama_daya FROM daya"); ?>
                                <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                                  <option value='<?php echo $row['id']; ?>' <?php if ($daya_id == $row['id']) echo 'selected="true"'; ?>><?php echo $row['nama_daya']; ?></option>
                                <?php endwhile; ?>
                            </select>
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