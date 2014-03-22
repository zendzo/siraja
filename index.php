<?php include 'part/header.php'; ?>
<div class="col-lg-12">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<center></center><h4><?= "Selamat Datang Di Sistem, Anda Login Sebagai -  ".strtoupper($_SESSION['username']['username']); ?></h4></center>
			</div>
		</div>
	</div>
</div>
<?php include 'part/footer.php'; ?>