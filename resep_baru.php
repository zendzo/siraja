<?php include 'part/header.php'; ?>
<?php
if(isset($_GET['id'])){
	$id = (int) $_GET['id'];
	$row = mysql_fetch_array ( mysql_query("SELECT * FROM pasien WHERE id = $id "));
}
if (isset($_POST['simpan'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `resep` ( `pasien_id` ,  `dokter_id` ,  `obat_id` ,  `dosis` ) VALUES(  '{$_POST['pasien_id']}' ,  '{$_POST['dokter_id']}',  '{$_POST['obat_id']}',  '{$_POST['dosis']}' ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "<div class='alert alert-success'>
           Data Berhasil Di Simpan. 
           <a href='detail_pasien.php?id={$row['id']}' class='alert-link'>Lihat Data</a>.
    </div>"; 
}

if(isset($_POST['simpan']))
 ?>
 <div class="col-lg-12">
 	<div class="row">
 		<div class="panel panel-primary">
	 		<div class="panel-heading">
	 			<p class="lead">Resep Baru</p>
	 		</div>
	 		<div class="panel-body">
	 			<div class="col-lg-3"></div>

	 			<div class="col-lg-6">
	 				<form action="" class="form-group" method="POST">
	 					<h2><small class="text-primary"><?= $row['nama'] ?></small></h2>
	 					<input type='hidden' name='pasien_id' value='<?= $row['id'] ?>' /> 
						<label><strong>Dokter:</strong></label>
						<input type='text' name='dokter_id' class="form-control" /> 
						<label><strong>Obat:</strong></label>
						<input type='text' name='obat_id' class="form-control" />
						<label><strong>Dosis:</strong></label>
						<input type='text' name='dosis' class="form-control" />
						<hr>
						<p><input type='submit' value='Simpan Resep' class="btn btn-success" />
						<input type='hidden' value='1' name='simpan' /> 
	 				</form>
	 			</div>

	 			<div class="col-lg-3"></div>
	 		</div>
 		
 		</div><!-- penel body -->
 	</div><!-- row -->
 </div><!-- col-lg-6 -->
 <?php include 'part/footer.php'; ?>