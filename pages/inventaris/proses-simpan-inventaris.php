<section class="content-header">
    <h1>Input<small>Lokasi Inventaris</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Input Lokasi Inventaris</li>
    </ol>
</section>
<div class="register-box">
<?php	
	if ($_POST['save'] == "save") {

	$lokasi	=$_POST['lokasi'];
	$id_user =$_POST['png_jawab'];

	
	include "dist/koneksi.php";
	// $cekuser	=mysql_num_rows (mysql_query("SELECT id_barang FROM tb_barang WHERE id_barang='$_POST[id_barang]'"));
	
		if (empty($_POST['lokasi']) || empty($_POST['png_jawab']) ) {
		echo "<div class='register-logo'><b>Oops!</b> Data Tidak Lengkap.</div>
			<div class='box box-primary'>
				<div class='register-box-body'>
					<p>Harap periksa kembali dan pastikan data yang Anda masukan lengkap dan benar.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-admin.php?page=form-master-inventaris' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>
			</div>";
		}
		
		// else if($cekuser > 0) {
		// echo "<div class='register-logo'><b>Oops!</b> ID User Not Available</div>
		// 	<div class='box box-primary'>
		// 		<div class='register-box-body'>
		// 			<p>Harap periksa kembali dan pastikan ID User yang Anda masukan benar.</p>
		// 			<div class='row'>
		// 				<div class='col-xs-8'></div>
		// 				<div class='col-xs-4'>
		// 					<button type='button' onclick=location.href='home-admin.php?page=form-master-user' class='btn btn-block btn-warning'>Back</button>
		// 				</div>
		// 			</div>
		// 		</div>
		// 	</div>";
		// }
		
		else{
		$insert = "INSERT INTO tb_inventaris (lokasi, id_user) VALUES ('$lokasi', '$id_user')";
		$query = mysql_query ($insert);
		
		if($query){
			echo "<div class='register-logo'><b>Input Data</b> Successful!</div>	
				<div class='register-box-body'>
					<p>Input Data Inventaris Berhasil.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-admin.php?page=form-master-inventaris' class='btn btn-danger btn-block btn-flat'>Next >></button>
						</div>
					</div>
				</div>";
		}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>