<?php
//============================================================+
// File name   : example_002.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 002 for TCPDF class
//               Removing Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Removing Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
require_once('../../function/koneksi.php');

$transaksi_id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT transaksi.*, pelanggan.*, token.harga, token.jumlah_kwh, daya.nama_daya FROM transaksi JOIN token ON transaksi.token_id=token.id JOIN pelanggan ON pelanggan.id=transaksi.pelanggan_id JOIN daya ON pelanggan.daya_id=daya.id WHERE transaksi.no_ref=$transaksi_id");
$row = mysqli_fetch_assoc($query);

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 002');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 20);

// add a page
$pdf->AddPage();

// set some text to print
$txt = '<div class="right_col" role="main">
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
          <h2>Kwitansi Transaksi</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="col-md-2">
            <h4>
              No Ref<br>
              ID Pelanggan<br>
              No Meter<br>
              Nama<br>
              Alamat<br>
              Daya<br>
              Jumlah kWh
           </h4>
          </div>
          <div class="col-md-4">
            <h4>
             : <?php echo md5($row[no_ref]); ?><br>
             : <?php echo $row[pelanggan_id]; ?><br>
             : <?php echo $row[no_meter]; ?><br>
             : <?php echo $row[nama]; ?><br>
             : <?php echo $row[alamat]; ?><br>
             : <?php echo $row[nama_daya]; ?><br>
             : <?php echo $row[jumlah_kwh]; ?><br>
            </h3>
          </div>

          <div class="col-md-2">
            <h4>
              Tanggal Beli<br>
              Token<br>
              Admin Bank<br>
              Materai<br>
              PPN<br>
              PPJ<br>
              Total Bayar<br>
           </h4>
          </div>
          <div class="col-md-4">
            <h4>
             : <?php echo $row[tgl_pembelian]; ?><br>
             : <?php echo rupiah($row[harga]); ?><br>
             : <?php echo rupiah($row[admin_bank]); ?><br>
             : <?php echo rupiah($row[materai]); ?><br>
             : <?php echo rupiah($row[ppn]); ?><br>
             : <?php echo rupiah($row[ppj]); ?><br>
             : <?php echo rupiah($row[total_harga]); ?><br>
            </h4>
          </div>
          <div class="col-12">
              <h1><strong><?php echo "STROOM TOKEN : ".$row[kode_token]; ?><strong></h1>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
</div>';

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+