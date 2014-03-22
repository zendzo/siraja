<?php include 'part/header.php'; ?>
<?php 
if(isset($_GET['id'])){
	$id = (int) $_GET['id'];
	$query = mysql_query("SELECT * FROM `pasien`,`resep`,`catatan_medis` WHERE `resep`.`pasien_id`=`pasien`.`id` and `pasien`.`id` = '$id' ORDER BY `catatan_medis`.`tanggal` DESC ");
	$row = mysql_fetch_array($query);
}
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
		 		<a href='resep_baru.php?id=<?= $id ?>' class="btn btn-success">Resep Baru</a>
		 		<a href="list_pasien.php" class="btn btn-info">Kembali</a>
		 	</div><!-- panel body -->
		 </div><!-- panel primary -->
	</div><!-- row -->
 </div><!-- col-lg-12 -->

 <?php include 'part/footer.php'; ?>