<div class="panel panel-primary">
	<div class="panel-heading">
		<h4>List User</h4>
	</div>
		<div class="panel-body">
		<div class="row">
			<div class="col-lg-12">
<?php
echo "<table class='table table-striped table-bordered table-hover' >"; 
echo "<tr>"; 
echo "<td><b>Id</b></td>"; 
echo "<td><b>Username</b></td>"; 
echo "<td><b>Jabatan</b></td>"; 
echo "<td><b>Group</b></td>";
echo "<td><b>Status</b></td>";  
echo "<td><b></b></td>";  
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `users` WHERE id >= 2 ORDER BY id asc") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['username']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['jabatan']) . "</td>";  
echo "<td valign='top'>" . group( $row['role']) . "</td>"; 
echo "<td valign='top'>" . status( $row['status']) . "</td>"; 
echo "<td valign='top'>
		<a class='btn btn-success btn-xs' href=edit_user.php?id={$row['id']}>Edit</a>
		<a class='btn btn-primary btn-xs' href=detail_user.php?id={$row['id']}>Detail</a>
		<a class='btn btn-danger btn-xs' href=hapus_user.php?id={$row['id']}>Delete</a>
		</td> "; 
echo "</tr>"; 
} 
echo "</table>";
?>
</div> <!-- panel body -->
	</div> <!-- row -->
		</div> <!-- col-lg-6 -->