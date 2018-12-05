<?php
$queryPelanggan = mysqli_query($koneksi, "SELECT id FROM pelanggan");
while ($rowP = mysqli_fetch_assoc($queryPelanggan)) {
    $pelanggan[] = $rowP['id'];
}
$totalPelanggan = count($pelanggan);

$queryUser = mysqli_query($koneksi, "SELECT id_user FROM user");
while ($rowU = mysqli_fetch_assoc($queryUser)) {
    $user[] = $rowU['id_user'];
}
$totalUser = count($user);

$queryTransaksi = mysqli_query($koneksi, "SELECT no_ref FROM transaksi");
while ($rowT = mysqli_fetch_assoc($queryTransaksi)) {
    $transaksi[] = $rowT['no_ref'];
}
$totalTransaksi = count($transaksi);

$querySumModal = mysqli_query($koneksi, "SELECT sum(total_harga-admin_bank-ppn-ppj-materai), total_harga-admin_bank-ppn-ppj-materai FROM transaksi");
$totalModal = mysqli_fetch_assoc($querySumModal)['sum(total_harga-admin_bank-ppn-ppj-materai)'];

$querySumLaba = mysqli_query($koneksi, "SELECT sum(total_harga-ppn-ppj-materai)-" . $totalModal . " FROM transaksi");
$totalLaba = mysqli_fetch_assoc($querySumLaba)["sum(total_harga-ppn-ppj-materai)-" . $totalModal . ""];

$modal_per_hari = mysqli_query($koneksi, "SELECT sum(total_harga-admin_bank-ppn-ppj-materai), total_harga-admin_bank-ppn-ppj-materai from transaksi group by CAST(tgl_pembelian AS DATE)");

$querytanggal = mysqli_query($koneksi, 'SELECT DISTINCT DATE(tgl_pembelian) FROM transaksi ORDER BY tgl_pembelian DESC LIMIT 10');

?>
<!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Pelanggan</span>
              <div class="count"><?php echo $totalPelanggan; ?></div>
              <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Total user</span>
              <div class="count"><?php echo $totalUser; ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Transaksi</span>
              <div class="count green"><?php echo $totalTransaksi; ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Modal</span>
              <div class="count"><?php echo rupiah($totalModal); ?></div>
              <!-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> -->
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Laba</span>
              <div class="count"><?php echo rupiah($totalLaba); ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Total Pendapatan Per Hari <small></small></h3>
                  </div>
                  <!-- <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
                  </div> -->
                <!-- </div> -->

                <div class="col-md-12 col-sm-9 col-xs-12">
                  <!-- <ga-dashboard-graph-flot graph-title="Contest Activity"
                  graph-sub-title="subscriptions total, valid over time"
                  graph-legend-title="Validity"
                  graph-range="Start-End"
                  graph-data="$ctrl.dashboard.data">
                  <div class="col-md-12 col-sm-12 col-xs-6">
                  <p>Users</p>
                  <ga-progress progress-value="$ctrl.userValidity"></ga-progress>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-6">
                  <p>Subscriptions</p>
                  <ga-progress progress-value="$ctrl.subscriptionValidity"></ga-progress>
                  </div>
                </ga-dashboard-graph-flot> -->
                  <!-- <div id="chart_plot_01" class="demo-placeholder"></div> -->
                  <canvas id="modal"></canvas>
                <!-- </div> -->
                <!-- <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                  <div class="x_title">
                    <h2>Top Campaign Performance</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Facebook Campaign</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Twitter Campaign</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Conventional Media</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Bill boards</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                        </div>
                      </div>
                    </div>
                  </div> -->
                
                <!-- </div> -->
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->

        <script type="text/javascript">
          $(document).ready(function(){
            var ctx = document.getElementById("modal");
            var lineChart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: [<?php while ($rowt = mysqli_fetch_array($querytanggal)) { echo '"' . $tgl[] = $rowt['DATE(tgl_pembelian)'] . '",'; $tanggal = $tgl;}?>],
              datasets: [{
              label: "Total Pendapatan",
              backgroundColor: "rgba(38, 185, 154, 0.31)",
              borderColor: "rgba(38, 185, 154, 0.7)",
              pointBorderColor: "rgba(38, 185, 154, 0.7)",
              pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(220,220,220,1)",
              pointBorderWidth: 1,
              data: [<?php foreach ($tanggal as $key => $value) {
                $tgl = $value;
              $query = mysqli_query($koneksi, "SELECT sum(total_harga) FROM transaksi WHERE DATE(tgl_pembelian)='$tgl'");
                $row = mysqli_fetch_assoc($query);
                // echo $row['sum(total_harga)'];
                echo $row['sum(total_harga)'].',';
              } ?>]
              }]
            },
            });
          });
        </script>