<?php include 'part/header.php'; ?>
<?php include 'detail_pasien.inc.php'; ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h4>Detail Riwayat Berobat Pasien</h4>
	</div>
		<div class="panel-body">
			
<?php
echo "<table class='table table-striped' >"; 
echo "<tr>"; 
echo "<td><b>No</b></td>"; 
echo "<td><b>Tanggal</b></td>";
echo "<td><b>Tekanan Darah</b></td>";
echo "<td><b>Alergi</b></td>";
echo "<td><b>Riwayat Penyakit</b></td>";
echo "<td><b>Kode ICD</b></td>";
echo "<td><b>Keterangan</b></td>";
echo "</tr>";
if(isset($_GET['id'])){
$id = (int) $_GET['id'];
$result = mysql_query("SELECT * FROM `catatan_medis` WHERE id_pasien = $id") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['tanggal']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['takanan_darah']) . "</td>"; 
echo "<td valign='top'>" . nl2br( $row['alergi']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['riwayat_penyakit']) . "</td>";   
echo "<td valign='top'>" . nl2br( $row['kode_ICD']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['Keterangan']) . "</td>";  
echo "</tr>"; 
} 
echo "</table>";
echo "<hr />"; 
echo "<a href=list_pasien.php class='btn btn-success'>Kembali</a>";
echo "<span class='print'><a href='#' class='btn btn-primary'>Print</a></span>"; 
}
?>
</div>
<?php include 'part/footer.php'; ?>