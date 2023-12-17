<?php
    include 'koneksi.php';
    
    function loginCustomer(&$user,$pass){
        if(isset($_POST['login'])){
            
            global $connection;

            if (empty($user) && empty($pass)){
                header("Location: http://{$_SERVER['HTTP_HOST']}/PAW/PROJECT PAW/lain/loginCus.php?error=Username and password is required");
            }elseif (empty($pass)){
                header("Location: http://{$_SERVER['HTTP_HOST']}/PAW/PROJECT PAW/lain/loginCus.php?error=Password is required");
            }elseif (empty($user)){
                header("Location: http://{$_SERVER['HTTP_HOST']}/PAW/PROJECT PAW/lain/loginCus.php?error=Username is required");
            }else{
                
                $statement = $connection->prepare("SELECT * FROM customer WHERE username = :username AND password = SHA2(:password,0)");
                $statement->bindValue(':username', $user);
                $statement->bindValue(':password', $pass);
                $statement->execute();
                $row='';
                foreach ($statement as $row) {
                    echo "{$row['username']}";
                    echo "{$row['password']}";
                }
                $cek = $row;
                if ($cek > 0) {
                    session_start();
                    $_SESSION['isUser'] = $row['username'];
                    header("Location: http://{$_SERVER['HTTP_HOST']}/PAW/PROJECT PAW/lain/customer/cusDaftarRek.php");
                    exit();
                }else{
                    header("Location: http://{$_SERVER['HTTP_HOST']}/PAW/PROJECT PAW/lain/loginCus.php?error=This account is not registered");
                }
            }
           
        } 
    }  

    function editprofil($id){
        if(isset($_POST['submit'])){
            $id = $_SESSION['isUser'];
            global $connection;
                $statement = $connection->prepare("UPDATE customer SET nama = :nama, email = :email, nik =:nik,
                    alamat = :alamat, no_tlp = :no_tlp, jns_kelamin = :jns_kelamin, pekerjaan = :pekerjaan,
                    agama = :agama, tempat = :tempat, tgl_lahir = :tgl_lahir WHERE username = '$id'");

                $statement->bindValue(':nama', $id);
                $statement->bindValue(':nama', $_POST['nama']);
                $statement->bindValue(':email', $_POST['email']);
                $statement->bindValue(':nik',$_POST['nik']);
                $statement->bindValue(':alamat', $_POST['alamat']);
                $statement->bindValue(':no_tlp', $_POST['no_tlp']);
                $statement->bindValue(':agama',$_POST['agama']);
                $statement->bindValue(':tempat', $_POST['tempat']);
                $statement->bindValue(':tgl_lahir', $_POST['tgl_lahir']);
                $statement->bindValue(':jns_kelamin',$_POST['jns_kelamin']);
                $statement->bindValue(':pekerjaan', $_POST['pekerjaan']);
                $statement->execute();
        }
    }