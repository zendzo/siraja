<?php include 'part/header.php'; ?>
<?php 
if(isset($_GET['id'])){
	$id = (int) $_GET['id']; 
	$row = mysql_fetch_array ( mysql_query("SELECT * FROM `pasien` WHERE `id` = '$id' "));
	$row_medis = mysql_fetch_array ( mysql_query("SELECT * FROM `catatan_medis` WHERE `id_pasien` = '$id' order by 'id' desc limit 1"));
}else{
	echo "<p class='text-danger'>Silahkan Pilih Id</p>";
}
?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h4>Detail Data Pasien <?= stripslashes($row['nama']) ?></h4>
	</div>
		<div class="panel-body">
			<form action='' class="form-group"> 
				<label>Nama: <?= $row['nama'] ?>
				<label>Alamat: </label> <p class=" text-primary"><?= $row['alamat'] ?></p>
				<label>Kode pos: </label> <p class=" text-primary"><?= $row['kodepos'] ?></p>
				<label>Telepon: </label> <p class=" text-primary"><?= $row['telepon'] ?></p>
				<label>Jenis Kelamin: </label> <p class=" text-primary"><?= jk($row['jk']) ?></p>
				<label>Tempat Tanggal Lahir: </label> <p class=" text-primary"><?= $row['tampat'] ?> - <?= $row['tgl'] ?></p>
				<label>Agama: </label> <p class=" text-primary"><?= agama($row['agama']) ?></p>
				<label>Pendidikan: </label> <p class=" text-primary"><?= pendidikan($row['pendidikan']) ?></p>
				<label>Tipe: </label> <p class=" text-primary"><?= tipe_pasien($row['tipe']) ?></p>
				<label>Goldarah: </label> <p class=" text-primary"><?= gol_dar($row['goldarah']) ?></p>
				<label>Tanggal Terakhir Catatan medis : </label> <p class=" text-primary"><?= $row_medis['tanggal'] ?></p>
				<label for="">Tekanan Darah: </label> <p class=" text-primary"><?= $row_medis['takanan_darah'] ?></p>
				<label for="">Alergi: </label> <p class=" text-primary"><?= $row_medis['alergi'] ?></p>
				<label for="">Riwayat Penyakit : </label> <p class=" text-primary"><?= $row_medis['riwayat_penyakit'] ?></p>
				<label for="">Kode ICD: </label> <p class=" text-primary"><?= $row_medis['kode_ICD'] ?></p>
				<label for="">Keterangan: </label> <p class=" text-primary"><?= $row_medis['Keterangan'] ?></p>
			</form> 
		</div>
	</div>
</div>

<?php $query = mysql_query("SELECT * FROM `pasien`,`resep`,`catatan_medis` WHERE `resep`.`pasien_id`=`pasien`.`id` and `pasien`.`id` = '$id' ORDER BY `catatan_medis`.`tanggal` DESC ");
	$row = mysql_fetch_array($query);
 ?>
 <div class="col-lg-12">
 	<div class="row">
	 	<div class="panel panel-primary">
		 	<div class="panel-heading">
		 		<p class="lead">Form Resep Obat Pasien</p>
		 		<p><small>Resep Baru Muncul Ketika Rekam medis dan pembuatan resep selesai</small></p>
		 	</div><!-- panel-heading -->

		 	<div class="panel-body">
			 	<div class="col-lg-9">
			 		<div class="panel panel-info">
			 		<div class="panel-heading">
			 			<h5>Catatan Medis Terakhir <?= $row['nama'] ?></h5>
			 		</div><!-- panel heading ke 2 -->
			 		<div class="panel-body">
			 			<table class="table table-striped table-bordered">
				 		<tr>
			 				<td>Tanggal</td>
			 				<td>Tekanan Darah</td>
			 				<td>Alergi</td>
			 				<td>Riwayat Penyakit</td>
			 				<td>Keterangan</td>
			 			</tr>
			 			<tr>
			 				<td><?= $row['tanggal'] ?></td>
			 				<td><?= $row['takanan_darah'] ?></td>
			 				<td><?= $row['alergi'] ?></td>
			 				<td><?= $row['riwayat_penyakit'] ?></td>
			 				<td><?= $row['Keterangan'] ?></td>
			 			</tr>
			 			</table>
			 		</div><!-- panel body -->
			 	</div><!-- panel primary -->
		 		</div><!-- col-lg-6 -->

		 		<table class="table table-bordered table-hover">
		 			<tr>
		 				<td>Id</td>
		 				<td>Dokter Id</td>
		 				<td>Obat Id</td>
		 				<td>Dosis</td>
		 				<td>Tanggal</td>
		 			</tr>
		 			<tr>
		 				<td><?= $row['id'] ?></td>
		 				<td><?= $row['dokter_id'] ?></td>
		 				<td><?= $row['obat_id'] ?></td>
		 				<td><?= $row['dosis'] ?></td>
		 				<td><?= $row['tanggal'] ?></td>
		 			</tr>
		 		</table>
		 	</div><!-- panel body -->
		 </div><!-- panel primary -->
<?php 
$id = (int) $_GET['id'];
$pasien = mysql_fetch_array ( mysql_query("SELECT * FROM `ppp` WHERE `pasien_id` = '$id' "));
 ?>
 <div class="panel panel-primary">
	<div class="panel-heading">
		<h4>Buat Permintaan Permeriksaan Lebih Lanjut</h4>
	</div><!-- panel haeding -->
	<div class="panel-body">
			<div class="col-lg-6">
				<form action='' method='GET' class="form-group"> 
				<label><strong>Pasien Id: <?php if(isset($pasien['id']) != 0 ){echo $pasien['id'];}else{ echo "--Nihil--";} ?></strong></label><br/>
				<label><strong>Nama Pasien: <?php if(isset($row['nama']) != 0 ){echo $row['nama'];}else{ echo "--Nihil--";} ?></strong></label><br/>
				<label><strong>Dokter : <?php if(isset($pasien['dokter_id']) != 0 ){echo $pasien['dokter_id'];}else{ echo "--Nihil--";} ?></strong></label><br/>
				<label><strong>Keterangan : <?php if(isset($pasien['ketetangan']) != 0 ){echo $pasien['ketetangan'];}else{ echo "--Nihil--";} ?></strong></label><br/>
				<a href="list_pasien.php" class="btn btn-info">Kembali</a>
				</div><!-- col-lg-6 -->
	</div><!-- panel body -->
</div><!-- panel -->
	</div><!-- row -->
 </div><!-- col-lg-12 -->
<?php include 'part/footer.php'; ?>