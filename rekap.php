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
                <h3>Rekap Transaksi</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel Rekap</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Informasi Penjualan Token Listrik Prabayar
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>No Ref</th>
                          <th>ID Pelanggan</th>
                          <th>Nama Pelanggan</th>
                          <th>Total Harga</th>
                          <th>Tanggal Pembelian</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php
                      $no = 1; 
                      $query = mysqli_query($koneksi, "SELECT transaksi.*, pelanggan.id, pelanggan.nama FROM transaksi JOIN pelanggan ON transaksi.pelanggan_id=pelanggan.id ORDER BY transaksi.no_ref DESC"); ?>
                      <?php while ($row = mysqli_fetch_assoc($query)) : ?>

                       <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo md5($row['no_ref']);  ?></td>
                          <td><?php echo $row['pelanggan_id']; ?></td>
                          <td><?php echo $row['nama']; ?></td>
                          <td><?php echo rupiah($row['total_harga']);  ?></td>
                          <td><?php echo $row['tgl_pembelian'];  ?></td>
                          <td>
                            <a class="btn btn-info" href="<?php echo base_url.'?page=transaksi_sukses&transaksi_id='.$row['no_ref']; ?>">Detail</a>
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