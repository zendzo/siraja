<?php
if(isset($_GET['id'])){
	$id = (int) $_GET['id'];
	$row = mysql_fetch_array ( mysql_query("SELECT * FROM `users`,`user_detail` WHERE `users`.`id` = '$id' and `user_detail`.`user_id` = `users`.`id` "));
?>
<div class="panel panel-success">
	<div class="panel-heading">
		<h4>Detail Data  : <?= stripslashes($row['username']) ?></h4>
	</div>
		<div class="panel-body">
			<div class="row">

				<div class="col-lg-6">
					<div class="col-lg-3 align-right">
						<h4>
							Username : 
						</h4>
						<h4>
							Jabatan : 
						</h4>
						<h4>
							Group : 
						</h4>
						<h4>
							Status : 
						</h4>
					</div><!-- col-lg-3 -->
					<div class="col-lg-3">
						<h4>
							<?= $row['username'] ?>
						</h4>
						<h4>
							<?= $row['jabatan'] ?>
						</h4>
						<h4>
							<?= group($row['role']) ?>
						</h4>
						<h4>
							<?= status($row['status']) ?>
						</h4>					
					</div><!-- col-lg-3 -->
			</div>
			<div class="col-lg-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						User Info
					</div> <!-- panel heding -->
					<div class="panel-body">
						<h5>Nama Lengkap : </h5><p class="lead"><?= $row['nama_lengkap'] ?></p>
						<h5>Alamat Lengkap : </h5><p class="lead"><?= $row['alamat'] ?></p>
						<h5>Pendidikan : </h5><p class="lead"><?= pendidikan($row['pendidikan']) ?></p>
					</div><!-- panel body -->
				</div><!-- pannel info user -->
			</div><!-- col-lg-6 -->

			</div><!-- row -->
		</div><!-- pannel-body -->
<?php } ?>