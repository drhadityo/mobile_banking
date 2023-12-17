<?php
    require 'adminPermission.inc';

    include 'validasi/validasiRegis.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password</title>
    <link rel="stylesheet" href="css/adEPass.css">
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
                            <h2>Registrasi Akun Customer</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="konten">
                <div class="containerR">
                    <div class="mainkonten">
                        <div class="editform">
                            <form action="<?php echo "adRegis.php"; ?>" method = "POST">
                                <label for='username'>Username</label><br>
                                <input type='text' name='username' value=''>
                                <span class='alert'><?php echo $user; ?></span>
                                <br>
                                
                                <label for='password'>Password</label><br>
                                <input type='password' name='password' value=''>
                                <span class='alert'><?php echo $pass; ?></span>
                                <br>

                                <label for='nama'>Nama</label><br>
                                <input type='text' name='nama' value=''>
                                <span class='alert'><?php echo $nama; ?></span>
                                <br>

                                <label for='email'>email</label><br>
                                <input type='text' name='email' id='email' value=''>
                                <span class='alert'><?php echo $email; ?></span>
                                <br>

                                <?php echo $display_error; ?>
                                <div class="submit">
                                    <input type="submit" name="submit"><br>
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
                    <div class="motif"></div>
                    <div class="profile">
                        <img src="../image/avatar.jpg" alt="">
                        <div class="name">
                            <p>Hello...</p>
                            <?php
                                include 'crud/koneksi.php';
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