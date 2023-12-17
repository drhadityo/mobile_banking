<?php
    include 'koneksi.php';
    
    function loginAdmin(&$user,$pass){
        if(isset($_POST['login'])){
            
            global $connection;

            if (empty($user) && empty($pass)){
                header("Location: http://{$_SERVER['HTTP_HOST']}/PAW/PROJECT PAW/lain/loginAd.php?error=Username and password is required");
            }elseif (empty($pass)){
                header("Location: http://{$_SERVER['HTTP_HOST']}/PAW/PROJECT PAW/lain/loginAd.php?error=Password is required");
            }elseif (empty($user)){
                header("Location: http://{$_SERVER['HTTP_HOST']}/PAW/PROJECT PAW/lain/loginAd.php?error=Username is required");
            }else{
                $statement = $connection->prepare("SELECT * FROM admin WHERE username_admin = :username_admin AND password = SHA2(:password,0)");
                $statement->bindValue(':username_admin', $user);
                $statement->bindValue(':password', $pass);
                $statement->execute();
                $row='';
                foreach ($statement as $row) {
                    echo "{$row['username_admin']}";
                    echo "{$row['password']}";
                }
                $cek = $row;
                if ($cek > 0) {
                    session_start();
                    $_SESSION['isAdmin'] = $row['username_admin'];
                    header("Location: http://{$_SERVER['HTTP_HOST']}/PAW/PROJECT PAW/lain/admin/kelolaCus.php");
                    exit();
                }else{
                    header("Location: http://{$_SERVER['HTTP_HOST']}/PAW/PROJECT PAW/lain/loginAd.php?error=Username atau Password salah");
                }
            }
           
        } 
    }  
    

    function registerProfil($user, $pass){
        if(isset($_POST['submit'])){
            global $connection;
            $statement = $connection->prepare("INSERT INTO `customer`(`username`, `username_admin`, `password`, `nama`, `email`) VALUES 
                (:username, :username_admin, SHA2(:password,0), :nama , :email )");
            
            $statement->bindValue(':username', $user);
            $statement->bindValue(':password', $pass);
            $statement->bindValue(':username_admin', $_SESSION['isAdmin']);
            $statement->bindValue(':nama', $_POST['nama']);
            $statement->bindValue(':email', $_POST['email']);
            $statement->execute();  
        } 
    }

    function editprofil($id){
        if(isset($_POST['submit'])){
            global $connection;
                $statement = $connection->prepare("UPDATE customer SET nama = :nama, email = :email, nik =:nik,
                    alamat = :alamat, no_tlp = :no_tlp, jns_kelamin = :jns_kelamin, pekerjaan = :pekerjaan,
                    agama = :agama, tempat = :tempat, tgl_lahir = :tgl_lahir WHERE username = '$id'");

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

    function deleteProfil($id){
        global $connection;
        $statement = $connection->prepare("DELETE FROM customer WHERE username = '$id'");
        $statement->execute();
        header("Location: http://{$_SERVER['HTTP_HOST']}/PAW/PROJECT PAW/lain/admin/kelolaCus.php");
    }

    function addRekening($id){
        global $connection;
        $statement = $connection->prepare("UPDATE rekening SET username = :username WHERE no_rek = :no_rek");
        $statement->bindValue(':username',$id);
        $statement->bindValue(':no_rek',$_POST['no_rek']);
        $statement->execute();
    }
?>