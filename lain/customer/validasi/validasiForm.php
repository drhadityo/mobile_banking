<?php
	include 'crud/crud.php'; //menyisipkan file crud.php

	include 'validasi.php'; //menyisipkan file validasi.php

    // variabel kosong yang nantinya akan berisi pesan validasi
	$nama = $nik = $email = $tempat = $tgl = $jns_kelamin = $agama = $agama = $pekerjaan = $no_tlp = $alamat = $display_error = "";

    //jika disubmit maka program akan dijalankan
    if(isset($_POST['submit'])){

        //memanggil fungsi dari validasi.php dan menyimpannya didalam variabel
        $namaCus = valNama($nama, $_POST['nama']);
        $nikCus = valNik($nik, $_POST['nik']);
        $emailCus = valEmail($email, $_POST['email']);
        $tempatCus = valTempat($tempat, $_POST['tempat']);
        $tglCus = valTgl($tgl, $_POST['tgl_lahir']);
        $jk = valJns_kelamin($jns_kelamin, $_POST['jns_kelamin']);
        $agamaCus = valAgama($agama,$_POST['agama']);
        $pekerjaanCus = valPekerjaan($pekerjaan,$_POST['pekerjaan']);
        $tlp = valTlp($no_tlp,$_POST['no_tlp']);
        $alamatCus = valAlamat($alamat,$_POST['alamat']);

        //jika semua fungsi yang diambil bernilai benar maka memanggil fungsi dari crud.php
        if(($namaCus && $nikCus && $tempatCus && $emailCus && $tglCus && $jk && $agamaCus && $pekerjaanCus && $tlp && $alamatCus) == true){
            editprofil($_SESSION['isUser']);
            //menapilkan pesan jika proses update detail profil berhasil
            $display_error = "<span class='succes'>Form sukses terkirim</span>";
        }else{
            //menapilkan pesan jika proses update detail profil berhasil
            $display_error = "<span class='alert'>Form gagal terkirim</span>";
        }
    }
?>