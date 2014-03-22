<?php include 'part/header.php'; ?>
<?php
$id = (int) $_GET['id']; 
mysql_query("DELETE FROM `pasien` WHERE `id` = '$id' ") ; 
echo (mysql_affected_rows()) ? "<div class='alert alert-success'>Data Telah Di hapus.</div>" : "<div class='alert alert-danger'>$id Gagal Di hapus</div>"; 
?> 

<a href='list_pasien.php' class="btn btn-success">Kembali</a>
<?php include 'part/footer.php'; ?>