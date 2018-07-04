<section class="content-header">
    <h1>Hapus<small>User</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Hapus User</li>
    </ol>
</section>
<div class="register-box">
<?php
	if (isset($_GET['id_user'])) {
	$id_user	= $_GET['id_user'];
	}
	else{
		die ("Error. No ID Selected! ");	
	}
	
	include "dist/koneksi.php";
	$activated = "DELETE FROM `tb_user` WHERE id_user='$id_user'";
	$query = mysql_query ($activated);		
		if($query){
		echo "
			<div class='register-box-body'>
				<p>User berhasil dihapus</p>
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