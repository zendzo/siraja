<?php 
if(isset($_GET['id'])){
	$id = (int) $_GET['id']; 
	$row = mysql_fetch_array ( mysql_query("SELECT * FROM `pasien` WHERE `id` = '$id' "));
}else{
	echo "<p class='text-danger'>Silahkan Pilih Id</p>";
}
?>
		<div class="panel-body">
			<div class="col-lg-6 align-right">
				<h4>Nama:</h4>
				<h4>Alamat:</h4>
				<h4>Kode pos:</h4>
				<h4>Telepon:</h4>
				<h4>Jenis Kelamin:</h4>
				<h4>Tempat Tanggal Lahir</h4>
				<h4>Agama:</h4>
				<h4>Pendidikan:</h4>
				<h4>Tipe:</h4>
				<h4>Goldarah:</h4>
				
			</div>
			<form action='' class="form-group"> 
				<h4><?= $row['nama'] ?></h4>
				<h4><?= $row['alamat'] ?></h4>
				<h4><?= $row['kodepos'] ?></h4>
				<h4><?= $row['telepon'] ?></h4>
				<h4><?= jk($row['jk']) ?></h4>
				<h4><?= $row['tampat'] ?> - <?= $row['tgl'] ?></h4> 
				<h4><?= agama($row['agama']) ?></h4>
				<h4><?= pendidikan($row['pendidikan']) ?></h4>
				<h4><?= tipe_pasien($row['tipe']) ?></h4>
				<h4><?= gol_dar($row['goldarah']) ?></h4>
			</form> 
</div>