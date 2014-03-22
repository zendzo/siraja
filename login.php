<?php 
session_start();
if(isset($_SESSION['username'])){
  header('location:index.php');
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>Login</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/bootstrap-theme.css" rel="stylesheet">

    <!-- siimple style -->
    <link href="assets/css/style.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">SiRaja</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Help</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<div id="header">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<h1 class="page-name">Sistem Informasi Rawat Jalan</h1>
					<h2 class="subtitle">Selamat datang di sistem informasi rawat jalan, silakan login.</h2>

					<form class="form-inline signup" role="form" method="POST" action="proses_login.php">
					  <div class="form-group">
					    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username Anda">
					    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Password Anda">
					  </div>
					  <button type="submit" class="btn btn-theme" name="login">Masuk</button>
					</form>

				</div>
				</div>
				
			</div>
		</div>
	</div>
	<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
					<!-- footer di sini -->
			</div>
		</div>		
	</div>	
	</div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
  <?php 
    if(isset($_GET['message'])){ 
      if($_GET['message'] == 0){
  ?>
    alert("username / password salah");
  <?php } } ?>
</script>
  </body>
</html>