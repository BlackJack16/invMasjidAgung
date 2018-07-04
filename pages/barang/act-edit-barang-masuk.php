<section class="content-header">

</section>
<div class="register-box">
<?php
	if (isset($_GET['id_barang'])) {

	$id_barang		= $_GET['id_barang'];
	$tgl_masuk		= $_POST['tgl_masuk'];
	$nama_barang	= $_POST['nama_barang'];
	$merk					= $_POST['merk'];
	$jumlah				= $_POST['jumlah'];
	$bahan_barang	= $_POST['bahan_barang'];
	$asal_barang	= $_POST['asal_barang'];
	$harga_barang	= $_POST['harga_barang'];
	$kondisi			= $_POST['kondisi'];
	}

	else{
		die ("Error. No ID Selected! ");	
	}
	
	include "dist/koneksi.php";
	$activated = "UPDATE tb_barang SET tgl_masuk ='$tgl_masuk',  nama_barang ='$nama_barang', merk ='$merk', jumlah ='$jumlah',bahan_barang ='$bahan_barang',asal_barang ='$asal_barang',kondisi ='$kondisi' , harga_barang ='$harga_barang' WHERE id_barang='$id_barang'";
	$query = mysql_query ($activated);		
		if($query){
		echo "
			<div class='register-box-body'>
				<p>Berhasil</p>
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
		else {
			echo "
			<div class='register-box-body'>
				<p>Gagal</p>
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
?>
</div>