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
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/adEditCus.css">
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
                                $id = $_GET['username'];

                                $statement = $connection->prepare("SELECT nama FROM customer WHERE username = '$id'");
                                $statement->execute();

                                foreach($statement as $row){
                                    echo "<p> {$row['nama']}</p>";
                                }
                            ?>
                        </div>
                        <div class="form">
                            <?php
                                $statement = $connection->prepare("SELECT * FROM customer WHERE username = '$id'");
                                $statement->execute();

                                foreach($statement as $row){
                                    echo"
                                        <table>
                                            <tr>
                                                <th>Nama</th>   
                                                <td> : {$row['nama']}</td>
                                            </tr>
                                            <tr>
                                                <th>NIK</td>
                                                <td> : {$row['nik']}</td>
                                            </tr>
                                            <tr>
                                                <th>E-mail</td>
                                                <td> : {$row['email']}</td>  
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td> : {$row['alamat']}</td>
                                            </tr>
                                            <tr>
                                                <th>Nomor Telephone</th>
                                                <td> : {$row['no_tlp']}</td>
                                            </tr>
                                            <tr>
                                                <th>Agama</th>
                                                <td> : {$row['agama']}</td>
                                            </tr>
                                            <tr>
                                                <th>Tempat</th>
                                                <td> : {$row['tempat']}
                                            <tr>
                                                <th>Tanggal Lahir</th>
                                                <td> : {$row['tgl_lahir']}
                                            <tr>
                                                <th>Jenis Kelamin</th> 
                                                <td> : {$row['jns_kelamin']}</td>
                                            </tr>
                                            <tr>
                                                <th>Pekerjaan</th>
                                                <td> : {$row['pekerjaan']}
                                            </tr>
                                        </table>";
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
                                $statement = $connection->prepare("SELECT nama FROM admin WHERE username_admin = '$_SESSION[isAdmin]'");
                                $statement->execute();

                                foreach($statement as $row){
                                    echo "<h2>{$row['nama']}</h2>";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="menu">
                        <li>
                            <a href="kelolaCus.php">
                                <img src="../image/kelola.png" alt="">
                                <h3>Kelola Data<br>Customer</h3>
                            </a>
                        </li>
                        <li>
                            <a href="adRegis.php">
                                <img src="../image/regisAkun.png" alt="">
                                <h3>Registrasi Akun<br>Customer</h3>
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