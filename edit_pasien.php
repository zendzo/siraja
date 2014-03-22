<?php include 'part/header.php'; ?>
<?php
//include('config.php'); 
if (isset($_GET['id']) ) { 
$id = (int) $_GET['id']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `pasien` SET  `nama` =  '{$_POST['nama']}' , WHERE `id` = '$id' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "<p class='text-success'>Data Berhasil di edit</p>" : "<p class='text-primary'>Tidak ada perubahan.</p>"; 
echo "<a href='list_pasien.php' class='btn btn-primary'>Back To Listing</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `pasien` WHERE `id` = '$id' ")); 
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h4>Edit Data Pasien <?= stripslashes($row['nama']) ?></h4>
	</div>
		<div class="panel-body">
			<form action='' method='POST' class="form-group"> 
				<label>Nama:</label>
					<input type='text' name='nama' value='<?= stripslashes($row['nama']) ?>' class="form-control"/> 
				<label>Alamat:</label>
					<textarea name='alamat' class="form-control" rows="4"><?= stripslashes($row['alamat']) ?></textarea>
				<label>Kodepos:</label>
					<input type='text' name='kodepos' value='<?= stripslashes($row['kodepos']) ?>' class="form-control"/> 
				<label>Telepon:</label>
					<input type='text' name='telepon' value='<?= stripslashes($row['telepon']) ?>' class="form-control"/> 
				<label>Jenis Kelamin:</label>
					<input type='text' name='jk' value='<?= stripslashes($row['jk']) ?>' class="form-control"/> 
				<label>Tampat:</label>
					<textarea type='text' name='tampat' class="form-control" rows="4"><?= stripslashes($row['tampat']) ?></textarea>
				<label>Tgl:</label>
					<input type='text' name='tgl' value='<?= stripslashes($row['tgl']) ?>' class="form-control"/> 
				<label>Agama:</label>
					<input type='text' name='agama' value='<?= stripslashes($row['agama']) ?>' class="form-control"/> 
				<label>Pendidikan:</label>
					<input type='text' name='pendidikan' value='<?= stripslashes($row['pendidikan']) ?>' class="form-control"/> 
				<label>Tipe:</label>
					<input type='text' name='tipe' value='<?= stripslashes($row['tipe']) ?>' class="form-control"/> 
				<label>Goldarah:</label>
					<input type='text' name='goldarah' value='<?= stripslashes($row['goldarah']) ?>' class="form-control"/> 
				<p>
					<hr/>
					<input type='submit' value='Update' class="btn btn-info"/>
					<input type='hidden' value='1' name='submitted' /> 
			</form> 
<?php } ?>
		</div>

<?php include 'part/footer.php'; ?>

