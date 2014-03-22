<?php
if (isset($_POST['submitted'])) {
foreach($_POST AS $key => $value) { 
	$_POST[$key] = mysql_real_escape_string($value); 
}
$cek = " SELECT * FROM users WHERE username = '{$_POST['username']}' ";
$recek = mysql_query($cek);
if (mysql_fetch_object($recek)) {
	echo "<div class='alert alert-danger'>
           User {$_POST['username']} Sudah Terdaftar Mohon Cek Kembali. 
           <a href='daftar_user.php' class='alert-link'>Lihat Data</a>.
    </div>"; 
}else{
$password = md5($_POST['password']);
$sql = "INSERT INTO `users` ( `username` ,  `password`,  `jabatan`,  `role`,  `status` ) 
VALUES(  '{$_POST['username']}' ,  '$password',  '{$_POST['jabatan']}',  '{$_POST['role']}',  '{$_POST['aktif']}' ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "<div class='alert alert-success'>
           User {$_POST['username']} Sudah Terdaftar Sebagai {$_POST['jabatan']} - Status (".status($_POST['aktif'])." ) 
           <a href='daftar_user.php' class='alert-link'>Lihat Data</a>.
    </div>";
    } 
} 
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h4>Daftar User Pemakai Baru</h4>
	</div><!-- panel haeding -->
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-6">
				<form action='' method='POST' class="form-group"> 
				<label><strong>Username:</strong></label>
					<input type='text' name='username'/ class="form-control"> 
				<label><strong>Password:</strong></label>
					<input type='text' name='password'/ class="form-control"> 
				<label><strong>Jabatan:</strong></label>
					<input type='text' name='jabatan' class="form-control"/>
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
                    <hr/>
				<p>
					<input type='submit' value='Registrasi User' class="btn btn-warning"/>
					<input type='hidden' value='1' name='submitted'  class="form-control"/> 
				</form>
				</div><!-- col-lg-6 -->
		</div><!-- div row -->
	</div><!-- panel body -->
</div><!-- panel -->

