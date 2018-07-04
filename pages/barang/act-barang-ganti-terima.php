<section class="content-header">
    <!-- <h1>Hapus<small>Barang Masuk</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Hapus Barang</li>
    </ol> -->
</section>
<div class="register-box">
<?php
	if (isset($_GET['id_pergantian_barang'])) {

	$id_pergantian_barang	= $_GET['id_pergantian_barang'];
	$status					= "Diterima";
	
	}
	else{
		die ("Error. No ID Selected! ");	
	}
	
	include "dist/koneksi.php";
	$activated = "UPDATE tb_pergantian_barang SET status ='$status' WHERE id_pergantian_barang='$id_pergantian_barang'";
	$query = mysql_query ($activated);		
		if($query){
		echo "
			<div class='register-box-body'>
				<p>Pergantian Barang Ditolak</p>
				<div class='row'>
					<div class='col-xs-8'></div>
					<div class='col-xs-4'>
						<div class='box-body box-profile'>
							<a class='btn btn-primary btn-block' href='home-admin.php?page=form-barang-ganti'>OK</a>
						</div>
					</div>
				</div>
			</div>";
		}
?>
</div>