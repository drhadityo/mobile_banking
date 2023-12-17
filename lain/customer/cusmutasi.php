<?php
    require 'adminPermission.inc';

    include 'crud/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutasi</title>
    <link rel="stylesheet" href="cusmutasi.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrappage">
        <div class="main">
            <div class="header">
                <div class="containerR">
                    <div class="navbar">
                        <div class="navL">
                            <h2>Daftar Transaksi</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="konten">
                <div class="containerR">
                    <div class="mainkonten">
                        <div class="daftar">
                            <div class="headth">
                                <table>
                                    <tr>
                                        <td class="notd" >NO</td>
                                        <td class="tgltd" >Tanggal Transaksi</td>
                                        <td class="uraian">Uraian</td>
                                        <td class="rek">Rekening Tujuan</td>
                                        <td class="nominal">Nominal</td>
                                    </tr> 
                                </table>
                            </div>
                            <div class="list">
                                <table>
                                    <?php
                                        $no = 1;
                                        $statements = $connection->prepare("SELECT tgl_transfer, rek_no_rek, jumlah, keterangan, balance FROM transfer
                                        INNER JOIN rekening ON transfer.no_rek = rekening.no_rek WHERE rekening.no_rek = :no_rek");
                                        $statements->bindValue(':no_rek',$_GET['no_rek']);
                                        $statements->execute();
                                        foreach ($statements as $row){
                                            echo "
                                            <tr>
                                                <td class='notd'>$no</td>
                                                <td class='tgltd'>{$row['tgl_transfer']}</td>
                                                <td class='uraian'>{$row['keterangan']}</td>
                                                <td class='rek'>{$row['rek_no_rek']}</td>
                                                <td lass='nominal'>{$row['jumlah']}</td>
                                            </tr>";
                                        $no++;
                                        }
                                        
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="side">
            <div class="containerL">
                <div class="sidebar">
                    <div class="profile">
                        <img src="../image/avatar.JPG" alt="">
                        <div class="name">
                            <p>Hello...</p>
                            <?php
                                $statement = $connection->prepare("SELECT nama FROM customer WHERE username = '$_SESSION[isUser]'");
                                $statement->execute();

                                foreach($statement as $row){
                                    echo "<h2>{$row['nama']}</h2>";
                                }
                            ?>
                            <div class="navL">
                                <a href="<?php echo 'cusEdit.php?no_rek='.$_GET['no_rek']; ?>"><h2>Edit Profile</h2></a>
                            </div>
                        </div>
                    </div>
                    <div class="rekening">
                    <?php
                        if(!empty($_GET['no_rek'])){
                            $statements = $connection->prepare("SELECT no_rek, balance FROM rekening WHERE no_rek = :no_rek");
                            $statements->bindValue(':no_rek',$_GET['no_rek']);
                            $statements->execute();
                            foreach($statements as $row){
                                echo "
                                <table>                        
                                    <tr>
                                        <td>No. Rekening</td>
                                        <td>: {$row['no_rek']}</td>
                                    </tr>
                                    <tr>
                                        <td>Saldo</td>
                                        <td>: Rp {$row['balance']}</td>
                                    </tr>
                                </table>";
                            }
                        }else{
                            echo "
                            <table>                        
                                <tr>
                                    <td>No. Rekening</td>
                                    <td>: </td>
                                </tr>
                                <tr>
                                    <td>Saldo</td>
                                    <td>: </td>
                                </tr>
                            </table>";
                        }
                        ?>
                    </div>
                    <div class="menu">
                        <li>
                            <a href="<?php echo 'cusDaftarRek.php?no_rek='.$_GET['no_rek']; ?>">
                                <img src="../image/rekening.png" alt="">
                                <h3>Daftar Rekening</h3>
                            </a>
                        </li>
                        <div class="t">
                            <li>
                                <a href="<?php echo 'cusmutasi.php?no_rek='.$_GET['no_rek']; ?>">
                                    <img src="../image/transaksi.png" alt="">
                                    <h3>Daftar Transaksi</h3>
                                </a>
                            </li>
                        </div>
                        <li>
                            <a href="<?php echo 'cusTranfer.php?no_rek='.$_GET['no_rek']; ?>">
                                <img src="../image/transfer.png" alt="">
                                <h3>Transfer</h3>
                            </a>
                        </li>
                    </div>
                    <div class="logout">
                        <a href="">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>