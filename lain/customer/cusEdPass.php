<?php
    require 'adminPermission.inc';

    include 'crud/koneksi.php';

    include 'validasi/validasiPass.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutasi</title>
    <link rel="stylesheet" href="css/cusEdPass.css">
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
                            <h2>Edit Password</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="konten">
                <div class="containerR">
                    <div class="mainkonten">
                        <div class="editform">
                            <form action="<?php echo "cusEdPass.php?no_rek={$_GET['no_rek']}"; ?>" method = "POST">
                                <label for="">Password Baru :</label><br>
                                <input type="password" name="password" placeholder="Masukan Password baru">
                                <?php echo $pass; ?>
                                <br>

                                <label for="">Konfirmasi Password :</label><br>
                                <input type="password" name="konfirmasi_password" placeholder="Konfirmasi Password baru">
                                <?php echo $conPass; ?><br>

                                <?php echo $display_error; ?>
                                <div class="submit">
                                    <input type="submit" name="submit"><br>
                                    <?php echo "<a href='cusEdPass.php?no_rek={$_GET['no_rek']}'>Kembali</a>"; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="side">
            <div class="containerL">
                <div class="sidebar">
                    <div class="profile">
                        <img src="../image/logocus.JPG" alt="">
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