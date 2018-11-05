<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Token <small>Master Data Token</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel Token Listrik Prabayar</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Informasi Token Listrik Prabayar
                    </p>
                    <a class="btn btn-primary" href="<?php echo base_url.'?page=form_token' ?>">+ Tambah Token</a>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Jumlah kWh</th>
                          <th>Harga</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php
                      $no = 1; 
                      $query = mysqli_query($koneksi, "SELECT * FROM token ORDER BY id DESC"); ?>
                      <?php while ($row = mysqli_fetch_assoc($query)) : ?>

                       <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $row['jumlah_kwh']; ?></td>
                          <td><?php echo rupiah($row['harga']);  ?></td>
                          <td><a title="Edit" class='btn btn-sm btn-info' href='<?php echo base_url."?page=form_token&id=$row[id]"; ?>'><i class='fa fa-edit'></i></a>
                            <?php if ($row['status'] == 0): ?>
                              <a title="Non Aktif" class='btn btn-sm btn-default' href='<?php echo base_url."/action_token.php?id=$row[id]&soft_delete=1"; ?>'><i class='fa fa-toggle-off'></i></a>
                            <?php else: ?>
                              <a title="Aktif" class='btn btn-sm btn-success' href='<?php echo base_url."/action_token.php?id=$row[id]&soft_delete=0"; ?>'><i class='fa fa-toggle-on'></i></a>
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
                                      <a class='btn btn-sm btn-danger' href='<?php echo base_url."/action_token.php?delete=$row[id]"; ?>'>Hapus</a>
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

        <script type="text/javascript">
          $(document).ready(function(){
            $('#datatable').DataTable();
          })
        </script>