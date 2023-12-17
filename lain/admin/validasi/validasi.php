<?php    

	include 'crud/koneksi.php';

	//fungsi untuk  validasi username
    function valUsername(&$username, $field_name){	
        $character = "/^[a-zA-Z]+$/";
        $character2 = "/^[0-9]+$/";
        $fixCharacter = "/^[a-zA-z0-9]/";

		global $connection;

		$statement = $connection->prepare("SELECT COUNT(*) FROM customer WHERE username = :username");
		$statement->bindValue(':username', $_POST['username']);
		$statement->execute(); 
		
		$count = $statement->fetchcolumn();
		if ($count > 0) {
			$username = '* Username telah digunakan';
			return false;
		}

        if (!isset($field_name) || empty($field_name)){
            $username = '* Kolom tidak boleh kosong';
			return false;
		}elseif (preg_match($character,$field_name) || preg_match($character2,$field_name)){
            $username = '* Harus kombinasi antara huruf dan angka';
			return false;
		}elseif (!preg_match($fixCharacter,$field_name)){
            $username = '* Karakter spesial tidak diperbolehkan';
			return false;
		}elseif (strlen($field_name) > 25){
            $username  = '* Maksimal 25 karakter';
			return false;
		}elseif (strlen($field_name) < 4){
            $username  = '* Minimal 4 karakter';
			return false;
		}else{
            return true;
		}	
    }

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
		$statement->bindValue(':username', $_GET['username']);
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

	//fungsi validasi Rek
	function valRek(&$rek, $field_name){	
		$character = "/^[0-9]+$/";

		global $connection;

		if (!isset($field_name) || empty($field_name)){
			$rek = '* Kolom tidak boleh kosong';
			return false;
		}else if  (!preg_match($character, $field_name)){
			$rek = '* Harus berisi angka';
			return false;
		}elseif (strlen($field_name) < 6){
			$rek = '* Minimal 6 karakter';
			return false;
		}elseif (strlen($field_name) > 6){
			$rek = '* Maksimal 6 karakter';
		}elseif(isset($field_name)){
			if(isset($field_name)){
				$statement = $connection->prepare("SELECT COUNT(*) FROM rekening WHERE no_rek = :no_rek ");
				$statement->bindValue(':no_rek', $_POST['no_rek']);
				$statement->execute(); 
				
				$count = $statement->fetchcolumn();
				if ($count < 1) {
					$rek = '* Nomor Rekening salah';
					return false;
				}

				$statement = $connection->prepare("SELECT COUNT(*) FROM rekening WHERE no_rek = :no_rek AND username = :username");
				$statement->bindValue(':no_rek', $_POST['no_rek']);
				$statement->bindValue(':username', $_GET['username']);
				$statement->execute(); 
				
				$count = $statement->fetchcolumn();
				if ($count > 0) {
					$rek = '* Nomor Rekening telah digunakan';
					return false;
				}
				return true;
			}	
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

	//fungsi validsi untuk untuk email registrasi customer
	function valEmail2(&$email, $field_name){
		global $connection;

		$statement = $connection->prepare("SELECT COUNT(*) FROM customer WHERE email = :email");
		$statement->bindValue(':email', $_POST['email']);
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
			$email = '* Maksimal 40 karakter';
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
		$statement->bindValue(':username', $_GET['username']);
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
?>
