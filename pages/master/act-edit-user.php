<section class="content-header">

</section>
<div class="register-box">
<?php
	if (isset($_GET['id_user'])) {

	$id_user	= $_GET['id_user'];
	$nama_user	= $_POST['nama_user'];
	$password	= $_POST['password'];
	$username	= $_POST['username'];
	
	
	}
	else{
		die ("Error. No ID Selected! ");	
	}
	
	include "dist/koneksi.php";
	
	if (empty($_POST['nama_user']) || empty($_POST['password']) || empty($_POST['username']) ) {
		echo "<div class='register-logo'><b>Oops!</b> Data Tidak Lengkap.</div>
			<div class='box box-primary'>
				<div class='register-box-body'>
					<p>Harap periksa kembali dan pastikan data yang Anda masukan lengkap dan benar.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-admin.php?page=form-master-user' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>
			</div>";
		}

		else {
		$activated = "UPDATE tb_user SET nama_user ='$nama_user', password ='$password', username ='$username' WHERE id_user='$id_user'";			
		$query = mysql_query ($activated);
		echo "
			<div class='register-box-body'>
				<p>Berhasil</p>
				<div class='row'>
					<div class='col-xs-8'></div>
					<div class='col-xs-4'>
						<div class='box-body box-profile'>
						<a class='btn btn-primary btn-block' href='home-admin.php?page=form-master-user'>OK</a>

						</div>
					</div>
				</div>
			</div>";
		}
	
?>
</div>