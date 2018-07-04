<section class="content-header">

</section>
<div class="register-box">
<?php
	if (isset($_GET['id_detail_inventaris'])) {

	$id_detail_inventaris		= $_GET['id_detail_inventaris'];
	$tgl_diterima		= $_POST['tgl_diterima'];
	$id_barang		= $_POST['id_barang'];
	$id_inventaris	= $_POST['id_inventaris'];
	$jumlah				= $_POST['jumlah'];

	}

	else{
		die ("Error. No ID Selected! ");	
	}
	
	include "dist/koneksi.php";
	$activated = "UPDATE tb_detail_inventaris SET tgl_diterima ='$tgl_diterima',  id_barang ='$id_barang', id_inventaris ='$id_inventaris', jumlah ='$jumlah' WHERE id_detail_inventaris = '$id_detail_inventaris'";
	$query = mysql_query ($activated);		
		if($query){
		echo "
			<div class='register-box-body'>
				<p>Berhasil</p>
				<div class='row'>
					<div class='col-xs-8'></div>
					<div class='col-xs-4'>
						<div class='box-body box-profile'>
						<a class='btn btn-primary btn-block' href='home-admin.php?page=form-barang-keluar'>OK</a>

						</div>
					</div>
				</div>
			</div>";
		}
		else {
			echo "
			<div class='register-box-body'>
				<p>Gagal</p>
				<div class='row'>
					<div class='col-xs-8'></div>
					<div class='col-xs-4'>
						<div class='box-body box-profile'>
							<a class='btn btn-primary btn-block' href='home-admin.php?page=form-barang-keluar'>OK</a>
						</div>
					</div>
				</div>
			</div>";
		}
?>
</div>