<?php
  include 'crud/koneksi.php';

  $rekening_error = $jumlah_error = $keterangan_err = $form_error = '';

  if (isset($_POST['submit'])) {
    require 'validasi.php';
    
    $no_rek = validasiRekening($rekening_error, $_POST['rek_no_rek']);
    $jumlah = validasiJumlah($jumlah_error, $_POST['jumlah']);
    $keterangan = validasiKeterangan($keterangan_err, $_POST['keterangan']);

    if (($no_rek && $jumlah && $keterangan) == true) {

      $tes = '';
      $statements = $connection->prepare("SELECT * FROM rekening WHERE no_rek = :rek_no_rek");
      $statements->bindValue(':rek_no_rek', $_POST['rek_no_rek']);
      $statements->execute();
      foreach ($statements as $tes){
        $tes['no_rek'];
      }

      $statements = $connection->prepare("SELECT * FROM rekening WHERE no_rek = :no_rek");
      $statements->bindValue(':no_rek', $_GET['no_rek']);
      $statements->execute();
      foreach ($statements as $row){
        $saldo = $row['balance'];
      }
      $cek = $tes;
      if ($cek < 1) {
        $form_error = "Rekening tujuan tidak ditemukan";
      }else if($_POST['rek_no_rek'] == $_GET['no_rek']){    
        $form_error = "Rekening tujuan tidak boleh sama dengan rekening pengirim";
      }else if($_POST['jumlah'] <= $saldo) {
        $statement = $connection->prepare("UPDATE rekening SET balance  = balance - :jumlah WHERE no_rek = :no_rek");
        $statement->bindValue(':jumlah', $_POST['jumlah']);
        $statement->bindValue(':no_rek', $_GET['no_rek']);
        $statement->execute();
  
        $statement = $connection->prepare("UPDATE rekening SET balance  = balance + :jumlah WHERE no_rek = :rek_no_rek");
        $statement->bindValue(':jumlah', $_POST['jumlah']);
        $statement->bindValue(':rek_no_rek', $_POST['rek_no_rek']);
        $statement->execute();

        $statement = $connection->prepare("INSERT INTO transfer (no_rek, jumlah, tgl_transfer, rek_no_rek, keterangan) VALUES (:no_rek, :jumlah, CURRENT_TIMESTAMP, :rek_no_rek, :keterangan)");
        $statement->bindValue(':jumlah', $_POST['jumlah']);
        $statement->bindValue(':no_rek', $_GET['no_rek']);
        $statement->bindValue(':rek_no_rek', $_POST['rek_no_rek']);
        $statement->bindValue(':keterangan',$_POST['keterangan']);
        $statement->execute();
  
        $form_error = "Transfer Berhasil";
      }else {
        $form_error = "Saldo tidak mencukupi";
      }
    }else {
      $form_error = "Data yang dimasukkan tidak sesuai";
    }
  }
?>