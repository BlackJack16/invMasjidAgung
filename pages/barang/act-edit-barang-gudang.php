<section class="content-header">

</section>
<div class="register-box">
<?php
	if (isset($_GET['id_gudang'])) {

	$id_gudang		= $_GET['id_gudang'];
	$jumlah				= $_POST['jumlah'];

	}

	else{
		die ("Error. No ID Selected! ");	
	}
	
	include "dist/koneksi.php";
	$activated = "UPDATE tb_gudang SET  jumlah ='$jumlah' WHERE id_gudang = '$id_gudang'";
	$query = mysql_query ($activated);		
		if($query){
		echo "
			<div class='register-box-body'>
				<p>Berhasil</p>
				<div class='row'>
					<div class='col-xs-8'></div>
					<div class='col-xs-4'>
						<div class='box-body box-profile'>
						<a class='btn btn-primary btn-block' href='home-admin.php?page=form-barang-gudang'>OK</a>

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
							<a class='btn btn-primary btn-block' href='home-admin.php?page=form-barang-gudang'>OK</a>
						</div>
					</div>
				</div>
			</div>";
		}
?>
</div>