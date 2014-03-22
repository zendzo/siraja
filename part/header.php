<?php 
require 'function.php'; 
connection(); //membuat koneksi
cek_login(); //cek login username

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem informasi rawat jalan</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Blank -->

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">
    
    <!-- printer -->

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">[SISTEM INFORMASI RAWAT JALAN]</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="user_manager.php"><i class="fa fa-user fa-fw"></i><?= $_SESSION['username']['username']."(".$_SESSION['username']['jabatan'].")"; ?></a>
                        </li>
                        <?php if(cek_admin()): ?>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings Aplikasi</a></li>
                        <li><a href="daftar_user.php"><i class="fa fa-users fa-fw"></i> Manajemen User</a></li>
                        <?php endif; ?>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Keluar</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

        </nav>
        <!-- /.navbar-static-top -->

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                    <form action="search.php" method="GET" role="form-group">
                        <div class="input-group custom-search-form">
                                <input type="text" name="keyword" class="form-control" placeholder="Cari...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>  
                        </div>
                        </form>
                        <!-- /input-group -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-home fa-fw"></i> Menu Utama<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <!-- jika admin / tampilkan menu admin -->
                            <?php if(cek_admin()): ?>
                                <li>
                                    <a href="tambah_user.php">Registrasi User Baru</a>
                                    <a href="daftar_user.php">List User</a>
                                </li>
                            <?php endif; ?>
                            <?php if(cek_dokter()): ?>
                            <li>
                                <a href="pasien_baru.php"></i>Daftar Pasien Baru</a>
                            </li>
                            <?php endif; ?>
                            <li>
                                <a href="list_pasien.php"></i>List Pasien</a>
                            </li>
                            <li>
                                <a href="#">Rencana Tambahan</a>
                            </li>
                            
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                <!-- /#side-menu -->

            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <br/> <!-- kasi baris satu -->