<section class="content-header">
    <!-- <h1>Hapus<small>Barang Masuk</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Hapus Barang</li>
    </ol> -->
</section>
<div class="register-box">
<?php
	if (isset($_GET['id_detail_inventaris'])) {
	$id_detail_inventaris	= $_GET['id_detail_inventaris'];
	}
	else{
		die ("Error. No ID Selected! ");	
	}
	
	include "dist/koneksi.php";
	$activated = "DELETE FROM `tb_detail_inventaris` WHERE id_detail_inventaris='$id_detail_inventaris'";
	$query = mysql_query ($activated);		
		if($query){
		echo "
			<div class='register-box-body'>
				<p>Berhasil dihapus</p>
				<div class='row'>
					<div class='col-xs-8'></div>
					<div class='col-xs-4'>
						<div class='box-body box-profile'>
							<a class='btn btn-primary btn-block' href='home-admin.php?page=form-master-barang'>OK</a>
						</div>
					</div>
				</div>
			</div>";
		}
		else echo "<div class='register-box-body'>
		<p>Gagal dihapus</p>
		<div class='row'>
			<div class='col-xs-8'></div>
			<div class='col-xs-4'>
				<div class='box-body box-profile'>
					<a class='btn btn-primary btn-block' href='home-admin.php?page=form-barang-keluar'>OK</a>
				</div>
			</div>
		</div>
	</div>";
?>
</div>