<?php
session_start();
if(!isset($_SESSION['username'])){
    die("<b>Oops!</b> Access Failed.
		<p>Sistem Logout. Anda harus melakukan Login kembali.</p>
		<button type='button' onclick=location.href='index.php'>Back</button>");
}
if($_SESSION['hak_akses']!="User"){
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
				<li class="treeview"><a href="home-pegawai.php"><i class="fa fa-th"></i> <span>Inventaris</span></i></a></li>
				<li class="treeview"><a href="#"><i class="fa fa-book"></i> <span>Barang</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="home-pegawai.php?page=masa-pakai-barang">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-right"></i> Masa Pakai Barang</a></li>
						<li><a href="home-pegawai.php?page=pengajuan-pergantian-barang">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-right"></i> Pergantian Barang</a></li>
						<li><a href="home-pegawai.php?page=pengajuan-barang-baru">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-right"></i> Pengajuan Barang</a></li>					
					</ul>
				</li>
				<!-- <li class="treeview"><a href="home-pegawai.php"><i class="fa fa-exchange"></i> <span>Laporan</span></a></li> -->
				<li class="treeview"><a href="home-pegawai.php?page=grafik"><i class="fa fa-bar-chart-o"></i> <span>grafik</span></i></a></li>
			</ul>
		</section>
	</aside>
	<div class="content-wrapper">
		<section class="content">
			<?php
				$page = (isset($_GET['page']))? $_GET['page'] : "main";
				switch ($page) {
					// case 'form-permohonan-cuti-tahunan': include "pages/transaksi/form-permohonan-cuti-tahunan.php"; break;
					// case 'permohonan-cuti-tahunan': include "pages/transaksi/permohonan-cuti-tahunan.php"; break;
					// case 'form-permohonan-cuti-umum': include "pages/transaksi/form-permohonan-cuti-umum.php"; break;
					// case 'permohonan-cuti-umum': include "pages/transaksi/permohonan-cuti-umum.php"; break;
					// case 'history-cuti-pegawai': include "pages/view/history-cuti-pegawai.php"; break;
          
          case 'masa-pakai-barang': include "pages/barang/masa-pakai-barang.php"; break;           
          case 'barang-pegawai': include "pages/barang/barang-pegawai.php"; break; 
          case 'pengajuan-pergantian-barang': include "pages/barang/pengajuan-pergantian-barang.php"; break;  
          case 'pengajuan-barang-baru': include "pages/barang/pengajuan-barang-baru.php"; break;  
          case 'proses-pengajuan-barang-baru': include "pages/barang/proses-pengajuan-barang-baru.php"; break;  
          case 'proses-pengajuan-pergantian-barang': include "pages/barang/proses-pengajuan-pergantian-barang.php"; break;  
          case 'form-edit-masa-pakai': include "pages/barang/form-edit-masa-pakai.php"; break;  
          case 'act-edit-masa-pakai': include "pages/barang/act-edit-masa-pakai.php"; break;  
          case 'grafik': include "pages/master/page-grafik.php"; break;
		  
          default : include 'dashboard-pegawai.php';	
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