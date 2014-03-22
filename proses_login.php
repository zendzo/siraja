<?php
include 'function.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		$result = get_user("where username = '$username' and password = '$password' and status = '1' ");
		if ($result != NULL){
			session_start();
			$_SESSION['username'] = array(
				'username' => $result[0]['username'],
				'jabatan' =>  $result[0]['jabatan'],
				'role' =>  $result[0]['role'],
				'id' =>  $result[0]['id']
				);
			if(cek_admin()){
				header('location:admin');
			}
			header('location:index.php');
		}else{
			header('location:login.php?message=0');
		}
}

?>