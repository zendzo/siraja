<?php include 'part/header.php'; ?>
<?php 
	if(isset($_GET['keyword']))
		{
			$keyword = strtolower($_GET['keyword']);
			$pasien = mysql_fetch_array ( mysql_query("SELECT * FROM `pasien` WHERE `nama` LIKE '%$keyword%' "));
		}

		if($pasien){
?>
			
<table class='table table-striped table-hover table-bordered' >
<tr>
<td><b>Nama</b></td>
<td><b>Alamat</b></td>
<td><b>Telepon</b></td>
<td><b>Gender</b></td>
<td><b>Tipe Pasien</b></td>
<td><b>Gol darah</b></td>
<td><b></b></td>
</tr>
<tr>
<td valign='top'><?= nl2br( $pasien['nama']) ?></td>
<td valign='top'><?= nl2br( $pasien['alamat']) ?></td>
<td valign='top'><?= nl2br( $pasien['telepon']) ?></td>
<td valign='top'><?= jk( $pasien['jk']) ?></td>
<td valign='top'><?= tipe_pasien( $pasien['tipe']) ?></td>
<td valign='top'><?= gol_dar( $pasien['goldarah']) ?></td>
<?php
echo "<td valign='top'><p>
		<a class='btn btn-default btn-circle' href=edit_pasien.php?id={$pasien['id']}>Edit</a>
		<a class='btn btn-default btn-circle' href=catatan_medis.php?id={$pasien['id']}>Rekam Medis</a>
		<a class='btn btn-default btn-circle' href=kartu_pasien.php?id={$pasien['id']}>Kartu Pasien</a>
		<a class='btn btn-default btn-circle' href=resep_pasien.php?id={$pasien['id']}>Resep</a>
		<a class='btn btn-default btn-circle' href=detail_pasien.php?id={$pasien['id']}>Detail</a>
		<a class='btn btn-default btn-circle' href=delete_pasien.php?id={$pasien['id']}>Delete</a>
		</td> ";
?>
</tr>
<?php }else{
	echo "<div class='alert alert-success'>Data Tidak di temukan</div>";
} ?>
 <?php include 'part/footer.php'; ?>
