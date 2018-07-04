<section class="content-header">

</section>
<div class="register-box">
<?php
	if (isset($_GET['id_inventaris'])) {

	$id_inventaris	= $_GET['id_inventaris'];
	$lokasi	= $_POST['lokasi'];
	$id_user	= $_POST['id_user'];
	
	}
	else{
		die ("Error. No ID Selected! ");	
	}
	
	include "dist/koneksi.php";
	$activated = "UPDATE tb_inventaris SET lokasi ='$lokasi',  id_user ='$id_user' WHERE id_inventaris='$id_inventaris'";
	$query = mysql_query ($activated);		
		if($query){
		echo "
			<div class='register-box-body'>
				<p>Berhasil</p>
				<div class='row'>
					<div class='col-xs-8'></div>
					<div class='col-xs-4'>
						<div class='box-body box-profile'>
						<a class='btn btn-primary btn-block' href='home-admin.php?page=form-master-inventaris'>OK</a>

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
							<a class='btn btn-primary btn-block' href='home-admin.php?page=form-master-inventaris'>OK</a>
						</div>
					</div>
				</div>
			</div>";
		}
?>
</div>