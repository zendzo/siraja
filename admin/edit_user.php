<?php
if (isset($_GET['id']) ) { 
$id = (int) $_GET['id']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); }
if(is_null($_POST['password'])){
	$row_password = mysql_fetch_array ( mysql_query("SELECT * FROM `users` WHERE `id` = '$id' ")); 
	$password = $row_password['password'];
}else{
	$password = md5($_POST['password']) ;
}
$users = "UPDATE `users` SET  `username` =  '{$_POST['username']}' , `password` =  '$password' ,`jabatan` =  '{$_POST['jabatan']}' ,`role` =  '{$_POST['role']}' ,`status` =  '{$_POST['aktif']}' WHERE `id` = '$id' "; 
$user_detail = "UPDATE `user_detail` SET  `nama_lengkap` =  '{$_POST['nama_lengkap']}' , `alamat` =  '{$_POST['alamat']}' ,`pendidikan` =  '{$_POST['pendidikan']}' WHERE `user_id` = '$id' "; 
mysql_query($users) or die(mysql_error());
mysql_query($user_detail) or die(mysql_error());
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `users` WHERE `id` = '$id' ")); 
echo "<div class='alert alert-success'>
           Data User {$_POST['username']} Berhasil di Update Status( ".status($row['status'])." ) 
           <a href='daftar_user.php' class='alert-link'>Lihat Data</a>.
    </div>";
}


$row = mysql_fetch_array ( mysql_query("SELECT * FROM `users`,`user_detail` WHERE `users`.`id` = '$id' and `user_detail`.`user_id` = `users`.`id`   ")); 
?>
<div class="row">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4>Edit Data User : <?= stripslashes($row['username']) ?></h4>
		</div>
				<div class="panel-body">
					<div class="col-lg-6">
					<form action='' method='POST' class="form-group"> 
						<label>Username:</label>
							<input type='text' name='username' value='<?= stripslashes($row['username']) ?>' class="form-control"/>
						<label>Password:</label>
							<input type='text' name='password' class="form-control"/> 
						<label>Jabatan:</label>
							<input type='text' name='jabatan' value='<?= stripslashes($row['jabatan']) ?>' class="form-control"/> 
						<label><strong>Group:</strong></label>
							<select class="form-control" name="role">
			                    <option value="2">Dokter</option>
			                    <option value="3">Staff</option>
		                    </select>
						<label><strong>Aktif ? :</strong></label>
							<select class="form-control" name="aktif">
			                    <option value="1">Ya</option>
			                    <option value="0">Tidak</option>
		                    </select>

					</div><!-- col-lg-6 -->
					<div class="col-lg-6">
						<label>Nama Lengkap :</label>
							<input type='text' name='nama_lengkap' value='<?= stripslashes($row['nama_lengkap']) ?>' class="form-control"/>
						<label>Alamat :</label>
							<input type='text' name='alamat' value='<?= stripslashes($row['alamat']) ?>' class="form-control"/>
					<label>Pendidikan:</label>
						<select class="form-control" name="pendidikan" >
		                    <option value="1">SD</option>
		                    <option value="2">SMP</option>
		                    <option value="3">SMA</option>
		                    <option value="4">D3</option>
		                    <option value="5">S1</option>
		                    <option value="6">Lainya</option>
	                    </select>	
							<hr/>
							<input type='submit' value='Update' class="btn btn-info"/>
							<a href="daftar_user.php" class="btn btn-primary"> Kembali </a>
							<input type='hidden' value='1' name='submitted' /> 
					</form>
					</div><!-- col-lg-6 -->
				</div><!-- panel-body -->
		</div><!-- pannel heading -->
</div><!-- row -->

<?php } ?>
