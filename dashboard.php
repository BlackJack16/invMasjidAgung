<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    </ol>
</section>
<?php
	include "dist/koneksi.php";

	$PergantianBrg =mysql_query("SELECT * FROM tb_pergantian_barang");
	$jmlPergantianBrg = mysql_num_rows($PergantianBrg);
	
	$PengajuanBrg =mysql_query("SELECT * FROM tb_pengajuan_barang");
	$jmlPengajuanBrg = mysql_num_rows($PengajuanBrg);

	$inv =mysql_query("SELECT * FROM tb_inventaris");
	$jmlinventaris = mysql_num_rows($inv);

	$user =mysql_query("SELECT * FROM tb_user");
	$jmlUser = mysql_num_rows($user);
?>
<section class="content">
    <div class="row">
	
  	<div class="col-lg-3 col-xs-6">
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3><?=$jmlinventaris?></h3>
					<p>Total Lokasi Inventaris</p>
				</div>
			  <div class="icon">
					<i class="ion ion-clipboard"></i>
		    </div>
				<p class="small-box-footer"><a style="color:white" href="home-admin.php?page=form-master-inventaris">Detail  <i class="fa fa-arrow-circle-right"></i></a></p>
			</div>
    </div>

    <div class="col-lg-3 col-xs-6">
			<div class="small-box bg-green">
				<div class="inner">
					<h3><?=$jmlUser?></h3>
					<p>Total User</p>
				</div>
				<div class="icon">
					<i class="ion ion-person"></i>
				</div>
				<p class="small-box-footer"><a style="color:white" href="home-admin.php?page=form-master-user">Detail <i class="fa fa-arrow-circle-right"></i></a></p>
			</div>
    </div>

    <div class="col-lg-3 col-xs-6">
			<div class="small-box bg-red">
				<div class="inner">
				  <h3><?=$jmlPergantianBrg?></h3>
					<p>Permintaan Pergantian Barang</p>
				</div>
				<div class="icon">
				  <i class="ion ion-android-calendar"></i>
				</div>
				<p class="small-box-footer"><a style="color:white" href="home-admin.php?page=form-barang-ganti">Detail <i class="fa fa-arrow-circle-right"></i></a></p>
			</div>
    </div>

    <div class="col-lg-3 col-xs-6">
			<div class="small-box bg-yellow">
				<div class="inner">
				  <h3><?=$jmlPengajuanBrg?></h3>
					<p>Permintaan Pengajuan Barang</p>
				</div>
				<div class="icon">
				  <i class="ion ion-pricetags"></i>
				</div>
				<p class="small-box-footer"><a style="color:white" href="home-admin.php?page=form-barang-baru">Detail <i class="fa fa-arrow-circle-right"></i><a/></p>
			</div>
    </div>


</div>
</section>