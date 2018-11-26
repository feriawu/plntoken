<?php
include 'function/koneksi.php';

$querytanggal = mysqli_query($koneksi, 'SELECT DISTINCT DATE(tgl_pembelian) FROM transaksi ORDER BY tgl_pembelian DESC LIMIT 10');
while ($rowt = mysqli_fetch_assoc($querytanggal)) {
    $tgl = $rowt['DATE(tgl_pembelian)'];
    $query = mysqli_query($koneksi, "SELECT sum(total_harga) FROM transaksi WHERE DATE(tgl_pembelian)='$tgl'");
    $row = mysqli_fetch_assoc($query);
    // echo $row['sum(total_harga)'];
    echo $tgl . ' ' . $row['sum(total_harga)'] . '<br>';
}
