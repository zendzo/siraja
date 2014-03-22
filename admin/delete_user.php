<?php
$id = (int) $_GET['id'];
mysql_query("DELETE FROM `rawat_jalan`.`users` WHERE `users`.`id` = $id ") ; 
mysql_query( "DELETE FROM `rawat_jalan`.`user_detail` WHERE `user_detail`.`user_id` = $id") ; 
echo (mysql_affected_rows()) ? "<div class='alert alert-success'>Data Telah Di hapus.</div>" : "<div class='alert alert-danger'>$id Gagal Di hapus</div>";
echo "<a href='daftar_user.php' class='btn btn-succsess'>Kembali</a>" 
?>