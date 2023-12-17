<?php    

	include 'crud/koneksi.php';

	//fungsi validasi password
    function valPassword(&$password, $field_name){
		$character = "/^[a-zA-Z0-9]+$/";
		if (!isset($field_name) || empty($field_name)){
			$password = '* Kolom tidak boleh kosong';
			return false;
		}else if (!preg_match($character, $field_name)){
			$password = '* Karakter spesial tidak diperbolehkan';
			return false;
		}else if (strlen($field_name) > 20){
			$password = '* Maksimal 20 karakter';
			return false;
		}else if (strlen($field_name) < 4){
			$password = '* Minimal 5 karakter';
			return false;
		}else{
			return true;	
		}
	}

	//fungsi validasi NIK
    function valNik(&$nik, $field_name){	
		$character = "/^[0-9]+$/";

		global $connection;

		$statement = $connection->prepare("SELECT COUNT(*) FROM customer WHERE nik = :nik AND username != :username");
		$statement->bindValue(':nik', $_POST['nik']);
		$statement->bindValue(':username', $_SESSION['isUser']);
		$statement->execute(); 
		
		$count = $statement->fetchcolumn();
		if ($count > 0) {
			$nik = '* NIK telah digunakan';
			return false;
		}

		if (!isset($field_name) || empty($field_name)){
			$nik = '* Kolom tidak boleh kosong';
			return false;
		}else if  (!preg_match($character, $field_name)){
			$nik = '* Harus berisi angka';
			return false;
		}elseif (strlen($field_name) < 8){
			$nik = '* Minimal 8 karakter';
			return false;
		}elseif (strlen($field_name) > 8){
			$nik = '* Maksimal 8 karakter';
		}else{
			return true;
		}	
	}


	//fungsi validasi nama
    function valNama(&$nama, $field_name){
		$character = "/^[a-zA-Z ]+$/";
		if (!isset($nama) || empty($field_name)){
			$nama = '* field is required';
			return false;
		}else if (!preg_match($character, $field_name)){
			$nama = '* must containt aphabets only';
			return false;
		}else if (strlen($field_name) > 35){
			$nama = '* Maksimal 35 karakter';
			return false;
		}else{
			return true;	
		}
	}

	//fungsi validasi untuk email edit akun customer
	function valEmail(&$email, $field_name){
		global $connection;

		$statement = $connection->prepare("SELECT COUNT(*) FROM customer WHERE email = :email  AND username != :username");
		$statement->bindValue(':email', $_POST['email']);
		$statement->bindValue(':username', $_SESSION['isUser']);
		$statement->execute(); 
		
		$count = $statement->fetchcolumn();
		if ($count > 0) {
			$email = '* Email telah digunakan';
			return false;
		}

		if (!isset($field_name) || empty($field_name)){
			$email = '* Kolom tidak boleh kosong';
			return false;
		}elseif (!filter_var($field_name,FILTER_VALIDATE_EMAIL)){
			$email = '* email error';
			return false;
		}elseif (strlen($field_name) > 40){
			$email = '* Maksimmal 40 karakter';
			return false;
		}else{
			return true;
		}
	}

	//fungsi validasi untuk tempat lahir customer
    function valTempat(&$tempat, $field_name){
		$character = "/^[a-zA-Z ]+$/";
		if (!isset($field_name) || empty($field_name)){
			$tempat = '* Kolom tidak boleh kosong';
			return false;
		}else if (!preg_match($character, $field_name)){
			$tempat = '* Harus berisi huruf alfabet';
			return false;
		}else if (strlen($field_name) > 35){
			$tempat = '* Maksimal 35 karakter';
			return false;
		}else{
			return true;	
		}
	}

	//fungsi validasi untuk tanggal lahir
    function valTgl(&$tgl, $field_name){	
		if (!isset($field_name) || empty($field_name)){
			$tgl = '* Kolom tidak boleh kosong';
			return false;
		}else{
			return true;
		}	
	}

	//fungsi validasi untuk jenis kelamin
	function valJns_kelamin(&$jns_kelamin, $field_name){	
		if (!isset($field_name) || empty($field_name)){
			$jns_kelamin = '* Kolom tidak boleh kosong';
			return false;
		}else{
			return true;	
		}
	}

	//fungsi validasi untuk agama
    function valAgama(&$agama, $field_name){
		$character = "/^[a-zA-Z ']+$/";
		if (!isset($field_name) || empty($field_name)){
			$agama = '* Kolom tidak boleh kosong';
			return false;
		}else if (!preg_match($character, $field_name)){
			$agama = '* Harus berisi huruf alfabet';
			return false;
		}else if (strlen($field_name) > 20){
			$nama = '* Maksimal 20 karakter';
			return false;
		}else{
			return true;
		}	
	}

	//fungsi validasi untuk pekerjaan
    function valPekerjaan(&$pekerjaan, $field_name){
		$character = "/^[a-zA-Z ]+$/";
		if (!isset($field_name) || empty($field_name)){
			$pekerjaan = '* Kolom tidak boleh kosong';
			return false;
		}else if (!preg_match($character, $field_name)){
			$pekerjaan = '* Harus berisi huruf alfabet';
			return false;
		}else if (strlen($field_name) > 35){
			$pekerjaan = '* Maksimal 35 karakter';
			return false;
		}else{
			return true;
		}	
	}

	//fungsi validasi tlp
    function valTlp(&$no_tlp, $field_name){	
		$character = "/^[0-9]+$/";
		if (!isset($field_name) || empty($field_name)){
			$no_tlp = '* Kolom tidak boleh kosong';
			return false;
		}elseif (!preg_match($character, $field_name)){
			$no_tlp = '* Harus berisi huruf alfabet';
			return false;
		}elseif (strlen($field_name) < 10){
			$no_tlp = '* Miinimal 10 karakter';
			return false;
		}elseif (strlen($field_name) > 13){
			$no_tlp = '* Maksimal 13 karakter';
			return false;
		}else{
			return true;	
		}
	}

	//fungsi validasi alamat
	function valAlamat(&$alamat, $field_name){
		$character = "/^[a-zA-Z0-9 .,']+$/";
		if (!isset($field_name) || empty($field_name)){
			$alamat = '* Kolom tidak boleh kosong';
			return false;
		}elseif (!preg_match($character, $field_name)){
			$alamat = '* Karakter special tidak diperbolehkan';
			return false;
		}elseif (strlen($field_name) > 50){
			$alamat = '* Maksimal 50 karakter';
		}else{
			return true;
		}	
	}

	function validasiJumlah(&$jumlah_error, $field_name){
		$angka = "/^[0-9]+$/";
		if (!isset($field_name)||empty($field_name)){
			$jumlah_error= '* Jumlah Transfer tidak boleh kosong';
		}else if (!preg_match($angka,$field_name)){
			$jumlah_error = '* Jumlah Transfer harus diisi angka';
		}else{
			$jumlah_error = '<span class="sukses">Data sesuai</span>';
			return true;
		}
	}

	  function validasiRekening(&$rekening_error, $field_name){
		$angka = "/^[0-9]+$/";
		if (!isset($field_name)||empty($field_name)){
			$rekening_error= '* Rekening tidak boleh kosong';
		}else if (!preg_match($angka,$field_name)){
			$rekening_error = '* Rekening harus diisi angka';
		}else if (strlen($field_name) != 6){
			$rekening_error = '* Rekening harus 6 digit';
		}else{
			$rekening_error = '<span class="sukses">Data sesuai</span>';
			return true;
		}
	}

	function validasiKeterangan(&$keterangan_err, $field_name){
		$character = "/^[a-zA-Z0-9 .,']+$/";
		if (!isset($field_name) || empty($field_name)){
			return true;
		}elseif (!preg_match($character, $field_name)){
			$keterangan_err = '* Karakter special tidak diperbolehkan';
			return false;
		}elseif (strlen($field_name) > 20){
			$keterangan_err = '* Maksimal 20 karakter';
		}else{
			return true;
		}	
	}
?>


