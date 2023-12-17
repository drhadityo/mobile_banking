<?php
    require 'adminPermission.inc';

    include 'crud/koneksi.php';

    include 'validasi/validasiForm.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="cusEdit.css">
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
                            <h2>Edit Profile</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="konten">
                <div class="containerR">
                    <div class="mainkonten">
                        <div class="pp">
                            <img src="../image/avatar.jpg" alt="">
                            <?php
                                $statement = $connection->prepare("SELECT nama FROM customer WHERE username = '$_SESSION[isUser]'");
                                $statement->execute();

                                foreach($statement as $row){
                                    echo "<p> {$row['nama']}</p>";
                                }
                            ?>
                        </div>
                        <div class="form">
                            <?php
                                $statement = $connection->prepare("SELECT * FROM customer WHERE username = :username");
                                $statement->bindValue(':username',$_SESSION['isUser']);
                                $statement->execute();

                                foreach($statement as $row){
                            ?>
                                    <form action="<?php echo 'cusEdit.php?no_rek='.$_GET['no_rek']; ?>" method="POST">                               
                                        <table>
                                            <tr>
                                                <th>Nama</th>   
                                                <td> : <input type='text' name='nama' 
                                                    <?php 
                                                        if(($row['nama']) == ''){
                                                            if(isset($_POST['nama'])){
                                                                echo "value =".htmlspecialchars($_POST['nama']);
                                                            }
                                                        }else{
                                                            echo "value ='{$row['nama']}'"; 
                                                        }

                                                    ?>>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class='alert'><?php echo $nama; ?></span></td>
                                            </tr>
                                            <tr>
                                                <th>NIK</td>
                                                <td> : <input type='text' name='nik' 
                                                    <?php 
                                                        if(($row['nik']) == ''){
                                                            if(isset($_POST['nik'])){
                                                                echo "value =".htmlspecialchars($_POST['nik']);
                                                            }
                                                        }else{
                                                            echo "value ='{$row['nik']}'"; 
                                                        }

                                                    ?>>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class='alert'><?php echo $nik; ?></span></td>
                                            </tr>
                                            <tr>
                                                <th>E-mail</td>
                                                <td> : <input type='text' name='email' 
                                                    <?php 
                                                        if(($row['email']) == ''){
                                                            if(isset($_POST['email'])){
                                                                echo "value =".htmlspecialchars($_POST['email']);
                                                            }
                                                        }else{
                                                            echo "value ='{$row['email']}'"; 
                                                        }
                                                    ?>>
                                                </td>  
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class='alert'><?php echo $email; ?></span><td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td> : <input type='text' name='alamat' 
                                                    <?php 
                                                        if(($row['alamat']) == ''){
                                                            if(isset($_POST['alamat'])){
                                                                echo "value =".htmlspecialchars($_POST['alamat']);
                                                            }
                                                        }else{
                                                            echo "value ='{$row['alamat']}'"; 
                                                        }

                                                    ?>>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class='alert'><?php echo $alamat; ?></span></td>
                                            </tr>
                                            <tr>
                                                <th>Nomor Telephone</th>
                                                <td> : <input type='text' name='no_tlp' 
                                                    <?php 
                                                        if(($row['no_tlp']) == ''){
                                                            if(isset($_POST['tempat'])){
                                                                echo "value =".htmlspecialchars($_POST['no_tlp']);
                                                            }
                                                        }else{
                                                            echo "value ='{$row['no_tlp']}'"; 
                                                        }
                                                    ?>>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class='alert'><?php echo $no_tlp; ?></span></td>
                                            </tr>
                                            <tr>
                                            <th>Agama</th>
                                            <td> : <input type='text' name='agama' 
                                                <?php 
                                                    if(($row['agama']) == ''){
                                                        if(isset($_POST['agama'])){
                                                            echo "value =".htmlspecialchars($_POST['agama']);
                                                        }
                                                    }else{
                                                        echo "value ='{$row['agama']}'"; 
                                                    }

                                                ?>>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><span class='alert'><?php echo $agama; ?></span></td>
                                        </tr>
                                            <tr>
                                                <th>Tempat</th>
                                                <td> : <input type='text' name='tempat' 
                                                    <?php 
                                                        if(($row['tempat']) == ''){
                                                            if(isset($_POST['tempat'])){
                                                                echo "value =".htmlspecialchars($_POST['tempat']);
                                                            }
                                                        }else{
                                                            echo "value ='{$row['tempat']}'"; 
                                                        }

                                                    ?>>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class='alert'><?php echo $tempat; ?></span></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Lahir</th>
                                                <td> : <input type='date' name='tgl_lahir' 
                                                    <?php 
                                                        if(($row['tgl_lahir']) == ''){
                                                            if(isset($_POST['tgl_lahir'])){
                                                                echo "value =".htmlspecialchars($_POST['tgl_lahir']);
                                                            }
                                                        }else{
                                                            echo "value ='{$row['tgl_lahir']}'"; 
                                                        }

                                                    ?>>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class='alert'><?php echo $tgl; ?></span></td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                    <td class='kelamin'> 
                                                    : <select name='jns_kelamin'>
                                                        <?php 
                                                            if($row['jns_kelamin'] == 'Laki-laki'){
                                                                echo "
                                                                    <option name='jns_kelamin' value='0' selected></option>
                                                                    <option name='jns_kelamin' value='laki-laki' selected>Laki-laki</option>
                                                                    <option name='jns_kelamin' value='perempuan'>Perempuan</option>";
                                                            }elseif($row['jns_kelamin'] == 'Perempuan') {
                                                                echo "
                                                                    <option name='jns_kelamin' value='0' selected></option>
                                                                    <option name='jns_kelamin' value='laki-laki' >Laki-laki</option>
                                                                    <option name='jns_kelamin' value='perempuan' selected>Perempuan</option>";
                                                            }else{
                                                                echo "
                                                                    <option name='jns_kelamin' value='0' selected></option>
                                                                    <option name='jns_kelamin' value='laki-laki' >Laki-laki</option>
                                                                    <option name='jns_kelamin' value='perempuan'>Perempuan</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class='alert'><?php echo $jns_kelamin; ?></span></td>
                                            </tr>
                                            <tr>
                                                <th>Pekerjaan</th>
                                                <td> : <input type='text' name='pekerjaan' 
                                                    <?php 
                                                        if(($row['pekerjaan']) == ''){
                                                            if(isset($_POST['pekerjaan'])){
                                                                echo "value =".htmlspecialchars($_POST['pekerjaan']);
                                                            }
                                                        }else{
                                                            echo "value ='{$row['pekerjaan']}'"; 
                                                        }

                                                    ?>>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span class='alert'><?php echo $pekerjaan; ?></span></td>
                                            </tr>
                                        </table>
                                        <input class='subm' type='submit' name='submit' value='Simpan'>   <?php echo $display_error; ?><br><br>
                                <?php
                                    echo "
                                        <a href='cusEdPass.php?no_rek={$_GET['no_rek']}'>Ganti Password</a>
                                    </form>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="side">
            <div class="containerL">
                <div class="sidebar">
                    <div class="motif"></div>
                    <div class="profile">
                        <img src="../image/avatar.jpg" alt="">
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
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</body>
</html>