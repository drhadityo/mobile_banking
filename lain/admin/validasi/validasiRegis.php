<?php
include 'crud/crud.php'; //menyisipkan file crud.php

include 'validasi.php'; //menyisipkan file validasi.php

$user = $pass = $nama = $email = $display_error = ""; // variabel kosong yang nantinya akan berisi pesan validasi

//jika disubmit maka program akan dijalankan
if(isset($_POST['submit'])){

    //memanggil fungsi dari validasi.php dan menyimpannya didalam variabel
    $username = valUsername($user, $_POST['username']);
    $password = valPassword($pass, $_POST['password']);
    $namaCus = valNama($nama, $_POST['nama']);
    $emailCus = valEmail2($email, $_POST['email']);

    //jika semua fungsi yang diambil bernilai benar maka memanggil fungsi dari crud.php
    if(($username && $password && $namaCus && $emailCus) == true){
        registerProfil($_POST['username'], $_POST['password']);
        //menamplkan pesan jika proses registrasi berhasil
        $display_error = "<span class='alert'>Registrasi berhasil</span>";
    }else{
        //menampilkan pesan jika proses registrasi gagal
        $display_error = "<span class='alert'>Registrasi gagal</span>";
    }
}
?>