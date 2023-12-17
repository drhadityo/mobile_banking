<?php
    include 'customer/crud/crud.php';

    if(isset($_POST['login'])){
        loginCustomer($_POST['username'], $_POST['password']);
    }   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main">
        <div class="container">
            <div class="konten">
                <div class="kontenL">
                    <h3>Selamat Datang</h3>
                    <img src="image/anteroDigital-white.png" alt="">
                    <p>Sebuah objek royal yang dapat dinikmati nasabah bank untuk melakukan transaksi perbankan melalui jaringan internet kapan saja dan dimana saja.</p>
                </div>
                <div class="kontenR">
                    <form action="loginCus.php" method="POST">
                        <h2>Login...</h2>
                        <p>Sebagai <strong>CUSTOMER</strong></p>

                        <?php 
                            if(isset($_GET['error'])){ 
                                echo "<span class='alert'>". $_GET['error'] ."</span>"; 
                            }
                        ?>

                        <h1></h1>
                        <label for="">Username :</label><br>
                        <input type="text" name="username" id="inp" placeholder="Masukan Username..."><br>
                        <h1></h1>
                        <label for="password">Password :</label><br>
                        <input type="password" name="password" id="inp" placeholder="Masukan Password..."><br>
                        <input type="submit" name="login" value="Login" class="login">
                        <div class="back">
                            <a href="../index.php">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>