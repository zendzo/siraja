<?php include 'part/header.php'; ?>
<?php
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `pasien` ( `nama` ,  `alamat` ,  `kodepos` ,  `telepon` ,  `jk` ,  `tampat` ,  `tgl` ,  `agama` ,  `pendidikan` ,  `tipe` ,  `goldarah`  ) 
VALUES(  '{$_POST['nama']}' ,  '{$_POST['alamat']}' ,  '{$_POST['kodepos']}' ,  '{$_POST['telepon']}' ,  '{$_POST['jk']}' ,  '{$_POST['tampat']}' ,  '{$_POST['tgl']}' ,  '{$_POST['agama']}' ,  '{$_POST['pendidikan']}' ,  '{$_POST['tipe']}' ,  '{$_POST['goldarah']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "<div class='alert alert-success'>
           Data Berhasil Di Simpan. 
           <a href='list_pasien.php' class='alert-link'>Lihat Data</a>.
    </div>"; 
echo "<a href='list_pasien.php'>Back To Listing</a>"; 
} 
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h4>Daftar Pasien Baru</h4>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-6">
				<form action='' method='POST' class="form-group"> 
				<label>Nama:</label>
					<input type='text' name='nama'/ class="form-control"> 
				<label>Alamat:</label>
					<textarea name='alamat' class="form-control" rows="3"> </textarea>
				<label>Kode pos:</label>
					<input type='text' name='kodepos' class="form-control"/> 
				<label>Telepon:</label>
					<input type='text' name='telepon' class="form-control"/> 
				<label>Jenis Kelamin:</label>
					<select class="form-control" name="jk">
	                    <option value="1">Pria</option>
	                    <option value="2">Wanita</option>
                    </select>
				<label>Tampat Lahir:</label>
					<textarea name='tampat' class="form-control" rows="3"/> </textarea>
				<label>Tgl Lahir:</label>
					<input type='date' name='tgl' class="form-control" id="datepicker"/> 
				<label>Agama:</label>
					<select class="form-control" name="agama">
	                    <option value="1">Islam</option>
	                    <option value="2">Kristen</option>
	                    <option value="3">Katolik</option>
	                    <option value="4">Hindu</option>
	                    <option value="5">Budha</option>
	                    <option value="6">Lainya</option>
                    </select>
				<label>Pendidikan:</label>
					<select class="form-control" name="pendidikan">
	                    <option value="1">SD</option>
	                    <option value="2">SMP</option>
	                    <option value="3">SMA</option>
	                    <option value="4">D3</option>
	                    <option value="5">S1</option>
	                    <option value="6">Lainya</option>
                    </select>
				<label>Tipe Pasien:</label>
					<select class="form-control" name="tipe">
	                    <option value="1">Umum</option>
	                    <option value="2">Militer</option>
	                    <option value="3">Jaminan</option>
	                    <option value="4">Lainya</option>
                    </select>
				<label>Gol Darah:</label>
					<select class="form-control" name="goldarah">
	                    <option value="1">A</option>
	                    <option value="2">B</option>
	                    <option value="3">O</option>
	                    <option value="4">AB</option>
                    </select>
                    <hr/>
				<p>
					<input type='submit' value='Registrasi Pasien' class="btn btn-success"/>
					<input type='hidden' value='1' name='submitted'  class="form-control"/> 
				</form>
				</div>
		</div>
	</div>
</div>


<?php include 'part/footer.php'; ?>