<?php
include 'crud/crud.php'; //menyisipkan file crud.php

include 'validasi.php'; //menyisipkan file validasi.php

$no_rek = $display_error = ""; // variabel kosong yang nantinya akan berisi pesan validasi

//jika disubmit maka program akan dijalankan
if(isset($_POST['submit'])){

    //memanggil fungsi dari validasi.php dan menyimpannya didalam variabel
    $rek = valRek($no_rek, $_POST['no_rek']);

    //jika semua fungsi yang diambil bernilai benar maka program akan dicek
    if(($rek) == true){
        addRekening($id, $_POST['no_rek']);
        //menamplkan pesan jika proses registrasi berhasil
        $display_error = "<span class='alert'>Berhasil menghubungkan rekening</span>";
    }else{
        // menampilkan pesan jika proses tambah gagal
        $display_error = "<span class='alert'>Gagal menghubungkan rekening</span>";
    }
}
?>