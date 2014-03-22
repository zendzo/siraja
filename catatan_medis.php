<?php include 'part/header.php'; ?>
<?php
if (isset($_POST['simpan'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `catatan_medis` ( `id_pasien` ,  `tanggal` ,  `takanan_darah` ,  `alergi` ,  `riwayat_penyakit` ,  `kode_ICD` ,  `Keterangan`  ) VALUES(  '{$_POST['id_pasien']}' ,  '{$_POST['tanggal']}' ,  '{$_POST['takanan_darah']}' ,  '{$_POST['alergi']}' ,  '{$_POST['riwayat_penyakit']}' ,  '{$_POST['kode_ICD']}' ,  '{$_POST['Keterangan']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "<div class='alert alert-success'>
           Data Berhasil Di Simpan. 
           <a href='detail_pasien.php?id={$_GET['id']}' class='alert-link'>Lihat Data</a>.
    </div>"; 
} 
?>
<?php 
if(isset($_GET['id'])){
	$id = (int) $_GET['id']; 
	$row = mysql_fetch_array ( mysql_query("SELECT * FROM `pasien` WHERE `id` = '$id' ")); 	
}else{
	echo "<p class='text-danger'>Silahkan Pilih Id</p>";
}

?>
<div class="form-group">
	<form action='' method='POST'> 
	<input type='hidden' name='id_pasien' value='<?= stripslashes($row['id']) ?>'class="form-control"/>
	<h1><small class="text-primary"><?= $row['nama'] ?></small></h1> 
	<input type='hidden' name='tanggal' value='<?= date('d-m-Y') ?>' class="form-control"/> 
	<label>Takanan Darah:</label>
	<input type='text' name='takanan_darah'class="form-control"/> 
	<label>Alergi:</label>
	<input type='text' name='alergi'class="form-control"/> 
	<label>Riwayat Penyakit:</label>
	<textarea name='riwayat_penyakit'class="form-control" rows="5"> </textarea>
	<label>Kode ICD:</label>
	<input type='text' name='kode_ICD'class="form-control"/> 
	<label>Keterangan:</label>
	<textarea name='Keterangan'class="form-control" rows="5"> </textarea>
	<hr/>
	<p><input type='submit' value='Simpan Catatan Medis' class="btn btn-success" />
		<input type='hidden' value='1' name='simpan' /> 
</form> 
</div>

<?php include 'part/footer.php'; ?>