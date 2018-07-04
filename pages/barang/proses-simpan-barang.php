<section class="content-header">
    <h1>Input<small>Barang Masuk</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Input Barang Masuk</li>
    </ol>
</section>
<div class="register-box">
<?php	
	if ($_POST['save'] == "save") {

	$nama_barang =$_POST['nama'];
	$merk	 	 =$_POST['merk'];
	$jumlah	 	 =$_POST['jumlah'];
	$bahan	 	 =$_POST['bahan'];
	$asal	 	 =$_POST['asal'];
	$tgl_masuk	 =$_POST['tgl_masuk'];
	$harga	 	 =$_POST['harga'];
	$kondisi	 =$_POST['kondisi'];
	
	

	include "dist/koneksi.php";
	// $cekuser	=mysql_num_rows (mysql_query("SELECT id_barang FROM tb_barang WHERE id_barang='$_POST[id_barang]'"));
	
		if (empty($_POST['nama']) || empty($_POST['tgl_masuk']) ) {
		echo "<div class='register-logo'><b>Oops!</b> Data Tidak Lengkap.</div>
			<div class='box box-primary'>
				<div class='register-box-body'>
					<p>Harap periksa kembali dan pastikan data yang Anda masukan lengkap dan benar.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-admin.php?page=form-master-barang' class='btn btn-block btn-warning'>Back</button>
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
		$insert = "INSERT INTO tb_barang (nama_barang, merk, jumlah, bahan_barang, asal_barang, tgl_masuk, harga_barang, kondisi) VALUES ('$nama_barang', '$merk', '$jumlah', '$bahan', '$asal', '$tgl_masuk', '$harga',  '$kondisi')";
		$query = mysql_query ($insert);
		$last_id = mysql_insert_id();
		
		if($query){

			$insert = "INSERT INTO tb_gudang (id_barang, jumlah) VALUES ('$last_id', '$jumlah')";
			$query = mysql_query ($insert);

			echo "<div class='register-logo'><b>Input Data</b> Successful!</div>	
				<div class='register-box-body'>
					<p>Input Data Berhasil.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-admin.php?page=form-master-barang' class='btn btn-danger btn-block btn-flat'>Next >></button>
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