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
    <title>Kelola Customer</title>
    <link rel="stylesheet" href="css/kelolaCus.css">
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
                        <div class="daftar">
                            <div class='headth'>
                                <table>
                                    <tr>
                                        <td class='notd'>NO</td>
                                        <td class='namacus'>Nama Customer</td>
                                        <td class='email'>Email</td>
                                        <td class='action'>Action</td>
                                    </tr> 
                                </table>
                            </div>

                        <?php
                            $no = 1;
                            $statement = $connection->prepare("SELECT username, nama, email, no_tlp FROM customer");
                            $statement->execute();
                            foreach($statement as $row){
                                if($no % 2 == 1){
                                    echo"
                                        <div class='list'>
                                            <table>
                                                <tr>
                                                    <td class='notd'>$no</td>
                                                    <td class='namacus'>{$row['nama']}</td>
                                                    <td class='email'>{$row['email']}</td>
                                                    <td class='edit'>
                                                        <a href='adEditCus.php?username={$row['username']}'>Edit</a>
                                                    </td>
                                                    <td class='delete'>
                                                        <a href='crud/delete.php?username={$row['username']}'>Hapus</a>
                                                    </td>
                                                    <td class='more'><a href='adMoreCus.php?username={$row['username']}'>More</a></td>
                                                </tr> 
                                        </table>
                                    </div>";
                                } else {
                                    echo"
                                        <div class='list2'>
                                            <table>
                                                <tr>
                                                    <td class='notd'>$no</td>
                                                    <td class='namacus'>{$row['nama']}</td>
                                                    <td class='email'>{$row['email']}</td>
                                                    <td class='edit'>
                                                        <a href='adEditCus.php?username={$row['username']}'>Edit</a>
                                                    </td>
                                                    <td class='delete'>
                                                        <a href='crud/delete.php?username={$row['username']}'>Hapus</a>
                                                    </td>
                                                    <td class='more'><a href='adMoreCus.php?username={$row['username']}'>More</a></td>
                                                </tr> 
                                        </table>
                                    </div>";
                                }
                                $no++;
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