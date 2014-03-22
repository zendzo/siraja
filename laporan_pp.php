<?php include 'part/header.php' ?>
<?php 
$id = (int) $_GET['id'];
$pasien = mysql_fetch_array ( mysql_query("SELECT * FROM `ppp`,`pasien` WHERE `ppp`.`pasien_id` = `pasien`.`id` AND `pasien`.`id` = '$id' "));
 ?>
 <div class="panel panel-primary">
	<div class="panel-heading">
		<h4>Buat Permintaan Permeriksaan Lebih Lanjut</h4>
	</div><!-- panel haeding -->
	<div class="panel-body">
			<div class="col-lg-6">
				<form action='' method='GET' class="form-group"> 
				<label><strong>Pasien Id: <?php if(isset($pasien['id']) != 0 ){echo $pasien['id'];}else{ echo "--Nihil--";} ?></strong></label><br/>
				<label><strong>Nama Pasien: <?= $pasien['nama'] ?></strong></label><br/>
				<label><strong>Dokter : <?=dokter($pasien['dokter_id']) ?></strong></label><br/>
				<label><strong>Keterangan : <?php if(isset($pasien['keterangan']) != 0 ){echo $pasien['keterangan'];}else{ echo "--Nihil--";} ?></strong></label><br/>
				<a href="list_pasien.php" class="btn btn-info">Kembali</a>
				</div><!-- col-lg-6 -->
	</div><!-- panel body -->
</div><!-- panel -->
	</div><!-- row -->
 </div><!-- col-lg-12 -->
 <?php include 'part/footer.php' ?>