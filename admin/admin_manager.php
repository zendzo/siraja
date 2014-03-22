<?php
		$id = (int) $_SESSION['username']['id'];
		$user = mysql_fetch_assoc(mysql_query("SELECT * FROM  `users` ,  `user_detail` WHERE  `users`.`id` =  `user_detail`.`user_id` AND  `users`.`id` = $id "));
?>
<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>Edit Data User : <?= stripslashes($user['username']) ?></h4>
		</div>
				<div class="panel-body">
					<div class="col-lg-12">
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
							<input type="text" name="username" value="<?= $user['username'] ?>" class="form-control">
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
							<input type="text" name="password" class="form-control">
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
							<input type="text" name="" value="<?= $user['nama_lengkap'] ?>" class="form-control">
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-user fa-fw"></i>Alamat</span>
							<input type="text" name="" value="<?= $user['alamat'] ?>" class="form-control">
						</div>
						<hr>
						<input type="submit" class="btn btn-primary" name="update" value="Update"/>
						<a href="index.php.php" class="btn btn-outline btn-primary"> Kembali </a>
					</div><!-- col-lg-6 -->
				</div><!-- panel body -->

	</div><!-- panel success -->
</div><!-- row -->
