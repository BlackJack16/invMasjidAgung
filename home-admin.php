<?php
session_start();
if(!isset($_SESSION['username'])){
    die("<b>Oops!</b> Access Failed.
		<p>Sistem Logout. Anda harus melakukan Login kembali.</p>
		<button type='button' onclick=location.href='index.php'>Back</button>");
}
if($_SESSION['hak_akses']!="Admin"){
    die("<b>Oops!</b> Access Failed.
		<p>Anda Bukan Admin.</p>
		<button type='button' onclick=location.href='index.php'>Back</button>");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistem Informasi Inventaris Barang</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="dist/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="dist/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="dist/css/AdminLTE.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
	<link rel="stylesheet" href="plugins/iCheck/square/blue.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="plugins/morris/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="plugins/datepicker/bootstrap-datetimepicker.min.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<script type="text/javascript" src="plugins/datatables/jquery.js"></script>
			
</head>
<body class="hold-transition skin-green fixed sidebar-mini">
<div class="wrapper">
	<header class="main-header">
		<!-- <a href="home-admin.php" class="logo"><span class="logo-mini"></span><span class="logo-lg">Sistem Inventaris</span></a> -->
		<nav class="navbar navbar-static-top" role="navigation">
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"><span class="sr-only">Toggle navigation</span></a>
			<div class="navbar-header">
                    <a class="navbar-brand"> Sistem Informasi Inventaris Barang Masjid Agung Palembang  </a>
                </div>
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
				
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src='dist/img/profile/no-image.jpg' class='user-image' alt='User Image'>
							<span class="hidden-xs">Hai, <?php echo $_SESSION['nama_user'] ?></span> &nbsp;<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li class="user-header">
								<img src='dist/img/profile/no-image.jpg' class='img-circle' alt='User Image'>
								<p>Welcome - <?php echo $_SESSION['nama_user'] ?><small><?php echo $_SESSION['hak_akses'] ?></small></p>
							</li>
							<li class="user-body">
								<div class="row">
								</div>
							</li>
							<li class="user-footer">
								<div class="pull-left">
									<?php echo date("d-m-Y");?>
								</div>
								<div class="pull-right">
								  <a href="pages/login/act-logout.php" class="btn btn-default btn-flat">Log out</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<aside class="main-sidebar">
		<section class="sidebar">
			<ul class="sidebar-menu">
				<li class="header" style="background-color:#222d32">	<img  style="background-color:#222d32; height:200px; width:200px" src='dist/img/logo.png' class='user-image' alt='User Image'>
				</li>
				<li class="treeview"><a href="home-admin.php"><i class="fa fa-th"></i> <span>Dashboard</span></i></a></li>
				<li class="treeview"><a href="#"><i class="fa fa-folder"></i> <span>Master Data</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="home-admin.php?page=form-master-user"> <i class="fa fa-caret-right"></i> User</a></li>
						<!-- <li><a href="home-admin.php?page=form-master-pegawai"> <i class="fa fa-caret-right"></i> Pegawai</a></li> -->
						<li><a href="home-admin.php?page=form-master-barang"> <i class="fa fa-caret-right"></i> Barang Masuk</a></li>
						<li><a href="home-admin.php?page=form-master-inventaris"> <i class="fa fa-caret-right"></i> Lokasi Inventaris</a></li>
					</ul>
				</li>
				<li class="treeview"><a href="#"><i class="fa fa-bar-chart-o"></i> <span> Barang</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="home-admin.php?page=form-barang-gudang"> <i class="fa fa-caret-right"></i> Stok Barang Digudang</a></li>
						<li><a href="home-admin.php?page=form-barang-keluar"> <i class="fa fa-caret-right"></i> Barang Keluar</a></li>
						<li><a href="home-admin.php?page=form-barang-ganti"> <i class="fa fa-caret-right"></i> Pergantian Barang</a></li>
						<li><a href="home-admin.php?page=form-barang-baru"> <i class="fa fa-caret-right"></i> Pengajuan Barang</a></li>
						
					</ul>
				</li>
				<!-- <li class="treeview"><a href="home-admin.php"><i class="fa fa-info"></i> <span>Laporan</span></i></a></li> -->
				

			</ul>
		</section>
	</aside>
	<div class="content-wrapper">
		<section class="content">
			<?php
				$page = (isset($_GET['page']))? $_GET['page'] : "main";
				switch ($page) {
					case 'form-master-user': include "pages/master/form-master-user.php"; break;
					case 'form-master-barang': include "pages/barang/form-master-barang.php"; break;
					case 'form-barang-gudang': include "pages/barang/form-barang-gudang.php"; break;					
					case 'form-barang-keluar': include "pages/barang/form-barang-keluar.php"; break;										
					case 'form-master-inventaris': include "pages/inventaris/form-master-inventaris.php"; break;
					case 'form-barang-ganti': include "pages/barang/form-barang-ganti.php"; break;					
					case 'form-barang-baru': include "pages/barang/form-barang-baru.php"; break;					
					
					case 'pre-activated-deactivate-user': include "pages/master/pre-activated-deactivate-user.php"; break;
					case 'activated-user': include "pages/master/activated-user.php"; break;
					case 'deactivate-user': include "pages/master/deactivate-user.php"; break;
					case 'form-master-pegawai': include "pages/master/form-master-pegawai.php"; break;
					case 'form-edit-data-pegawai': include "pages/master/form-edit-data-pegawai.php"; break;
					case 'form-edit-barang-masuk': include "pages/barang/form-edit-barang-masuk.php"; break;
					case 'form-edit-user': include "pages/master/form-edit-user.php"; break;
					case 'form-edit-inventaris': include "pages/inventaris/form-edit-inventaris.php"; break;	
					case 'form-edit-barang-keluar': include "pages/barang/form-edit-barang-keluar.php"; break;
					case 'form-edit-barang-gudang': include "pages/barang/form-edit-barang-gudang.php"; break;
				
					case 'act-edit-user': include "pages/master/act-edit-user.php"; break;
					case 'act-edit-inventaris': include "pages/inventaris/act-edit-inventaris.php"; break;
					case 'act-edit-barang-masuk': include "pages/barang/act-edit-barang-masuk.php"; break;
					case 'act-edit-barang-keluar': include "pages/barang/act-edit-barang-keluar.php"; break;
					case 'act-edit-barang-gudang': include "pages/barang/act-edit-barang-gudang.php"; break;

					case 'act-hapus-user': include "pages/master/act-hapus-user.php"; break;          
					case 'act-hapus-barang': include "pages/barang/act-hapus-barang.php"; break;          
					case 'act-hapus-inventaris': include "pages/inventaris/act-hapus-inventaris.php"; break;          
					case 'act-barang-baru-terima': include "pages/barang/act-barang-baru-terima.php"; break;          
					case 'act-barang-baru-ditolak': include "pages/barang/act-barang-baru-ditolak.php"; break;          
					case 'act-barang-ganti-terima': include "pages/barang/act-barang-ganti-terima.php"; break;          
					case 'act-barang-ganti-ditolak': include "pages/barang/act-barang-ganti-ditolak.php"; break;          
					case 'act-hapus-barang-keluar': include "pages/barang/act-hapus-barang-keluar.php"; break;          
					
					case 'master-user': include "pages/master/master-user.php"; break;
					
					case 'proses-simpan-inventaris': include "pages/inventaris/proses-simpan-inventaris.php"; break;
					case 'proses-simpan-barang': include "pages/barang/proses-simpan-barang.php"; break;
					case 'proses-barang-keluar': include "pages/barang/proses-barang-keluar.php"; break;
					
					case 'delete-data-pegawai': include "pages/master/delete-data-pegawai.php"; break;
					case 'edit-data-pegawai': include "pages/master/edit-data-pegawai.php"; break;
					case 'form-lihat-data-pegawai': include "pages/master/form-lihat-data-pegawai.php"; break;
					default : include 'dashboard.php';	
				}
			?>
		</section>
	</div>
	<footer class="main-footer">
		<div class="pull-right hidden-xs"><b>Rakhmat Saleh</b> 12540154</div>
		Copyright &copy; 2018 <a href="#" target="_blank">Sistem Informasi Inventaris Barang</a>. Masjid Agung Palembang
	</footer>
</div>
	<!-- ./wrapper -->
	<!-- jQuery 2.1.4 -->
	<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	  $.widget.bridge('uibutton', $.ui.button);
	</script>
	<!-- Bootstrap 3.3.5 -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- Morris.js charts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="plugins/morris/morris.min.js"></script>
	<!-- Sparkline -->
	<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
	<!-- jvectormap -->
	<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="plugins/knob/jquery.knob.js"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<!-- Slimscroll -->
	<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/app.min.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="dist/js/pages/dashboard.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
</body>
</html>