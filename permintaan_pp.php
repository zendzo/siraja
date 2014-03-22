<?php include 'part/header.php'; ?>
<?php
if (isset($_POST['simpan'])) {
foreach($_POST AS $key => $value) { 
$_POST[$key] = mysql_real_escape_string($value);
}
$sql = "INSERT INTO `ppp` ( `pasien_id` ,  `dokter_id`,  `keterangan` ) 
VALUES(  '{$_POST['pasien_id']}' , '{$_POST['dokter_id']}',  '{$_POST['keterangan']}' ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "<div class='alert alert-success'>
		<a href='laporan_pp.php?id='".$_GET['id']." class='alert-link'>Lihat Data</a>.
    </div>";
}
$id = (int) $_GET['id'];
$pasien = mysql_fetch_array ( mysql_query("SELECT * FROM `pasien` WHERE `id` = '$id' "));
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h4>Buat Permintaan Permeriksaan Lebih Lanjut</h4>
	</div><!-- panel haeding -->
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-6">
				<form action='' method='POST' class="form-group"> 
				<label><strong>Pasien Id: <?= $pasien['id'] ?></strong></label><br/>
				<input type="hidden" name="pasien_id" value="<?= $pasien['id'] ?>" />
				<label><strong>Nama Pasien: <?= $pasien['nama'] ?></strong></label><br/>
					<label>Dokter:</label>
					<select class="form-control" name="dokter_id">
	                    <option value="1">Umum</option>
	                    <option value="2">Spesialis</option>
                    </select>
				<label><strong>Keterangan:</strong></label>
					<textarea type='text' name='keterangan' class="form-control" rows="5"></textarea>
                    <hr/>
				<p>
					<input type='submit' value='Simpan' class="btn btn-warning"/>
					<a class='btn btn-info' href="list_pasien.php">Back</a>
					<input type='hidden' value='1' name='simpan'  class="form-control"/> 
				</form>
				</div><!-- col-lg-6 -->
		</div><!-- div row -->
	</div><!-- panel body -->
</div><!-- panel -->
<?php include 'part/footer.php'; ?>