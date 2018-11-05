<?php 
  $id = isset($_GET['id']) ? $_GET['id'] : false;


  $username =''; 
  $password =''; 
  $level =''; 
  $button = 'Add';

  if ($id) {
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user=$id");
    $row = mysqli_fetch_assoc($query);
    $username = $row['username']; 
    $password = $row['password']; 
    $level = $row['level']; 
    $button = 'Update';
  }

 ?>

<!-- page content -->
        <div class="right_col" role="main">
            <div class="page-title">
              <div class="title_left">
                <h3>Form User</h3>
              </div>

            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form data-parsley-validate class="form-horizontal form-label-left" action="action_user.php" method="post">
                    <input type="hidden" name="id_user"  value="<?php echo $id; ?>">


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_pelanggan">Username<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="username" class="form-control col-md-7 col-xs-12" placeholder="Username" value="<?php echo $username; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Password<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" name="password" required="required" class="form-control col-md-7 col-xs-12" placeholder="Password" value="<?php echo $password; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Level<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="level" class="form-control">
                            <option value=0 <?php if ($level == 0) echo 'selected'; ?>>User</option>
                            <option value=1 <?php if ($level == 1) echo 'selected'; ?>>Admin</option>
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