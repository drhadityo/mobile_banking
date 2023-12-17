<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <table>
    <tr>
      <th>No Rekening</th>
      <th>Tanggal Transfer</th>
      <th>Rekening Tujuan</th>
      <th>Jumlah</th>
      <th>keterangan</th>
    </tr>

    <?php
      $no = 1;
      $statements = $koneksi->prepare("SELECT no_rek, tgl_transfer, rekening_tujuan, jumlah, keterangan FROM transfer");
      $statements->execute();
      foreach ($statements as $row){
        echo "<tr>
              <td>$no</td?
              <td>{$row['no_rek']}</td>
              <td>{$row['tgl_transfer']}</td>
              <td>{$row['rekening_tujuan']}</td>
              <td>{$row['jumlah']}</td>
              <td>{$row['keterangan']}</td>
            </tr>";
      }
    ?>
  </table>
</body>
</html>