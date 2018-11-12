<?php if ($logged_in['level'] == 0): ?>
  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
                <h3 align="center"> You Have No Permission to open this page</h3>
              </div>
            </div>
          </div>
        </div>
 <?php else: ?>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Users <small>Master Data Users</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel Data Users</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Informasi Data Users
                    </p>
                    <a class="btn btn-primary" href="<?php echo base_url.'?page=form_user' ?>">+ Add New User</a>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Username</th>
                          <!-- <th>Password</th> -->
                          <th>Level</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php
                      $no = 1; 
                      $query = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id_user DESC"); ?>
                      <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                      <?php if ($row['level'] == 0) {
                        $level = 'User';
                      }else{
                        $level = 'Admin';
                      } ?>

                       <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $row['username']; ?></td>
                          <!-- <td><?php echo $row['password'];  ?></td> -->
                          <td><?php echo $level; ?></td>
                          <td><a title="Edit" class='btn btn-sm btn-info' href='<?php echo base_url."?page=form_user&id=$row[id_user]"; ?>'><i class='fa fa-edit'></i></a>
                            <?php if ($row['status'] == 0): ?>
                              <a title="Non Aktif" class='btn btn-sm btn-default' href='<?php echo base_url."/action_user.php?id=$row[id_user]&soft_delete=1"; ?>'><i class='fa fa-toggle-off'></i></a>
                            <?php else: ?>
                              <a title="Aktif" class='btn btn-sm btn-success' href='<?php echo base_url."/action_user.php?id=$row[id_user]&soft_delete=0"; ?>'><i class='fa fa-toggle-on'></i></a>
                            <?php endif; ?>
                              <button title="Hapus permanen" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal"><i class='fa fa-trash'></i></button>

                              <!-- Modal -->
                              <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Prompt</h4>
                                    </div>
                                    <div class="modal-body">
                                      <p>Anda yakin ingin menghapus data token ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                      <a class='btn btn-sm btn-danger' href='<?php echo base_url."/action_user.php?delete=$row[id_user]"; ?>'>Hapus</a>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                          </td>
                        </tr>
                        <?php $no++; ?>
                      <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php endif; ?>

        <script type="text/javascript">
          $(document).ready(function(){
            $('#datatable').DataTable();
          })
        </script>