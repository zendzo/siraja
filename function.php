<?php
	function connection(){
		$koneksi = mysql_connect("localhost","root","") or die ("connection failed");
		mysql_select_db("rawat_jalan") or die ("database error");
		return $koneksi;
	}
	
	function destroy_connection($koneksi){
		mysql_close($koneksi);
	}
	
	function to_array($data){
		$result = array();
		while($hasil = mysql_fetch_array($data)){
			$result[] = $hasil;
		}
		return $result;
	}	

	function get_user($where = ""){
		$koneksi = connection();
		$data = mysql_query("select * from users $where;") or die ("query error");
		destroy_connection($koneksi);
		return to_array($data);
	}

	function insert_user($username,$nama_lengkap,$password){
		$koneksi = connection();
		$password_en = md5($password);
		$data = mysql_query("insert into users values ('$username','$password_en','$nama_lengkap');") or die ("query error");
		destroy_connection($koneksi);
		return $data;
	}
	
	function delete_user($username){
		$koneksi = connection();
		$data = mysql_query("delete from users where username = '$username';") or die ("query error");
		destroy_connection($koneksi);
		return $data;
	}
	
	function update_user($username,$nama_lengkap,$password){
		$koneksi = connection();
		$data = mysql_query("update users set nama_lengkap = '$nama_lengkap',password = '$password' where username = '$username';") or die ("query error");
		destroy_connection($koneksi);
		return $data;
	}
	
	function cek_login(){
		if(!isset($_SESSION)){
			session_start();
		}
		
		if(!isset($_SESSION['username'])){
			header("location:login.php");
		}
	}
	function logout(){
		session_start();
		$_SESSION[] = array();
		session_destroy();
		header('location:index.php');
	}

	function cek_admin(){
		if($_SESSION['username']['role'] != 1){
			return false;
		}else{
			return true;
		}
	}
	function cek_dokter(){
		if($_SESSION['username']['role'] != 2){
			return true;
		}else{
			return false;
		}
	}

	/* meretrun nilai di edit pasien */
	
	function gol_dar($golongan){
		switch ($golongan) {
			case '1':
				return "A";
				break;

				case '2':
				return "B";
				break;

				case '3':
				return "O";
				break;

				case '4':
				return "AB";
				break;
		}
	}
	function jk($jenis){
		switch ($jenis) {
			case '1':
				return 'Pria';
				break;
			
			case '2	':
				return 'Wanita';
				break;
		}
	}

	function agama($agama){
		switch ($agama) {
			case '1':
				return "Islam";
				break;
			
			case '2':
				return "Kristen";
				break;
			case '3':
				return "Katolik";
				break;
			case '4':
				return "Hindu";
				break;
			case '5':
				return "Budha";
				break;
			default:
				return "Lainya";
				break;
		}
	}

	function pendidikan($nilai){
		switch ($nilai) {
			case '1':
				return "SD";
				break;
			case '2':
				return "SMP";
				break;
			case '3':
				return "SMA";
				break;
			case '4':
				return "D3";
				break;
			case '5':
				return "S1";
				break;
			
			default:
				return "Lainya";
				break;
		}
	}

	function tipe_pasien($nilai){
		switch ($nilai) {
			case '1':
				return "Umum";
				break;
			case '2':
				return "Militer";
				break;
			case '3':
				return "Jaminan";
				break;
			case '4':
				return "Lainya";
				break;			
			default:
				return "Lainya";
				break;
		}
	}

	function status($nilai){
		switch ($nilai) {
			case '1':
				return 'Aktif';
				break;
			
			default:
				return 'Non Aktif';
				break;
		}
	}

	function group($nilai){
		switch ($nilai) {
			case '1':
				return 'Admin';
				break;
			case '2':
				return 'Dokter';
				break;
			case '3':
				return 'Staff';
				break;
		}
	}

	function dokter($nilai){
		switch ($nilai) {
			case '1':
				return 'Umum';
				break;
			
			case '2': 	
				return 'Spesialis';
				break;
				
			default:
				return 'Nihil';
				break;
		}
	}
?>