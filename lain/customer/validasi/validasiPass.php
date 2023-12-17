<?php
include 'validasi.php'; //menyisipkan file validasi.php

$pass = $conPass = $display_error = ""; // variabel kosong yang nantinya akan berisi pesan validasi

//jika disubmit maka program akan dijalankan
if(isset($_POST['submit'])){

    //memanggil fungsi dari validasi.php dan menyimpannya didalam variabel
    $password = valPassword($pass, $_POST['password']);
    $password_confirm = valPassword($conPass, $_POST['konfirmasi_password']);

    //jika semua fungsi yang diambil bernilai benar maka program akan dicek
    if(($password && $password_confirm) == true){

        //jika password dan konfirmasi password yang dimasukkan sama 
        if($_POST['password'] == $_POST['konfirmasi_password']){
            include 'koneksi.php';//menyisipkan file untuk koneksi ke database

            //membuat query untuk menguupdate data password yang ada di tabel customer dengan enkripsi SHA2 dengan meng-GET id customer
            $statement = $connection->prepare("UPDATE customer SET password = SHA2(:password,0) WHERE username = '$id' ");
            $statement->bindValue(':password',$_POST['password']);
            $statement->execute();

            //menamilkkann proses jika update password berhasil
            $display_error = "<span class='alert'>Password berhasil diganti</span>";
        }else{
            //menampilkan pesan jika password dan kornfirmasi password tidak sama
            $display_error = "<span class='alert'>Masukan password tidak sama</span>";
        }
    }else{
        // menampilkan pesan jika proses mengupdate password gagal
        $display_error = "<span class='alert'>Gagal untuk mengganti password</span>";
    }
}
?>