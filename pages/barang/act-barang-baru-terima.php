<section class="content-header">
    <!-- <h1>Hapus<small>Barang Masuk</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Hapus Barang</li>
    </ol> -->
</section>
<div class="register-box">
<?php
	if (isset($_GET['id_pengajuan_barang'])) {

	$id_pengajuan_barang	= $_GET['id_pengajuan_barang'];
	$status					= "Disetujui";
	
	}
	else{
		die ("Error. No ID Selected! ");	
	}
	
	include "dist/koneksi.php";
	$activated = "UPDATE tb_pengajuan_barang SET status ='$status' WHERE id_pengajuan_barang='$id_pengajuan_barang'";
	$query = mysql_query ($activated);		
		if($query){
		echo "
			<div class='register-box-body'>
				<p>Pengajuan Barang diterima</p>
				<div class='row'>
					<div class='col-xs-8'></div>
					<div class='col-xs-4'>
						<div class='box-body box-profile'>
							<a class='btn btn-primary btn-block' href='home-admin.php?page=form-barang-baru'>OK</a>
						</div>
					</div>
				</div>
			</div>";
		}
?>
</div>