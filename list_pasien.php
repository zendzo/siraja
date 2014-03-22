<?php include 'part/header.php'; ?>
<?php
//include('function.php'); 
//connection();
echo "<table class='table table-striped table-hover table-bordered' >"; 
echo "<tr>"; 
echo "<td><b>Id</b></td>"; 
echo "<td><b>Nama</b></td>"; 
echo "<td><b>Alamat</b></td>"; 
echo "<td><b>Kodepos</b></td>"; 
echo "<td><b>Telepon</b></td>"; 
echo "<td><b>Gender</b></td>"; 
echo "<td><b>Tampat Lahir</b></td>"; 
echo "<td><b>Tgl Lahir</b></td>"; 
echo "<td><b>Agama</b></td>"; 
echo "<td><b>Pendidikan</b></td>"; 
echo "<td><b>Tipe Pasien</b></td>"; 
echo "<td><b>Gol darah</b></td>";
echo "<td><b>Pilihan</b></td>";  
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `pasien` ORDER BY id desc limit 20") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['nama']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['alamat']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['kodepos']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['telepon']) . "</td>";  
echo "<td valign='top'>" . nl2br( jk($row['jk'])) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['tampat']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['tgl']) . "</td>";  
echo "<td valign='top'>" . nl2br( agama($row['agama'])) . "</td>";  
echo "<td valign='top'>" . nl2br( pendidikan($row['pendidikan'])) . "</td>";  
echo "<td valign='top'>" . nl2br( tipe_pasien($row['tipe'])) . "</td>";  
echo "<td valign='top'>" . nl2br( gol_dar($row['goldarah'])) . "</td>";  
echo "<td valign='top'>
		<a class='btn btn-info btn-xs' href=edit_pasien.php?id={$row['id']}>Edit</a>
		<a class='btn btn-info btn-xs' href=catatan_medis.php?id={$row['id']}>Rekam Medis</a>
		<a class='btn btn-info btn-xs' href=kartu_pasien.php?id={$row['id']}>Kartu Pasien</a>
		<a class='btn btn-info btn-xs' href=resep_pasien.php?id={$row['id']}>Resep</a>
		<a class='btn btn-success btn-xs' href=detail_pasien.php?id={$row['id']}>Detail</a>
		<a class='btn btn-info btn-xs' href=permintaan_pp.php?id={$row['id']}>Buat PPP</a>
		<a class='btn btn-danger btn-xs' href=delete_pasien.php?id={$row['id']}>Delete</a>
		</td> "; 
echo "</tr>"; 
} 
echo "</table>";
echo "<hr />"; 
echo "<a href=pasien_baru.php class='btn btn-success'>Tambah Pasien</a>"; 
?>
<?php include 'part/footer.php'; ?>